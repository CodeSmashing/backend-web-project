<section class="centered">
	<header>
		<h2>
			{{ __('Update Password') }}
		</h2>

		<h6>
			{{ __('Ensure your account is using a long, random password to stay secure.') }}
		</h6>
	</header>

	<form method="post" role="password-update" action="{{ route('password.update') }}">
		@csrf
		@method('put')

		<div class="grid-item-1">
			<x-input-label for="update_password_current_password" :value="__('Current Password')" />
			<x-text-input id="update_password_current_password" name="current_password" type="password"
				autocomplete="current-password" />
			<x-input-error :messages="$errors->updatePassword->get('current_password')" />
		</div>

		<div class="grid-item-2">
			<x-input-label for="update_password_password" :value="__('New Password')" />
			<x-text-input id="update_password_password" name="password" type="password" autocomplete="new-password" />
			<x-input-error :messages="$errors->updatePassword->get('password')" />
		</div>

		<div class="grid-item-3">
			<x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
			<x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
				autocomplete="new-password" />
			<x-input-error :messages="$errors->updatePassword->get('password_confirmation')" />
		</div>

		<div class="grid-item-4">
			<x-primary-button>{{ __('Save') }}</x-primary-button>

			@if (session('status') === 'password-updated')
				<p
					x-data="{ show: true }"
					x-show="show"
					x-transition
					x-init="setTimeout(() => show = false, 2000)">{{ __('Saved.') }}</p>
			@endif
		</div>
	</form>
</section>
