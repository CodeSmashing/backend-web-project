@php
	use App\Models\Enums\UserRoleEnum;
@endphp

<section class="centered">
	<header>
		<h2>
			{{ __('Profile Information') }}
		</h2>

		<h6>
			{{ __("Update your account's profile information and email address.") }}
		</h6>
	</header>

	<form id="send-verification" method="post" role="send-verification" action="{{ route('verification.send') }}">
		@csrf
	</form>

	<form
		method="post"
		role="profile-update"
		action="{{ route('profile.update') }}"
		enctype="multipart/form-data">
		@csrf
		@method('patch')

		<!-- Profile avatar -->
		<div class="grid-item-1">
			<x-input-label
				class="grid-item-1"
				for="avatar"
				:value="__('Avatar')" />
			<x-text-input
				class="grid-item-2"
				id="avatar"
				name="avatar"
				type="file"
				:value="old('avatar', $user->avatar)"
				disabled
				autofocus
				autocomplete="avatar" />
			<x-input-error
				class="grid-item-2"
				:messages="$errors->get('avatar')" />

			<!-- Alter -->
			<x-input-label
				class="grid-item-3 alter-field button-style" for="toggle-field-avatar"
				:value="__('Alter')" />
			<input
				class="visually-hidden"
				type="checkbox"
				name="toggle-field-avatar"
				id="toggle-field-avatar">
		</div>

		<!-- Display name -->
		<div class="grid-item-2">
			<x-input-label
				class="grid-item-1"
				for="display_name"
				:value="__('Display name')" />
			<x-text-input
				class="grid-item-2"
				id="display_name"
				name="display_name"
				type="text"
				:value="old('display_name', $user->display_name)" disabled
				autofocus
				autocomplete="username" />
			<x-input-error
				class="grid-item-2"
				:messages="$errors->get('display_name')" />

			<!-- Alter -->
			<x-input-label
				class="grid-item-3 alter-field button-style" for="toggle-field-display_name"
				:value="__('Alter')" />
			<input
				class="visually-hidden"
				type="checkbox"
				name="toggle-field-display_name"
				id="toggle-field-display_name">
		</div>

		<!-- Name -->
		<div class="grid-item-3">
			<x-input-label
				class="grid-item-1"
				for="name"
				:value="__('Name')" />
			<x-text-input
				class="grid-item-2"
				id="name"
				name="name"
				type="text"
				:value="old('name', $user->name)"
				autofocus
				disabled
				autocomplete="name" />
			<x-input-error
				class="grid-item-2"
				:messages="$errors->get('name')" />

			<!-- Alter -->
			<x-input-label
				class="grid-item-3 alter-field button-style"
				for="toggle-field-name"
				:value="__('Alter')" />
			<input
				class="visually-hidden"
				type="checkbox"
				name="toggle-field-name"
				id="toggle-field-name">
		</div>

		<!-- About -->
		<div class="grid-item-4">
			<x-input-label
				class="grid-item-1"
				for="about_me"
				:value="__('About me')" />
			<x-text-input
				class="grid-item-2"
				id="about_me"
				name="about_me"
				type="text"
				:value="old('about_me', $user->about_me)"
				autofocus
				disabled
				autocomplete="about_me" />
			<x-input-error
				class="grid-item-2"
				:messages="$errors->get('about_me')" />

			<!-- Alter -->
			<x-input-label
				class="grid-item-3 alter-field button-style"
				for="toggle-field-about_me"
				:value="__('Alter')" />
			<input
				class="visually-hidden"
				type="checkbox"
				name="toggle-field-about_me"
				id="toggle-field-about_me">
		</div>

		<!-- Birthday -->
		<div class="grid-item-5">
			<x-input-label
				class="grid-item-1"
				for="birthday"
				:value="__('Birthday')" />
			<x-text-input
				class="grid-item-2"
				id="birthday"
				name="birthday"
				type="text"
				:value="old('birthday', $user->birthday)"
				autofocus
				disabled
				autocomplete="birthday" />
			<x-input-error
				class="grid-item-2"
				:messages="$errors->get('birthday')" />

			<!-- Alter -->
			<x-input-label
				class="grid-item-3 alter-field button-style"
				for="toggle-field-birthday"
				:value="__('Alter')" />
			<input
				class="visually-hidden"
				type="checkbox"
				name="toggle-field-birthday"
				id="toggle-field-birthday">
		</div>

		<!-- Role -->
		<div class="grid-item-6">
			<x-input-label
				class="grid-item-1"
				for="role"
				:value="__('Role')" />
			<select
				class="grid-item-2"
				id="role"
				name="role"
				disabled>
				<option value="" selected>-- Select a role --</option>
				@foreach (UserRoleEnum::cases() as $role)
					<option value="{{ $role->value }}">{{ __(ucfirst($role->value)) }}</option>
				@endforeach
			</select>
			<x-input-error
				class="grid-item-2"
				:messages="$errors->get('role')" />

			<!-- Alter -->
			<x-input-label
				class="grid-item-3 alter-field button-style"
				for="toggle-field-role"
				:value="__('Alter')" />
			<input
				class="visually-hidden"
				type="checkbox"
				name="toggle-field-role"
				id="toggle-field-role">
		</div>

		<!-- Email -->
		<div class="grid-item-7">
			<x-input-label
				class="grid-item-1"
				for="email"
				:value="__('Email')" />
			<x-text-input
				class="grid-item-2"
				id="email"
				name="email"
				type="email"
				:value="old('email', $user->email)"
				disabled
				autocomplete="email" />
			<x-input-error
				class="grid-item-2"
				:messages="$errors->get('email')" />

			@if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
				<div>
					<p>
						{{ __('Your email address is unverified.') }}

						<button form="send-verification">
							{{ __('Click here to re-send the verification email.') }}
						</button>
					</p>

					@if (session('status') === 'verification-link-sent')
						<p>
							{{ __('A new verification link has been sent to your email address.') }}
						</p>
					@endif
				</div>
			@endif

			<!-- Alter -->
			<x-input-label
				class="grid-item-3 alter-field button-style"
				for="toggle-field-email"
				:value="__('Alter')" />
			<input
				class="visually-hidden"
				type="checkbox"
				name="toggle-field-email"
				id="toggle-field-email">
		</div>

		<!-- Submit -->
		<div class="grid-item-8">
			<x-primary-button>{{ __('Save') }}</x-primary-button>

			@if (session('status') === 'profile-updated')
				<p
					x-data="{ show: true }"
					x-show="show"
					x-transition
					x-init="setTimeout(() => show = false, 2000)">{{ __('Saved.') }}</p>
			@endif
		</div>
	</form>
</section>

@push('scripts')
	<script type="module" src="{{ asset('js/toggle-alter-manager.js') }}"></script>
@endpush
