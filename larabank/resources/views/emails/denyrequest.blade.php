<!-- The format of the email when a request for an item has been disapproved. -->
@component('mail::message')
# Item Request

# Item ID: {{ $itemid }}


Thank you for your request of the a item. Unfortunately at this time your request has been denied. 

Thanks,<br>
{{ config('app.name') }}
@endcomponent
