<?php

namespace App\Controller;

use PDO;

class PostController
{
    public static function listPosts()
    {
        $res = $GLOBALS['db']
            ->query('SELECT * FROM posts', PDO::FETCH_ASSOC)
            ->fetchAll();

        echo '<h2>Hello!</h2>';
        echo '<pre>';
        print_r($res);
        echo '</pre>';
    }
}
