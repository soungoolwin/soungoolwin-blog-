<x-dashboard-layout>
    <div class="container tosepeartewithnav">
        <div class="row col-md-6 offset-md-3">
            <form action='/editvideo/{{$video->id}}' method='POST'>
                @csrf
                <div class="form-group">
                    <label for="exampleName">Name</label>
                    <input type="text" name="name" value="{{$video->name}}" class="form-control" id="exampleName"
                        aria-describedby="emailHelp" placeholder="Name">
                </div>
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleVideoSource">Source</label>
                    <input type="text" name="source" value="{{$video->source}}" class="form-control"
                        id="exampleVideoSource" placeholder="Source">
                </div>
                @error('resource')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>



</x-dashboard-layout>