

@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h2> <small>{{$episodes->title}}</small></h2>
                    <p class="lead">SERIES: <small>{{$episodes->Series->title}} </small></p>
                    <p class=""><small>{{$episodes->created_at->diffForHumans()}} </small></p>

                </div>

                <div class="card-body">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-6">
                            <p class="lead">SUMMARY</p>
                            <p class="text-justify">{{$episodes->body}}</p>
                            <p class="lead">AUTHOR: <small>{{$episodes->Series->User->name}} </small></p>
                            <p class="lead">STATUS:
                            <small>
                                @if($episodes->published === 0)
                                    Unpublished
                                @else
                                    Published
                                @endif

                            </small></p>



                        </div>
                        <div class="col-md-6">
                            <img src="/img/episodes/{{$episodes->feature}}" alt="{{$episodes->slug}}" class="img img-fluid justify-content-center align-items-center">
                        <a href="{{Route('adEpisodesIndex')}}" class="btn btn-primary btn-block btn-lg my-5">Back</a>
                        </div>
                    </div>


                <div class="row">



                </div>

            </div>
        </div>
    </div>
</div>
@endsection
