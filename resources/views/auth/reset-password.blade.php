<x-app-layout>
	<section class="centered">
		<form method="POST" action="{{ route('password.store') }}">
			@csrf

			<!-- Password Reset Token -->
			<input type="hidden" name="token" value="{{ $request->route('token') }}">

			<!-- Email Address -->
			<div>
				<x-input-label for="email" :value="__('Email')" />
				<x-text-input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus
					autocomplete="email" />
				<x-input-error :messages="$errors->get('email')" />
			</div>

			<!-- Password -->
			<div>
				<x-input-label for="password" :value="__('Password')" />
				<x-text-input id="password" type="password" name="password" required
					autocomplete="new-password" />
				<x-input-error :messages="$errors->get('password')" />
			</div>

			<!-- Confirm Password -->
			<div>
				<x-input-label for="password_confirmation" :value="__('Confirm Password')" />

				<x-text-input id="password_confirmation"
					type="password"
					name="password_confirmation" required autocomplete="new-password" />

				<x-input-error :messages="$errors->get('password_confirmation')" />
			</div>

			<div>
				<x-primary-button>
					{{ __('Reset Password') }}
				</x-primary-button>
			</div>
		</form>
	</section>
</x-app-layout>
