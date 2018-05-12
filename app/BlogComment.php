<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    //
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function blog() {
        return $this->belongsTo('App\Blog');
    }
}
