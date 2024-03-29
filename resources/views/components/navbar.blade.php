<!-- ------------navbar------------- -->
<div class="container-fluid bg-light fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Soung Oo <span class="nav-color">Lwin</span></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-lg-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link {{Request::is('/') ? 'active' : ''}}" aria-current="page"
                                        href="/">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{Request::segment(1)==='mblogs' ? 'active' : ''}} {{Request::segment(1)==='eblogs' ? 'active' : ''}}"
                                        href="/mblogs">Blogs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{Request::segment(1)==='others' ? 'active' : ''}}"
                                        href="/others">Others</a>
                                </li>
                                @guest
                                <li class="nav-item">
                                    <a class="nav-link {{Request::segment(1)==='register' ? 'active' : ''}}"
                                        href="/register">Register</a>
                                </li>
                                @endguest
                                @guest
                                <li class="nav-item">
                                    <a class="nav-link {{Request::segment(1)==='login' ? 'active' : ''}}"
                                        href="/login">Login</a>
                                </li>
                                @endguest

                                @auth
                                <li class="nav-item">
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button type="submit" class="nav-link btn btn-link">Logout</button>
                                    </form>

                                </li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ------------navbar-end------------- -->