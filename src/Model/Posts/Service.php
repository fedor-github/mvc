<?php
declare(strict_types=1);

namespace App\Model\Posts;

class Service
{
    public function createPost(string $title, string $content): Post
    {
        $post = new Post($title, $content);
        (new Repository($GLOBALS['db']))->add($post);
        return $post;
    }

    /**
     * @return Post[]
     */
    public function selectAll(): array
    {
        return (new Repository($GLOBALS['db']))->getAll();
    }
}
