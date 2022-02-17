<x-layout>
    <div class="container blog-section tosepeartewithnav">
        <h3 class="text-center">Blogs</h3>
        <input type="text" class="form-control" placeholder="Search" aria-describedby="passwordHelpBlock" />
        <div class="text-center my-3">
            <a href="/mblogs"
                class="text-decoration-none text-secondary p-3 {{Request::is('mblogs') ? 'navbaractive' : ''}}">Myanmar</a>
            <a href="/eblogs"
                class="text-decoration-none text-secondary {{Request::is('eblogs') ? 'navbaractive' : ''}}">English</a>
        </div>
        <x-category-dropdown />
        <div class="row my-5">
            @foreach ($blogs as $blog)
            <div class="col-md-4">
                <a href="/{{$bloglanguage==='myanmar'?'mblogs':'eblogs'}}/{{$blog->slug}}">
                    <img src="{{$blog->image}}" class="img-fluid mx-auto d-block"
                        style="max-height: 8rem; object-fit: contain; min-height: 8rem" alt="..." />
                </a>
                <p class="text-center text-secondary publish-date my-3">Publish Date :
                    {{$blog->created_at->diffForHumans()}} | #{{$blog->category->name}}
                </p>
                <h4 class="text-center my-1">{{$blog->title}}</h4>
                <p class="my-3">
                    {{$blog->intro}}
                </p>
            </div>
            @endforeach
            {{-- {{$blogs->links()}} --}}
        </div>
    </div>

    <x-subscribeForm />

</x-layout>