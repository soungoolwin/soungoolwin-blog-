@props(['photos'])
<!-- ------------this variable is come with make:component, not from home.blade.php attribute ------------- -->
<div class="container my-5">
    <h3 class="text-center my-5">
        <a href="" class="text-decoration-none">FEEL RELAX WITH MY SOME EFFORTS</a>
    </h3>
    <div class="row">
        @foreach ($photos as $photo)
        <div class="col-md-6 my-3">
            <div class="card p-3">
                <img src="{{$photo->source}}" class="card-img-top img-fluid" style="height:22rem" alt="..." />
                <div class="card-body">
                    <p class="card-text">{{$photo->name}}</p>
                </div>
            </div>
        </div>
        @endforeach
        {{$photos->links()}}
    </div>
</div>