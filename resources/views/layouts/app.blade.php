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
	<!-- Page Navigation -->
	@include('layouts.navigation')

	@isset($header)
		<!-- Page Heading -->
		<header>
			{{ $header }}
		</header>
	@endisset

	<!-- Page Content -->
	<main>
		{{ $slot }}
	</main>

	@isset($footer)
		<!-- Page Footer -->
		<footer>
			<p>&copy; {{ date('Y') }} Mijn Website. Alle rechten voorbehouden.</p>
		</footer>
	@endisset
</body>

@stack('scripts')

</html>
