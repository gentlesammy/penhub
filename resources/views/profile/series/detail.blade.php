
@extends('layouts.profile')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">SERIES Detail</h1>
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
        <section class="content content2">
            <div class="container py-5">
                <div class="row">
                    @can('view', $series)
                    <div class="card">
                        <div class="card-header text-center">
                            <h2>  <small>{{$series->title}}</small></h2>
                            <p class="lead">CATEGORY: <small>{{$series->Category->title}} </small></p>
                            <p class=""><small>{{$series->created_at->diffForHumans()}} </small></p>

                        </div>

                        <div class="card-body">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md-6">
                                    <p class="lead">SUMMARY</p>
                                    <p class="text-justify">{!!$series->summary!!}</p>
                                    <p class="lead">STATUS:
                                    <small>
                                        @if($series->active === 0)
                                            Inactive
                                        @else
                                            Active
                                        @endif

                                    </small></p>
                                    <p class="lead">Rating: <small>{{$series->Rating->title}} </small></p>


                                </div>
                                <div class="col-md-6">
                                    <img src="/img/series/{{$series->feature}}" alt="{{$series->title}}" class="img img-fluid justify-content-center align-items-center">
                                </div>
                            </div>


                        <div class="row">



                        </div>

                    </div>
                    @else

                    <h2 class="text-white p-5">NOTHING TO SHOW, IDIOT</h2>

                    @endcan

                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>

  @endsection
