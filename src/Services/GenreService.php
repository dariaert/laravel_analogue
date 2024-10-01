<?php

namespace App\Services;

use App\Core\Database\DatabaseInterface;
use App\Models\Genre;

class GenreService
{
    public function __construct(
        private DatabaseInterface $database
    ) {
    }

    /**
     * @return array<Genre>
     */
    public function all(): array
    {
        $genres = $this->database->get('genres');

        return array_map(function ($genre) {
            return new Genre(
                id: $genre['id'],
                name: $genre['name']
            );
        }, $genres);
    }

    public function delete(int $id): void
    {
        $this->database->delete('genres', [
            'id' => $id,
        ]);
    }

    public function store(string $name): int
    {
        return $this->database->insert('genres', [
            'name' => $name,
        ]);
    }

    public function find(int $id): ?Category
    {
        $category = $this->db->first('categories', [
            'id' => $id,
        ]);

        if (! $category) {
            return null;
        }

        return new Category(
            id: $category['id'],
            name: $category['name'],
            createdAt: $category['created_at'],
            updatedAt: $category['updated_at']
        );
    }

    public function update(int $id, string $name): void
    {
        $this->db->update('categories', [
            'name' => $name,
        ], [
            'id' => $id,
        ]);
    }

}