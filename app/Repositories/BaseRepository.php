<?php

namespace App\Repositories;

use App\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function findById(int $id): ?Model
    {
        return $this->model->find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * {@inheritdoc}
     */
    public function getByAttribute(string $field, string $attribute): mixed
    {
        return $this->model->where($field, $attribute)->get();
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * {@inheritdoc}
     */
    public function update(array $data, int $id): bool|int
    {
        return $this->model->where('id', $id)->update($data);
    }

    /**
     * {@inheritdoc}
     */
    public function delete(int $id): bool|int
    {
        return $this->model->where('id', $id)->delete();
    }

    /**
     * {@inheritdoc}
     */
    public function getWithRelation(string $relation): Collection
    {
        return $this->model->with($relation)->get();
    }

    /**
     * {@inheritdoc}
     */
    public function getByIdAndWithRelations(int $id, array $relations): mixed
    {
        return $this->model->where('id', $id)->with($relations)->first();
    }

    /**
     * {@inheritdoc}
     */
    public function getAllByIdAndWithRelations(int $id, array $relations): Collection
    {
        return $this->model->where('id', $id)->with($relations)->get();
    }

    /**
     * {@inheritdoc}
     */
    public function updateOrCreate(array $attributes, array $values): Model
    {
        return $this->model->updateOrCreate($attributes, $values);
    }
}
