@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Edit Episode</h2>


                </div>

                <div class="card-body">
                   @if ($episode->Series->User->id === auth()->user()->id)
                   <form action="/admin/episodes/edit/{{$episode->id}}-{{str_slug($episode->title)}}" method="post" enctype="multipart/form-data" class="p-5 m-5">
                    @csrf
                    @method('PATCH')
                      <div class="form-group px-5">
                        <label for="exampleFormControlInput1">Episode Title</label>
                        <input type="text" class="form-control"  name="title" value="{{$episode->title}}">
                        <p class="text-danger">
                            @error('title')
                                {{$message}}
                            @enderror
                        </p>
                      </div>

                      <div class="form-group px-5">
                        <label for="exampleFormControlInput1">Episode for Series</label>

                        <select class="custom-select" id="validationTooltip04" name="series_id" required>
                            <option value="{{$episode->series_id}}">{{$episode->Series->title}}</option>
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
                        <textarea class="form-control"  rows="10" name="body">{{$episode->body}}</textarea>
                        <p class="text-danger">
                            @error('body')
                                {{$message}}
                            @enderror
                        </p>
                      </div>

                      <div class="form-group px-5">
                        <label for="Feature">Episode Cover Image</label>
                        <br>
                      <img src="/img/episodes/{{$episode->feature}}" alt="{{$episode->title}}" class="img img-fluid" style="max-width:100px;">
                        <input type="file" class="form-control" name="feature">
                        <p class="text-danger">
                            @error('feature')
                                {{$message}}
                            @enderror
                        </p>
                      </div>

                      <div class="form-group px-5">
                        <button type="submit" class="btn btn-primary">Update Episode</button>
                      </div>


                   </form>

                </div>
                   @endif

            </div>
        </div>
    </div>
</div>
@endsection
