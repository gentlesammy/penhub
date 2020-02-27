

@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h2> Category Detail</h2>


                </div>

                <div class="card-body">
                <h4 class="text-center text-primary">{{$category->title}}</h4>
                <p class="text-md-center text-black-50">{{$category->description}}</p>

                <div class="row">

                    @foreach ($catseries as $item)
                    <div class="col-md-4">
                            <h2>{{$item->title}}</h2>
                           <p class="text-justify"> {{$item->summary}} </p>
                            <img src="/img/series/{{$item->feature}}" alt="{{$item->title}}" class="img img-fluid">
                    </div>
                @endforeach

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
