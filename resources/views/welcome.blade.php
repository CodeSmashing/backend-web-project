<x-app-layout>
	<x-slot name="header">
		<h2>{{ __('Dashboard') }}</h2>
	</x-slot>

	<section>
		<h1>Let's get started</h1>
		<p>Laravel has an incredibly rich ecosystem. <br>We suggest starting
			with the following.</p>
		<ul>
			<li>
				<span>
					Read the
					<a href="https://laravel.com/docs" target="_blank">
						<span>Documentation</span>
					</a>
				</span>
			</li>
			<li>
				<span>
					Watch video tutorials at
					<a href="https://laracasts.com" target="_blank">
						<span>Laracasts</span>
					</a>
				</span>
			</li>
		</ul>
		<ul>
			<li>
				<a href="https://cloud.laravel.com" target="_blank">
					Deploy now
				</a>
			</li>
		</ul>
	</section>

	<x-slot name="footer"></x-slot>
</x-app-layout>
