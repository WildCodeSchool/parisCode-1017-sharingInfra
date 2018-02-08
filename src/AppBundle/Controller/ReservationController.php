<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Class ReservationController
 * @Route("/advert/{id}/reserver/{id_user}", name="reservation")
 */
class ReservationController extends Controller{

    public function reservationAction(){
        // create a reservation in table
        // send email to notify owner and user

    }

}