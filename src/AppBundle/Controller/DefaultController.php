<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Advert;
use AppBundle\Form\SearchType;
use AppBundle\Form\ContactType;
use AppBundle\Service\GoogleMap;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(SearchType::class, null, [
            'method' => 'GET',
            'action' => $this->get('router')->generate('resultspage')
        ]);

        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/res", name="resultspage")
     * @Method({"GET", "POST"})
     */
    public function searchAction(Request $request)
    {
        $form = $this->createForm(SearchType::class, null, [
            'method' => 'GET',
        ]);

        $form->handleRequest($request);

        $data = $form->getData();

        $em = $this->getDoctrine()->getManager();

        /*$adverts = $em->getRepository(Advert::class)->findByCriteria($data['city'], $data['type']);*/
        $adverts = $em->getRepository(Advert::class)->findBy(array('city' => $data['city'], 'type' => $_GET['search']['type'][0]));

        return $this->render('default/search_results.html.twig', array(
            'adverts' => $adverts,
            'form' => $form->createView(),
            'events_json' => json_encode($adverts)
        ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/faq", name="faq")
     */
    public function faqAction(Request $request)
    {
        $form = $this->createForm(ContactType::class, null, array(
            'action' => $this->generateUrl('faq'),
            'method' => 'POST'
        ));

        if ($request->isMethod('POST')) {
            // Refill the fields in case the form is not valid.
            $form->handleRequest($request);

            if ($form->isValid()) {
                // Send mail
                if ($this->sendEmail($form->getData())) {

                    // Everything OK, redirect to wherever you want ! :

                    return $this->redirectToRoute('faq');
                } else {
                    // An error occurred, handle
                    var_dump("Errooooor :(");
                }
            }
        }

        return $this->render('default/faq.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/legal_mentions", name="legal_mentions")
     */
    public function legalMentionsAction()
    {
        return $this->render('default/legal_mentions.html.twig');
    }

    /**
     * @param $data
     * @return int|\Symfony\Component\HttpFoundation\Response
     *
     * @Route("/mail", name="mail")
     */
    public function sendEmail($form)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('Demande d\'information')
            ->setFrom($this->getParameter('mailer_user'))
            ->setTo('teamhobbea@gmail.com')
            ->setBody(
                $this->renderView(
                    'default/mail_template.html.twig', array(
                    'form' => $form
                )),
                'text/html'
            );

        $this->get('mailer')->send($message);

        return $this->render('default/legal_mentions.html.twig');
    }

}
