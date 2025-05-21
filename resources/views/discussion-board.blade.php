@php
	use App\Models\User;
@endphp

<x-app-layout>
	<x-slot name="header">
		<h2>{{ __('Discussion') }}</h2>
	</x-slot>

	<section>
		<p>Hello From Discussion Board!</p>
		@php
			$users = User::all();
		@endphp
		@foreach ($users as $user)
			<p>{{ $user->display_name }}</p>
		@endforeach
	</section>

	<x-slot name="footer"></x-slot>
</x-app-layout>
