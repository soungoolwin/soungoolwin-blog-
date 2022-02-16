<x-layout>
    <!-- ------------single-blog------------- -->
    <div class="container tosepeartewithnav" style="width: 1000px;">
        <div class="card">
            <div class="row justify-content-md-center">
                <div class="col-sm-5">
                    <img src="/images/89C34350-2EF8-41C4-A1F2-8311CD252BB7.jpeg" class="img-fluid my-3" alt="">
                    <p class="text-center publish-date ">Author - {{$blog->author->name}} | Publish date -
                        {{$blog->created_at->diffForHumans()}}</p>
                    <h3 class="text-center">{{$blog->title}}</h3>
                </div>
            </div>
            <div class="row col-sm-10 offset-sm-1">
                <div class="col-sm-3 mx-auto"></div>
                <p class="" style="line-height: 3rem; font-size: larger;">{{$blog->body}}</p>
            </div>
        </div>
    </div>
    <!-- -------------single-blog-end------------- -->
    <x-subscribeForm />

</x-layout>