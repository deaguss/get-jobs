@component('mail::message')
# Reset Password

Click the button below to reset your password. This link will expire in 10 minutes.

@component('mail::button', ['url' => $resetLink])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent