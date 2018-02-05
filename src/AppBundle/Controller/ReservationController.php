<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Advert;
use AppBundle\Entity\Reservation;
use AppBundle\Form\ReservationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ReservationController
 * @Route("reservation")
 */
class ReservationController extends Controller{

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @throws \HttpResponseException
     *
     * @Route("checkDisponibility", name="check_disponibility")
     */
    public function reservationCheckAction(Request $request){
        if($request->isXmlHttpRequest()){
            $start = new \DateTime($request->get('start'));
            $idAvert = $request->get('advert');

            $em = $this->getDoctrine()->getManager();
            $dispo = $em->getRepository(Reservation::class)->findByOnlyDate($start, $idAvert);

            if ($dispo == null){
                $response = array(
                    'status' => false,
                    'url' => $this->generateUrl('create_reservation', array(
                        'id' => $idAvert,
                        'date' => $request->get('start')
                    ))
                );
            } else{
                $response = array('status' => true);
            }
            return new JsonResponse($response);
        } else{
            throw new \HttpResponseException('call method error');
        }
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \AppBundle\Entity\Advert                  $advert
     * @param                                           $date
     * @param \Swift_Mailer                             $mailer
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @Route("createReservation/{id}/{date}", name="create_reservation")
     */
    public function reservationAction(Request $request, Advert $advert, $date, \Swift_Mailer $mailer){
        $currentUser = $this->getUser();
        $reservation = new Reservation();
        $reservation->setUser($currentUser);
        $reservation->setDate(new \DateTime($date));
        $reservation->setAdvert($advert);

        $form = $this->createForm(ReservationType::class, $reservation, array(
            'action' => $this->generateUrl('create_reservation', array(
                'id' => $advert->getId(),
                'date' => $date
            )),
        ));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush();
            $this->addFlash('success', "Reservation confirmée, un message a été envoyé à l'administrateur, il vous répondra dans les plus bres délais");

            $message = (new \Swift_Message('Demande de reservation'))
                ->setFrom($this->getParameter('mailer_user'))
                ->setTo($this->getParameter('mailer_user'))
                ->setBody(
                    $this->renderView(
                    // templates/emails/registration.html.twig
                        'default/mail_template_reservation.html.twig',
                        array(
                            'reservation' => $reservation,
                            'advert' => $advert
                            )
                    ),
                    'text/html'
                )
            ;

            $mailer->send($message);

            return $this->redirectToRoute('advert_show', array(
                'id' => $advert->getId()
            ));
        }

        return $this->render('reservation/recap.html.twig', array(
            'advert' => $advert,
            'form' => $form->createView(),
            'reservation' => $reservation
        ));
    }

    /**
     * @param \AppBundle\Entity\Reservation $reservation
     * @param \AppBundle\Entity\Advert      $advert
     * @param \Swift_Mailer                 $mailer
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @Route("/confirmReservation/{reservation_id}/{advert_id}", name="reservation_confirm")
     *
     * @ParamConverter("reservation", options={"mapping": {"reservation_id": "id"}})
     * @ParamConverter("advert",   options={"mapping": {"advert_id": "id"}})
     */
    public function confirmeReservationAction(Reservation $reservation, Advert $advert, \Swift_Mailer $mailer){
        if ($this->getUser() != $advert->getUser()){
            $this->redirectToRoute('homepage');
        } else {
            $em = $this->getDoctrine()->getManager();
            $reservation->setStatus(Reservation::RESERVATION_CONFIRMED);

            $em->flush();

            $message = (new \Swift_Message('Confirmation de reservation'))
                ->setFrom($this->getParameter('mailer_user'))
                ->setTo($reservation->getUser()->getEmail())
                ->setBody(
                    $this->renderView(
                        'default/mail_template_confirmation.html.twig',
                        array(
                            'reservation' => $reservation,
                            'advert' => $advert
                        )
                    ),
                    'text/html'
                )
            ;

            $mailer->send($message);

            $this->addFlash('success', 'Reservation confirmée');

            return $this->redirectToRoute('fos_user_profile_show');
        }
    }
}