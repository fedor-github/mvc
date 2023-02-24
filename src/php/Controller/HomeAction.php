<?php
declare(strict_types=1);

namespace App\Controller;

class HomeAction extends Action
{
    protected function action(array $params): void
    {
        $this->render('home.twig');
    }
}
