<?php

namespace AppBundle\Services;

use AppBundle\Entity\File;

class MyMailer {


    public function createNotification($userName, $postTitle, $webmaster_email)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('Nuevo comentario en MyBlog')
            ->setFrom('info@myblog.com')
            ->setTo($webmaster_email)
            ->setBody(
                'El usuario <b>' .$userName . '</b> ha publicado un comentario en el post <b>' . $postTitle . '</b>.' . '<br /> Accede al panel de administración para revisarlo.'
                , 'text/html');

        return $message;



    }
}