<div>
    <x-layout>
        <div class="container blog-section tosepeartewithnav">
            <h3 class="text-center">Blogs</h3>
            <input type="text" wire:model='search' class="form-control" placeholder="Search"
                aria-describedby="passwordHelpBlock" id="search" />
            <div class="text-center my-3">
                <a href="/mblogs"
                    class="text-decoration-none text-secondary p-3 {{Request::is('mblogs') ? 'navbaractive' : ''}}">Myanmar</a>
                <a href="/eblogs"
                    class="text-decoration-none text-secondary {{Request::is('eblogs') ? 'navbaractive' : ''}}">English</a>
            </div>
            <x-category-dropdown :search="$searchforCategoryDropDown" :bloglanguage='$bloglanguage' />
            {{-- get these two variables from Myanblogs (livewire) model and will pass these to CategoryDropdown.php. We
            can't share directly cus we make this component with artisan command--}}

            <div class="row my-5">
                @forelse ($blogs as $blog)
                <div class="col-md-4">
                    <a href="/{{$bloglanguage==='myanmar'?'mblogs':'eblogs'}}/{{$blog->slug}}"
                        class="text-decoration-none">
                        <img src="{{$blog->image}}" class="img-fluid mx-auto d-block"
                            style="max-height: 8rem; object-fit: contain; min-height: 8rem" alt="..." />

                        <p class="text-center text-secondary publish-date my-3">Publish Date :
                            {{$blog->created_at->diffForHumans()}} | #{{$blog->category->name}}
                        </p>
                        <h4 class="text-center my-1">{{$blog->title}}</h4>
                    </a>
                    <p class="my-3">
                        {!!$blog->intro!!}
                    </p>
                </div>
                @empty
                <p class="text-center">No Blogs found</p>
                @endforelse
                {{$blogs->links()}}
            </div>
        </div>

        <x-subscribeForm />

    </x-layout>
</div>

<script>
    document.getElementById('search').onkeyup = function(event){
        if(this.value.length === 0){
            document.location.reload();
        }
    }
</script>
{{-- this script is for realtime search feature. I use realtime search with livewire and use this script for reload when
user is delete input and input is empty --}}