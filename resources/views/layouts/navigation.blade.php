<nav aria-label="Main Navigation" x-data="{ open: false }">
	<!-- Logo -->
	{{-- <div>
		<a href="{{ route('dashboard') }}">
			<!-- Here would be a logo which refers to the dashboard -->
		</a>
	</div> --}}

	<!-- Navigation Links -->
	<ul>
		<li>
			<x-nav-link :href="route('home')" :target="'home'">
				{{ __('Home') }}
			</x-nav-link>
		</li>
		<li>
			<x-nav-link :href="route('stylesheet')" :target="'stylesheet'">
				{{ __('Stylesheet') }}
			</x-nav-link>
		</li>
		<li>
			<x-nav-link :href="route('contact')" :target="'contact'">
				{{ __('Get in contact') }}
			</x-nav-link>
		</li>
		<li>
			<x-nav-link :href="route('help')" :target="'help'">
				{{ __('FAQ') }}
			</x-nav-link>
		</li>
		<li>
			<x-nav-link :href="route('discussion')" :target="'discussion'">
				{{ __('Discussion') }}
			</x-nav-link>
		</li>

		@if (Route::has('login'))
			@auth
				<li>
					<x-nav-link :href="route('dashboard')" :target="'dashboard'">
						{{ __('Dashboard') }}
					</x-nav-link>
				</li>
			@else
				<li>
					<x-nav-link :href="route('login')" :target="'login'">
						{{ __('Log in') }}
					</x-nav-link>
				</li>

				@if (Route::has('register'))
					<li>
						<x-nav-link :href="route('register')" :target="'register'">
							{{ __('Register') }}
						</x-nav-link>
					</li>
				@endif
			@endauth
		@endif

		@if (Auth::user())
			<!-- Settings Dropdown -->
			<li class="dropdown">
				<button
					type="button"
					class="dropdown__title"
					aria-expanded="false"
					aria-controls="settings-dropdown">
					<img
						class="avatar avatar-small"
						src="{{ Storage::url(Auth::user()->avatar ?? '/avatars/default-avatar.png') }}"
						alt="Avatar">
					<span>{{ Auth::user()->display_name }}</span>
				</button>

				<ul id="settings-dropdown" class="dropdown__menu">
					<li>
						<x-nav-link
							:href="route('profile.edit')"
							:target="'profile.edit'">
							{{ __('Profile') }}
						</x-nav-link>
					</li>
					<li>
						<!-- Authentication -->
						<form
							method="POST"
							role="logout"
							action="{{ route('logout') }}">
							@csrf

							<x-nav-link
								:href="route('logout')"
								onclick="event.preventDefault(); this.closest('form').submit();">
								{{ __('Log Out') }}
							</x-nav-link>
						</form>
					</li>
				</ul>
			</li>
		@endif
	</ul>
</nav>
