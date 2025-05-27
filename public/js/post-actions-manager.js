export default function postActionsManager() {
	const postFormList = document.querySelectorAll("form[role='edit-post']");

	function main(form) {
		const save = form.querySelector("[name='save']");
		const report = form.querySelector("[name='report']");
		const destroy = form.querySelector("[name='destroy']");
		const edit = form.querySelector("[name='edit']");
		const content = form.querySelector("[name='content']");
		let originalContent = content.dataset.originalValue;

		// Prevent default form submissions
		form.addEventListener("submit", (event) => event.preventDefault());
		form.addEventListener("keypress", (event) => (event.keyCode === 13) ? event.preventDefault() : "");

		edit.addEventListener("click", () => toggleDisabled(content));
		content.addEventListener("input", (event) => compareInput(event, originalContent, save));
		[save, destroy, report].forEach((submit) => submit.addEventListener("click", (event) => handleSubmit(event, form, content)));

		if (!form.classList.contains("destroyed")) {
			content.dispatchEvent(new Event("input"));
		}
	}

	function compareInput(event, originalValue, save) {
		const value = event.target.value;

		if (originalValue !== value) {
			save.removeAttribute("disabled");
			save.classList.remove("hidden");
		} else {
			save.setAttribute("disabled", true);
			save.classList.add("hidden");
		}
	}

	function toggleDisabled(content) {
		content.toggleAttribute("disabled");
	}

	async function handleSubmit(event, form, content) {
		event.preventDefault();
		const submit = event.target;

		form.action = submit.getAttribute("data-action");
		form.querySelector("[name='_method'").value = submit.getAttribute("data-method");

		const data = new FormData(form);
		const message = form.querySelector('.submit-message');
		const updatedAt = form.querySelector('.updated_at');
		let date;
		let now;
		let seconds;

		let response;
		try {
			const fetchResponse = await fetch(form.action, {
				method: 'POST',
				headers: {
					'X-CSRF-TOKEN': data.get("_token"),
					'Accept': 'application/json'
				},
				body: data
			});

			if (!fetchResponse.ok) {
				throw new Error(`Failed to send ${data.get("_method") ?? form.method} request`);
			}

			response = await fetchResponse.json();
		} catch (error) {
			if (message) message.textContent = 'Request failed!';
			console.error(`Error requesting ${data.get("_method") ?? form.method}:`, error);
			return;
		}

		if (response.post) {
			date = new Date(response.post.updated_at);
			now = new Date();
			seconds = Math.floor((now - date) / 1000);
		}

		switch (data.get("_method") ?? form.method) {
			case "POST":
				// Reporting system not yet implemented
				console.log("Post reported successfully:", response);
				break;
			case "PATCH":
				console.log("Post updated successfully:", response);

				message.textContent = response.message;
				updatedAt.textContent = `${seconds} seconds ago`;

				submit.setAttribute("disabled", true);
				submit.classList.add("hidden");
				content.setAttribute("disabled", true);
				break;
			case "DELETE":
				console.log("Post destroyed successfully:", response);
				const edit = form.querySelector("[name='edit']");
				const reply = form.querySelector("[name='reply']");

				content.textContent = response.post.content;
				message.textContent = response.message;
				updatedAt.textContent = `${seconds} seconds ago`;

				submit.setAttribute("disabled", true);
				submit.classList.add("hidden");
				content.setAttribute("disabled", true);

				edit.classList.add("hidden");
				edit.setAttribute("disabled", true);

				reply.setAttribute("disabled", true);
				break;
			default:
				console.warn("We haven't considered that method yet.");
				break;
		}
	}

	postFormList.forEach(form => main(form));
};

postActionsManager()
