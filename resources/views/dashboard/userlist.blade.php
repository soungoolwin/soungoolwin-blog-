<x-dashboard-layout>

    <div class="container tosepeartewithnav">
        <div class="row col-md-6 offset-md-3">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Verify</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{{$user->email}}}</td>
                        <td>{{$user->isVarify}}</td>
                        <td>
                            <form action="/edituser/{{$user->username}}">
                                @csrf
                                <button class="btn btn-link"><i class="fa-solid fa-pen-to-square"></i></button>
                            </form>
                            <form action="/deleteuser/{{$user->username}}" method="POST">
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
</x-dashboard-layout>