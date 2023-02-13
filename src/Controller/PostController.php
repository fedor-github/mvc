<?php

namespace App\Controller;

use App\Model\Posts\Service;

class PostController
{
    public static function listPosts()
    {
        $postSrv = new Service();
        $posts = $postSrv->selectAll();

        echo '<h1>POSTS</h1>';
        foreach ($posts as $id => $post) {
            echo "<p><b>$id</b>: " . $post->getTitle() . '</p>';
            echo '<p><i>' . $post->getContent() . '</i></p>';
        }
    }
}
