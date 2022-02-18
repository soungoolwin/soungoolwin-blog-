<x-layout>


    <div class="container tosepeartewithnav">
        <div class="row my-3">
            <h3 class="text-center my-3">My Some Piano Covers</h3>
            @foreach ($videos as $video)
            <div class="col-md-6 my-3">
                <div class="card p-3">
                    <iframe height="315" src="{{$video->source}}" title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    <div class="card-body">
                        <p class="card-text">{{$video->name}}</p>
                    </div>
                </div>
            </div>
            @endforeach

            {{$videos->links()}}
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-5">
                <hr class="text-primary hr" />
            </div>
        </div>
    </div>


    <div class="container" style="margin-bottom: 50px">
        <div class="row my-3">
            <h3 class="text-center my-3">My Podcasts</h3>

            <iframe src="https://anchor.fm/soung-oo-lwin/embed" height="220px" width="400px" frameborder="0"
                class="my-3" scrolling="no"></iframe>
        </div>
    </div>
</x-layout>