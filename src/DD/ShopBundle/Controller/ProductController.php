<?php

namespace DD\ShopBundle\Controller;

use Doctrine\Common\Cache\FileCache;
use Symfony\Component\HttpFoundation\FileBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DD\ShopBundle\Entity\Product;
use DD\ShopBundle\Form\ProductType;




/**
 * Product controller.
 *
 */
class ProductController extends Controller
{

    /**
     * Lists all Product entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DDShopBundle:Product')->findAll();

        return $this->render('DDShopBundle:Product:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Product entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Product();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            if($entity->getSrc()){
                $img =$this->cloudinary($entity->getSrc());
                $url=$img['url'];
                $entity->setSrc($url);
            }
            else  $entity->setSrc('null');

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);

            $em->flush();

            return $this->redirect($this->generateUrl('product_show', array('id' => $entity->getId())));
        }

        return $this->render('DDShopBundle:Product:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Product entity.
     *
     * @param Product $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Product $entity)
    {
        $form = $this->createForm(new ProductType(), $entity, array(
            'action' => $this->generateUrl('product_create'),
            'method' => 'POST',
        ));
        $form->add('src', 'file');
        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Product entity.
     *
     */
    public function newAction()
    {
        $entity = new Product();
        $form   = $this->createCreateForm($entity);

        return $this->render('DDShopBundle:Product:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Product entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DDShopBundle:Product')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DDShopBundle:Product:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Product entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DDShopBundle:Product')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }
        //var_dump($entity);
        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);



        if(preg_match('/(?<=upload\/).+/',$entity->getSrc(), $matches)!=false)
        {
            $deleteSrc = $this->createDeleteSrc($id)->createView();
        }
        else
        {
            $deleteSrc = null;
        }
                //form
       // var_dump($entity->getSrc());createView()
        return $this->render('DDShopBundle:Product:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'src'         => $entity->getSrc(),
            'delete_src'=>$deleteSrc
        ));
    }

    /**
    * Creates a form to edit a Product entity.
    *
    * @param Product $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Product $entity)
    {
        $form = $this->createForm(new ProductType(), $entity, array(
            'action' => $this->generateUrl('product_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));
       // $entity->setSrc(null);
        $form->add('src','file', array('data'=>null));
        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Product entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('DDShopBundle:Product')->find($id);
        $default_src = $entity->getSrc();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            if($src = $editForm->getData()->getSrc()){
                $file_type = $request->files->get('dd_shopbundle_product')['src']->getClientMimeType();
                if(preg_match('/jpeg|jpg|png|gif|tiff|ico/', $file_type))
                {
                    $img = $this->cloudinary($src);
                    $entity->setSrc($img['url']);
                }
                else
                {
                    $this->get('session')->getFlashBag()
                            ->add('notice',
                            'You are trying to upload an image data format Malfunction!
                            Try povtarit with a file of any of the proposed type:
                            jpeg, jpg, png, gif, tiff or ico.'
                        );
                    return $this->redirect($this->generateUrl('product_edit', array('id' => $id)));
                }
            }
            else {
                $entity->setSrc($default_src);
            }
            $em->flush();
            return $this->redirect($this->generateUrl('product_show', array('id' => $id)));
        }
        return $this->render('DDShopBundle:Product:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Product entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DDShopBundle:Product')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Product entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('product'));
    }

    /**
     * Creates a form to delete a Product entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('product_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    private function createDeleteSrc($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('delete_src', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete img'))
            ->getForm()

            ;
    }
    public function deleteSrcAction($id){
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('DDShopBundle:Product')->find($id);
        preg_match('/[^\/]+$/',$entity->getSrc(), $matches);
        preg_match('/^.+(?=\.)/', $matches[0], $match);
        if($src = $this->findSrc($entity->getSrc()))
        {
            if(\Cloudinary\Uploader::destroy($src))
            {
                $entity->setSrc('null');
                $em->flush();
                //var_dump($entity->getSrc());
            }
            else
            {
                $this->get('session')->getFlashBag()->add('notice', 'fuck you1');
            }
        }
        else
            {
                $this->get('session')->getFlashBag()->add('notice', 'fuck you2');
            }
        return $this->editAction($id);

    }
    private function cloudinary($src){
        $img = \Cloudinary\Uploader::upload($src);
        return $img;
    }
    private function findSrc($src){
        if(preg_match('/(?<=upload\/).+/',$src, $matches)&&
            preg_match('/[^\/]+$/',$matches[0], $matche)&&
                preg_match('/^.+(?=\.)/', $matche[0], $match))
        {
            ($src = $match[0]);
            return $src;
        }
    }
}
