export function dashboardActionsManager() {
	const formList = document.querySelectorAll("[role='edit-user']")
	const masterHeader = document.querySelector("#master-table-header");
	let editToggleList = Array.from(document.querySelectorAll(".edit-toggle"));

	function main(form) {
		const editToggleList = form.querySelectorAll(".edit-toggle");
		const save = form.querySelector("[name='save']");
		const editInputList = Array.from(form.querySelectorAll(".edit-input"));

		editToggleList.forEach((toggle) => {
			toggle.addEventListener("click", (event) => {
				toggleVisibility(event)

				if (editInputList.some((input) => !input.hasAttribute("disabled"))) {
					save.removeAttribute("disabled");
				} else {
					save.setAttribute("disabled", "true");
				}
			});
		});

		form.addEventListener("submit", (event) => event.preventDefault());
		form.addEventListener("keypress", (event) => (event.keyCode === 13) ? event.preventDefault() : "");
		save.addEventListener("click", (event) => handleSubmit(event, form));

		if (editInputList.some((input) => !input.hasAttribute("disabled"))) {
			save.removeAttribute("disabled");
		} else {
			save.setAttribute("disabled", "true");
		}
	}

	function toggleVisibility(event) {
		const toggle = event.target;
		const tr = toggle.closest("tr");
		const input = tr.querySelector(`[name="${toggle.dataset.target}"]`);

		toggleDisabled(input);
	}

	function toggleDisabled(element) {
		element.toggleAttribute("disabled");
	}

	async function handleSubmit(event, form) {
		event.preventDefault();
		const submit = event.target;
		const data = new FormData(form);
		const message = form.querySelector('.submit-message');

		let response;
		console.log(data);

		try {
			const fetchResponse = await fetch(form.action, {
				method: 'POST',
				headers: {
					'X-CSRF-TOKEN': data.get("_token"),
					'Accept': 'application/json'
				},
				body: data
			});

			// if (!fetchResponse.ok) {
			// 	throw new Error(`Failed to send ${data.get("_method") ?? form.method} request`);
			// }

			response = await fetchResponse.json();
		} catch (error) {
			if (message) message.textContent = 'Request failed!';
			console.error(`Error requesting ${data.get("_method") ?? form.method}:`, error);
			return;
		}

		console.log("User updated successfully:", response.message);
		message.textContent = response.message;
	}

	formList.forEach(form => {
		main(form);
	});
}

dashboardActionsManager()
