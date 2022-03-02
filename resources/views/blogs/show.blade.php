<x-layout>

    <div class="container tosepeartewithnav">
        <div class="card text-center p-3 col-md-8 offset-md-2">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <img src="{{$blog->image}}" class="img-fluid my-3" alt="">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="avatar">
                                <img src="/storage/{{$blog->author->avatar}}" alt="..." class="img-fluid">
                            </div>
                            <p class="text-center publish-date my-1"> {{$blog->author->name}} |
                                {{$blog->created_at->diffForHumans()}}</p>
                        </div>
                        <div>
                            <x-like :blog='$blog' />
                        </div>
                    </div>

                    <h3 class="text-center">{{$blog->title}}</h3>
                </div>
            </div>
            <div class="row">
                <p class="" style="line-height: 3rem; font-size: larger;">{!!$blog->body!!}</p>
            </div>
        </div>
    </div>
    @auth
    <x-comment-form :blog='$blog' :bloglanguage='$bloglanguage' />
    @endauth
    @guest
    <div class="container my-2">
        <div class="col-md-8 offset-md-2">
            <p class="text-center">Please <a href="/login">Login </a>to write a comment.</p>
        </div>
    </div>
    @endguest

    <x-comment-card :comments='$comments' />

</x-layout>