@props(['blog'])


@if (Request::segment(1)==='mblogs')
@if (auth()->user()->likeBlogs && auth()->user()->likeBlogs->contains('id', $blog->id))
<form action="/{{Request::segment(1)}}/{{$blog->slug}}/unlike" method="POST">
    @csrf
    <button type="submit" class="btn btn-link"><i
            class="fa-solid fa-heart unlikebtn"></i></button>Likes({{$blog->likers->count()}})
</form>
@else
<form action="/{{Request::segment(1)}}/{{$blog->slug}}/like" method="POST">
    @csrf
    <button type="submit" class="btn btn-link"><i
            class="fa-solid fa-heart likebtn"></i></button>Likes({{$blog->likers->count()}})
</form>
@endif
@endif

@if (Request::segment(1)==='eblogs')
@if (auth()->user()->likeEblogs && auth()->user()->likeEblogs->contains('id', $blog->id))
<form action="/{{Request::segment(1)}}/{{$blog->slug}}/unlike" method="POST">
    @csrf
    <button type="submit" class="btn btn-link"><i
            class="fa-solid fa-heart unlikebtn"></i></button>Likes({{$blog->likers->count()}})
</form>
@else
<form action="/{{Request::segment(1)}}/{{$blog->slug}}/like" method="POST">
    @csrf
    <button type="submit" class="btn btn-link"><i
            class="fa-solid fa-heart likebtn"></i></button>Likes({{$blog->likers->count()}})
</form>
@endif
@endif