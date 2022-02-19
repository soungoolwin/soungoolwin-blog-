@props(['blog','bloglanguage'])
<div class="container" style="margin-top: 40px">
    <div class="col-md-8 offset-md-2">

        <form action="/{{$bloglanguage}}/{{$blog->slug}}/comment" method="POST">
            @csrf
            <div class="form-floating ">
                <textarea class="form-control" name="comment" placeholder="Leave a comment here"
                    id="floatingTextarea"></textarea>
                <label for="floatingTextarea">Comments</label>
                <div class="d-flex flex-row-reverse my-2">
                    <button type="submit" class="btn btn-primary">Post</button>
                </div>
            </div>
        </form>

    </div>
</div>