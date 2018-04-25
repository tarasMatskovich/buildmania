<?php
/**
 * Created by PhpStorm.
 * User: matsk
 * Date: 25.04.2018
 * Time: 20:22
 */

namespace App\Repositories;

use App\Menu;


class MenusRepository extends Repository
{
    public function __construct(Menu $menu)
    {
        $this->model = $menu;
    }
}