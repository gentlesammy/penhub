
@extends('layouts.blog')
@section('title', 'PenHub')



@section('content')
    <section class="blog-hero">
        <div class="container">
         <h1 class="text-white">{{$episode->series->title}}</h1>
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 my-2">
              <li class="breadcrumb-item font-weight-semebold"><a class="text-white" href="/">Home</a></li>
              <li class="breadcrumb-item font-weight-semebold"><a class="text-white" href="/series">Series</a></li>
              <li class="breadcrumb-item font-weight-semebold active text-primary" aria-current="page">{{$episode->title}}</li>
            </ol>
          </nav>
        </div>
    </section>


    <section class="epidetail">
        <div class="container">
            <div class="episodebox">

                    <div class="episode">
                        <div class="img-box">
                             <img src="/img/episodes/{{$episode->feature}}" alt="$episode->title" class="img-responsive">
                        </div>
                        <p class="my-2">By <strong>{{$episode->series->user->name}}</strong> / On {{$episode->created_at->format('d M, Y')}}</p>
                        <h2>{{$episode->title}}</h2>

                        <p class="story">
                            {{$episode->body}}
                        </p>















                    </div>
                    <!--This div includes the author and other sidebar features -->
                    <div class="author">
                        <!--if author is not anon -->
                        @if ($episode->series->user->profile->anonymous != 1)
                            <img src="/img/profile/{{$episode->series->user->profile->image}}" alt="{{$episode->series->user->profile->username}}" class="img img-fluid p-2">
                            <h6 class="text-center">{{$episode->series->user->profile->username}}</h6>
                            @if($episode->series->user->profile->showsocial == 1)
                            <ul class="social-links list unstyle">
                                <li><a href="{{$episode->series->user->profile->facebook}}" target="_new"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="{{$episode->series->user->profile->twitter}}" target="_new"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            </ul>
                            <p class="text-justify">
                                {{$episode->series->user->profile->description}}
                            </p>
                            @endif

                        @else
                            <!--if author is  anon -->
                            <img src="/img/defaultprofile.png" alt="penhub default profile" class="img img-fluid p-2">
                            <h6 class="text-center">Anonymous</h6>
                            <p class="text-justify">
                                The author of this article has choosen the anonymous option, this means their
                                picture, social media handle and phone number will not be displayed. You can however
                                send them message through our platform messanger.
                            </p>
                        @endif
                            <h5>Other Episodes</h5>
                        @foreach($relatedepisode as $reep)
                                <a href="{{$reep->slug}}">{{$reep->title}}</a>
                                <br>
                        @endforeach
                    </div>
                    <div class="commentbox">
                        Latest Comments

                    </div>
                    <div class="commentform">
                        comment form
                    </div>


            </div>
        </div>
    </section>


@endsection

@section('script')

@endsection

<!--
     <div class="linksepi">
                    {{$relatedepisode->links()}}
                </div>
-->
