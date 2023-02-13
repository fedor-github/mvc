<?php
declare(strict_types=1);

namespace App\Model\Posts;

use App\Model\Exception\BaseException;
use PDO;

class Repository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function add(Post $post): void
    {
        $stmt = $this->db->prepare('
            INSERT INTO posts (title, content)
            VALUES (:title, :content)
        ');
        $title = $post->getTitle();
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $content = $post->getContent();
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);

        $isSuccess = $stmt->execute();
        if (!$isSuccess) {
            $err = $stmt->errorInfo();
            throw new BaseException($err[0] . ' ' . $err[1] . ' ' . $err[2]);
        }
    }

    /**
     * @return Post[]
     */
    public function getAll(): array
    {
        $stmt = $this->db->query('SELECT id, title, content FROM posts', PDO::FETCH_ASSOC);
        $res = [];
        /**
         * $resultFromDB = [
         *  ['id' => '1', 'title' => 'test', 'content' => 'post content'],
         *  ['id' => '2', 'title' => 'test2', 'content' => 'post content2'],
         * ]
         */
        $resultFromDB = $stmt->fetchAll();
        foreach ($resultFromDB as $row) {
            $res[intval($row['id'])] = new Post($row['title'], $row['content']);
        }

        return $res;
    }
}
