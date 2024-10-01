<?php

namespace App\Core\Middleware;

interface MiddlewareInterface
{
    public function check(array $middlewares = []): void;
}