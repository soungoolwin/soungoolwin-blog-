<x-dashboard-layout>

    <div class="container tosepeartewithnav">
        <div class="row col-md-6 offset-md-3">
            @foreach ($categories as $category)
            <div class="card">
                <div class="d-flex justify-content-between">
                    <div class="card-body">
                        {{$category->name}}
                    </div>
                    <div class="my-auto">
                        <form action="/editcategory/{{$category->slug}}">
                            @csrf
                            <button class="btn btn-link"><i class="fa-solid fa-pen-to-square"></i></button>
                        </form>
                        <form action="/deletecategory/{{$category->slug}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link"><i class="fa-solid fa-trash-can"></i></button>
                        </form>


                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    <div class="container">
        <div class="row col-md-6 offset-md-3">
            <form action='/category/publish' method='POST'>
                @csrf
                <div class="form-group">
                    <label for="exampleName">Category Name</label>
                    <input type="text" name="name" class="form-control" id="exampleName" aria-describedby="emailHelp"
                        placeholder="Enter Category Name">
                </div>
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleCategorySlug">Slug</label>
                    <input type="text" name="slug" class="form-control" id="exampleCategorySlug" placeholder="Slug">
                </div>
                @error('slug')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</x-dashboard-layout>