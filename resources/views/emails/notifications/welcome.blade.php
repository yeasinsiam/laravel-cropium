@component('mail::message')
# Welcome to {{ config('app.name') }}

Visit our site to explore more!

@component('mail::button', ['url' => $site_url])
    Visit Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
