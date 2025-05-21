@props(['href', 'target' => ''])

@php
	$classes = $target && request()->routeIs($target) ? 'current' : '';
@endphp

<a class="{{ $classes }}" href="{{ $href }}">{{ $slot }}</a>
