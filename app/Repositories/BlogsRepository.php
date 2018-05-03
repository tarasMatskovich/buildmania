<?php
/**
 * Created by PhpStorm.
 * User: matsk
 * Date: 26.04.2018
 * Time: 20:25
 */

namespace App\Repositories;

use App\Blog;
use App\BlogCategory;


class BlogsRepository extends Repository
{
    public function __construct(Blog $blog)
    {
        $this->model = $blog;
    }

    public function getSearchedBlogs($keyword) {
        $blogs =  $this->model->select('*')->where('title','like',"%$keyword%")->paginate(3);

        foreach ($blogs as $blog) {
            $cat_id = $blog->blog_category_id;
            $model = BlogCategory::find($cat_id);
            $blog->category = $model;
            $blog->img = json_decode($blog->img);
        }



        return $blogs;
    }
}