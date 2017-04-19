<?php namespace App\Repositories\Models;

abstract class AbstractModelRepository
{

    protected $model;

    // Get all if owned by user
    public function all($with = [])
    {
        return $this->model->with($with)->all();
    }

    // Get specific if owned by user
    public function get($id)
    {
        return $this->model->findOrFail($id);
    }

    // Get any, regardless of ownership
    public function getAny($id)
    {
        return $this->model->withoutGlobalScopes()->findOrFail($id);
    }


    public function allAny($with = [])
    {
        return $this->model->withoutGlobalScopes()->with($with)->get();
    }

}
