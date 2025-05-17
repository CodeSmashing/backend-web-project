<x-app-layout>
	<x-slot name="header">
		<h2>{{ __('Contact') }}</h2>
	</x-slot>

	<form id="contact">
		<fieldset>
			<h2>Contact form</h2>

			<label for="first-name">Your first name *</label>
			<input type="text" id="first-name" name="first-name" placeholder="e.g. Jane" required>

			<label for="last-name">Your last name *</label>
			<input type="text" id="last-name" name="last-name" placeholder="e.g. Doe" required>

			<label for="email">Your e-mail *</label>
			<input type="email" id="email" name="email" placeholder="e.g. jane.doe@gmail.com" required>

			<label for="reason">Reason for contact *</label>
			<textarea name="reason" id="reason" required></textarea>

			<label for="message">Your message *</label>
			<textarea name="message" id="message" required></textarea>

			<input type="submit" value="Submit form">
		</fieldset>
	</form>

	<x-slot name="footer"></x-slot>
</x-app-layout>
