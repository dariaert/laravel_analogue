<?php

namespace App\Core\View;

use App\Core\Auth\AuthInterface;
use App\Core\Exceptions\ViewNotFoundException;
use App\Core\Session\Session;
use App\Core\Session\SessionInterface;

class View implements ViewInterface
{

    public function __construct(
        private SessionInterface $session,
        private AuthInterface $auth,
    )
    {
    }

    public function page(string $name): void
    {
        $viewPath = APP_PATH . "/views/pages/$name.php";

        if (!file_exists($viewPath)) {
            throw new ViewNotFoundException("View $name not found");
        }

        extract($this->defaultData());

        include_once $viewPath;
    }

    public function component(string $name): void
    {
        $componentPath = APP_PATH."/views/components/$name.php";

        if (!file_exists($componentPath)) {
            echo "Component $name not found";
            return;
        }

        extract($this->defaultData());

        include $componentPath;
    }

    private function defaultData(): array
    {
        return [
            'view' => $this,
            'session' => $this->session,
            'auth' => $this->auth,
//            'storage' => $this->storage,
        ];
    }

    public function title(): string
    {
        return $this->title;
    }

}