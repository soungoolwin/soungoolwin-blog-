<div class="dropdown text-center">
    <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
        data-bs-toggle="dropdown" aria-expanded="false">
        {{isset($currentCategory) ? $currentCategory->name : 'Filtered By Category'}}
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="/{{$bloglanguage==='myanmar'? 'mblogs' : 'eblogs'}}">All</a>
        </li>
        @foreach ($categories as $category)

        <li><a class="dropdown-item"
                href="/{{$bloglanguage==='myanmar' ? 'mblogs' : 'eblogs'}}/?category={{$category->name}}{{$searchValue ? '&search='.$searchValue : ''}}{{request('search') ? '&search=' . request('search') : ''}}">{{$category->name}}</a>
        </li>

        @endforeach
    </ul>
</div>