
@extends('layouts.blog')
@section('title', 'PenHub: Latest Episode ')
@section('description')
<meta name="description" content="Penhub: All the latest episodes of your award winning series can be found here.">
@endsection


@section('content')
    <section class="blog-hero">
        <div class="container">
         <h1 class="text-white">Latest Episodes</h1>
         <p>Latest published Episodes</p>
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0">
              <li class="breadcrumb-item font-weight-semebold"><a class="text-white" href="/">Home</a></li>
              <li class="breadcrumb-item font-weight-semebold active text-primary" aria-current="page">Episodes</li>
            </ol>
          </nav>
        </div>
    </section>

    <section class="episodehome">
        <div class="container">

            <div class="boxcontainer">
                <div class="main">
                    @if ($episodes->count()>0)
                        @foreach ($episodes as $epi)
                        <!--each episode detail -->
                            <div class="box">
                                <div class="img-container">
                                    <img src="img/episodes/{{$epi->feature}}" alt="{{$epi->title}}" class="img-fluid">
                                </div>
                                <div class="detailbox">
                                    <h5>{{$epi->title}}</h5>
                                    <p class="published">Published: {{$epi->created_at->format('d M, Y')}}</p>
                                    <p class="series">Series: <a href="{{Route('blogseriesdetail', ['id'=>$epi->series->id, 'title'=>str_slug($epi->series->title)] )}}">{{$epi->series->title}}</a></p>
                                    <p class="summary">{{str_limit($epi->body, 100)}}</p>
                                    <a href="{{Route('blogEpisodedetail', $epi->slug)}}" class="btn btn-link">Read Episode</a>

                                </div>
                            </div>



                        @endforeach
                    @else
                        <p>
                            No published Episode is available currently
                        </p>
                    @endif
                </div>
                <div class="sidebar">
                    <div class="boxone">
                        <h5>Active Series</h5>
                        @foreach ($series as $ser)
                        <p style="display:flex; flex-direction:row; justify-content:space-between; align-items:center"><a href="{{Route('blogseriesdetail', ['id'=>$ser->series_id, 'title'=>str_slug(App\Series::getSeriesname($ser->series_id))] )}}" style="flex:1">{{App\Series::getSeriesname($ser->series_id)}}</a> &nbsp; <span class="badge badge-primary badge-pill" >{{$ser->series_count}}</span></p>
                        @endforeach
                    </div>

                    <div class="boxtwo">
                        <h5>Categories</h5>
                        @foreach ($categories as $cat)
                        <p style="display:flex; flex-direction:row; justify-content:space-between; align-items:center"><a href="#" style="flex:1">{{App\Category::getCategoryname($cat->category_id)}}</a> &nbsp; <span class="badge badge-primary badge-pill" >{{$cat->category_count}}</span></p>

                        @endforeach

                    </div>
                </div>
                <div class="paginatelinks">
                    {{$episodes->links()}}
                </div>

            </div>

        </div>
    </section>


@endsection

@section('script')
    <script>
    </script>
@endsection
