<nav x-data="{ open: false }">
	<!-- Logo -->
	{{-- <div>
		<a href="{{ route('dashboard') }}">
			<!-- Here would be a logo which refers to the dashboard -->
		</a>
	</div> --}}

	<!-- Navigation Links -->
	<x-nav-link :href="route('home')" :active="request()->routeIs('home')">
		{{ __('Home') }}
	</x-nav-link>
	<x-nav-link :href="route('stylesheet')">
		{{ __('Stylesheet') }}
	</x-nav-link>
	<x-nav-link :href="route('contact')">
		{{ __('Get in contact') }}
	</x-nav-link>
	<x-nav-link :href="route('help')">
		{{ __('FAQ') }}
	</x-nav-link>
	<x-nav-link :href="route('discussion')">
		{{ __('Discussion') }}
	</x-nav-link>

	@if (Route::has('login'))
		@auth
			<x-nav-link :href="route('dashboard')">
				{{ __('Dashboard') }}
			</x-nav-link>
		@else
			<x-nav-link :href="route('login')">
				{{ __('Log in') }}
			</x-nav-link>

			@if (Route::has('register'))
				<x-nav-link :href="route('register')">
					{{ __('Register') }}
				</x-nav-link>
			@endif
		@endauth
	@endif

	@if (Auth::user())
		<!-- Settings Dropdown -->
		<x-dropdown>
			<x-slot name="trigger">
				<button>
					<div>{{ Auth::user()->name }}</div>

					<div>
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
							<path fill-rule="evenodd"
								d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
								clip-rule="evenodd" />
						</svg>
					</div>
				</button>
			</x-slot>

			<x-slot name="content">
				<x-dropdown-link :href="route('profile.edit')">
					{{ __('Profile') }}
				</x-dropdown-link>

				<!-- Authentication -->
				<form method="POST" action="{{ route('logout') }}">
					@csrf

					<x-dropdown-link :href="route('logout')"
						onclick="event.preventDefault();
															this.closest('form').submit();">
						{{ __('Log Out') }}
					</x-dropdown-link>
				</form>
			</x-slot>
		</x-dropdown>

		<!-- Hamburger -->
		<button @click="open = ! open"
			class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
			<svg stroke="currentColor" fill="none" viewBox="0 0 24 24">
				<path :class="{ 'hidden': open, 'inline-flex': !open }" stroke-linecap="round"
					stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
				<path :class="{ 'hidden': !open, 'inline-flex': open }" stroke-linecap="round"
					stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
			</svg>
		</button>

		<!-- Responsive Navigation Menu -->
		<div :class="{ 'block': open, 'hidden': !open }">
			<div>
				<x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
					{{ __('Dashboard') }}
				</x-responsive-nav-link>
			</div>

			<!-- Responsive Settings Options -->
			<div>
				<div>
					<p>{{ Auth::user()->name }}</p>
					<p>{{ Auth::user()->email }}</p>
				</div>

				<div>
					<x-responsive-nav-link :href="route('profile.edit')">
						{{ __('Profile') }}
					</x-responsive-nav-link>

					<!-- Authentication -->
					<form method="POST" action="{{ route('logout') }}">
						@csrf

						<x-responsive-nav-link :href="route('logout')"
							onclick="event.preventDefault();
                                        this.closest('form').submit();">
							{{ __('Log Out') }}
						</x-responsive-nav-link>
					</form>
				</div>
			</div>
		</div>
	@endif
</nav>
