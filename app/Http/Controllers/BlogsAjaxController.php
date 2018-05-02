<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

use App\Blog;
use App\BlogCategory;

use Log;

use App\Repositories\BlogsRepository;

class BlogsAjaxController extends SiteController
{
    //
    public function __construct(BlogsRepository $b_rep)
    {
        $this->blogs_rep = $b_rep;
    }

    public function take(Request $request) {
       // $data['offset'] = $request->input('offset');
        $data['offset'] = $request->offset;
        $sort_type_array = false;
        //$sort_type = $request->input('sort');
        $sort_type = $request->sort;
        // список категорий записей блога
        $id_array = [];
        $id_array = $request->id_array;
        Log::info($request->all());

        if($sort_type) {
            switch($sort_type) {
                case 'date':
                    $sort_type_array = ['created_at','desc'];
                    if(empty($id_array))
                        $blogs = $this->blogs_rep->get('*',$data['offset'],2, false, $sort_type_array);
                    else {
                        $blogs = Blog::select('*')->skip($data['offset'])->take(2)->whereIn('blog_category_id',$id_array)->orderBy($sort_type_array[0],$sort_type_array[1])->get();
                        foreach($blogs as $blog) {
                            $blog->img = json_decode($blog->img);
                        }
                    }

                    break;
                case 'rating':
                    $sort_type_array = ['created_at','asc'];
                    if(empty($id_array))
                        $blogs = $this->blogs_rep->get('*',$data['offset'],2, false, $sort_type_array);
                    else {
                        $blogs = Blog::select('*')->skip($data['offset'])->take(2)->whereIn('blog_category_id',$id_array)->orderBy($sort_type_array[0],$sort_type_array[1])->get();
                        foreach($blogs as $blog) {
                            $blog->img = json_decode($blog->img);
                        }
                    }
                    break;
                case 'popularity':
                    $sort_type_array = ['views','desc'];
                    if(empty($id_array))
                        $blogs = $this->blogs_rep->get('*',$data['offset'],2, false, $sort_type_array);
                    else {
                        $blogs = Blog::select('*')->skip($data['offset'])->take(2)->whereIn('blog_category_id',$id_array)->orderBy($sort_type_array[0],$sort_type_array[1])->get();
                        foreach($blogs as $blog) {
                            $blog->img = json_decode($blog->img);
                        }
                    }
                    break;
                case 'users':

                    $sort_type_array = ['user_id','desc'];
                    // сортировка по полю name в связаной таблице user

                    if(empty($id_array)) {
                        $blogs = Blog::with('user')
                            ->join('users', 'user_id', '=', 'users.id')
                            ->orderBy('users.name', 'ASC')
                            ->skip($data['offset'])
                            ->take(2)
                            ->get();
                    } else {
                        $blogs = Blog::with('user')
                            ->join('users', 'user_id', '=', 'users.id')
                            ->orderBy('users.name', 'ASC')
                            ->skip($data['offset'])
                            ->take(2)
                            ->whereIn('blog_category_id',$id_array)
                            ->get();
                    }

                    foreach($blogs as $blog) {
                        $blog->img = json_decode($blog->img);
                    }
                    //$blogs = $this->blogs_rep->get('*',$data['offset'],2, false, $sort_type_array);
                    break;
            }

            $blogs_content = "";
            if($blogs) {
                if(!$blogs->isEmpty()) {
                    foreach($blogs as $blog) {
                        $cat_id = $blog->blog_category_id;
                        $model = BlogCategory::find($cat_id);
                        $blog->category = $model;
                    }
                    $blogs_content = view(env('THEME').'.only_blog_content')->with('blogs',$blogs)->render();
                }
            }


            $data['blogs_content'] = $blogs_content;

        } else {
            $blogs = $this->blogs_rep->get('*',$data['offset'],2, false, ['created_at','desc']);
            $blogs_content = "";
            if($blogs) {
                if(!$blogs->isEmpty()) {
                    foreach($blogs as $blog) {
                        $cat_id = $blog->blog_category_id;
                        $model = BlogCategory::find($cat_id);
                        $blog->category = $model;
                    }
                    $blogs_content = view(env('THEME').'.only_blog_content')->with('blogs',$blogs)->render();
                }
            }


            $data['blogs_content'] = $blogs_content;
        }






        return Response::json($data);
    }

