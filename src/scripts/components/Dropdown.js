export default class Dropdown {
	constructor(element) {
		this.element = element;
		this.options = {};

		this.init();
	}

	init() {
		const containers = this.element.querySelectorAll(".faq-item");
		containers.forEach((el) => el.addEventListener("click", this.toggleDropdown.bind(this)));
	}

	toggleDropdown(e) {
		const content = e.currentTarget.querySelector(".faq-item-content")
		if(e.currentTarget.classList.contains('submenu-is-active')) {
			e.currentTarget.classList.remove('submenu-is-active');
			content.style.maxHeight = "";
		}
		else {
			const containers = this.element.querySelectorAll(".faq-item");
			containers.forEach((el) => {
				el.classList.remove('submenu-is-active')
				const elc = el.querySelector(".faq-item-content");
				elc.style.maxHeight= "";
			});
			e.currentTarget.classList.add('submenu-is-active');
			content.style.maxHeight = content.scrollHeight + "px";
		}

	}
}
