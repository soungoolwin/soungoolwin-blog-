<x-layout>

    <x-landing />
    <x-about />
    <x-photo-section />
    <!--I send require photos from PhotoSection.php-->
    <x-blog-section :randomBlogs="$blogs" />
    <x-subscribeForm />

</x-layout>