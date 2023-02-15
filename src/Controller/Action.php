<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Exception\InvalidDataException;
use Exception;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class Action
{
    public function __invoke(array $params): void
    {
        try {
            $this->action($params);
        } catch (InvalidDataException $e) {
            error_log($e->getMessage());
            header($_SERVER['SERVER_PROTOCOL'] . ' 400 Bad Request', true, 400);
        } catch (Exception $e) {
            error_log($e->getMessage());
            header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
        }
    }

    protected function render(string $tpl, array $data = []): void
    {
        $loader = new FilesystemLoader(__DIR__ . '/../View');
        $twig = new Environment($loader, [
//            'cache' => __DIR__ . '/../../var/twig_cache',
        ]);

        $template = $twig->load($tpl);
        echo $template->render($data);
    }

    abstract protected function action(array $params): void;
}
