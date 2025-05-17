<x-app-layout>
	<x-slot name="header">
		<h2>{{ __('Stylesheet') }}</h2>
	</x-slot>

	<section>
		<h1>Heading &lt;h1&gt;</h1>
		<h2>Heading &lt;h2&gt;</h2>
		<h3>Heading &lt;h3&gt;</h3>
		<h4>Heading &lt;h4&gt;</h4>
		<h5>Heading &lt;h5&gt;</h5>
		<h6>Heading &lt;h6&gt;</h6>

		<p>Paragraph &lt;p&gt;</p>
		<p>
			Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto veritatis reiciendis ipsum neque quod.
			Eligendi dolore porro explicabo molestias voluptates eum nobis aliquid maiores voluptatum, repudiandae optio, aperiam
			corrupti natus?
		</p>

		<hr>

		<a href="#">Anchor &lt;a&gt;</a><br>

		<input type="text" value="Input <input>" placeholder="Input <input>"><br>

		<button>Button &lt;button&gt;</button>
	</section>

	<x-slot name="footer"></x-slot>
</x-app-layout>
