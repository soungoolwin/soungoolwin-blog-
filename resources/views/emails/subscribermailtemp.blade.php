@component('mail::message',['url' => $blog['image']])

<h2>{{$blog['title']}}</h2>
{{$blog['intro']}}

@component('mail::button', ['url' => $blog['btn_url'])
Read More
@endcomponent

Thanks,<br>
Soung Oo Lwin
@endcomponent