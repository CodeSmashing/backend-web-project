<x-app-layout>
	<x-slot name="header">
		<h2>
			{{ __('Profile') }}
		</h2>
		<img class="avatar avatar-medium" src="{{ Storage::url(Auth::user()->avatar ?? '/avatars/default-avatar.png') }}"
			alt="Avatar">
	</x-slot>

	@include('profile.partials.update-profile-information-form')

	@include('profile.partials.update-password-form')

	@include('profile.partials.delete-user-form')

	<x-slot name="footer"></x-slot>
</x-app-layout>
