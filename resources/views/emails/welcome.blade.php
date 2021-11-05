@component('mail::message')
Hello {{$data['firstname']}} {{$data['lastname']}}

Please click the button to verify your email.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/email/verify/'.$data['id']])
Verify Now!!!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
