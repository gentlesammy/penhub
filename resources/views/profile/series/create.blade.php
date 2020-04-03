
@extends('layouts.profile')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">CREATE SERIES</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/profile">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content content2">
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 bg-white p-2">
                            <h4 class="text-center">Enter Series Detail and start writing Episode</h4>
                            <form action="{{Route('profileseriesstore')}}" method="post" enctype="multipart/form-data" class="p-2">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Series Title</label>
                                    <input type="text" class="form-control"  name="title" value="{{old('title')}}">
                                    <p class="text-danger">
                                        @error('title')
                                            {{$message}}
                                        @enderror
                                    </p>
                                </div>

                                <div class="form-group">
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

                                <div class="form-group">
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

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Series Summary</label>

                                    <textarea class="form-control" id="summary-ckeditor"  rows="5" name="summary">{{old('summary')}}</textarea>
                                    <p class="text-danger">
                                        @error('summary')
                                            {{$message}}
                                        @enderror
                                    </p>
                                </div>

                                <div class="form-group">
                                    <label for="Feature">Feature Image. (Image Cannot be changed later!!)</label>
                                    <input type="file" class="form-control" name="feature">
                                    <p class="text-danger">

                                        @error('feature')
                                            {{$message}}
                                        @enderror
                                    </p>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Create Series</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

  @endsection
