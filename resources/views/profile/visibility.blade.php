@extends('layouts.profile')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">EDIT Visibility</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/profile">Home</a></li>
                    <li class="breadcrumb-item active">Visibility</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content bg-default" style="background:#fafaff">
            <div class="container">
                <div class="row py-5">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 visiblebox">
                        <meta name="csrf-token" content="{{ csrf_token() }}" id="metadaddy">
                        <div class="vbox">
                            <h5 class="label">Mark Me Anonymous </h5> 
                            <input type="checkbox" onclick="anonymousCall();" id="anonymous" {{auth()->user()->profile->anonymous()}}>
                            <p class="moreinfo">
                                If you select Anonymous option (by checking the box), 
                                Your name and infomation will not be displayed on every Episode you made. Readers
                                will however be able to message you.
                            </p>
                        </div>

                        <div class="vbox">
                            <h5 class="label">Display my phone </h5> 
                            <input type="checkbox" onclick="phoneNumberCall();" id="phone" {{auth()->user()->profile->displayPhoneNumber()}}>
                            <p class="moreinfo">
                                If you chose to display your phone number (by checking the box), 
                                Your phone number will be displayed on every Episode you made and also 
                                on your public profile page. 
                            </p>
                        </div>

                        <div class="vbox">
                            <h5 class="label">Display my Handles </h5> 
                            <input type="checkbox" onclick="socialHandleCall();" id="social" {{auth()->user()->profile->displaySocialHandle()}}>
                            <p class="moreinfo">
                                If you chose to display your social media handles (by checking the box), 
                                Your social media handles  will be displayed on every Episode you made and also 
                                on your public profile page. 
                            </p>
                        </div>
                        
                        <div class="vbox">
                            <h5 class="label text-danger">STAY SAFE</h5>
                            <p class="moreinfo">
                                Our Visibility settings allow you to customize how you interact with your readers. 
                                Any change you make will reflect on all your write ups(series and episodes) on our platforms. 
                                In the future, we hope to enable customization per each series, instead of one privacy settings
                                for all series; a situation that will allow you to be anonymous on some series while showing on others
                                We hope this helps to increase your sense of safety.
                            </p>

                        </div>

                        



                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

  @endsection

  @section('script')
  
  <script>
            //anonymous
            function anonymousCall(){ 
                let anonymous = document.querySelector('#anonymous');
                anonymous.addEventListener('change', (e)=>{
                    let anoncode; 
                    if(anonymous.checked == true){
                        anoncode = 1;

                    }else{
                        anoncode = 0;
                    }
                    
                    //send value 
                        let token = document.querySelector("#metadaddy").getAttribute("content");
                        function sendToController(token, anoncode){
                            fetch('/profile/visible/visibleAnon', {
                                                headers: {
                                                "Content-Type": "application/json",
                                                "Accept": "application/json, text-plain, */*",
                                                "X-Requested-With": "XMLHttpRequest",
                                                "X-CSRF-TOKEN": token
                                                },
                                                method: 'post',
                                                credentials: "same-origin",
                                                body: JSON.stringify({
                                                    anoncode:anoncode
                                                })
                                                })
                                                .then((response) => {
                                                    return response.json();
                                                })
                                                .then((myJson) => {
                                                    if(myJson.message == 'Unauthenticated.'){
                                                        window.location = "/login"
                                                    }else{

                                                        alert(myJson);
                                                    }
                                                })
                                    .catch(function(error) {
                                                        if(error.response.status == 401){
                                                            window.location = "/login"
                                                        }
                                                    });
                        }
                        sendToController(token, anoncode);
                })
            }

            //phone
            function phoneNumberCall(){
                let phone = document.querySelector('#phone');
                phone.addEventListener('change', (e)=>{
                    let showPhone;
                    if(phone.checked == true){
                        showPhone =  1;
                    }else{
                        showPhone = 0;
                    }
                    //send value 
                        let token = document.querySelector("#metadaddy").getAttribute("content");
                        function sendToController(token, showPhone){
                            fetch('/profile/visible/visiblePhone', {
                                                headers: {
                                                "Content-Type": "application/json",
                                                "Accept": "application/json, text-plain, */*",
                                                "X-Requested-With": "XMLHttpRequest",
                                                "X-CSRF-TOKEN": token
                                                },
                                                method: 'post',
                                                credentials: "same-origin",
                                                body: JSON.stringify({
                                                    showPhone:showPhone
                                                })
                                                })
                                                .then((response) => {
                                                    return response.json();
                                                })
                                                .then((myJson) => {
                                                    if(myJson.message == 'Unauthenticated.'){
                                                        window.location = "/login"
                                                    }else{

                                                        alert(myJson);
                                                    }
                                                })
                                    .catch(function(error) {
                                                        if(error.response.status == 401){
                                                            window.location = "/login"
                                                        }
                                                    });
                        }
                        sendToController(token, showPhone);





                })
            }

            //social media
            function socialHandleCall(){
                let social = document.querySelector('#social');
                social.addEventListener('change', (e)=>{
                    let showsocial; 
                    if(social.checked == true){
                        showsocial = 1;
                    }else{
                        showsocial = 0;
                    }
                    //send value 
                    //alert(showsocial);
                    let token = document.querySelector("#metadaddy").getAttribute("content");
                        function sendToController(token, showsocial){
                            fetch('/profile/visible/visibleSocial', {
                                                headers: {
                                                "Content-Type": "application/json",
                                                "Accept": "application/json, text-plain, */*",
                                                "X-Requested-With": "XMLHttpRequest",
                                                "X-CSRF-TOKEN": token
                                                },
                                                method: 'post',
                                                credentials: "same-origin",
                                                body: JSON.stringify({
                                                    showsocial:showsocial
                                                })
                                                })
                                                .then((response) => {
                                                    return response.json();
                                                })
                                                .then((myJson) => {
                                                    if(myJson.message == 'Unauthenticated.'){
                                                        window.location = "/login"
                                                    }else{

                                                        alert(myJson);
                                                    }
                                                })
                                    .catch(function(error) {
                                                        if(error.response.status == 401){
                                                            window.location = "/login"
                                                        }
                                                    });
                        }
                        sendToController(token, showsocial);
                })
            }









   
  </script>

@endsection
