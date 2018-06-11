<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Serializer\JsonSerializer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Article controller.
 *
 */
class ArticleController extends Controller
{
        /**
         * Lists all article entities.
         *
         * @Route("/", name="homepage")
         * @Method("GET")
         */
    public function indexAction(Request $request)
    {
        return $this->render('base.html.twig');
    }

        
        /**
         * Lists all article entities.
         *
         * @Route("/articles", name="articles_list")
         * @Method("GET")
         */
    public function listsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('AppBundle:Article')->findAll();

        $serializer = new JsonSerializer();
        return JsonResponse::fromJsonString($serializer->serialize($articles, 'json'));
    }

    /**
     * Finds and displays a article entity.
     *
     * @Route("article/{id}", name="article_show")
     * @Method("GET")
     */
    public function showAction(Article $article, Request $request)
    {
            $serializer = new JsonSerializer();
            return JsonResponse::fromJsonString($serializer->serialize($article, 'json'));
    }

    /**
     * Creates a new article entity.
     *
     * @Route("article/new", name="article_new")
     * @Method({"POST"})
     */
    public function newAction(Request $request)
    {
        $article = new Article();
        $form = $this->createForm('AppBundle\Form\ArticleType', $article);
        $form->handleRequest($request);
        $status = 200;

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            $status = 201;
            $response = array($serializer->serialize($article, 'json'));
        }

        return JsonResponse::fromJsonString($serializer->serialize($response, 'json'), $status);
    }

    /**
     * Displays a form to edit an existing article entity.
     *
     * @Route("article/{id}/edit", name="article_edit")
     * @Method({"PATCH"})
     */
    public function editAction(Request $request, Article $article)
    {
        $editForm = $this->createForm('AppBundle\Form\ArticleType', $article);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
        }
        return JsonResponse::fromJsonString($serializer->serialize($response, 'json'));
    }

    /**
     * Deletes a article entity.
     *
     * @Route("article/{id}", name="article_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Article $article)
    {
        $form = $this->createDeleteForm($article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($article);
            $em->flush();
        }

        return $this->redirectToRoute('article_index');
    }

    /**
     * Creates a form to delete a article entity.
     *
     * @param Article $article The article entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Article $article)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('article_delete', array('id' => $article->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
