<?php

namespace App\Repositories;

use App\Repositories\Contracts\BaseRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryContract
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function find(string|int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function update(Model|int $model, array $attributes): bool
    {
        $currentModel = is_int($model) ? $this->find($model) : $model;
        return !empty($currentModel) && $currentModel->update($attributes);
    }

    public function delete(Model|int $model): bool
    {
        $currentModel = is_int($model) ? $this->find($model) : $model;
        return !empty($currentModel) && $currentModel->delete();
    }

    public function restore(Model|int $model): bool
    {
        $currentModel = is_int($model) ? $this->find($model) : $model;
        return !empty($currentModel) && $currentModel->restore();
    }

    public function findWithTrashed(int $id): ?Model
    {
        return $this->model->withTrashed()->find($id);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function getCount(): int
    {
        return $this->query()->count();
    }

    public function getTrashedCount(): int
    {
        return $this->query()->onlyTrashed()->count();
    }

    public function getByColumn(string $value, string $column_name = 'id'): ?Model
    {
        return $this->query()->where($column_name, $value)->first();
    }

    public function query()
    {
        return call_user_func([$this->model, 'query']);
    }

    public function getSelectData($field_name = 'name')
    {
        $collection = $this->all();

        return call_user_func([$this->model, 'getItems'], $collection, $field_name);
    }

    public function updateMeta(Model $model, array $attributes): bool
    {
        $model->setMeta($attributes);
        $model->save();
        return true;
    }
}
