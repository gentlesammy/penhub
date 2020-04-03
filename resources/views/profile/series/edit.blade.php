
@extends('layouts.profile')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">EDIT SERIES</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/profile">Home</a></li>
                    <li class="breadcrumb-item active">Series</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content bg-default" style="background:#fafaff">
            <div class="container py-5">
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8  bg-white">
                    <h4 class="text-center text-primary bg-dark p-2">Edit Series Details</h4>
                    <form action="{{Route('profileseriesupdate', ['series'=>$series->id])}}" method="post" enctype="multipart/form-data" class="p-2">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Series Title</label>
                                <input type="text" class="form-control"  name="title" value="{{$series->title}}">
                                <p class="text-danger">
                                    @error('title')
                                        {{$message}}
                                    @enderror
                                </p>
                            </div>

                            <div class="form-group">
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

                            <div class="form-group">
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

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Series Summary</label>
                                <textarea class="form-control"  rows="5" name="summary">{{$series->summary}}</textarea>
                                <p class="text-danger">
                                    @error('summary')
                                        {{$message}}
                                    @enderror
                                </p>
                            </div>



                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Series</button>
                            </div>
                    </form>
                  </div>

                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>

  @endsection
