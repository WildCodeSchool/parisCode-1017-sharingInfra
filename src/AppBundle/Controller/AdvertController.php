<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Advert;
use AppBundle\Entity\Picture;
use AppBundle\Form\AdvertType;
use AppBundle\Form\SearchType;
use AppBundle\Services\FileUploader;
use AppBundle\Services\GoogleMap;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Advert controller.
 *
 * @Route("advert")
 */
class AdvertController extends Controller
{
    /**
     * Lists all advert entities.
     *
     * @Route("/", name="advert_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $adverts = $em->getRepository('AppBundle:Advert')->findAll();

        return $this->render('advert/index.html.twig', array(
            'adverts' => $adverts,
            'events_json' => json_encode($adverts)
        ));
    }


    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \AppBundle\Services\GoogleMap             $googleMap
     * @param \AppBundle\Services\FileUploader          $fileUploader
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @Route("/new", name="advert_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, GoogleMap $googleMap, FileUploader $fileUploader)
    {
        // TODO: If not user, create User and Advert
        $advert = new Advert();
        $form = $this->createForm(AdvertType::class, $advert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $advert->setUser($this->getUser());
            $fileUploader->upload($advert);

            $em = $this->getDoctrine()->getManager();
            $location = $googleMap->getLatLng($advert->getAddress(), $advert->getZipcode(), $advert->getCity());
            $advert->setLatitude($location['lat']);
            $advert->setLongitude($location['lng']);
            $em->persist($advert);
            $em->flush();

            return $this->redirectToRoute('advert_show', array('id' => $advert->getId()));
        }

        return $this->render('advert/new.html.twig', array(
            'advert' => $advert,
            'form' => $form->createView(),
        ));
    }


    /**
     * Finds and displays a advert entity.
     *
     * @Route("/{id}", name="advert_show")
     * @Method("GET")
     */
    public function showAction(Advert $advert)
    {
        $deleteForm = $this->createDeleteForm($advert);

        return $this->render('advert/show.html.twig', array(
            'advert' => $advert,
            'delete_form' => $deleteForm->createView(),
            'events_json' => json_encode($advert)
        ));
    }

    /**
     * Displays a form to edit an existing advert entity.
     *
     * @Route("/{id}/edit", name="advert_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Advert $advert, GoogleMap $googleMap, FileUploader $fileUploader)
    {
        $deleteForm = $this->createDeleteForm($advert);
        $editForm = $this->createForm('AppBundle\Form\AdvertType', $advert);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $location = $googleMap->getLatLng($advert->getAddress(), $advert->getZipcode(), $advert->getCity());
            $advert->setLatitude($location['lat']);
            $advert->setLongitude($location['lng']);

            $fileUploader->upload($advert);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('advert_edit', array('id' => $advert->getId()));
        }

        return $this->render('advert/edit.html.twig', array(
            'advert' => $advert,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \AppBundle\Services\FileUploader          $fileUploader
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     *
     * @Route("delete_img", name="advert_delete_img")
     */
    public function deleteImgByAjax(Request $request, FileUploader $fileUploader){
        if ($request->isXmlHttpRequest()){
            $em = $this->getDoctrine()->getManager();
            $idAvert = $request->get('idAdvert');
            $idImg = $request->get('idImg');
            try {
                $img = $em->getRepository(Picture::class)->findOneBy(array('id' => $idImg));
                $advert = $em->getRepository(Advert::class)->findOneBy(array('id' => $idAvert));

                $advert->removePicture($img);
                $fileUploader->remove($img);

                $em->flush();
                return new JsonResponse(array("code" => 200));
            } catch (Exception $e){
                return new JsonResponse($e->getMessage(), 400);
            }
        } else{
            throw new HttpException('Not an ajax Call');
        }
    }

    /**
     * Deletes a advert entity.
     *
     * @Route("/{id}", name="advert_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Advert $advert)
    {
        $form = $this->createDeleteForm($advert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($advert);
            $em->flush();
        }

        return $this->redirectToRoute('advert_index');
    }

    /**
     * Creates a form to delete a advert entity.
     *
     * @param Advert $advert The advert entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Advert $advert)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('advert_delete', array('id' => $advert->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
