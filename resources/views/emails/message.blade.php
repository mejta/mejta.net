@component('mail::message')
# New message from mejta.net

Date: {{ $message->created_at }}

## Message
{{ $message->message }}

## From
Name: {{ $message->name }}<br>
Email: {{ $message->email }}<br>
Phone: {{ $message->phone }}<br>

## Budget
{{ $message->budget }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
