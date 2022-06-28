@component('mail::message')

{{$mailData['reminder']}}
<p>{{__('Domain Name:')}} {{$mailData['domain_name']}}</p>
<p>{{__('Registration Date:')}} {{$mailData['registration_date']}}</p>
<p>{{__('Expire Date:')}} {{$mailData['expire_date']}}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/admin/domain'])
{{__('See Details')}}
@endcomponent

{{__('Thanks,')}}<br>
{{ config('app.name') }}
@endcomponent
