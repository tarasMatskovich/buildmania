<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    public function hasChildren($itemId) {
        $items = Menu::where('parent_id',$itemId)->get();
        if($items->isEmpty()) {
            return false;
        } else {
            return true;
        }
    }
}
