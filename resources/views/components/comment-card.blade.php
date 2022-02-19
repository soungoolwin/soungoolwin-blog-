@props(['comments'])
<div class="container my-5">
    <div class="col-md-8 offset-md-2">

        <h5 class="text-secondary">Comments({{$comments->count()}})</h5>

        @foreach ($comments as $comment)
        <div class="card d-flex p-3 my-3 shadow-sm">
            <div class="d-flex">
                <div>
                    <img src="{{$comment->user->avatar}}" width="50" height="50" class="rounded-circle" alt="">
                </div>
                <div class="ms-3">
                    <h6>SoungOoLwin</h6>
                    <p class="text-secondary">{{$comment->created_at->diffForHumans()}}</p>
                </div>
            </div>
            <p class="mt-1">
                {{$comment->body}}
            </p>
        </div>
        @endforeach
    </div>
</div>