@extends('layouts.blog')
@section('title', 'PenHub: Series Home')



@section('content')
    <section class="blog-hero">
        <div class="container">
         <h1 class="text-white">{{$cat->title}}</h1>
         <p>Latest Series</p>
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0">
              <li class="breadcrumb-item font-weight-semebold"><a class="text-white" href="/">Home</a></li>
              <li class="breadcrumb-item font-weight-semebold active text-primary" aria-current="page">{{$cat->title}}</li>
            </ol>
          </nav>
        </div>
    </section>

    <section class="">
        <div class="container">
            <div class="blogscontainer">
                @foreach ($series as $ser)
                    <div class="box">
                        <div class="imgpart">
                            <img src="/img/series/{{$ser->feature}}" alt="{{$ser->title}}" class="card-img-top rounded-top-0">
                        </div>
                        <div class="textpart">
                            <h4>{{$ser->title}}</h4>
                            |&nbsp; <a href="{{Route('blogseriesdetail', ['id'=>$ser->id, 'title'=>str_slug($ser->title)] )}}">{{$ser->episodes->count()}} Episodes</a>
                            <p>{{str_limit($ser->summary, 200)}}</p>
                            <p>Author: <a href="#">{{$ser->user->name}}</a></p>
                            <p class="text-danger" title="{{$ser->rating->description}}">
                                Rating: {{$ser->rating->title}}
                            </p>
                            <a href="{{Route('blogseriesdetail', ['id'=>$ser->id, 'title'=>str_slug($ser->title)] )}}">Read Series</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


    </section>

@endsection

@section('script')
<script>


</script>
@endsection
