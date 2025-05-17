<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Backend Web Project') }}</title>

	@vite(['resources/css/app.css', 'resources/js/app.js'])
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
	<nav>
		<a href="{{ route('stylesheet') }}">Stylesheet</a>
		<a href="{{ route('contact') }}">Contact</a>
		<a href="{{ route('help') }}">FAQ</a>
		<a href="{{ route('discussion') }}">Discussion</a>
	</nav>

	<header>
		<h2>Hello Header!</h2>
	</header>

	<main>
		{{ $slot }}
	</main>

	<footer>
		<p>&copy; {{ date('Y') }} Mijn Website. Alle rechten voorbehouden.</p>
	</footer>
</body>

@stack('scripts')

</html>
