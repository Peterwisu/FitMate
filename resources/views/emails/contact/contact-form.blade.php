@component('mail::message')
# Thanks you for you messsage

<strong> Name</strong> {{$data['name']}}<br>
<strong> Email</strong> {{$data['email']}}<br>
<strong> Message</strong> {{$data['message']}}<br>
<strong> Phone</strong>{{$data['phone']}}<br>
{{$data['message']}}
@component('mail::button', ['url' => 'https://fitmate-application.herokuapp.com/'])
Go to Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

