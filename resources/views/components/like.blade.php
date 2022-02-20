{{-- like system have two tables because of english blogs and myanmar blogs table that are many to many relationship
table.
These two tables are "blog_user" table and "eblog_user" table. --}}
@props(['blog'])

<div class="d-flex justify-content-between">

    @if (auth()->user())
    @if (Request::segment(1)==='mblogs')
    @if (auth()->user()->likeBlogs && auth()->user()->likeBlogs->contains('id', $blog->id))
    <form action="/{{Request::segment(1)}}/{{$blog->slug}}/unlike" method="POST">
        @csrf
        <button type="submit" class="btn btn-link"><i class="fa-solid fa-heart unlikebtn"></i></button>
    </form>
    @else
    <form action="/{{Request::segment(1)}}/{{$blog->slug}}/like" method="POST">
        @csrf
        <button type="submit" class="btn btn-link"><i class="fa-solid fa-heart likebtn"></i></button>
    </form>
    @endif
    @endif
    @endif

    @if (auth()->user())
    @if (Request::segment(1)==='eblogs')
    @if (auth()->user()->likeEblogs && auth()->user()->likeEblogs->contains('id', $blog->id))
    <form action="/{{Request::segment(1)}}/{{$blog->slug}}/unlike" method="POST">
        @csrf
        <button type="submit" class="btn btn-link"><i class="fa-solid fa-heart unlikebtn"></i></button>
    </form>
    @else
    <form action="/{{Request::segment(1)}}/{{$blog->slug}}/like" method="POST">
        @csrf
        <button type="submit" class="btn btn-link"><i class="fa-solid fa-heart likebtn"></i></button>
    </form>
    @endif
    @endif
    @endif



    <div class="my-1">Likes({{$blog->likers->count()}})</div>
</div>