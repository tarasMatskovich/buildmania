<?php
/**
 * Created by PhpStorm.
 * User: matsk
 * Date: 25.04.2018
 * Time: 20:12
 */

namespace App\Repositories;


abstract class Repository
{
    protected $model = false;

    public function get($select = '*') {
        $builder = $this->model->select($select);

        return $builder->get();
    }
}