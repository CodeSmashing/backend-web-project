<x-app-layout>
	<!-- Session Status -->
	<x-auth-session-status :status="session('status')" />

	<section class="centered">
		<p>
			{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
		</p>

		<form method="POST" role="reset-password" action="{{ route('password.email') }}">
			@csrf

			<!-- Email Address -->
			<div class="grid-item-1">
				<x-input-label for="email" :value="__('Email')" />
				<x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus />
				<x-input-error :messages="$errors->get('email')" />
			</div>

			<div class="grid-item-2">
				<x-primary-button>
					{{ __('Email Password Reset Link') }}
				</x-primary-button>
			</div>
		</form>
	</section>
</x-app-layout>
