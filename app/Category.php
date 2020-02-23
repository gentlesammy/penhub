<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //






    //relationship with series
    public function series(){
        return $this->hasMany(Series::class);
    }

    public static function getCategoryname($id){
        $cat = Category::findOrFail($id);
        return $cat->title;
    }
    public function categoryName(){
        return ($this->title);
    }



}//end of the clas
