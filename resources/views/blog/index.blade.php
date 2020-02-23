@extends('layouts.blog')
@section('title', 'PenHub Homepage')






@section('content')
    <!-- top welcome section-->
    <section class="topsingle">
        <div class="imagesection"> </div>
        <div class="textsection">
            <div class="rowone">
                <p>You are specially Welcome here. We serve it hot, </p>
                <h1>FICTION & NON-FICTION</h1>
                <p>Whatever your appetite is, be it juicy stories or series, short readings or tutorials, simply go to the section and you will have your fill,
                    Myself and guest writers are all at your service.
                </p>
                <button class="btnone">View Categories</button>

            </div>

            <div class="rowtwo">

            </div>

            <div class="rowthree"></div>
        </div>

    </section>
    <!--Major homepage section begins-->


    <section class="majorhome">
        <div class="container">
            <div class="col-2-container">
                <div class="column-8">
                    <!-- series list -->
                    <h2 class="text-center p-bottom mb-5">LATEST SERIES</h2>
                    @foreach ($series as $se)
                    <div class="ss-box">
                        <div class="img-box" style="max-height:300px; overflow:hidden">
                         <img src="./img/series/{{$se->feature}}" alt="odunlade sam blog">
                        </div>
                        <div class="textbox">
                        <a href="http://" class="btn-sudo">{{$se->Category->title}}</a> &nbsp; Created {{$se->created_at}}
                            <h2>{{$se->title}}</h2>
                            <p>
                                {{$se->summary}}

                                <a href="/series/{{$se->id}}-{{str_slug($se->title)}}" class="btnone">Read Series</a>
                            </p>
                            <p class="p-left p-right p-top p-bottom">
                                Warning: <small> <strong>{{$se->Rating->title}}</strong> &nbsp; {{$se->Rating->description}}</small>
                            </p>
                        </div>
                    </div>
                    @endforeach



                    <!--double story box-->
                    <h2 class="text-center p-bottom mt-5">Latest Episodes</h2>
                    <div class="ds-box epibox">
                        @foreach ($episodes as $epi)
                        <div class="box ds-box1" style="flex:1;">
                            <div class="img-box" style="height:300px; Overflow:hidden padding:10px;">
                                <img src="./img/episodes/{{$epi->feature}}" alt="odunlade sam blog" class="img img-fluid">
                            </div>
                            <div class="textbox">
                                <a href="http://" class="btn-sudo">{{$epi->Series->Category->title}}</a> &nbsp; Published: {{$epi->created_at}}
                            <h2>{{$epi->title}}</h2>
                                <p>
                                    {{str_limit($epi->body, 220)}}
                                    <a href="{{Route('blogEpisodedetail', ['slug'=> $epi->slug])}}" class="btnone">Read Episode</a>
                                </p>
                            </div>

                        </div>
                        @endforeach
                    </div>

                </div>
                <!--static about blogger template. each blogpost will have about its author-->
                <div class="column-4">
                    <div class="searchbox">
                        <input type="text" name="search" id="search">
                        <p>X</p>
                    </div>
                    <div class="img-box">
                        <img src="img/samodunlade.jpeg" alt="">
                    </div>
                    <h3 class="p-left p-top p-bottom">
                        SAM Odunlade,
                        <small> Editor</small>
                    </h3>
                    <p class="p-left p-right p-top p-bottom">
                        Writing has always been my hobby right from the time i finished from primary school in the late 90's.
                        I am also an avid reader with interest in thrillers and suspense filled stories.
                        If you are passionate about good write ups, be it article or stories or even tutorials, you are welcome here
                        we also love good write ups and will even pay for top-quality write ups that get the highest rating every month.
                        If you have opinion about current events, a secret experience you love to share anonymously, hit me up in my inbox
                    </p>
                    <div class="p-left p-top p-bottom p-right">
                    <!--list categories and number -->
                        <h3>Active Categories</h3>
                        @foreach ($categories as $cat)
                        <p style="display:flex; flex-direction:row; justify-content:space-between; align-items:center"><a href="#" style="flex:1">{{App\Category::getCategoryname($cat->category_id)}}</a> &nbsp; <span class="badge badge-primary badge-pill" >{{$cat->category_count}}</span></p>

                        @endforeach
                    </div>

                    <div class="p-left p-top p-bottom p-right shortepisodebox">
                        <h3>Latest Episodes</h3>
                        @foreach ($episodesall as $epi)
                            <a href="">
                                <div class="box">

                                    <img src="./img/episodes/{{$epi->feature}}" alt="odunlade sam blog" class="img img-fluid">

                                    <div class="textfield">
                                        <p class="lead text-left">{{str_limit($epi->title, 20)}}</p>
                                        <p class="text-left">
                                            {{str_limit($epi->body, 50)}}

                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="p-left p-top p-bottom p-right shortepisodebox">
                        <h3>Latest Profiles</h3>
                        @foreach ($profiles as $pro)

                                <div class="box">

                                    <img src="img/profile/{{$pro->image}}" alt="odunlade sam blog writers" class="img img-fluid">

                                    <div class="textfield">
                                        <p class="lead text-left">{{str_limit($pro->username, 20)}}</p>
                                        <p class="text-left">
                                            {{str_limit($pro->description, 100)}}

                                        </p>
                                    </div>
                                </div>

                        @endforeach
                    </div>


                </div>
            </div>

        </div>


    </section>







@endsection
