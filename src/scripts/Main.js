import ComponentFactory from './ComponentFactory.js';
import Icons from './utils/Icons.js';

class Main {
	constructor() {
		this.init();
	}

	init() {
		document.documentElement.classList.add('has-js');

		Icons.load();
		new ComponentFactory();
	}
}

new Main();

function lorem() {
	const fill = document.querySelectorAll(".lorem");
	const baseText = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
	fill.forEach((el) => {
		const props = el.textContent.split(" ");
		if(props.length != 2) {
			console.log("invalid lorem sequence");
			return;
		}
		const amount = parseInt(props[0]);
		if(props[1] == "sentences") {
			let sentences = baseText.split(".");
			let gen = ""
			while(amount > sentences.length) {
				sentences = sentences.concat(sentences);
			}
			for(let i=0; i<amount; ++i) {
				gen += sentences[i] + ".";
			}
			el.textContent = gen;
		}
		else if(props[1] == "words") {
			let words = baseText.split(" ");
			let gen = ""
			while(amount > words.length) {
				words = words.concat(words);
			}
			for(let i=0; i<amount; ++i) {
				gen += words[i] + " ";
			}
			el.textContent = gen;
			if(el.textContent[el.textContent.length-1] != '.') {
				if(el.textContent[el.textContent.length-1] == ' ') {
					el.textContent = el.textContent.slice(0, el.textContent.length-1);
				}
				el.textContent += '.';
			}
		}
		else {
			console.log("invalid argument " + props[2]);
			return;
		}
		el.classList.remove("lorem");
	})
}
lorem();
