<?php
/**
 * Created by PhpStorm.
 * User: matsk
 * Date: 25.04.2018
 * Time: 20:22
 */

namespace App\Repositories;

use App\Comment;


class CommentsRepository extends Repository
{
    public function __construct(Comment $comment)
    {
        $this->model = $comment;
    }
}