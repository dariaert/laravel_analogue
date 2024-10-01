<?php

namespace App\Core\View;

interface ViewInterface
{
    public function page(string $name, array $data = []): void;

    public function component(string $name): void;

    public function title(): string;
}