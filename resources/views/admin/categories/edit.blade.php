@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Edit Category</h2>


                </div>

                <div class="card-body py-5 my-5">
                   <h4 class="text-center text-primary py-2">Edit Category: <strong>{{$category->title}}</strong></h4>
                <form action="/admin/categories/edit/{{$category->id}}-{{$category->title}}" method="post" class="px-5 mx-5">
                   @method('PATCH')
                    @csrf
                     <div class="form-group px-5">
                        <label for="exampleFormControlInput1">Category Title</label>
                     <input type="text" class="form-control"  name="title" value="{{$category->title}}">
                        <p class="text-danger">
                            @error('title')
                                {{$message}}
                            @enderror
                        </p>
                      </div>

                      <div class="form-group px-5">
                        <label for="exampleFormControlTextarea1">Category Description</label>
                        <textarea class="form-control"  rows="3" name="description">{{$category->description}}</textarea>
                        <p class="text-danger">
                            @error('description')
                                {{$message}}
                            @enderror
                        </p>
                      </div>

                      <div class="form-group px-5">
                        <button type="submit" class="btn btn-primary">Update Category</button>
                      </div>


                   </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
