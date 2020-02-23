<?php

namespace App\Http\Controllers\Blog;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        return view('blog.categories.index');
    }
}
