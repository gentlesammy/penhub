@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Create Series</h2>


                </div>

                <div class="card-body">
                   <h4 class="text-center text-primary">Enter New Series Details</h4>
                <form action="{{Route('adStoreSeries')}}" method="post" enctype="multipart/form-data" class="p-5 m-5">
                    @csrf
                      <div class="form-group px-5">
                        <label for="exampleFormControlInput1">Series Title</label>
                        <input type="text" class="form-control"  name="title" value="{{old('title')}}">
                        <p class="text-danger">
                            @error('title')
                                {{$message}}
                            @enderror
                        </p>
                      </div>

                      <div class="form-group px-5">
                        <label for="exampleFormControlInput1">Series Category</label>

                        <select class="custom-select" id="validationTooltip04" name="category_id" required>
                            @foreach ($categories ?? '' as $cat)
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

                        <select class="custom-select" id="validationTooltip04" name="rating_id" required>
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
                        <textarea class="form-control"  rows="5" name="summary">{{old('summary')}}</textarea>
                        <p class="text-danger">
                            @error('summary')
                                {{$message}}
                            @enderror
                        </p>
                      </div>

                      <div class="form-group px-5">
                        <label for="Feature">Feature Image</label>
                        <input type="file" class="form-control" name="feature">
                        <p class="text-danger">

                            @error('feature')
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
