<x-app-layout>
	<!-- Session Status -->
	<x-auth-session-status :status="session('status')" />

	<section class="centered">
		<form method="POST" role="login" action="{{ route('login') }}">
			@csrf

			<!-- Email Address -->
			<div class="grid-item-1">
				<x-input-label for="email" :value="__('Email')" />
				<x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
					autocomplete="email" />
				<x-input-error :messages="$errors->get('email')" />
			</div>

			<!-- Password -->
			<div class="grid-item-2">
				<x-input-label for="password" :value="__('Password')" />

				<x-text-input id="password"
					type="password"
					name="password"
					required autocomplete="current-password" />

				<x-input-error :messages="$errors->get('password')" />
			</div>

			<!-- Remember Me -->
			<div class="grid-item-3">
				<label for="remember_me">
					<input id="remember_me" type="checkbox" name="remember">
					<span>{{ __('Remember me') }}</span>
				</label>
			</div>

			<div class="grid-item-4">
				@if (Route::has('password.request'))
					<a href="{{ route('password.request') }}">
						{{ __('Forgot your password?') }}
					</a>
				@endif

				<x-primary-button>
					{{ __('Log in') }}
				</x-primary-button>
			</div>
		</form>
	</section>
</x-app-layout>
