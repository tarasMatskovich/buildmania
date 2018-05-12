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

    public function get($select = '*',$skip = false, $take = false, $where = false, $order = false, $paginate = false) {
        // получаем конструктор запросов
        $builder = $this->model->select($select);


        if($where) {
            $builder->where($where[0],$where[1]);
        }

        if($order) {
            $builder->orderBy($order[0],$order[1]);
        }

        if($skip) {
            $builder->skip($skip);
        }

        if($take) {
            $builder->take($take);
        }

        if($paginate) {
            return $this->check($builder->paginate($paginate));
        }

        return $this->check($builder->get());
    }

    public function check($result) {
        if($result->isEmpty()) {
            return false;
        }

        $result->transform(function($item,$key){
            if(is_string($item->img) && is_object(json_decode($item->img)) && json_last_error() == JSON_ERROR_NONE) {
                $item->img = json_decode($item->img);
            }
            return $item;
        });

        return $result;

    }
}