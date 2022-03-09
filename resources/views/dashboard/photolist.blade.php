<x-dashboard-layout>

    <div class="container tosepeartewithnav">
        <div class="row col-md-6 offset-md-3">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($photos as $photo)
                    <tr>
                        <td>{{$photo->name}}</td>
                        <td>
                            <form action="/editphoto/{{$photo->id}}">
                                @csrf
                                <button class="btn btn-link"><i class="fa-solid fa-pen-to-square"></i></button>
                            </form>
                            <form action="/deletephoto/{{$photo->id}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link"><i
                                        class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        <div class="row col-md-6 offset-md-3">
            <form class="my-5" action="/photo/publish" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleName">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleName" aria-describedby="emailHelp"
                        placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="examplePhotoSource">Source</label>
                    <input type="text" name="source" class="form-control" id="examplePhotoSource" placeholder="Source">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</x-dashboard-layout>