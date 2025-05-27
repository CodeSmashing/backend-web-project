@php
	use Illuminate\Support\Facades\Schema;
	use App\Models\Enums\UserRoleEnum;
	use App\Models\User;

	$userList = User::all();
	$userTableColumns = Schema::getColumnListing((new User())->getTable());
	$exclude = ['id', 'email_verified_at', 'remember_token', 'created_at', 'updated_at'];
	$filteredColumns = array_values(array_diff($userTableColumns, $exclude));
@endphp
<x-app-layout>
	<x-slot name="header">
		<h2>{{ __('Dashboard') }}</h2>
	</x-slot>

	<section id="dashboard-content">
		@if (Auth::user() && Auth::user()->isAdmin())
			<table id="master-table-header">
				<thead>
					@foreach ($filteredColumns as $column)
						<th>
							<span>{{ $column }}</span>
						</th>
					@endforeach
					<th>
						<span></span> <!-- For the buttons at the end -->
					</th>
				</thead>
			</table>

			@foreach ($userList as $user)
				<form
					class="dashboard"
					action="{{ route('dashboard.update', ['user' => $user]) }}"
					method="post"
					role="edit-user">
					@csrf
					@method('patch')
					<input type="hidden" name="noRedirect" value="true">

					<table class="user-table">
						<thead class="hidden">
							@foreach ($filteredColumns as $column)
								<th>
									<span></span>
								</th>
							@endforeach
							<th>
								<span></span> <!-- For the buttons at the end -->
							</th>
						</thead>
						<tbody>
							<tr>
								@foreach ($filteredColumns as $column)
									<td>
										@if ($column === 'avatar')
											<x-text-input
												class="edit-input"
												name="avatar"
												type="file"
												:value="old('avatar', $user->avatar)"
												disabled
												autocomplete="avatar" />
										@else
											<textarea
											 class="paragraph-style edit-input"
											 name="{{ $column }}"
											 placeholder="{{ Str::limit($column === 'role' ? $user->$column->value : $user->$column, 1000, '...') }}"
											 disabled
											 autocomplete="{{ $column }}"></textarea>
										@endif
										<button
											class="edit-toggle"
											type="button"
											data-target="{{ $column }}">Edit</button>
									</td>
								@endforeach
								<td>
									<button
										name="save"
										type="submit"
										disabled>Save</button>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="submit-message"></div>
				</form>
			@endforeach
		@else
			<p>{{ Auth::user() }}</p>
		@endif
	</section>

	<x-slot name="footer"></x-slot>

	@push('scripts')
		<script type="module" src="{{ asset('js/dashboard-actions-manager.js') }}"></script>
	@endpush
</x-app-layout>
