<?php

namespace App\Controller\Post;

use App\Controller\Action;
use App\Model\Posts\Service;

class ListAllAction extends Action
{
    protected function action(array $params): void
    {
        $postSrv = new Service();
        $posts = $postSrv->selectAll();
        $this->render('posts.twig', [
            'posts' => $posts,
        ]);
    }
}
