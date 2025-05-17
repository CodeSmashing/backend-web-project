<x-guest-layout>
	<form id="help" role="search">
		<h6>Find articles and videos by entering terms in the search box.</h6>
		<input type="submit" value="Search:">
		<input type="search" id="search-by-term" name="search-by-term" placeholder="Search by term...">

		<input list="data-list-tags" type="search" id="search-by-tag" name="search-by-tag" placeholder="Search by tag...">
		<select name="tags" id="select-list-tags">
			@foreach ($FAQList as $FAQ)
				@foreach ($FAQ['tags'] as $tag)
					<option value="{{ $tag }}">{{ ucfirst($tag) }}</option>
				@endforeach
			@endforeach
		</select>
		<datalist name="tags" id="data-list-tags">
			@foreach ($FAQList as $FAQ)
				@foreach ($FAQ['tags'] as $tag)
					<option value="{{ ucfirst($tag) }}">
				@endforeach
			@endforeach
		</datalist>

		<ul id="list-tags" class="hidden"></ul>
	</form>

	<section id="section-faq">
		@foreach ($FAQList as $FAQ)
			<fieldset>
				@foreach ($FAQ['tags'] as $tag)
					<input type="hidden" name="{{ $tag }}" disabled>
				@endforeach
				<legend>
					<strong>Q{{ $loop->iteration }}:</strong> {{ $FAQ['question'] }}
				</legend>
				<p><strong>A{{ $loop->iteration }}:</strong> {{ $FAQ['answer'] }}</p>
			</fieldset>
			@if (!$loop->last)
				<br>
			@endif
		@endforeach
	</section>

	@push('scripts')
		<script src="{{ asset('js/toggle-tags-manager.js') }}"></script>
	@endpush
</x-guest-layout>
