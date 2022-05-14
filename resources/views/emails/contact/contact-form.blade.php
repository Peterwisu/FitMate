@component('mail::message')
# Thanks you for you messsage

<strong> Name</strong> {{$data['name']}}<br>
<strong> Email</strong> {{$data['email']}}<br>
<strong> Message</strong> <br>
{{$data['message']}}
@component('mail::button', ['url' => ''])
Go to Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

