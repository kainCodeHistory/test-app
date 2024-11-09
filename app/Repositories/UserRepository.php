<?php

namespace App\Repositories;

use App\Models\Users;

class UserRepository extends BaseRepository
{
    protected $model = Users::class;

    public function get()
    {
        return $this->model::get();
    }
}