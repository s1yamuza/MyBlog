<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\CommentType;
use AppBundle\Entity\Comment;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


/**
 * @Route("/")
 */
class PublicController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function homeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('AppBundle:Post')->findAll();
        $categories = $em->getRepository('AppBundle:Category')->findAll();
        $tags = $em->getRepository('AppBundle:Tag')->findAll();

        return $this->render('public/home.html.twig', array(
            'posts' => $posts,
            'categories' => $categories,
            'tags' => $tags
        ));
    }

    /**
     * @Route("/post/{id}/{slug}", name="show_post")
     * @ParamConverter("post", class="AppBundle:Post")
     */
    public function showPostAction(Request $request, $id){

        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('AppBundle:Post')->find($id);
        $comments = $post->getComments();

        $comment = new Comment();

        $form = $this->createForm(new CommentType(), $comment);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $comment->setPost($post);
            $em->persist($comment);
            $em->flush();

            $user = $this->get('security.context')->getToken()->getUser();
            $message = $this->get('my_mailer')->createNotification($user->getUsername(), $post->getTitle(), $this->getParameter('webmaster_email'));

            $this->get('mailer')->send($message);

            return $this->redirectToRoute('show_post', array(
                'id' => $post->getId(),
                'slug' => $post->getSlug()
            ));
        }

        $categories = $em->getRepository('AppBundle:Category')->findAll();
        $tags = $em->getRepository('AppBundle:Tag')->findAll();

        return $this->render('public/post.html.twig', array(
            'post' => $post,
            'comments' => $comments,
            'categories' => $categories,
            'tags' => $tags,
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/archivo/categoria/{slug}", name="archive_category")
     */
    public function archiveCategoryAction(Request $request, $slug){

        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository('AppBundle:Category')->findOneBySlug($slug);
        $categories = $em->getRepository('AppBundle:Category')->findAll();
        $tags = $em->getRepository('AppBundle:Tag')->findAll();
        $posts = $category->getPosts();

        return $this->render('public/archive/category.html.twig', array(
            'category' => $category,
            'categories' => $categories,
            'tags' => $tags,
            'posts' => $posts,

        ));
    }

    /**
     * @Route("/archivo/etiqueta/{slug}", name="archive_tag")
     */
    public function archiveTagAction(Request $request, $slug){

        $em = $this->getDoctrine()->getManager();

        $tag = $em->getRepository('AppBundle:Tag')->findOneBySlug($slug);
        $tags = $em->getRepository('AppBundle:Tag')->findAll();
        $categories = $em->getRepository('AppBundle:Category')->findAll();
        $posts = $tag->getPosts();

        return $this->render('public/archive/tag.html.twig', array(
            'tag' => $tag,
            'tags' => $tags,
            'categories' => $categories,
            'posts' => $posts,

        ));
    }

}
