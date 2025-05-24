@php
	use App\Models\Post;
@endphp

<section class="post-list">
	@isset($postList)
		@foreach ($postList as $post)
			<x-post-container>
				<x-post-item :post="$post" />

				@php
					$subPostList = Post::where('post_id', $post->id)->get();
				@endphp

				@if (isset($subPostList) && !$subPostList->isEmpty())
					<x-post-list :postList="$subPostList" />
				@endif
			</x-post-container>
		@endforeach
	@endisset
</section>
