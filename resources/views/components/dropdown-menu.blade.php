<ul id="{{ $menuId ?? '' }}" class="dropdown-menu">
	<li>
		@if (isset($menuTitle))
			{{ $menuTitle }}
		@endif
	</li>
	<li>
		@if (isset($menuItems))
			{{ $menuItems }}
		@endif
	</li>
</ul>
