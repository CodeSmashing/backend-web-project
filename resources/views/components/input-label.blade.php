@props(['value', 'isRequired' => 'false'])

<label class="{{ $attributes['class'] }}" for="{{ $attributes['for'] }}">
	{{ $value ?? $slot }}
	@if ($isRequired === true)
		*
	@endif
</label>
