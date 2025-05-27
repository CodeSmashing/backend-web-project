@php
	use App\Models\User;
	use App\Models\Thread;
	$threads = Thread::all();
@endphp

<x-app-layout>
	<x-slot name="header">
		<h2>{{ __('Discussion') }}</h2>
	</x-slot>

	<section>
		<section class="discussion-options-container">
			<div class="action-menu">
				<button class="search-thread-toggle" type="button">Search thread?</button>
				<button class="create-thread-toggle {{ Auth::user() ? '' : 'hidden' }}" type="button">Create thread?</button>
			</div>

			<form
				class="hidden"
				method="get"
				role="search">
				<h6 class="grid-item-1">Find threads by entering terms in the search box or create a new one.</h6>
				<input
					type="submit"
					class="grid-item-2"
					value="Search:">
				<input
					type="search"
					class="grid-item-3"
					id="search-by-term"
					name="search-by-term"
					placeholder="Search by term...">

				<select name="tag-list" class="grid-item-5" id="select-tag-list">
					<option value="" selected>-- Select a thread --</option>
					@foreach ($threads as $thread)
						@if (!$thread->destroyed)
							<option value="{{ $thread->id }}">{{ substr($thread->content, 0, 10) }}...</option>
						@endif
					@endforeach
				</select>

				<ul id="tag-list" class="grid-item-6 hidden"></ul>
			</form>

			<form
				class="hidden"
				role="create-thread"
				method="POST"
				action="{{ route('thread.store') }}">
				@csrf

				<div class="grid-item-2 thread-body">
					<input
						class="header-6-style"
						name="title"
						type="text"
						placeholder="Title">

					<textarea
					 class="paragraph-style"
					 name="content"
					 placeholder="Content"></textarea>
				</div>

				<div class="grid-item-3 thread-footer action-menu">
					<button
						name="save"
						type="submit"
						disabled>Submit</button>

					<div class="submit-message"></div>
				</div>
			</form>
		</section>

		@push('scripts')
			<script type="module" src="{{ asset('js/searchbox-manager.js') }}"></script>
			<script type="module" src="{{ asset('js/discussion-options-manager.js') }}"></script>
		@endpush

		@foreach ($threads as $thread)
			@php
				$author = User::find($thread->user_id);
			@endphp

			<section class="thread">
				<div class="grid-item-1 thread-header">
					<img
						class="grid-item-1 avatar avatar-small"
						src="{{ Storage::url(Auth::user()->avatar ?? '/avatars/default-avatar.png') }}"
						alt="Avatar">

					<span class="grid-item-2">
						{{ $author->display_name }} •
						{{ $thread->created_at->diffForHumans() }}
						<span class="updated_at">
							{{ $thread->created_at->diffForHumans() !== $thread->updated_at->diffForHumans() ? "• {$thread->updated_at->diffForHumans()}" : '' }}</span>
					</span>

					<span class="grid-item-3">{{ __(ucfirst($author->role->value)) }}</span>
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
					<p>{{ $thread->content }}</p>
					<a class="thread-page-link"
						href="{{ route('discussion.thread', ['thread' => $thread]) }}">{{ __('View thread') }}</a>
				</div>

				<div class="grid-item-3 thread-footer"></div>
			</section>
		@endforeach
	</section>

	<x-slot name="footer"></x-slot>
</x-app-layout>
