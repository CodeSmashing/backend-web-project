<x-app-layout>
	<section class="centered">
		<form method="POST" role="register" action="{{ route('register') }}">
			@csrf

			<!-- Name -->
			<div class="grid-item-1">
				<x-input-label for="name" :value="__('Name')" />
				<x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
				<x-input-error :messages="$errors->get('name')" class="mt-2" />
			</div>

			<!-- Email Address -->
			<div class="grid-item-2">
				<x-input-label for="email" :value="__('Email')" />
				<x-text-input id="email" type="email" name="email" :value="old('email')" required
					autocomplete="username" />
				<x-input-error :messages="$errors->get('email')" />
			</div>

			<!-- Password -->
			<div class="grid-item-3">
				<x-input-label for="password" :value="__('Password')" />
				<x-text-input id="password"
					type="password"
					name="password"
					required autocomplete="new-password" />
				<x-input-error :messages="$errors->get('password')" />
			</div>

			<!-- Confirm Password -->
			<div class="grid-item-4">
				<x-input-label for="password_confirmation" :value="__('Confirm Password')" />
				<x-text-input id="password_confirmation"
					type="password"
					name="password_confirmation" required autocomplete="new-password" />
				<x-input-error :messages="$errors->get('password_confirmation')" />
			</div>

			<div class="grid-item-5">
				<a
					href="{{ route('login') }}">
					{{ __('Already registered?') }}
				</a>

				<x-primary-button>
					{{ __('Register') }}
				</x-primary-button>
			</div>
		</form>
	</section>
</x-app-layout>
