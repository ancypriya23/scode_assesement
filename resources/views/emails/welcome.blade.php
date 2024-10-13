@component('mail::message')
# Welcome, {{ $userName }}

Thank you for registering on our platform!

@component('mail::button', ['url' => 'https://yourapp.com'])
Visit our site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
