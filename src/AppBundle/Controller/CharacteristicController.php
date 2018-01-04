<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Characteristic;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Characteristic controller.
 *
 * @Route("characteristic")
 */
class CharacteristicController extends Controller
{
    /**
     * Lists all characteristic entities.
     *
     * @Route("/", name="characteristic_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $characteristics = $em->getRepository('AppBundle:Characteristic')->findAll();

        return $this->render('characteristic/index.html.twig', array(
            'characteristics' => $characteristics,
        ));
    }

    /**
     * Creates a new characteristic entity.
     *
     * @Route("/new", name="characteristic_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $characteristic = new Characteristic();
        $form = $this->createForm('AppBundle\Form\CharacteristicType', $characteristic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($characteristic);
            $em->flush();

            return $this->redirectToRoute('characteristic_show', array('id' => $characteristic->getId()));
        }

        return $this->render('characteristic/new.html.twig', array(
            'characteristic' => $characteristic,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a characteristic entity.
     *
     * @Route("/{id}", name="characteristic_show")
     * @Method("GET")
     */
    public function showAction(Characteristic $characteristic)
    {
        $deleteForm = $this->createDeleteForm($characteristic);

        return $this->render('characteristic/show.html.twig', array(
            'characteristic' => $characteristic,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing characteristic entity.
     *
     * @Route("/{id}/edit", name="characteristic_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Characteristic $characteristic)
    {
        $deleteForm = $this->createDeleteForm($characteristic);
        $editForm = $this->createForm('AppBundle\Form\CharacteristicType', $characteristic);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('characteristic_edit', array('id' => $characteristic->getId()));
        }

        return $this->render('characteristic/edit.html.twig', array(
            'characteristic' => $characteristic,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a characteristic entity.
     *
     * @Route("/{id}", name="characteristic_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Characteristic $characteristic)
    {
        $form = $this->createDeleteForm($characteristic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($characteristic);
            $em->flush();
        }

        return $this->redirectToRoute('characteristic_index');
    }

    /**
     * Creates a form to delete a characteristic entity.
     *
     * @param Characteristic $characteristic The characteristic entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Characteristic $characteristic)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('characteristic_delete', array('id' => $characteristic->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
