export default function threadActionsManager() {
	const thread = document.querySelector("form[role='edit-thread']");

	function main() {
		const save = thread.querySelector("[name='save']");
		const report = thread.querySelector("[name='report']");
		const destroy = thread.querySelector("[name='destroy']");
		const edit = thread.querySelector("[name='edit']");
		const title = thread.querySelector("[name='title']");
		const content = thread.querySelector("[name='content']");
		let originalTitle = title.dataset.originalValue;
		let originalContent = content.dataset.originalValue;

		thread.addEventListener("submit", (event) => event.preventDefault());
		thread.addEventListener("keypress", (event) => (event.keyCode === 13) ? event.preventDefault() : "");
		report.addEventListener("click", (event) => handleSubmit(event, thread, title, content));

		edit.addEventListener("click", () => toggleDisabled(title, content));
		title.addEventListener("input", (event) => compareInput(event, originalTitle, save));
		content.addEventListener("input", (event) => compareInput(event, originalContent, save));
		[save, destroy].forEach((submit) => submit.addEventListener("click", (event) => handleSubmit(event, thread, title, content)));

		if (!thread.classList.contains("destroyed")) {
			title.dispatchEvent(new Event("input"));
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

	function toggleDisabled(title, content) {
		if (!title.value) {
			title.classList.toggle("hidden");
		} else {
			title.classList.remove("hidden");
		}
		title.toggleAttribute("disabled");
		content.toggleAttribute("disabled");
	}

	async function handleSubmit(event, thread, title, content) {
		event.preventDefault();
		const submit = event.target;

		thread.action = submit.getAttribute("data-action");
		thread.querySelector("[name='_method'").value = submit.getAttribute("data-method");

		const data = new FormData(thread);
		const message = thread.querySelector('.submit-message');
		const updatedAt = thread.querySelector('.updated_at');
		let date;
		let now;
		let seconds;

		let response;
		try {
			const fetchResponse = await fetch(thread.action, {
				method: 'POST',
				headers: {
					'X-CSRF-TOKEN': data.get("_token"),
					'Accept': 'application/json'
				},
				body: data
			});

			if (!fetchResponse.ok) {
				throw new Error(`Failed to send ${data.get("_method") ?? thread.method} request`);
			}

			response = await fetchResponse.json();
		} catch (error) {
			if (message) message.textContent = 'Request failed!';
			console.error(`Error requesting ${data.get("_method") ?? thread.method}:`, error);
			return;
		}

		if (response.thread) {
			date = new Date(response.thread.updated_at);
			now = new Date();
			seconds = Math.floor((now - date) / 1000);
		}

		switch (data.get("_method") ?? thread.method) {
			case "POST":
				// Reporting system not yet implemented
				console.log("Thread reported successfully:", response);
				break;
			case "PATCH":
				console.log("Thread updated successfully:", response);

				message.textContent = response.message;
				updatedAt.textContent = `${seconds} seconds ago`;

				submit.setAttribute("disabled", true);
				submit.classList.add("hidden");
				title.setAttribute("disabled", true);
				content.setAttribute("disabled", true);
				break;
			case "DELETE":
				console.log("Thread destroyed successfully:", response);
				const edit = thread.querySelector("[name='edit']");
				const reply = thread.querySelector("[name='reply']");

				title.textContent = response.thread.title;
				content.textContent = response.thread.content;
				message.textContent = response.message;
				updatedAt.textContent = `${seconds} seconds ago`;

				submit.setAttribute("disabled", true);
				submit.classList.add("hidden");

				title.setAttribute("disabled", true);
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

	main();
};

threadActionsManager()
