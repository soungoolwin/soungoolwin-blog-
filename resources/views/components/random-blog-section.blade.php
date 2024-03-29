<!-- ------------blog-section------------- -->
@props(['randomBlogs'])

@if ($randomBlogs)

<div class="container">
    <h3 class="text-center my-5">
        <a href="" class="text-decoration-none">BLOGS YOU MAY LIKE</a>
    </h3>
    <div class="row">
        @foreach ($randomBlogs as $blog)
        <div class="col-md-6">
            <a href="/mblogs/{{$blog->slug}}" class="text-decoration-none">
                <img src="{{$blog->image}}" class="img-fluid mx-auto d-block"
                    style="max-height: 8rem; object-fit: contain; min-height: 8rem" alt="..." />

                <p class="text-center text-secondary my-3">Publish Date : {{$blog->created_at->diffForHumans()}} |
                    #{{$blog->category->name}}</p>
                <h4 class="text-center">{{$blog->title}}</h4>
            </a>
            <p class="my-3">
                {{$blog->intro}}
            </p>
        </div>
        @endforeach

    </div>
</div>
@endif
<!-- ------------blog-section-end------------- -->