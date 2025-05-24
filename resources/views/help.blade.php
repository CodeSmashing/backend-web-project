<x-app-layout>
	<x-slot name="header">
		<h2>{{ __('Frequently Asked Questions') }}</h2>
	</x-slot>

	<form method="get" role="search">
		<h6 class="grid-item-1">Find articles and videos by entering terms in the search box.</h6>
		<input type="submit" class="grid-item-2" value="Search:">
		<input type="search" class="grid-item-3" id="search-by-term" name="search-by-term" placeholder="Search by term...">

		<input list="data-tag-list" type="search" class="grid-item-4" id="search-by-tag" name="search-by-tag"
			placeholder="Search by tag...">
		<select name="tag-list" class="grid-item-5" id="select-tag-list">
			@foreach ($FaqList as $Faq)
				@foreach (explode(',', $Faq['tagList']) as $tag)
					<option value="{{ $tag }}">{{ ucfirst($tag) }}</option>
				@endforeach
			@endforeach
		</select>
		<datalist name="tag-list" id="data-tag-list">
			@foreach ($FaqList as $Faq)
				@foreach (explode(',', $Faq['tagList']) as $tag)
					<option value="{{ ucfirst($tag) }}">
				@endforeach
			@endforeach
		</datalist>

		<ul id="tag-list" class="grid-item-6 hidden"></ul>
	</form>

	<section id="section-faq">
		@foreach ($FaqList as $Faq)
			<fieldset>
				@foreach (explode(',', $Faq['tagList']) as $tag)
					<input type="hidden" value="{{ $tag }}" disabled>
				@endforeach
				<legend>
					<strong>Q{{ $loop->iteration }}:</strong> {{ $Faq['question'] }}
				</legend>
				<p><strong>A{{ $loop->iteration }}:</strong> {{ $Faq['answer'] }}</p>
			</fieldset>
			@if (!$loop->last)
				<br>
			@endif
		@endforeach
	</section>

	<x-slot name="footer"></x-slot>

	@push('scripts')
		<script type="module" src="{{ asset('js/toggle-tag-list-manager.js') }}"></script>
	@endpush
</x-app-layout>
