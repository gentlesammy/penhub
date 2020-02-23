<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- title yield-->
    <title>@yield('title', "Sam Odun's PenPoint")</title>
    <!-- description yield-->
    @yield('description')

     <!-- keyword yield-->
     @yield('keyword')
     <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
</head>
<body>
    <!-- navbar  section-->
    <section class="navarea">
        <div class="nav-title">
        <a href="{{Route('blogindex')}}" class="title"> PenHub    <span>| Pen Aflame</span></a>
            <div class="hamburger">
                <span class="icon-bar" id="bar1"></span>
                <span class="icon-bar" id="bar2"></span>
                <span class="icon-bar" id="bar3"></span>
            </div>
        </div>
        @include('include.blognav')
    </section>

    <!-- content section -->
    @yield('content')







    @include('include.blogfooter')


    @yield('script')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="{{ asset('js/blog.js') }}" defer></script>
</body>
</html>
