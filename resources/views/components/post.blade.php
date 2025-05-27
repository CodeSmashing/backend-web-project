@php
	use App\Models\User;
	use App\Models\Post;
	use App\Models\Thread;

	$author = User::find($post->user_id);
	$subPostList = Post::where('post_id', $post->id)->get();
	$user = Auth::user();
@endphp

<section class="post-container">
	<div class="post-item">
		<div class="grid-item-1">
			<form
				class="{{ $post->destroyed ? 'destroyed' : '' }}"
				role="edit-post"
				method="POST">
				@csrf
				@method('get')

				<h5>
					{{ $author->display_name }} • {{ $post->created_at->diffForHumans() }}
					<span class="updated_at">
						{{ $post->created_at->diffForHumans() !== $post->updated_at->diffForHumans() ? "• {$post->updated_at->diffForHumans()}" : '' }}</span>
				</h5>

				<textarea
				 class="paragraph-style"
				 name="content"
				 data-original-value="{{ $post->content }}"
				 disabled>{{ $post->content }}</textarea>

				<button
					name="report"
					type="submit"
					data-action="{{ route('post.report', ['post' => $post]) }}"
					data-method="POST">Report</button>

				<button
					class="create-post-toggle"
					name="reply"
					type="button"
					{{ !$user || $post->destroyed ? 'disabled' : '' }}>Reply</button>

				<button
					class="{{ $user != $author || $post->destroyed ? 'hidden' : '' }}"
					name="edit"
					type="button"
					{{ $user != $author || $post->destroyed ? 'disabled' : '' }}>Edit</button>

				<button
					class="hidden"
					name="save"
					type="submit"
					data-action="{{ route('post.update', ['post' => $post]) }}"
					data-method="PATCH" disabled>Save changes</button>

				<button
					class="{{ $user != $author || $post->destroyed ? 'hidden' : '' }}"
					name="destroy"
					type="submit"
					data-action="{{ route('post.destroy', ['post' => $post]) }}"
					data-method="DELETE"
					{{ $user != $author || $post->destroyed ? 'disabled' : '' }}>Delete</button>

				<div class="submit-message"></div>
			</form>
		</div>

		<div class="grid-item-2">
			<form
				class="hidden"
				role="create-reply"
				method="POST"
				action="{{ route('post.store') }}">
				@csrf

				<input
					type="hidden"
					name="user_id"
					value="{{ $user->id ?? '' }}"
					autocomplete="off">

				<input
					type="hidden"
					name="post_id"
					value="{{ $post->id }}"
					autocomplete="off">

				<input
					type="hidden"
					name="thread_id"
					value="{{ Thread::find($post->thread_id)->id }}"
					autocomplete="off">

				<div class="grid-item-2">
					<textarea
					 class="paragraph-style"
					 name="content"
					 placeholder="Content"
					 {{ $user ? '' : 'disabled' }}></textarea>
				</div>

				<div class="grid-item-3 action-menu">
					<button
						name="save"
						type="submit"
						disabled>Submit</button>
				</div>
			</form>
		</div>

		<hr class="grid-item-3 small light">
	</div>

	@if (isset($subPostList) && !$subPostList->isEmpty())
		<x-post-list :postList="$subPostList" />
	@endif
</section>
