<x-dashboard-layout>
    <div class="container tosepeartewithnav">
        <div class="row my-5">
            <div class="col-md-6 offset-md-3 card p-5">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{old('title')}}">
                    </div>
                    @error('title')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror


                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" value="{{old('slug')}}">
                    </div>
                    @error('slug')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="text" name="image" class="form-control" value="{{old('image')}}">
                    </div>
                    @error('image')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <div class="mb-3">
                        <label class="form-label">Body</label>
                        <textarea name="body" id="editor" class="form-control" value="{{old('body')}}"></textarea>
                    </div>
                    @error('body')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror


                    <select name="language" id="" class="form-control my-3">

                        <option value="Myanmar">Myanmar</option>
                        <option value="English">English</option>

                    </select>



                    <select name="category_id" id="" class="form-control">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary my-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-dashboard-layout>