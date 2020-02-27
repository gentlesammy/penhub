
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Edit Series</h2>


                </div>

                <div class="card-body">
                   <h4 class="text-center text-primary">Edit Series Details</h4>
                <form action="/admin/series/edit/{{$series->id}}-{{$series->title}}" method="post" enctype="multipart/form-data" class="p-5 m-5">
                    @csrf
                    @method('PATCH')
                      <div class="form-group px-5">
                        <label for="exampleFormControlInput1">Series Title</label>
                        <input type="text" class="form-control"  name="title" value="{{$series->title}}">
                        <p class="text-danger">
                            @error('title')
                                {{$message}}
                            @enderror
                        </p>
                      </div>

                      <div class="form-group px-5">
                        <label for="exampleFormControlInput1">Series Category</label>
                        <select class="custom-select" id="validationTooltip04" name="category_id">
                            <option value="{{$series->category_id}}">{{$series->Category->title}}</option>
                            @foreach ($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->title}}</option>
                            @endforeach
                        </select>

                        <p class="text-danger">
                            @error('category_id')
                                {{$message}}
                            @enderror
                        </p>
                      </div>

                      <div class="form-group px-5">
                        <label for="exampleFormControlInput1">Series Rating</label>
                        <select class="custom-select" id="validationTooltip04" name="rating_id">
                            <option value="{{$series->rating_id}}">{{$series->Rating->title}}</option>
                            @foreach ($ratings as $rat)
                                <option value="{{$rat->id}}">{{$rat->title}}</option>
                            @endforeach
                        </select>

                        <p class="text-danger">
                            @error('rating_id')
                                {{$message}}
                            @enderror
                        </p>
                      </div>

                      <div class="form-group px-5">
                        <label for="exampleFormControlTextarea1">Series Summary</label>
                        <textarea class="form-control"  rows="5" name="summary">{{$series->summary}}</textarea>
                        <p class="text-danger">
                            @error('summary')
                                {{$message}}
                            @enderror
                        </p>
                      </div>



                      <div class="form-group px-5">
                        <button type="submit" class="btn btn-primary">Create Series</button>
                      </div>


                   </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
