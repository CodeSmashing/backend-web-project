export default function toggleAlterManager() {
	const toggleCheckboxList = document.querySelectorAll("[type='checkbox'][id*='toggle-field-']");

	function main() {
		toggleCheckboxList.forEach(element => {
			element.addEventListener("change", () => {
				const targetInputId = element.id.replace("toggle-field-", "");
				const targetInput = document.querySelector(`#${targetInputId}`);
				targetInput.toggleAttribute("disabled");
			})
		});
	}

	main();
};

toggleAlterManager()
