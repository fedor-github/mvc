<?php

use App\Controller\Post\ListAllAction;
use App\Controller\HomeAction;

return function (FastRoute\RouteCollector $r) {
    $r->get('/', HomeAction::class);
    $r->get('/posts', ListAllAction::class);
};
