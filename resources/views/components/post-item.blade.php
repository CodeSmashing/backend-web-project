@php
	use App\Models\User;

	$author = User::find($post->user_id);
@endphp

<div class="post">
	<div class="grid-item-1">
		<form action="">
			@csrf
			<h5>{{ $author->display_name }} • {{ $post->created_at->diffForHumans() }}
				@if ($post->created_at->diffForHumans() !== $post->updated_at->diffForHumans())
					• {{ $post->updated_at->diffForHumans() }}
				@endif
			</h5>

			@if ($post->title)
				<input class="header-6-style" name="post-title" type="text" value="{{ $post->title }}" disabled>
			@endif
			<textarea class="paragraph-style" name="post-content" type="text" disabled>{{ $post->content }}</textarea>
			<button type="submit">Save changes</button>
		</form>
	</div>

	<div class="grid-item-2 action-menu">
		<form action="" method="post">
			@csrf
			<button type="submit">Report</button>
		</form>

		@if (Auth::user() && Auth::user() == $author)
			<form action="" method="get">
				@csrf
				<button type="button">Edit</button>
			</form>
		@endif
	</div>
	<hr class="grid-item-3 small light">
</div>
