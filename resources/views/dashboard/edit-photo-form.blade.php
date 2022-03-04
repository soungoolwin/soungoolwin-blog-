<x-dashboard-layout>
    <div class="container tosepeartewithnav">
        <div class="row col-md-6 offset-md-3">
            <form action='/editphoto/{{$photo->id}}' method='POST'>
                @csrf
                <div class="form-group">
                    <label for="exampleName">Name</label>
                    <input type="text" name="name" value="{{$photo->name}}" class="form-control" id="exampleName"
                        aria-describedby="emailHelp" placeholder="Name">
                </div>
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label for="examplePhotoSource">Source</label>
                    <input type="text" name="source" value="{{$photo->source}}" class="form-control"
                        id="examplePhotoSource" placeholder="Source">
                </div>
                @error('resource')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</x-dashboard-layout>