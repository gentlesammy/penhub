@extends('layouts.profile')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/profile">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    @if (auth()->user()->profile == "")
        <section class="content">
            <div class="container main">
                <div class="row">
                    @if(Session::has('flash_message'))
                            <div class="alert {{Session::get('flash_type')}} alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>{{Session::get('flash_message')}}</strong>
                            </div>

                          @endif
                    <div class="col-md-2"></div>
                    <div class="col-md-8 bg-white py-5">
                        <h3 class="text-center">
                            WELCOME TO PENHUB
                        </h3>
                    </div>
                </div>

                <div class="row my-2">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 bg-white py-5 px-md-5 px-sm-2 text-justify">
                        <p class="text-left">
                            We have four types of Roles, Readers, Writers, Moderators and Administrator.
                        </p>
                        <p class="text-left">
                            If you are here just to enjoy quality and interesting stories, simply navigate
                            <a href="/">Here</a>
                            You can  subscribed to Series that catch your fancy and have each episode delivered
                            here whenever the writer published them.
                        </p>
                        <p class="text-left">
                            For Other Roles, Set up your Profile <a href="/profile/create">Here</a>  and Send Message to the Admin, Stating the role and why
                            You think You deserve it. Please Ensure You set up your profile before Messaging.
                        </p>
                    </div>
                </div>
            </div>
        </section>

    @else
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                @if(Session::has('flash_message'))
                            <div class="alert {{Session::get('flash_type')}} alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>{{Session::get('flash_message')}}</strong>
                            </div>

                          @endif
                <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-dark">
                    <div class="inner">
                    <h3>{{auth()->user()->series->count()}}</h3>

                    <p>Your Series</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{Route('profileserieshome')}}" class="small-box-footer"> View All <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">

                    <h3>{{auth()->user()->episodes->count()}}</h3>

                    <p>Your Episodes</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{Route('profileepisodehome')}}" class="small-box-footer">View All <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-dark">
                    <div class="inner">
                    <h3>#0</h3>

                    <p>Earnings</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-person-add"></i>
                    </div>
                    <a class="small-box-footer">Currently Locked <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                    <h3>{{auth()->user()->unreadmessage->count()}}</h3>

                    <p>Unread Notification</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{Route('profilenotificationunread')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                <!-- DIRECT CHAT -->
                <div class="card direct-chat direct-chat-primary">
                    <div class="card-header">
                    <h3 class="card-title">Latest Comments</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                        </button>
                    </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages">
                        <!-- Message. Default to the left -->
                        <!-- comments will be here -->


                        @foreach (auth()->user()->series as $item)
                            @foreach ($item->episodes as $epi)
                                @foreach ($epi->comments as $com)
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-left">{{$com->user->name}}</span>
                                        <span class="direct-chat-timestamp float-right">{{$com->created_at}}</span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <div class="direct-chat-text">
                                        {{str_limit($com->body, 100)}}
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                @endforeach
                            @endforeach
                        @endforeach
                        <!-- /.direct-chat-msg -->

                        <!-- /.direct-chat-msg -->

                    </div>
                    <!--/.direct-chat-messages-->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!--/.direct-chat -->
                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">
                <div class="card card-widget">
                    <div class="card-header">
                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                        </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <h6>Admin NoticeBoard</h6>
                        <p>
                            Important admin information will appear here.
                        </p>
                        <p>Please treat as urgent as possible</p>

                        <p>Admin</p>




                    </div>

                    </div>
                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        @endif

  </div>




  @endsection
