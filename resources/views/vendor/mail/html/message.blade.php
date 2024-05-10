@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{-- {{ config('app.name') }} --}}
{{-- <img src="{{asset('storage/logo/logo.jpg')}}" style="height: 75px;width: 75px;"> --}}

<img src="http://mcil2.mcilintl.ltd/img/site/email_mcil_logo.png" alt="logo" class="logo" style="width:100px;" />

@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
