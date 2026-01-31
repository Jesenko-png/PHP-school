const datumInput = document.getElementById("datum");
const terminiDiv = document.getElementById("termini");
const feedbackDiv = document.getElementById("feedback");

// Postavi minimalni datum = sutra
const danas = new Date();
danas.setDate(danas.getDate() + 1);
const yyyy = danas.getFullYear();
const mm = String(danas.getMonth() + 1).padStart(2, "0");
const dd = String(danas.getDate()).padStart(2, "0");
datumInput.min = `${yyyy}-${mm}-${dd}`;

// Kada se promijeni datum, učitaj termine
datumInput.addEventListener("change", () => {
	const datum = datumInput.value;
	if (!datum) return;

	fetch(`get_termini.php?datum=${datum}`)
		.then((res) => res.json())
		.then((zauzeto) => {
			prikaziTermine(zauzeto);
		});
});

// Prikaz termina od 08:00 do 18:00 u pola sata
function prikaziTermine(zauzeto) {
	terminiDiv.innerHTML = "";
	const start = 8;
	const end = 18;

	for (let sat = start; sat < end; sat++) {
		for (let pol = 0; pol < 60; pol += 30) {
			let vreme = `${String(sat).padStart(2, "0")}:${String(pol).padStart(2, "0")}`;
			let btn = document.createElement("button");
			btn.textContent = vreme;

			// Provjera zauzetih termina
			if (zauzeto.includes(vreme)) {
				btn.disabled = true;
				btn.classList.add("zauzeto");
			} else {
				btn.classList.add("slobodno");
				btn.addEventListener("click", () => zakaziTermin(vreme));
			}

			terminiDiv.appendChild(btn);
		}
	}
}

// Funkcija za zakazivanje termina
function zakaziTermin(vreme) {
	const ime = prompt("Unesite ime:");
	if (!ime) return;

	const razlog = prompt("Unesite razlog zakazivanja:");
	if (!razlog) return;

	const formData = new FormData();
	formData.append("ime", ime);
	formData.append("datum", datumInput.value);
	formData.append("vreme", vreme);
	formData.append("razlog", razlog);

	fetch("zakazi.php", {
		method: "POST",
		body: formData,
	})
		.then((res) => res.text())
		.then((res) => {
			if (res === "OK") {
				feedbackDiv.innerHTML = "<p class='success'>Termin zakazan ✔</p>";
				datumInput.dispatchEvent(new Event("change")); // refresuj termine
			} else {
				feedbackDiv.innerHTML = "<p class='error'>Termin je zauzet ❌</p>";
			}

			setTimeout(() => (feedbackDiv.innerHTML = ""), 3000);
		});
}
