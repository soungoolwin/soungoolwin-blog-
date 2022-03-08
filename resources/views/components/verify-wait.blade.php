<x-layout>
    <div class="container">
        <div class="row verify-wait">
            <div class="col-md-6 offset-md-3 card p-5">
                <form action="/verify-email" method="POST" class="text-center">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input name='code' type="password" class="form-control" id="inputPassword"
                                placeholder="Verification Code">
                            <input type="hidden" name="originalcode" value="{{$code}}">
                            @foreach ($users as $key=>$value)
                            <input type="hidden" name="{{$key}}" value="{{$value}}">
                            @endforeach

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>