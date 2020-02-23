<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category;
use \App\Series;
class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminOnly:role');
    }
    //fetch all Categories
    public function index(){
        $categories = Category::where('active', 1)->orderBy('id', 'desc')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(){

        $data = request()->validate([
            'title'              =>         'required|unique:categories,title|min:3|max:50',
            'description'       =>          'required|min:10|max:100'
        ]);
        $category = new Category();
        $category->title = request('title');
        $category->description = request('description');
        $category->save();
        return redirect(Route('adCatIndex'))
        ->with('flash_message', 'Category Created')->with('flash_type', 'alert-success');

    }//end of store function

    public function view($id){
        $catseries =  Category::findOrFail($id)->series;
        $category = Category::findOrFail($id);
        return view('admin.categories.view', compact('category'))->with('catseries', $catseries);


    }

    public function edit($id){
        $category = Category::findOrFail($id);
        return view('/admin/categories/edit', compact('category'));
    }

    public function update($id){
        $data = request()->validate([
            'title'              =>         'required|min:3|max:50|unique:categories,title,'. $id,
            'description'       =>          'required|min:10|max:100'
        ]);
        $category = Category::findOrFail($id);
        $category->title = request('title');
        $category->description = request('description');
        $category->update();
        return redirect(Route('adCatIndex'))
        ->with('flash_message', 'Category Updated')->with('flash_type', 'alert-success');

    }

    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect(Route('adCatIndex'))
        ->with('flash_message', 'Category Deleted')->with('flash_type', 'alert-success');
    }


}
