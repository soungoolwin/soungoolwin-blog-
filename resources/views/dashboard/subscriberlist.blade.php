<x-dashboard-layout>

    <div class="container tosepeartewithnav">
        <div class="row col-md-6 offset-md-3">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Email</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subscribers as $subscriber)
                    <tr>
                        <td>{{$subscriber->email}}</td>
                        <td>
                            <form action="/deletesubscriber/{{$subscriber->id}}" method="POST">
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