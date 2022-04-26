@php
    $down_fill = 'lightgray';
    $up_fill = 'lightgray';
    $attribute = $attribute ?? '';
    $label = $label ?? '';
    if(request()->query('sort') == $attribute) {
        $up_fill = 'black';
    }
    if(request()->query('sort') == '-'.$attribute) {
        $down_fill = 'black';
    }
@endphp
@if (request()->query('sort') == $attribute)
    <a href="{{request()->fullUrlWithQuery(['sort' => '-'.$attribute])}}" class="no-underline hover:underline text-cyan-600 dark:text-cyan-400">{{ __($label) }}</a>
@else
    <a href="{{request()->fullUrlWithQuery(['sort' => $attribute])}}" class="no-underline hover:underline text-cyan-600 dark:text-cyan-400">{{ __($label) }}</a>
@endif
<svg class="inline-block" xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 15 15" fill="none">
    <path d="M7.5 3L15 11H0L7.5 3Z" fill="{{$up_fill}}"/>
</svg>
<svg class="inline-block" xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 15 15" fill="none">
    <path d="M7.49988 12L-0.00012207 4L14.9999 4L7.49988 12Z" fill="{{$down_fill}}"/>
</svg>