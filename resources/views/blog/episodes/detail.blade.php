
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
                            {!!$episode->body!!}
                        </p>
                        <p class="text-center lead">Share <span> <i class="fa fa-share" aria-hidden="true"></i>    </span></p>
                        <ul class="social-links list unstyle">
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u=https://www.penhub.com.ng/episodes/{{$episode->slug}}" target="_new"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li>
                                 <a href="https://twitter.com/intent/tweet?text={{$episode->title}}&url=https://www.penhub.com.ng/episodes/{{$episode->slug}}&"><i class="fa fa-twitter" aria-hidden="true"></i></a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </li>
                            <li class="social-link"><a href="https://www.instagram.com/psalmsam84/?hl=en" target="_new"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li class="social-link"><a href="https://wa.me/2348060913903?text=official%20message"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                        </ul>

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
                        <h5>LATEST COMMENTS ({{$comments->count()}})</h5>
                        @if ($comments->count() > 0)
                            <!--list of available comments -->
                            @foreach ($comments as $comment)
                                <div class="commentboxx">
                                    <div class="userimgarea">
                                        @if($comment->user->profile)
                                            <img src="/img/profile/{{$comment->user->profile->image ?? 'defaultprofile.png'}}" alt="{{$comment->user->profile->name}}" class="img img-fluid">
                                        @else
                                            <img src="/img/profile/defaultprofile.png" alt="" class="img img-fluid">
                                        @endif
                                    </div>
                                    <div class="textarea">
                                        <h6 class="commentername"> {{strtoupper($comment->user->name)}}</h6>
                                        <h6 class="commentertime"> {{$comment->created_at->format('d M Y')}} At {{$comment->created_at->format('H:i a')}}</h6>
                                        <p class="comment" @can('update', $comment) contenteditable="true" @endcan>{!!$comment->body!!}</p>
                                        @can('delete', $comment)
                                            <button class="btn btn-danger deletecomment"  id="deletecomment" data-commentId={{$comment->id}}>
                                                X
                                            </button>
                                            <meta name="csrf-token" content="{{ csrf_token() }}" id="metadaddy">
                                        @endcan

                                    </div>
                                </div>
                        @endforeach

                        @else
                            <p>No comment on this Episode Currently. Be the first to comment</p>
                        @endif

                    </div>
                    <div class="commentform">
                        @if (auth()->user())

                            @if (auth()->user()->muted == 1)
                                <p>You are currently muted. You cant comment</p>
                            @else

                                <form action="{{Route('blogSaveComments', ['slug'=>$episode->id])}}" method="POST">
                                        @csrf
                                        <p class="pl-4">You are commenting as <strong>{{auth()->user()->name}}</strong></p>
                                            <input type="hidden" name="episode_id" value="{{$episode->id}}">
                                        <div class="form-group">
                                            <textarea name="body" id="body" cols="30" rows="10" class="form-control">
                                                    {{old('body')}}
                                            </textarea>
                                            @error('body')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                             @enderror
                                         </div>
                                         <input type="submit" value="Add Comment" class="btn btn-dark ml-4">
                                </form>

                            @endif
                        @else()
                        <p>You need to be logged in to comment</p>
                        @endif
                    </div>
                    <h1>

                    </h1>


            </div>
        </div>
    </section>


@endsection

@section('script')
    <script>

            window.addEventListener('DOMContentLoaded', function(){

                //delete comment
                let deletecomment = document.querySelectorAll('.deletecomment');
                deletecomment.forEach((comdel)=>{
                    comdel.addEventListener('click', (e)=>{
                    e.preventDefault();
                        let wholeComment = e.target.parentElement.parentElement;
                        let comment =e.target.dataset.commentid;
                        let token = document.querySelector("#metadaddy").getAttribute("content");

                         //action when button is clicked
                     fetch('/episodes/delete/'+ comment, {
                            headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json, text-plain, */*",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-TOKEN": token
                            },
                            method: 'post',
                            credentials: "same-origin",
                            body: JSON.stringify({
                                comment: comment,
                            })
                            })
                     .then((response) => {
                                return response.json();
                        })
                     .then((myJson) => {

                                wholeComment.remove();
                                alert(myJson);
                     })
                    .catch(function(error) {
                                console.log(error);
                    });




                    });
                })

                //edit comment








            });



    </script>
@endsection

<!--
     <div class="linksepi">
                    {{$relatedepisode->links()}}
                </div>
-->
