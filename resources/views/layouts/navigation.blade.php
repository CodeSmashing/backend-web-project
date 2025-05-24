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
			<x-nav-link
				:href="route('home')"
				:data-target="'home'">
				{{ __('Home') }}
			</x-nav-link>
		</li>
		<li>
			<x-nav-link
				:href="route('stylesheet')"
				:data-target="'stylesheet'">
				{{ __('Stylesheet') }}
			</x-nav-link>
		</li>
		<li>
			<x-nav-link
				:href="route('contact')"
				:data-target="'contact'">
				{{ __('Get in contact') }}
			</x-nav-link>
		</li>
		<li>
			<x-nav-link
				:href="route('help')"
				:data-target="'help'">
				{{ __('FAQ') }}
			</x-nav-link>
		</li>
		<li>
			<x-nav-link
				:href="route('discussion')"
				:data-target="'discussion'">
				{{ __('Discussion') }}
			</x-nav-link>
		</li>

		@if (Route::has('login'))
			@auth
				<li>
					<x-nav-link
						:href="route('dashboard')"
						:data-target="'dashboard'">
						{{ __('Dashboard') }}
					</x-nav-link>
				</li>
			@else
				<li>
					<x-nav-link
						:href="route('login')"
						:data-target="'login'">
						{{ __('Log in') }}
					</x-nav-link>
				</li>

				@if (Route::has('register'))
					<li>
						<x-nav-link
							:href="route('register')"
							:data-target="'register'">
							{{ __('Register') }}
						</x-nav-link>
					</li>
				@endif
			@endauth
		@endif

		@if (Auth::user())
			<x-dropdown :menuId="'settings-menu'">
				<x-slot:menu-title>
					<x-nav-link
						:href="route('profile.edit')"
						:data-target="'profile.edit'">
						{{ __('Profile') }}
					</x-nav-link>
				</x-slot>

				<x-slot:menu-items>
					<!-- Authentication -->
					<form
						method="POST"
						role="logout"
						action="{{ route('logout') }}">
						@csrf

						<button class="anchor-style" type="submit">{{ __('Log out') }}</button>
					</form>
				</x-slot>
			</x-dropdown>
		@endif
	</ul>
</nav>
