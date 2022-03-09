@props(['comments','blog'])
<div class="container my-5">
    <div class="col-md-8 offset-md-2">

        <h5 class="text-secondary">Comments({{$comments->count()}})</h5>

        @foreach ($comments as $comment)
        <div class="card d-flex p-3 my-3 shadow-sm">
            <div class="d-flex justify-content-between">
                <div>
                    <div class="d-flex justify-content-between">
                        <div class="p-1">
                            <img src="{{$comment->user->avatar}}" width="50" height="50" class="rounded-circle" alt="">
                        </div>
                        <div>
                            <h6>{{$comment->user->name}}</h6>
                            <p class="text-secondary">{{$comment->created_at->diffForHumans()}}</p>
                        </div>
                    </div>




                </div>
                <div class="ms-3">
                    <form action="/{{Request::segment(1)}}/comments/{{$comment->id}}/delete" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link"><i class="fa-solid fa-trash"></i></button>
                    </form>

                </div>
            </div>
            <p class="mt-1">
                {{$comment->body}}
            </p>
        </div>
        @endforeach
    </div>
</div>