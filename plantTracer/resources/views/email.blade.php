@component('mail::message')

You are receiving this email because you have requested to reset your password.
If you did not request a password reset, then please disregard this message. 

@component('mail::button', ['url' => 'http://planttracer.test/passwordreset'])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent