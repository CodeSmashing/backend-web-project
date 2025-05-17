<x-app-layout>
	<x-slot name="header">
		<h2>
			{{ __('Profile') }}
		</h2>
	</x-slot>

	@include('profile.partials.update-profile-information-form')

	@include('profile.partials.update-password-form')

	@include('profile.partials.delete-user-form')

	<x-slot name="footer"></x-slot>
</x-app-layout>
