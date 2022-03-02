<x-dashboard-layout>
    <div class="container tosepeartewithnav">
        <div class="row col-md-6 offset-md-3">
            <form action='/editcategory/{{$category->slug}}' method='POST'>
                @csrf
                <div class="form-group">
                    <label for="exampleName">Category Name</label>
                    <input type="text" name="name" value="{{$category->name}}" class="form-control" id="exampleName"
                        aria-describedby="emailHelp" placeholder="Enter Category Name">
                </div>
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleCategorySlug">Slug</label>
                    <input type="text" name="slug" value="{{$category->slug}}" class="form-control"
                        id="exampleCategorySlug" placeholder="Slug">
                </div>
                @error('slug')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</x-dashboard-layout>