<nav id="my_navbar" class="navbar navbar-expand-lg navbar-dark bg-dark container-fluid fixed-top">
    <a class="navbar-brand d-flex" href="{{ route('index') }}">
        {{--        <span class="display-4 mr-2">208</span>--}}
        {{--        <span>--}}
        {{--            Heroes Journey <br>To Everest--}}
        {{--        </span>--}}
        <img src="{{ asset('images/Logo White.png') }}" alt="208 Heroes" class="nav_logo_100" id="nav_logo">
    </a>

    <button class="navbar-toggler border-0 mr-n4 text-white" type="button" data-toggle="collapse" data-target="#navbarSearchContent"
            aria-controls="navbarSearchContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-search"></i>
    </button>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMainContent"
            aria-controls="navbarMainContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse mobile_search" id="navbarSearchContent">
        <search-bar class="d-block d-md-none" type="mobile"></search-bar>
    </div>

    <div class="collapse navbar-collapse" id="navbarMainContent">

        <search-bar class="d-none d-md-block" type="main"></search-bar>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a
                    class="nav-link my_nav_links {{ Request::is('vision') ? 'my_active_class' : '' }}"
                    href="{{ route('vision') }}"
                >
                    Vision
                </a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link my_nav_links {{ Request::is('team') ? 'my_active_class' : '' }}"
                    href="{{ route('team') }}"
                >
                    Our Team
                </a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link my_nav_links {{ Request::is('post') ? 'my_active_class' : '' }}"
                    href="{{ route('post.index') }}"
                >
                    Blogs
                </a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link my_nav_links {{ Request::is('contact') ? 'my_active_class' : '' }}"
                    href="{{ route('contact') }}"
                >
                    Contact
                </a>
            </li>

            @auth
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle my_nav_links"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <i class="fa fa-user"></i> Hi! {{ Auth::user()->first_name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        {{--                        <a class="dropdown-item" href="#">Profile</a>--}}
                        {{--                        <a class="dropdown-item" href="#">My Votes</a>--}}
                        {{--                        <div class="dropdown-divider"></div>--}}
                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                    </div>
                </li>
            @else
                <li class="nav-item">
                    <a
                        class="nav-link my_nav_links"
                        href="#loginModal"
                        data-toggle="modal"
                    >
                        Login
                    </a>
                </li>
            @endauth

        </ul>
    </div>
</nav>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <strong>Please login to vote</strong>
                    <p>This will insure the authenticity of your vote.</p>
                    <a
                        href="{{ url('auth/google') }}"
                        class="google btn_social"
                    >
                        <i class="fab fa-google mx-2"></i> Continue with Google
                    </a>
                    <a
                        href="{{ url('auth/facebook') }}"
                        class="facebook btn_social mt-3"
                    >
                        <i class="fab fa-facebook-f mx-2"></i> Continue with Facebook
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
