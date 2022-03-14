<x-dashboard-layout>

    <div class="container tosepeartewithnav">
        <div class="row col-md-6 offset-md-3">
            @foreach ($blogs as $blog)
            <div class="card">
                <div class="d-flex justify-content-between">
                    <div class="card-body">
                        {{$blog->title}}
                    </div>
                    <div class="my-auto">
                        <form action="/editeblog/{{$blog->slug}}">
                            @csrf
                            <button class="btn btn-link"><i class="fa-solid fa-pen-to-square"></i></button>
                        </form>
                        <form action="/deleteeblog/{{$blog->slug}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link"><i class="fa-solid fa-trash-can"></i></button>
                        </form>


                    </div>
                </div>
            </div>
            @endforeach
            {{ $blogs->links() }}
        </div>
    </div>
</x-dashboard-layout>