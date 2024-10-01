<?php

namespace App\Services;

use App\Core\Database\DatabaseInterface;

class GenreService
{
    public function __construct(
        private DatabaseInterface $database
    ) {
    }
    public function All()
    {
        return $this->database->get('genre');
    }

}