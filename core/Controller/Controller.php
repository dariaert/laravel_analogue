<?php

namespace App\Core\Controller;

use App\Core\Auth\Auth;
use App\Core\Auth\AuthInterface;
use App\Core\Database\DatabaseInterface;
use App\Core\Http\Redirect;
use App\Core\Http\RedirectInterface;
use App\Core\Http\Request;
use App\Core\Http\RequestInterface;
use App\Core\Session\Session;
use App\Core\Session\SessionInterface;
use App\Core\Storage\StorageInterface;
use App\Core\View\View;
use App\Core\View\ViewInterface;

abstract class Controller
{
    private ViewInterface $view;
    private RequestInterface $request;
    private RedirectInterface $redirect;
    private SessionInterface $session;
    private DatabaseInterface $database;
    private AuthInterface $auth;
    private StorageInterface $storage;

    public function getStorage(): StorageInterface
    {
        return $this->storage;
    }

    public function setStorage(StorageInterface $storage): void
    {
        $this->storage = $storage;
    }

    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

    public function setRequest(RequestInterface $request): void
    {
        $this->request = $request;
    }

    public function setRedirect(RedirectInterface $redirect): void
    {
        $this->redirect = $redirect;
    }

    public function getRedirect(string $url): void
    {
        $this->redirect->to($url);
    }

    public function getSession(): SessionInterface
    {
        return $this->session;
    }

    public function setSession(SessionInterface $session): void
    {
        $this->session = $session;
    }

    public function database(): DatabaseInterface
    {
        return $this->database;
    }

    public function setDatabase(DatabaseInterface $database): void
    {
        $this->database = $database;
    }

    public function getAuth(): AuthInterface
    {
        return $this->auth;
    }

    public function setAuth(AuthInterface $auth): void
    {
        $this->auth = $auth;
    }

    public function view(string $name, array $data = []) : void
    {
        $this->view->page($name, $data);
    }

    public function setView(View $view): void
    {
        $this->view = $view;
    }
}