@extends('layouts.profile')

@section('content')
    <div class="content-wrapper bg-white">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">All Notifications</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/profile">Home</a></li>
                    <li class="breadcrumb-item active">Notifications</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content bg-default" style="background:#fafaff">
            <div class="container py-0">
                <div class="noticontainer">

                    <!-- unread Notification -->
                    @foreach (auth()->user()->unreadNotifications as $unread)
                        <div class="box">
                            <a href="{{$unread->data['link']}}">
                                    <div class="imgpart">
                                        <img src="\img\profile\nurseodun20200320104857.jpeg" alt="" class="img-fluid">
                                    </div>


                                    <div class="detailpart">
                                        <p class="lead">{{$unread->data['title']}}  </p>
                                        <p>{{$unread->data['detail']}}</p>
                                        <p>{{$unread->data['link']}}</p>
                                    </div>

                            </a>
                        </div>
                    @endforeach

                    <!-- read Notification -->
                    @foreach (auth()->user()->readNotifications as $unread)
                        <div class="box">
                            <a href="" class="read">
                                    <div class="imgpart">
                                        <img src="\img\profile\nurseodun20200320104857.jpeg" alt="" class="img-fluid">
                                    </div>


                                    <div class="detailpart">
                                        <p class="lead">New Series Created</p class="lead">
                                        <p>User (Omojunwa Kenny Just created a new series titled : <strong>who goes there)</strong></p>
                                    </div>

                            </a>
                        </div>
                    @endforeach






                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

  @endsection

  @section('script')
  <script>


  </script>

  @endsection

