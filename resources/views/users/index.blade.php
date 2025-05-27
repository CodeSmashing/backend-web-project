@php
	use App\Models\User;
	use App\Models\Thread;
	$threads = Thread::all();
@endphp

<x-app-layout>
	<x-slot name="header">
		<h2>{{ __('Users') }}</h2>
	</x-slot>

	<section>
		@foreach ($users as $user)
			<p>{{ $user->display_name }}</p>
		@endforeach
	</section>

	<x-slot name="footer"></x-slot>
</x-app-layout>
