@php
	use App\Models\Enums\UserRoleEnum;
@endphp

<x-app-layout>
	<section class="centered">
		<form method="POST" role="register" action="{{ route('register') }}">
			@csrf

			<!-- Display name -->
			<div class="grid-item-1">
				<x-input-label for="display_name" :value="__('Display Name')" />
				<x-text-input id="display_name" type="text" name="display_name" :value="old('display_name')" autofocus
					autocomplete="username" />
				<x-input-error :messages="$errors->get('display_name')" />
			</div>

			<!-- Name -->
			<div class="grid-item-2">
				<x-input-label for="name" :value="__('Name')" :isRequired="true" />
				<x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus
					autocomplete="name" />
				<x-input-error :messages="$errors->get('name')" />
			</div>

			<!-- Email Address -->
			<div class="grid-item-3">
				<x-input-label for="email" :value="__('Email')" :isRequired="true" />
				<x-text-input id="email" type="email" name="email" :value="old('email')" required
					autocomplete="email" />
				<x-input-error :messages="$errors->get('email')" />
			</div>

			<!-- Role -->
			<div class="grid-item-4">
				<x-input-label for="role" :value="__('Role')" />
				<select id="role" name="role">
					<option value="" selected>-- Select a role --</option>
					@foreach (UserRoleEnum::cases() as $role)
						<option value="{{ $role->value }}">{{ __(ucfirst($role->value)) }}</option>
					@endforeach
				</select>
				<x-input-error :messages="$errors->get('role')" />
			</div>

			<!-- Password -->
			<div class="grid-item-5">
				<x-input-label for="password" :value="__('Password')" :isRequired="true" />
				<x-text-input id="password"
					type="password"
					name="password"
					required autocomplete="new-password" />
				<x-input-error :messages="$errors->get('password')" />
			</div>

			<!-- Confirm Password -->
			<div class="grid-item-6">
				<x-input-label for="password_confirmation" :value="__('Confirm Password')" :isRequired="true" />
				<x-text-input id="password_confirmation"
					type="password"
					name="password_confirmation" required autocomplete="new-password" />
				<x-input-error :messages="$errors->get('password_confirmation')" />
			</div>

			<div class="grid-item-7">
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
