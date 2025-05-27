@php
	use App\Http\Controllers\PostController;
@endphp

<section class="post-list">
	@foreach ($postList as $post)
		<x-post :post="$post" />
	@endforeach
</section>
