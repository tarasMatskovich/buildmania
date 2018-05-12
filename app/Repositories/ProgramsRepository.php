<?php
/**
 * Created by PhpStorm.
 * User: matsk
 * Date: 25.04.2018
 * Time: 20:22
 */

namespace App\Repositories;

use App\Program;


class ProgramsRepository extends Repository
{
    public $targets = array('Подготовительная','Набор массы','Жиросжигание','Увеличение силы','Выносливость','Поддержание формы');

    public $difficults = array('Новичок','Любитель','Проффесионал');

    public $body_types = array('Эктоморф','Мезоморф','Эндоморф');


    public function __construct(Program $program)
    {
        $this->model = $program;
    }

    public function check($result) {
        if($result->isEmpty()) {
            return false;
        }

        $result->transform(function($item,$key){
            if(is_string($item->img) && is_object(json_decode($item->img)) && json_last_error() == JSON_ERROR_NONE) {
                $item->img = json_decode($item->img);
            }
            if(is_string($item->time) && is_object(json_decode($item->time)) && json_last_error() == JSON_ERROR_NONE) {
                $item->time = json_decode($item->time);
            }
            if(is_string($item->rating) && is_object(json_decode($item->rating)) && json_last_error() == JSON_ERROR_NONE) {
                $item->rating = json_decode($item->rating);
            }
            $item->difficult = $this->difficults[$item->difficult];
            $item->target = $this->targets[$item->target];
            $item->body_type = $this->body_types[$item->body_type];
            return $item;
        });

        return $result;

    }
}