<tr>
<td class="header">
<a href="{{ $url }}" id="headerLink">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
@php
    $logo_path = asset('storage/adminfiles/'.$logo_file);
@endphp
<img src="{{$logo_path}}" width="230px" alt="{{config('app.name')}}-logo">
<br/>
<span id="slot1">{{ $slot }}</span>
@endif
</a>
</td>
</tr>
