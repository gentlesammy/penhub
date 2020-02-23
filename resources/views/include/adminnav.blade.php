<div class="sidelinks">
    <ul class="navbar-nav mr-auto">
        <li><a href="{{Route('adCatIndex')}}">Categories</a></li>
        <li><a href="{{Route('adRateIndex')}}">Ratings</a></li>
        <li><a href="{{Route('adseriesIndex')}}">Series</a></li>
        <li><a href="{{Route('adEpisodesIndex')}}">Episodes</a></li>
        <li><a href="{{Route('adCommentsIndex')}}">Comments</a></li>
        <li><a href="{{Route('adSubscribersIndex')}}">Subscribers</a></li>
    <li><a href="{{Route('adUsersIndex')}}">Users</a></li>
        <li><a href="{{Route('adMessagesIndex')}}">Messages</a></li>
    </ul>

        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>


</div>
