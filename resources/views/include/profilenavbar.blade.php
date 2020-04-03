<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/profile" class="nav-link">Dashboard</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">PenHub</a>
      </li>
      @if(auth()->user()->role < 4)
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/profile/messageadmin" class="nav-link">Message Admin</a>
      </li>
      @endif
    </ul>

    <!-- Right navbar links -->
    @if(in_array(auth()->user()->role, [1, 2, 3, 4, 5]))
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          @if (auth()->user()->unreadmessage->count() > 0)
          <span class="badge badge-danger navbar-badge">{{auth()->user()->unreadmessage->count()}}</span>
          @else

          @endif

        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">{{auth()->user()->unreadmessage->count()}} Message(s)</span>
          <div class="dropdown-divider"></div>
            @foreach (auth()->user()->unreadmessage as $msg)
                <a href="{{Route('profileemailshow', ['inMessage'=>$msg->id])}}" class="dropdown-item bg-primary">
                    <!-- Message Start -->
                    <div class="media">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                        {{$msg->sender->name}}
                        </h3>
                        <p class="text-sm">{{str_limit($msg->body, 30)}}</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{$msg->created_at->diffForHumans()}}</p>
                    </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
            @endforeach

            @foreach (auth()->user()->readmessage as $msg)
                <a href="{{Route('profileemailshow', ['inMessage'=>$msg->id])}}" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                            {{$msg->sender->name}}
                        </h3>
                        <p class="text-sm">{{str_limit($msg->body, 30)}}</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{$msg->created_at->diffForHumans()}}</p>
                    </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
            @endforeach

          <div class="dropdown-divider"></div>
          <a href="{{Route('profileemailhome')}}" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          @if (auth()->user()->UnreadNotifications->count()>0)
            <span class="badge badge-info navbar-badge">{{auth()->user()->UnreadNotifications->count()}} </span>
          @endif

        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{auth()->user()->UnreadNotifications->count()}} Notification(s)</span>
          <div class="dropdown-divider"></div>
          @foreach (auth()->user()->UnreadNotifications as $item)
            <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> {{$item->data['title']}}
                <span class="float-right text-muted text-sm">{{$item->created_at->diffForHumans()}}</span>
            </a>
            <div class="dropdown-divider"></div>

          @endforeach

          @foreach (auth()->user()->readNotifications as $item)
            <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> {{$item->data['title']}}
                <span class="float-right text-muted text-sm">{{$item->created_at->diffForHumans()}}</span>
            </a>
            <div class="dropdown-divider"></div>

          @endforeach
          <div class="dropdown-divider"></div>
          <a href="{{Route('profilenotificationhome')}}" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
    </ul>
    @endif
  </nav>
