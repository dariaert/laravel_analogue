<?php

namespace App\Core\Middleware;

use App\Core\Auth\AuthInterface;
use App\Core\Http\RedirectInterface;
use App\Core\Http\RequestInterface;

abstract class AbstractMiddleware
{
    public function __construct(
        protected RequestInterface $request,
        protected AuthInterface $auth,
        protected RedirectInterface $redirect
    ) {
    }

    abstract public function handle(): void;
}