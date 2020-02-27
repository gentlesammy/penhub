@extends('layouts.blog')
@section('title', 'Penhub: Contact US')


@section('content')

        <section class="blog-hero">
            <div class="container">
            <h1 class="text-white">CONTACT US</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 my-2">
                    <li class="breadcrumb-item font-weight-semebold"><a class="text-white" href="/">Home</a></li>
                    <li class="breadcrumb-item font-weight-semebold active text-primary" aria-current="page">contact</li>
                </ol>
            </nav>
            </div>
        </section>


        <section class="contactuspage">
            <div class="container">
                <div class="contactbox">

                    <div class="formbox">
                        <h4 class="text-center">CONTACT FORM</h4>
                        <h5 class="">Please Fill in all information below and we will get back to you</h5>

                        <form  method="post" action="/contact" class="contactform">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" id="name" placeholder="Full Name" class="form-control" value="{{old('name')}}">
                                @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" placeholder="Email Address" class="form-control" value="{{old('email')}}">
                                @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" id="phone" placeholder="Phone Number" class="form-control" value="{{old('phone')}}">
                                @error('phone')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <textarea name="messages" id="messages" rows="5" class="form-control text-left">
                                    {{old('messages') ?? 'Message'}}
                                </textarea>
                                @error('messages')
                                   <p class="text-danger"> {{$message}}</p>
                                @enderror
                            </div>
                            <div class="formgroup">

                                    @if(Session::has('flash_message'))
                                    <div class="alert {{Session::get('flash_type')}} mx-5 px-5 mt-3" id="msgreply">
                                        <h3 class="">{{Session::get('flash_message')}}</h3>
                                    </div>
                                    @endif


                            </div>
                            <input type="submit" class="form-control btn btnone" id="subbtnform" value="Send Message">
                        </form>
                    </div>
                    <div class="infobox">
                        <div class="contactcard">
                            <div class="iconpart">
                                <i class="fa fa-location-arrow" aria-hidden="true"></i>
                            </div>
                            <div class="msgpart">

                                <p>Ikorodu, Lagos State</p>
                                <p>Nigeria</p>
                            </div>
                        </div>

                        <div class="contactcard">
                            <div class="iconpart">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <div class="msgpart">

                                <p>info@penhub.com.ng</p>
                                <p>info@samodun.com</p>
                            </div>
                        </div>

                        <div class="contactcard">
                            <div class="iconpart">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="msgpart">

                                <p>+2348060913903</p>
                                <p>+2348105651234</p>
                            </div>
                        </div>
                    </div>


                </div>





            </div>
        </section>





@endsection



