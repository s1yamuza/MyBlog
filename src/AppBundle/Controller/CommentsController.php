<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("/comentarios")
 */
class CommentsController extends Controller
{
    /**
     * @Route("/aprobar/{id}", name="comments_approve")
     */
    public function approveAction(Request $request){
        return $this->render('public/post.html.twig');
    }

}
