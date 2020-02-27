@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Create New Episode</h2>


                </div>

                <div class="card-body">
                   <h4 class="text-center text-primary">Enter New Episode Details</h4>
                   <form action="{{Route('adStoreEpisodes')}}" method="post" enctype="multipart/form-data" class="p-5 m-5">
                    @csrf
                      <div class="form-group px-5">
                        <label for="exampleFormControlInput1">Episode Title</label>
                        <input type="text" class="form-control"  name="title" value="{{old('title')}}">
                        <p class="text-danger">
                            @error('title')
                                {{$message}}
                            @enderror
                        </p>
                      </div>

                      <div class="form-group px-5">
                        <label for="exampleFormControlInput1">Episode for Series</label>

                        <select class="custom-select" id="validationTooltip04" name="series_id" required>
                            @foreach ($series as $seri)
                                <option value="{{$seri->id}}">{{$seri->title}}</option>

                            @endforeach
                        </select>

                        <p class="text-danger">
                            @error('series_id')
                                {{$message}}
                            @enderror
                        </p>
                      </div>

                      <div class="form-group px-5">
                        <label for="exampleFormControlTextarea1">Episode Body</label>
                        <textarea class="form-control"  rows="5" name="body">{{old('body')}}</textarea>
                        <p class="text-danger">
                            @error('body')
                                {{$message}}
                            @enderror
                        </p>
                      </div>

                      <div class="form-group px-5">
                        <label for="Feature">Episode Cover Image</label>
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
