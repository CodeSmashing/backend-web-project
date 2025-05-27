export default function discussionOptionsManager() {
	const optionsContainer = document.querySelector(".discussion-options-container");
	const searchForm = optionsContainer.querySelector("form[role='search']");
	const createForm = optionsContainer.querySelector("form[role='create-thread']");
	const toggleSearch = optionsContainer.querySelector(".create-thread-toggle");
	const toggleCreate = optionsContainer.querySelector(".search-thread-toggle");

	const title = createForm.querySelector("[name='title']");
	const content = createForm.querySelector("[name='content']");
	const save = createForm.querySelector("[name='save']");

	function main() {
		toggleSearch.addEventListener("click", () => {
			createForm.classList.toggle("hidden");
			searchForm.classList.add("hidden");
		});

		toggleCreate.addEventListener("click", () => {
			searchForm.classList.toggle("hidden");
			createForm.classList.add("hidden");
		});

		[title, content].forEach((input) => input.addEventListener("input", compareInput));

		compareInput();
		createForm.addEventListener("submit", handleSubmit);
	}

	function compareInput() {
		if (title.value || content.value !== "") {
			save.removeAttribute("disabled");
			save.classList.remove("hidden");
		} else {
			save.setAttribute("disabled", true);
			save.classList.add("hidden");
		}
	}

	async function handleSubmit(event) {
		event.preventDefault();
		const data = new FormData(createForm);
		const message = createForm.querySelector('.submit-message');

		console.log(data);

		try {
			const fetchResponse = await fetch(createForm.action, {
				method: 'POST',
				headers: {
					'X-CSRF-TOKEN': data.get("_token"),
					'Accept': 'application/json'
				},
				body: data
			});

			if (!fetchResponse.ok) {
				throw new Error(`Failed to send ${data.get("_method") ?? createForm.method} request`);
			}
		} catch (error) {
			console.error(`Error requesting ${data.get("_method") ?? createForm.method}:`, error);
			return;
		}
	}

	main();
}

discussionOptionsManager()
