

@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h2> Series Detail: <small>{{$series->title}}</small></h2>
                    <p class="lead">CATEGORY: <small>{{$series->Category->title}} </small></p>
                    <p class=""><small>{{$series->created_at->diffForHumans()}} </small></p>

                </div>

                <div class="card-body">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-6">
                            <p class="lead">SUMMARY</p>
                            <p class="text-justify">{{$series->summary}}</p>
                            <p class="lead">AUTHOR: <small>{{$series->User->name}} </small></p>
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
        </div>
    </div>
</div>
@endsection
