@component('mail::message')
# Dear - {{ $user_name_for_mail }}

@component('mail::panel')
Your Password is changed.
@endcomponent

@component('mail::button', ['url' => 'jiku'])
Click your link
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
