<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Advert;
use AppBundle\Entity\Reservation;
use AppBundle\Form\ReservationType;
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
     * @Route("createReservation/{id}/{date}", name="create_reservation")
     */
    public function reservationAction(Request $request, Advert $advert, $date){
        $currentUser = $this->getUser();
        $reservation = new Reservation();
        $reservation->setUser($currentUser);
        $reservation->setDate(new \DateTime($date));
        $reservation->setAdvert($advert);

        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush();
            $this->addFlash('success', "Reservation confirmée");

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

}