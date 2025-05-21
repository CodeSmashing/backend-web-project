<div class="dropdown">
	<x-dropdown-title :menuId="$menuId ?? ''" />
	<x-dropdown-menu :menuId="$menuId ?? ''">
		@if (isset($menuTitle))
			<x-slot:menu-title>
				{{ $menuTitle }}
			</x-slot:menu-title>
		@endif
		@if (isset($menuItems))
			<x-slot:menu-items>
				{{ $menuItems }}
			</x-slot:menu-items>
		@endif
	</x-dropdown-menu>
</div>
