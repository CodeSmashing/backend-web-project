@props(['href', 'dataTarget' => ''])

@php
	$classes = $dataTarget && request()->routeIs($dataTarget) ? 'current' : '';
@endphp

<a class="{{ $classes }}" href="{{ $href }}">{{ $slot }}</a>
