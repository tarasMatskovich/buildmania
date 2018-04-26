<?php
/**
 * Created by PhpStorm.
 * User: matsk
 * Date: 27.04.2018
 * Time: 00:33
 */

namespace App\Repositories;

use App\Slider;


class SlidersRepository extends Repository
{
    public function __construct(Slider $slider)
    {
        $this->model = $slider;
    }
}