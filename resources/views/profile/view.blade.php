@extends('layouts.profile')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/profile">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div><!-- /.col -->
                @if(Session::has('flash_message'))
                <div class="alert {{Session::get('flash_type')}} mx-5 px-5 mt-3">
                    <h3 class="">{{Session::get('flash_message')}}</h3>
                </div>
                @endif
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-3">

                  <!-- Profile Image -->
                  <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                      <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                             src="/img/profile/{{$username->image}}"
                             alt="User profile picture">
                      </div>

                      <h3 class="profile-username text-center">{{$username->username}}</h3>


                      <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                          <b>Series</b> <a class="float-right">{{$username->user->series->count()}}</a>
                        </li>
                        <li class="list-group-item">
                          <b>Episodes</b> <a class="float-right">{{auth()->user()->episodes->count()}}</a>
                        </li>
                      </ul>

                      <strong><i class="fas fa-book mr-1"></i> Intro</strong>

                      <p class="text-muted">
                        {{str_limit($username->description, 100)}}
                      </p>

                      <hr>

                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->

                </div>
                <!-- /.col -->
                <div class="col-md-9">
                  <div class="card">
                    <div class="card-header p-2">
                      <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Series</a></li>
                        <!--
                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Episodes</a></li>
                        -->
                      </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            @if($username->user->series->count() > 0)
                                @foreach($username->user->series as $series)
                                    <!-- series list -->
                                    <div class="post">
                                        <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="/img/series/{{$series->feature}}" alt="{{$series->title}}">
                                        <span class="username">
                                            <a href="#">{{$series->title}}</a>
                                            <a href="#" class="float-right btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></a>
                                        </span>
                                        <span class="description">Shared publicly  {{$series->created_at}}</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                        {{$series->summary}}
                                        </p>

                                        <p>
                                        <br>
                                        <span class="float-right">
                                            <a href="#" class="link-black text-sm">
                                            <i class="far fa-comments mr-1"></i> Followers ({{$series->followers->count()}})
                                            </a>
                                        </span>
                                        </p>
                                    </div>
                                    <!-- /.post -->
                                @endforeach
                            @else
                                <h4>you do not have any series Currently</h4>
                                <a href="#" class="btn  btn-link">Start a Series</a>
                            @endif

                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                          <!-- The timeline -->
                          <div class="timeline timeline-inverse">
                            <!-- timeline time label -->
                            <div class="time-label">
                              <span class="bg-danger">
                                10 Feb. 2014
                              </span>
                            </div>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <div>
                              <i class="fas fa-envelope bg-primary"></i>

                              <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                <div class="timeline-body">
                                  Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                  weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                  jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                  quora plaxo ideeli hulu weebly balihoo...
                                </div>
                                <div class="timeline-footer">
                                  <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                  <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <div>
                              <i class="fas fa-user bg-info"></i>

                              <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                </h3>
                              </div>
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <div>
                              <i class="fas fa-comments bg-warning"></i>

                              <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                <div class="timeline-body">
                                  Take me to your leader!
                                  Switzerland is small and neutral!
                                  We are more like Germany, ambitious and misunderstood!
                                </div>
                                <div class="timeline-footer">
                                  <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline time label -->
                            <div class="time-label">
                              <span class="bg-success">
                                3 Jan. 2014
                              </span>
                            </div>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <div>
                              <i class="fas fa-camera bg-purple"></i>

                              <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                <div class="timeline-body">
                                  <img src="http://placehold.it/150x100" alt="...">
                                  <img src="http://placehold.it/150x100" alt="...">
                                  <img src="http://placehold.it/150x100" alt="...">
                                  <img src="http://placehold.it/150x100" alt="...">
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item -->
                            <div>
                              <i class="far fa-clock bg-gray"></i>
                            </div>
                          </div>
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="settings">
                          <form class="form-horizontal">
                            <div class="form-group row">
                              <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                              <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputName" placeholder="Name">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                              <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName2" placeholder="Name">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                  </label>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Submit</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <!-- /.tab-pane -->
                      </div>
                      <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                  </div>
                  <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div><!-- /.container-fluid -->
          </section>

        <!-- /.content -->
    </div>

  @endsection
