<?php

use App\Controller\PostController;

return function (FastRoute\RouteCollector $r) {
    $r->get('/posts', [PostController::class, 'listPosts']);
};
