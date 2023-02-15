<?php

use App\Controller\Post\ListAllAction;

return function (FastRoute\RouteCollector $r) {
    $r->get('/posts', ListAllAction::class);
};
