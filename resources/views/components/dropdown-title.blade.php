<button
	type="button"
	class="dropdown-title"
	aria-expanded="false"
	aria-controls="{{ $menuId ?? '' }}">
	<img
		class="avatar avatar-small"
		src="{{ Storage::url(Auth::user()->avatar ?? '/avatars/default-avatar.png') }}"
		alt="Avatar">
	<span>{{ Auth::user()->display_name ?? 'Joe Shmoe' }}</span>
</button>
