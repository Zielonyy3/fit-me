<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryContract
{
    /**
     * @param string|int $id
     * @return Model
     */
    public function find(string|int $id): ?Model;

    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model;

    /**
     * @param Model $model
     * @param array $attributes
     * @return bool
     */
    public function update(Model|int $model, array $attributes): bool;

    /**
     * @param Model $model
     * @return bool
     */
    public function delete(Model|int $model): bool;

    /**
     * @param Model $model
     * @return bool
     */
    public function restore(Model|int $model): bool;


    /**
     * @return Collection
     */
    public function all(): Collection;

    /**
     * @return Model
     */
    public function getModel(): Model;

    /**
     * @return int
     */
    public function getCount(): int;

    /**
     * @return int
     */
    public function getTrashedCount(): int;

    /**
     * Find Record based on specific column.
     *
     * @param string $value
     * @param string $column_name
     *
     * @return mixed
     */
    public function getByColumn(string $value, string $column_name = 'id'): ?Model;

    /**
     * @return mixed
     */
    public function query();

    /**
     * Generate drop-down select data with basic IDs.
     *
     * @param string $field_name
     *
     * @return array
     */
    public function getSelectData(string $field_name = 'name');
}
