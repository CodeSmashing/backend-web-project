export default function toggleTagListManager() {
	const form = document.querySelector("form[role='search']");
	const searchByTerm = form.querySelector("#search-by-term");
	const searchByTag = form.querySelector("#search-by-tag");
	const tagList = form.querySelector("#tag-list");

	function main() {
		const handleInput = (event) => {
			event.preventDefault();
			const term = searchByTerm.value;
			const tag = searchByTag.value;

			for (const value of [term, tag]) {
				if (value && !tagList.querySelector(`[value=${value}]`)) {
					tagList.classList.remove("hidden");

					const newTag = tagList.appendChild(document.createElement("div"));
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
				tagList.removeChild(tag);
				checkIfEmpty();
			} else if (target.tagName === "label") {
			}

		};
		const checkIfOverflowing = () => {
			let isOverflowing = tagList.clientHeight < tagList.scrollHeight - 1;

			if (isOverflowing) {
				tagList.classList.add("overflowing");
			}
		};
		const checkIfEmpty = () => {
			if (tagList.children.length === 0) {
				tagList.classList.add("hidden");
			}
		}

		form.addEventListener("submit", handleInput);
		tagList.addEventListener("click", handleTagClick);
		tagList.addEventListener("animationend", () => {
			tagList.classList.remove("overflowing");
		});

		checkIfOverflowing();
		checkIfEmpty();
	}

	main();
}

toggleTagListManager()
