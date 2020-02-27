
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h2> Rating Detail</h2>


                </div>

                <div class="card-body py-5">
                <h4 class="text-center text-primary">{{$rating->title}}</h4>
                <p class="text-md-center text-black-50">{{$rating->description}}</p>

            </div>
        </div>
    </div>
</div>
@endsection
