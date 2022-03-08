<x-layout>
    @if (session('message'))
    <div class="alert alert-success text-center flashmessage">{{session('message')}}</div>
    @endif
    @if (session('errmessage'))
    <div class="alert alert-danger text-center flashmessage">{{session('errmessage')}}</div>
    @endif
    <x-landing />
    <x-about />
    <x-photo-section />
    <!--I send require photos from PhotoSection.php-->
    <x-random-blog-section :randomBlogs="$blogs" />
    <x-subscribeForm />

</x-layout>