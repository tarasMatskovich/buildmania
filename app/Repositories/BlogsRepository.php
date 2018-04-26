<?php
/**
 * Created by PhpStorm.
 * User: matsk
 * Date: 26.04.2018
 * Time: 20:25
 */

namespace App\Repositories;

use App\Blog;


class BlogsRepository extends Repository
{
    public function __construct(Blog $blog)
    {
        $this->model = $blog;
    }
}