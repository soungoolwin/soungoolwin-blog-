<x-dashboard-layout>
    <div class="container tosepeartewithnav">
        <div class="row col-md-6 offset-md-3">
            <form action='/edituser/{{$user->username}}' method='POST'>
                @csrf
                <div class="form-group">
                    <label for="exampleName">Name</label>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control" id="exampleName"
                        aria-describedby="emailHelp" placeholder="Name">
                </div>
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleUsername">Username</label>
                    <input type="text" name="username" value="{{$user->username}}" class="form-control"
                        id="exampleUsername" placeholder="Username">
                </div>
                @error('username')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleEmail">Email</label>
                    <input type="text" name="email" value="{{$user->email}}" class="form-control" id="exampleEmail"
                        placeholder="Email">
                </div>
                @error('email')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror

                <div class="form-group">
                    <select name="verify" id="" class="form-control">
                        <option value="1">Verify</option>
                        <option selected value="0">Unverify</option>
                    </select>
                </div>
                @error('verify')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</x-dashboard-layout>