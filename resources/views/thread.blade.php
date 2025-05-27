@php
	use App\Models\User;
	use App\Http\Controllers\PostController;

	$author = User::find($thread->user_id);
	$postList = PostController::getThreadPostList($thread->id);
@endphp

<x-app-layout>
	<x-slot name="header">
		<h2>{{ __('Discussion') }}</h2>
	</x-slot>

	<section>
		<form
			class="{{ $thread->destroyed ? 'destroyed' : '' }}"
			role="edit-thread"
			method="POST">
			@csrf
			@method('get')

			<div class="grid-item-1 thread-header">
				<img class="grid-item-1 avatar avatar-small"
					src="{{ Storage::url(Auth::user()->avatar ?? '/avatars/default-avatar.png') }}" alt="Avatar">

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
				<input
					class="header-3-style {{ $thread->title ?? 'hidden' }}"
					name="title"
					type="text"
					value="{{ $thread->title }}"
					data-original-value="{{ $thread->title }}"
					disabled>

				<textarea
				 class="paragraph-style"
				 name="content"
				 data-original-value="{{ $thread->content }}"
				 disabled>{{ $thread->content }}</textarea>
			</div>

			<div class="grid-item-3 thread-footer action-menu">
				<button
					name="report"
					type="submit"
					data-action="{{ route('thread.report', ['thread' => $thread]) }}"
					data-method="POST">Report</button>

				<button
					class="{{ Auth::user() != $author || $thread->destroyed ? 'hidden' : '' }}"
					name="edit"
					type="button"
					{{ Auth::user() != $author || $thread->destroyed || $thread->is_locked ? 'disabled' : '' }}>Edit</button>

				<button
					class="hidden"
					name="save"
					type="submit"
					data-action="{{ route('thread.update', ['thread' => $thread]) }}"
					data-method="PATCH" disabled>Save changes</button>

				<button
					class="{{ Auth::user() != $author || $thread->destroyed ? 'hidden' : '' }}"
					name="destroy"
					type="submit"
					data-action="{{ route('thread.destroy', ['thread' => $thread]) }}"
					data-method="DELETE"
					{{ Auth::user() != $author || $thread->destroyed || $thread->is_locked ? 'disabled' : '' }}>Delete</button>

				<div class="submit-message"></div>
			</div>
		</form>

		@push('scripts')
			<script type="module" src="{{ asset('js/thread-actions-manager.js') }}"></script>
			<script type="module" src="{{ asset('js/reply-actions-manager.js') }}"></script>
		@endpush

		@if (isset($postList) && !$postList->isEmpty())
			<x-post-list :postList="$postList" />

			@push('scripts')
				<script type="module" src="{{ asset('js/post-actions-manager.js') }}"></script>
			@endpush
		@endif
	</section>

	<x-slot name="footer"></x-slot>
</x-app-layout>
