<!-- ------------subscribe-form------------- -->

<div class="container my-5">
    <div class="row  my-5">
        <div class="col-md-6 text-center offset-md-3">
            <div class="card p-3">
                <h3 class="my-3">Subscribe</h3>
                <form action="/subscribe" method="POST">
                    @csrf
                    <div class="form-group">
                        <small id="emailHelp" class="form-text text-muted">Click subscribe button to
                            alert you every
                            time new blog is upload.</small>
                    </div>
                    @auth
                    @if (!auth()->user()->isSubscribe)
                    <button type="submit" class="btn btn-primary my-3">
                        Subscribe
                    </button>
                    @else
                    <button type="submit" class="btn btn-danger my-3">
                        UnSubscribe
                    </button>
                    @endif
                    @endauth

                    @guest
                    <p class="my-3">Please <a href="/login">login</a> to subscribe</p>
                    @endguest
                </form>
            </div>
        </div>
    </div>
</div>




<!-- ------------subscribe-form-end------------- -->