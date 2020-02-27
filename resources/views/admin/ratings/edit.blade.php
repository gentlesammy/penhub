@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Edit Rating</h2>


                </div>

                <div class="card-body py-5 my-5">
                   <h4 class="text-center text-primary py-2">Edit Rating: <strong>{{$rating->title}}</strong></h4>
                <form action="/admin/ratings/edit/{{$rating->id}}-{{$rating->title}}" method="post" class="px-5 mx-5">
                   @method('PATCH')
                    @csrf
                     <div class="form-group px-5">
                        <label for="exampleFormControlInput1">Rating Title</label>
                     <input type="text" class="form-control"  name="title" value="{{$rating->title}}">
                        <p class="text-danger">
                            @error('title')
                                {{$message}}
                            @enderror
                        </p>
                      </div>

                      <div class="form-group px-5">
                        <label for="exampleFormControlTextarea1">Rating Description</label>
                        <textarea class="form-control"  rows="3" name="description">{{$rating->description}}</textarea>
                        <p class="text-danger">
                            @error('description')
                                {{$message}}
                            @enderror
                        </p>
                      </div>

                      <div class="form-group px-5">
                        <button type="submit" class="btn btn-primary">Update Rating</button>
                        <a href="{{Route('adRateIndex')}}" class="btn btn-danger">Cancel</a>
                      </div>


                   </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
