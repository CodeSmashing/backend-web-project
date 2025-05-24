@php
	use App\Models\User;
	use App\Models\Thread;
@endphp

<x-app-layout>
	<x-slot name="header">
		<h2>{{ __('Discussion') }}</h2>
	</x-slot>

	<section>
		@php
			$threads = Thread::all();
		@endphp

		@foreach ($threads as $thread)
			<section class="thread">
				<div class="grid-item-1 thread-header">
					<img
						class="grid-item-1 avatar avatar-small"
						src="{{ Storage::url(Auth::user()->avatar ?? '/avatars/default-avatar.png') }}"
						alt="Avatar">
					<span class="grid-item-2">{{ User::find($thread->user_id)->display_name }}</span>
					<span class="grid-item-3">{{ User::find($thread->user_id)->role }}</span>
					@if ($thread->is_locked)
						<svg
							xmlns="http://www.w3.org/2000/svg"
							width="16"
							height="16"
							fill="black"
							class="grid-item-4 icon icon-small bi bi-lock-fill"
							viewBox="0 0 16 16">
							<path fill-rule="evenodd"
								d="M8 0a4 4 0 0 1 4 4v2.05a2.5 2.5 0 0 1 2 2.45v5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 13.5v-5a2.5 2.5 0 0 1 2-2.45V4a4 4 0 0 1 4-4m0 1a3 3 0 0 0-3 3v2h6V4a3 3 0 0 0-3-3" />
						</svg>
					@endif
				</div>

				<div class="grid-item-2 thread-body">
					<h3>{{ $thread->title }}</h3>
					<p>{{ $thread->description }}</p>
					<a class="thread-page-link"
						href="{{ route('discussion.thread', ['thread' => $thread]) }}">{{ __('View thread') }}</a>
				</div>

				<div class="grid-item-3 thread-footer">
					<span>Created: {{ $thread->created_at }}</span>
					<span>Last updated: {{ $thread->updated_at }}</span>
				</div>
			</section>
		@endforeach
	</section>

	<x-slot name="footer"></x-slot>
</x-app-layout>
