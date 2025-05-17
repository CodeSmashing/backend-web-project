<x-app-layout>
	<x-slot name="header">
		<h2>{{ __('Dashboard') }}</h2>
	</x-slot>

	<section>
		<p>{{ __("You're logged in!") }}</p>
	</section>

	<x-slot name="footer"></x-slot>
</x-app-layout>
