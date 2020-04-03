
@extends('layouts.blog')
@section('title', 'PenHub'. $id->title)



@section('content')
    <section class="blog-hero">
        <div class="container">
         <h1 class="text-white">{{$id->title}}</h1>

            @if($follows)
                <button class="btn btn-danger unfollowseries"  data-series_id="{{$id->id}}" onclick="unfollow()">UnFollow</button>
            @else
                <button class="btnone followseries"  data-series_id="{{$id->id}}" onclick="follow()">Follow</button>
            @endif



         <meta name="csrf-token" content="{{ csrf_token() }}" id="metadaddy">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 my-2">
              <li class="breadcrumb-item font-weight-semebold"><a class="text-white" href="/">Home</a></li>
              <li class="breadcrumb-item font-weight-semebold"><a class="text-white" href="/series">Series</a></li>
              <li class="breadcrumb-item font-weight-semebold active text-primary" aria-current="page">{{$id->title}}</li>
            </ol>
          </nav>
        </div>
    </section>

    <section class="seriesdetail">
        <div class="container">
            <div class="barcontainers">
                <div class="mainbar">
                    <div class="row1">
                        <div class="imagearea">
                            <img src="/img/series/{{$id->feature}}" alt="{{$id->title}}" class="card-img-top rounded-top-0">
                        </div>
                        <div class="summaryarea">
                            <h5>Summary</h5>
                            <p>
                                {!!$id->summary!!}
                            </p>
                            <p><strong>Author: </strong> {{$id->user->name}}</p>
                            <p>
                             <strong>Published: </strong>  {{$id->created_at->format('D, d M Y')}}
                            </p>
                        </div>
                    </div>
                    <h5 class="text-center my-2">EPISODES In order of Recent</h5>
                    <div class="rowb">
                        @if($episodes->count()>0)
                            @foreach ($episodes as $episode)

                                <div class="row2">
                                    <div class="imagearea">
                                        <img src="/img/episodes/{{$episode->feature}}" alt="{{$episode->title}}" class="card-img-top rounded-top-0">
                                    </div>
                                    <div class="summaryarea">
                                        <h5>{{$episode->title}}</h5>
                                        <p class="text-justify">
                                            {{str_limit($episode->body, 200)}}
                                        </p>
                                        <p>
                                        <strong>Published: </strong>  {{$episode->created_at->format('D, d M Y')}}
                                        </p>

                                        <a href="{{Route('blogEpisodedetail', $episode->slug)}}">Read Episode</a>
                                    </div>
                                 </div>

                            @endforeach
                            {{$episodes->links()}}
                        @else
                            <p class="text-center py-5 bg-white">This series does not contained published episode for now</p>
                        @endif
                    </div>
                </div>
                <div class="sidebar">
                    <div class="row1">
                        <h5 class="text-center">About Author</h5>
                        <!--if author is not anon -->
                        @if ($id->user->profile->anonymous != 1)
                            <img src="/img/profile/{{$id->user->profile->image}}" alt="{{$id->user->profile->username}}" class="img img-fluid p-2">
                            <h6 class="text-center">{{$id->user->profile->username}}</h6>
                            @if($id->user->profile->showsocial == 1)
                            <ul class="social-links list unstyle">
                                <li><a href="{{$id->user->profile->facebook}}" target="_new"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="{{$id->user->profile->twitter}}" target="_new"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            </ul>
                            <p class="text-justify">
                                {{$id->user->profile->description}}
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
                    </div>

                    <div class="row2">
                        <h5 class="text-center">Other Series By Author</h5>

                            @if ($id->user->series->count()>0)
                            <!-- author has other series -->
                                @foreach ($id->user->series as $item)
                                    <a href="{{Route('blogseriesdetail', ['id'=>$item->id, 'title'=>str_slug($item->title)])}}">{{$item->title}}</a>
                                    <p>{{str_limit($item->summary, 50)}}</p>
                                @endforeach
                            @else
                                <p class="text-justify">Non is available at the moment </p>
                            @endif





                    </div>






                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
<script>


    //follow button
     const follow =()=>{
        //Select token with getAttribute
        let token = document.querySelector("#metadaddy").getAttribute("content");
        let series = document.querySelector(".followseries").dataset.series_id;
        let followseries = confirm('DO YOU WANT TO FOLLOW SERIES? You will receive email notification whenever a new episode is uploaded via email');
        if(followseries ==true){
            sendToController(token, series)
            document.querySelector(".followseries").style.display = "none";

        }else{
            alert('You will not receive notification')
        }
    }

    //unfollow button
    const unfollow =()=>{
        //Select token with getAttribute
        let token = document.querySelector("#metadaddy").getAttribute("content");
        let series = document.querySelector(".unfollowseries").dataset.series_id;
        let followseries = confirm('DO YOU WANT TO UNFOLLOW SERIES? You will not receive email notification whenever a new episode is uploaded via email');
        if(followseries ==true){
            sendToController(token, series)
            document.querySelector(".unfollowseries").style.display = "none";
        }else{
            alert('You will not receive notification')
        }
    }


    function sendToController(token, series){
        //action when button is clicked
        fetch('/series/follow/'+ series, {
                            headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json, text-plain, */*",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-TOKEN": token
                            },
                            method: 'post',
                            credentials: "same-origin",
                            body: JSON.stringify({
                                series:series
                            })
                            })
                            .then((response) => {
                                return response.json();
                            })
                            .then((myJson) => {
                                if(myJson.message == 'Unauthenticated.'){
                                    window.location = "/login"
                                }else{

                                    location.reload();
                                }
                            })
                 .catch(function(error) {
                                    if(error.response.status == 401){
                                        window.location = "/login"
                                    }
                                });
    }






</script>
@endsection
