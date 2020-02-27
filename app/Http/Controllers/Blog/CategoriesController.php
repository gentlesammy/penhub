<?php

namespace App\Http\Controllers\Blog;
use App\Category;
use App\Series;
use App\Episode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        return view('blog.categories.index');
    }

    public function show($category){
        $cat = Category::findOrFail($category);
        $series= $cat->series->where('active', 1);
        return view('blog.categories.detail', compact('cat'))->with('series', $series);

    }




}
