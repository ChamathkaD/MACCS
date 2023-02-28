@component('mail::message')
# Hi {{ $user->first_name }},
# Your account is live now.

Your account has been created successfully.

Email : {{ $user->email }}
<br>
Password : {{ $password }}

You can now log in to use your account using the following link.

@component('mail::button', ['url' => $url, 'color' => 'success'])
Login
@endcomponent

<a href="{{ $url }}">{{ $url }}</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
