
@extends('layouts.profile')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Episode Detail</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/profile">Home</a></li>
                    <li class="breadcrumb-item active">Episode</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content content2">
            <div class="container py-5">
                <div class="card">
                    <div class="card-header text-center">
                        @if(Session::has('flash_message'))
                            <div class="alert {{Session::get('flash_type')}} mx-5 px-5 mt-3">
                                <p class="text-center">{{Session::get('flash_message')}}</p>
                            </div>
                          @endif
                        <h2> <small>{{$episode->title}}</small></h2>
                        <p class="lead">SERIES: <small>{{$episode->Series->title}} </small></p>
                        <p class=""><small>{{$episode->created_at->diffForHumans()}} </small></p>

                    </div>

                    <div class="card-body">
                        <div class="row justify-content-center align-items-start">
                            <div class="col-md-6">
                                <p class="lead">Detail</p>
                                <p class="text-justify">{!!$episode->body!!}</p>
                                <p class="lead">AUTHOR: <small>{{$episode->Series->User->name}} </small></p>
                                <p class="lead">STATUS:
                                <small>

                                    {{$episode->published()}}

                                </small></p>



                            </div>
                            <div class="col-md-6">
                                <img src="/img/episodes/{{$episode->feature}}" alt="{{$episode->slug}}" class="img img-fluid justify-content-center align-items-center">
                            <a href="{{Route('profileepisodehome')}}" class="btn btn-primary btn-block btn-lg my-5">Back</a>
                            </div>
                        </div>


                    <div class="row">



                    </div>

                    </div>
                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>

  @endsection
