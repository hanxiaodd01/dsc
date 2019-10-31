<?php

namespace App\Contracts\Repositories;

interface RepositoryInterface
{
    public function lists($column, $key = null);

    public function pluck($column, $key = null);

    public function sync($id, $relation, $attributes, $detaching = true);

    public function syncWithoutDetaching($id, $relation, $attributes);

    public function all($columns = array('*'));

    public function paginate($limit = null, $columns = array('*'));

    public function simplePaginate($limit = null, $columns = array('*'));

    public function find($id, $columns = array('*'));

    public function findByField($field, $value, $columns = array('*'));

    public function findWhere(array $where, $columns = array('*'));

    public function findWhereIn($field, array $values, $columns = array('*'));

    public function findWhereNotIn($field, array $values, $columns = array('*'));

    public function create(array $attributes);

    public function update(array $attributes, $id);

    public function updateOrCreate(array $attributes, array $values = array());

    public function delete($id);

    public function orderBy($column, $direction = 'asc');

    public function with($relations);

    public function whereHas($relation, $closure);

    public function withCount($relations);

    public function hidden(array $fields);

    public function visible(array $fields);

    public function scopeQuery(\Closure $scope);

    public function resetScope();

    public function getFieldsSearchable();

    public function setPresenter($presenter);

    public function skipPresenter($status = true);

    public function firstOrNew(array $attributes = array());

    public function firstOrCreate(array $attributes = array());
}
