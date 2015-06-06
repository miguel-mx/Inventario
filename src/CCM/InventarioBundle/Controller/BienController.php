<?php

namespace CCM\InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CCM\InventarioBundle\Entity\Bien;
use CCM\InventarioBundle\Form\BienType;

/**
 * Bien controller.
 *
 */
class BienController extends Controller
{


   /* public function bienesAction(Request $request)
    {
        $term = $request->query->get('term', null);

        $em = $this->getDoctrine()->getManager();

        $bienes = $em->getRepository('InventarioBundle:Bien')->find($term);

        return new JsonResponse($bienes);
    }*/

    public function busquedaAction(Request $request)
    {
        $defaultData = array('message' => 'Type your message here');
        $form = $this->createFormBuilder($defaultData)
            ->add('no_inventario', 'text')
            ->add('fecha_adquicision', 'text')
            ->add('marca', 'text')
            ->add('modelo', 'text')
            ->add('buscar', 'submit', array('label' => 'Buscar','attr' => array('class' => 'btn btn-success'),))
            ->getForm();



        $form->handleRequest($request);

        /*if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();
        }*/
        if ($form->isValid()) {
           // $data = $form->get('no_inventario')->getData();
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();

            $entity = $em->getRepository('InventarioBundle:Bien')->findDatos($data);
            if (!$entity) {
                throw $this->createNotFoundException('No se encontraron coincidencias.');
            }
            return $this->render('InventarioBundle:Bien:consulta.html.twig', array(
                'entity'=> $entity,
            ));

        }
        return $this->render('InventarioBundle:Bien:busqueda.html.twig', array('form'=>$form->createView()));


    }



    public function consultaAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $datos = $request->request->get('dato');
        }


        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InventarioBundle:Bien')->findBien($datos);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bien entity.');
        }


        return $this->render('InventarioBundle:Bien:consulta.html.twig', array(
            'entity'=> $entity,
        ));
    }

    public function categoriaAction($catego)
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('InventarioBundle:Bien')->findCategoria($catego);

        if (!$entities) {
            throw $this->createNotFoundException('Unable to find Bien entity.');
        }


        return $this->render('InventarioBundle:Bien:consultacatego.html.twig', array(
            'entities'=> $entities,
        ));
    }

    /**
     * Lists all Bien entities.
     *
     */

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InventarioBundle:Bien')->findAll();

        return $this->render('InventarioBundle:Bien:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Bien entity.
     *
     */
    public function createAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
       // $options = $em->getRepository('InventarioBundle:Descripcion')->findAll();
        //$options= array('m' => 'Male', 'f' => 'Female');
        $entity = new Bien();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $request->getSession()->getFlashBag()->add(
                'notice',
                'Bien creado exitosamente!'
            );
            return $this->redirect($this->generateUrl('bien_show', array('id' => $entity->getId())));
        }

        return $this->render('InventarioBundle:Bien:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Bien entity.
     *
     * @param Bien $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Bien $entity)
    {
        $form = $this->createForm(new BienType(), $entity, array(
            'action' => $this->generateUrl('bien_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Bien entity.
     *
     */
    public function newAction()
    {
        $entity = new Bien();
        $form   = $this->createCreateForm($entity);

        return $this->render('InventarioBundle:Bien:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Bien entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InventarioBundle:Bien')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bien entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InventarioBundle:Bien:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Bien entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InventarioBundle:Bien')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bien entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InventarioBundle:Bien:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Bien entity.
    *
    * @param Bien $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Bien $entity)
    {
        $form = $this->createForm(new BienType(), $entity, array(
            'action' => $this->generateUrl('bien_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Bien entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InventarioBundle:Bien')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bien entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            $request->getSession()->getFlashBag()->add(
                'notice',
                'Tus cambios fueron guardados!'
            );
            return $this->redirect($this->generateUrl('bien_edit', array('id' => $id)));
        }

        return $this->render('InventarioBundle:Bien:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Bien entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InventarioBundle:Bien')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Bien entity.');
            }

            $em->remove($entity);
            $em->flush();
            $request->getSession()->getFlashBag()->add(
                'notice',
                'Activo eliminado exitosamente!'
            );
        }

        return $this->redirect($this->generateUrl('bien'));
    }

    /**
     * Creates a form to delete a Bien entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bien_delete', array('id' => $id)))
            ->setMethod('DELETE')
           // ->add('submit', 'submit', array('label' => 'Delete'))
            ->add('submit', 'submit', array('label' => 'Eliminar','attr' => array('class' => 'btn btn-danger'),))
            ->getForm()
        ;
    }

}