    public function changeSort(Request $request) {
        $data = array();
        // тип сортировки записей в блоге
        $sort_type = $request->type;
        $sort_type_array = false;
        // меняя тип сортировки, мы должны учитывать выбраные категории
        $id_array = $request->id_array;


        switch($sort_type) {
            case 'date':
                $sort_type_array = ['created_at','desc'];
                if(empty($id_array)) {
                    $blogs = $this->blogs_rep->get('*',0,2, false, $sort_type_array);
                } else {
                    $blogs = Blog::select('*')->take(2)->whereIn('blog_category_id',$id_array)->orderBy($sort_type_array[0],$sort_type_array[1])->get();
                    foreach($blogs as $blog) {
                        $blog->img = json_decode($blog->img);
                    }
                }

                break;
            case 'rating':
                $sort_type_array = ['created_at','asc'];
                if(empty($id_array)) {
                    $blogs = $this->blogs_rep->get('*',0,2, false, $sort_type_array);
                } else {
                    $blogs = Blog::select('*')->take(2)->whereIn('blog_category_id',$id_array)->orderBy($sort_type_array[0],$sort_type_array[1])->get();
                    foreach($blogs as $blog) {
                        $blog->img = json_decode($blog->img);
                    }
                }

                break;
            case 'popularity':
                $sort_type_array = ['views','desc'];
                if(empty($id_array)) {
                    $blogs = $this->blogs_rep->get('*',0,2, false, $sort_type_array);
                } else {
                    $blogs = Blog::select('*')->take(2)->whereIn('blog_category_id',$id_array)->orderBy($sort_type_array[0],$sort_type_array[1])->get();
                    foreach($blogs as $blog) {
                        $blog->img = json_decode($blog->img);
                    }
                }
                break;
            case 'users':
                $sort_type_array = ['user_id','desc'];
                // сортировка по полю name в связаной таблице user
                if(empty($id_array)) {
                    $blogs = Blog::with('user')
                        ->join('users', 'user_id', '=', 'users.id')
                        ->orderBy('users.name', 'ASC')
                        ->skip(0)
                        ->take(2)
                        ->get();
                } else {
                    $blogs = Blog::with('user')
                        ->join('users', 'user_id', '=', 'users.id')
                        ->orderBy('users.name', 'ASC')
                        ->skip(0)
                        ->take(2)
                        ->whereIn('blog_category_id',$id_array)
                        ->get();
                }


                foreach($blogs as $blog) {
                    $blog->img = json_decode($blog->img);
                }

                //$blogs = $this->blogs_rep->get('*',0,2, false, $sort_type_array);
                break;
        }

        foreach($blogs as $blog) {
            $cat_id = $blog->blog_category_id;
            $model = BlogCategory::find($cat_id);
            $blog->category = $model;
        }




        $content = view(env('THEME').'.only_blog_content')->with('blogs',$blogs)->render();

        $data['blogs_content'] = $content;

        return Response::json($data);
    }

    public function changeCategory(Request $request) {
        $data = array();
        // тип сортировки записей в блоге
        $sort_type = $request->type;
        $alias_array = array();
        $id_array = $request->id_array;

        $sort_type_array = false;
        switch($sort_type) {
            case 'date':
                $sort_type_array = ['created_at','desc'];
                if(empty($id_array)) {
                    $blogs = $this->blogs_rep->get('*',0,2, false, $sort_type_array);
                } else {
                    $blogs = Blog::select('*')->take(2)->whereIn('blog_category_id',$id_array)->orderBy($sort_type_array[0],$sort_type_array[1])->get();
                    foreach($blogs as $blog) {
                        $blog->img = json_decode($blog->img);
                    }
                }


                break;
            case 'rating':
                $sort_type_array = ['created_at','asc'];
                if(empty($id_array)) {
                    $blogs = $this->blogs_rep->get('*',0,2, false, $sort_type_array);
                } else {
                    $blogs = Blog::select('*')->take(2)->whereIn('blog_category_id',$id_array)->orderBy($sort_type_array[0],$sort_type_array[1])->get();
                    foreach($blogs as $blog) {
                        $blog->img = json_decode($blog->img);
                    }
                }
                break;
            case 'popularity':
                $sort_type_array = ['views','desc'];
                if(empty($id_array)) {
                    $blogs = $this->blogs_rep->get('*',0,2, false, $sort_type_array);
                } else {
                    $blogs = Blog::select('*')->take(2)->whereIn('blog_category_id',$id_array)->orderBy($sort_type_array[0],$sort_type_array[1])->get();
                    foreach($blogs as $blog) {
                        $blog->img = json_decode($blog->img);
                    }
                }
                break;
            case 'users':
                $sort_type_array = ['user_id','desc'];
                // сортировка по полю name в связаной таблице user

                if(empty($id_array)) {
                    $blogs = Blog::with('user')
                        ->join('users', 'user_id', '=', 'users.id')
                        ->orderBy('users.name', 'ASC')
                        ->skip(0)
                        ->take(2)
                        ->get();

                    foreach($blogs as $blog) {
                        $blog->img = json_decode($blog->img);
                    }
                } else {
                    $blogs = Blog::with('user')
                        ->join('users', 'user_id', '=', 'users.id')
                        ->orderBy('users.name', 'ASC')
                        ->skip(0)
                        ->take(2)
                        ->whereIn('blog_category_id',$id_array)
                        ->get();

                    foreach($blogs as $blog) {
                        $blog->img = json_decode($blog->img);
                    }
                }



                //$blogs = $this->blogs_rep->get('*',0,2, false, $sort_type_array);
                break;
        }

        foreach($blogs as $blog) {
            $cat_id = $blog->blog_category_id;
            $model = BlogCategory::find($cat_id);
            $blog->category = $model;
        }




        $content = view(env('THEME').'.only_blog_content')->with('blogs',$blogs)->render();

        $data['blogs_content'] = $content;
        return Response::json($data);
    }
}
