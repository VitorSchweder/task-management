<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    /**
     *
     * @param int $id
     * @return Model|null
     */
    public function findById(int $id): ?Model;

    /**
     * @return Collection
     */
    public function all(): Collection;

    /**
     * @param string $field
     * @param string $attribute
     * @return mixed
     */
    public function getByAttribute(string $field, string $attribute): mixed;

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;

    /**
     * @param array $data
     * @param int $id
     * @return bool|int
     */
    public function update(array $data, int $id): bool|int;

    /**
     * @param int $id
     * @return bool|int
     */
    public function delete(int $id): bool|int;

    /**
     * @param string $relation
     * @return Collection
     */
    public function getWithRelation(string $relation): Collection;

    /**
     * @param int $id
     * @param array $relations
     * @return mixed
     */
    public function getByIdAndWithRelations(int $id, array $relations): mixed;

    /**
     * @param int $id
     * @param array $relations
     * @return mixed
     */
    public function getAllByIdAndWithRelations(int $id, array $relations): Collection;

    /**
     * @param array $attributes
     * @param array $values
     * @return Model
     */
    public function updateOrCreate(array $attributes, array $values): Model;
}
