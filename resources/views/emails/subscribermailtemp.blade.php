@component('mail::message',['url' => $image])

<h2>{{$blog['title']}}</h2>
{{$blog['intro']}}

@component('mail::button', ['url' => 'www.google.com'])
Read More
@endcomponent

Thanks,<br>
Soung Oo Lwin
@endcomponent