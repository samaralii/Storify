@component('mail::message')
# New Story has been added

Name of the story {{ $title }}.

@component('mail::button', ['url' => route('dashboard.index')])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
