<nav class="navbar-expand-lg navbar-light bg-light">
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item nav-link"><a class="nav-link" href="/news"><img src="/images/news.png" width="25" height="25" class="d-inline-block align-top">&nbsp;News</a></li>
            <li class="nav-item nav-link"><a class="nav-link" href="/rss"><img src="/images/rss.png" width="25" height="25" class="d-inline-block align-top">&nbsp;RSS</a></li>
                        @guest
                            <li class="nav-item nav-link"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li class="nav-item nav-link"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @else 
                        <li class="nav-item nav-link"><a class="nav-link" href="#"><img src="/images/add.png" width="25" height="25" class="d-inline-block align-top">&nbsp;Add news</a></li>
                            <li class="dropdown nav-item nav-link">
                                <a href="#"  class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} 
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
        </ul>
</nav>