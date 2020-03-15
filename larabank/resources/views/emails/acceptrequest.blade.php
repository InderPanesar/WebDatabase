@component('mail::message')
# Item Request
# Item ID: {{ $itemid }}

Congratulations, at this time your request for an item has been approved.  

Thanks,<br>
{{ config('app.name') }}
@endcomponent
