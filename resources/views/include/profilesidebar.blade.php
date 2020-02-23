<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/profile" class="brand-link text-center">
      <span class="brand-text font-weight-light">PENHUB Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <!--default image sgould be here, if no image -->
          <img src="/img/defaultprofile.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <!--should lead to public profile -->
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <!-- profile set -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                PROFILE
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <!--
           &&&&&&&&&&&&&&&&&&&&&&&&& OPTIMISING WITH GATES &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
            -->
            @if(auth()->user()->profile == null)
              <li class="nav-item">
                <a href="{{Route('createProfile')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Profile</p>
                </a>
              </li>
            @else
              <li class="nav-item">
              <a href="/profile/detail/{{auth()->user()->profile->id}}/{{auth()->user()->profile->username}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/profile/edit/{{auth()->user()->id}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Vissibility</p>
                </a>
              </li>


            @endif
            </ul>
          </li>
          <!--
           &&&&&&&&&&&&&&&&&&&&&&&&& OPTIMISING WITH GATES &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
            -->
          @if(in_array(auth()->user()->role, [2, 4, 5]))
          <!-- Series set -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                SERIES
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Series</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Series</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Episodes set -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                EPISODES
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Episodes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Episodes</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Analytics set -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <i class="nav-icon fas fa-tree"></i>
              <p>
                ANALYTICS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <p class="text-primary text-center b">Coming Soon</p>
              </li>
               <!--
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Episodes</p>
                </a>
              </li>
               -->
            </ul>

          </li>
          <!-- message set -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                MESSAGES
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="./index.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Inbox</p>
                    </a>
              </li>
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unread</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Archieve</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item">

            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

      </li>

        </ul>
      </nav>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

