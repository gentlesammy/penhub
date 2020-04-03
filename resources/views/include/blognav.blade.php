<div class="navbar">
    <ul class="nav">

    <li><a href="{{Route('about')}}" class="{{ Request::is('about*') ? 'active' : '' }}">About</a></li>
        <li><a href="{{Route('blogserieshome')}}" class="{{ Request::is('series*') ? 'active' : '' }}">Series</a></li>
        <li><a href="{{Route('blogEpisodehome')}}" class="{{ Request::is('episodes*') ? 'active' : '' }}">Episodes</a></li>
        @guest
        <li><a href="{{Route('writeforus')}}" class="{{ Request::is('writeforus*') ? 'active' : '' }}">Write for Us </a></li>
        @endguest
        <li><a href="{{Route('contact')}}" class="{{ Request::is('contact*') ? 'active' : '' }}">Contact</a></li>
        @guest


        <li>
            <a href="{{ route('login') }}"> Login</a>
        </li>


        <li>
            <a href="{{ route('register') }}">Register</a>
        </li>



    @else
    <li>
        <a href="{{ route('profilehome') }}">Profile</a>
    </li>

    <li>
        <a  href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>


    @endguest
    </ul>
    <div class="sociallink">

    </div>
</div>
