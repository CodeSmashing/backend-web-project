export default function replyActionsManager() {
	const parser = new DOMParser();
	let replyFormList = Array.from(document.querySelectorAll("form[role='create-reply']"));

	function main(reply) {
		const save = reply.querySelector("[name='save']");
		const content = reply.querySelector("[name='content']");
		const replyToggle = reply.closest(".post-item").querySelector("[name='reply']");

		// Prevent default form submissions
		reply.addEventListener("submit", (event) => event.preventDefault());

		// Handle input
		content.addEventListener("input", (event) => toggleDisabledOnInput(event, save));
		save.addEventListener("click", (event) => handleSubmit(event, reply, content));
		replyToggle.addEventListener("click", () => toggleHidden(reply));

		if (content.value != "") {
			content.dispatchEvent(new Event("input"));
		}
	}

	function toggleDisabledOnInput(event, element) {
		const value = event.target.value;

		if (value) {
			element.removeAttribute("disabled");
			element.classList.remove("hidden");
		} else {
			element.setAttribute("disabled", true);
			element.classList.add("hidden");
		}
	}

	function toggleHidden(element) {
		element.classList.toggle("hidden");
	}

	async function handleSubmit(event, form, content) {
		event.preventDefault();
		const submit = event.target;
		const data = new FormData(form);
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
			console.error(`Error requesting ${data.get("_method") ?? form.method}:`, error.message);
			return;
		}

		if (response.post) {
			console.log(response.message);
			content.value = "";

			submit.setAttribute("disabled", true);
			form.classList.add("hidden");

			const container = submit.closest(".post-container");
			const postList = container.querySelector(".post-list") ??
				container.appendChild(document.createElement("section"));
			postList.classList.add("post-list");

			let doc = parser.parseFromString(response.view, 'text/html');
			let post = doc.body.firstElementChild;
			postList.appendChild(post);
			replyFormList.push(post.querySelector("form[role='create-reply']"));
			main(post.querySelector("form[role='create-reply']"));

			post.scrollIntoView();
		} else {
			console.log("Reply could not be created:", response);
		}
	}

	replyFormList.forEach((reply) => main(reply));
};

replyActionsManager()
