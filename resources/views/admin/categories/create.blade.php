@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Create Category</h2>


                </div>

                <div class="card-body">
                   <h4 class="text-center text-primary">Enter New Category Details</h4>
                <form action="{{Route('adStoreCat')}}" method="post" class="p-5 m-5">
                    @csrf
                     <div class="form-group px-5">
                        <label for="exampleFormControlInput1">Category Title</label>
                     <input type="text" class="form-control"  name="title" value="{{old('title')}}">
                        <p class="text-danger">
                            @error('title')
                                {{$message}}
                            @enderror
                        </p>
                      </div>

                      <div class="form-group px-5">
                        <label for="exampleFormControlTextarea1">Category Description</label>
                        <textarea class="form-control"  rows="3" name="description">{{old('description')}}</textarea>
                        <p class="text-danger">
                            @error('description')
                                {{$message}}
                            @enderror
                        </p>
                      </div>

                      <div class="form-group px-5">
                        <button type="submit" class="btn btn-primary">Create Category</button>
                      </div>


                   </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
