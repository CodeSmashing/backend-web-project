document.addEventListener("DOMContentLoaded", init);

function init() {
	const form = document.querySelector("form[role='search']");
	const searchByTerm = form.querySelector("#search-by-term");
	const searchByTag = form.querySelector("#search-by-tag");
	const listTags = form.querySelector("#list-tags");
	const handleInput = (event) => {
		event.preventDefault();
		const term = searchByTerm.value;
		const tag = searchByTag.value;

		for (const value of [term, tag]) {
			if (value && !listTags.querySelector(`[value=${value}]`)) {
				listTags.classList.remove("hidden");

				const newTag = listTags.appendChild(document.createElement("div"));
				newTag.setAttribute("class", "tag");
				const newLabel = newTag.appendChild(document.createElement("label"));
				newLabel.setAttribute("value", value);
				newLabel.textContent = value.charAt(0).toUpperCase() + value.slice(1);
				const newButton = newTag.appendChild(document.createElement("button"));
				newButton.setAttribute("type", "button");
				newButton.setAttribute("class", "return");

				checkIfOverflowing();
			}
		}
	};
	const handleTagClick = (event) => {
		const target = event.target;
		const tag = target.closest(".tag");
		if (!tag) return;

		if (target.className.includes("return")) {
			listTags.removeChild(tag);
			checkIfEmpty();
		} else if (target.tagName = "label") {
		}

	};
	const checkIfOverflowing = () => {
		let isOverflowing = listTags.clientHeight < listTags.scrollHeight - 1;

		if (isOverflowing) {
			listTags.classList.add("overflowing");
		}
	};
	const checkIfEmpty = () => {
		if (listTags.children.length === 0) {
			listTags.classList.add("hidden");
		}
	}

	form.addEventListener("submit", handleInput);
	listTags.addEventListener("click", handleTagClick);
	listTags.addEventListener("animationend", () => {
		listTags.classList.remove("overflowing");
	});

	checkIfOverflowing();
	checkIfEmpty();
}
