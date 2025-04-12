<?php

namespace App\Services;

use App\Kernel\Database\DatabaseInterface;
use App\Models\Category;

class CategoryService
{
    public function __construct(
        public DatabaseInterface $db
    ) {
    }

    /**
     * @return array<Category>
     */
    public function all(): array
    {
        $categoires = $this->db->get('categories');

        return array_map(function ($category) {
            return new Category(
                id: $category['id'],
                name: $category['name'],
                createdAt: $category['created_at'],
                updatedAt: $category['updated_at']
            );
        }, $categoires);
    }

    public function find(int $id): ?Category
    {
        $category = $this->db->first('categories', [
            'id' => $id
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
            'name' => $name
        ], [
            'id' => $id
        ]);
    }
}
