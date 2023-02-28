@component('mail::message')
# Appointment Scheduled

<h4>{{ \Carbon\Carbon::parse($date)->toFormattedDateString() . " " . \Carbon\Carbon::parse($time)->format('h:i A') }}</h4>

<h3>{{ $venue }}</h3>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
