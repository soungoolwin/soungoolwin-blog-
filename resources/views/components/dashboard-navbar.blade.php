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
                                    <a class="nav-link" aria-current="page" href="/">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="/mblog/publish">Publish(M)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="/eblog/publish">Publish(E)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/mblog/list">Mblogs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/eblog/list">Eblogs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/category/list">Categories</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/user/list">Users</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/subscriber/list">Subscribers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/photo/list">Photos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/youtube/list">YouTube</a>
                                </li>

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