async function sendForm() {
  if (busy == false) {
    let form = document.querySelector("form");
    busy = true;

    document.querySelector("error").className = "";

    validated = false;

    nameEl = document.getElementById("name");
    surnameEl = document.getElementById("surname");
    emailEl = document.getElementById("email");
    berichtEl = document.getElementById("bericht");

    if (berichtEl.value == "") {
      validated = true;
      setError("Geen bericht ingevuld", berichtEl);
    }

    if (!validateEmail(emailEl.value)) {
      validated = true;
      setError("Geen geldig email ingevuld", emailEl);
    }

    if (emailEl.value == "") {
      validated = true;
      setError("Geen email ingevuld", emailEl);
    }

    if (surnameEl.value == "") {
      validated = true;
      setError("Geen achternaam ingevuld", surnameEl);
    }

    if (nameEl.value == "") {
      validated = true;
      setError("Geen naam ingevuld", nameEl);
    }

    if (!validated) {
      form.action = "../php/send.php";
      form.submit();
      contactVector.classList.add("green");
      await delay(50);

      form.action = "";
      const formButton = document.querySelector('input[type="submit"]');

      formButton.classList.add("active");
      await delay(600);
      iconCheck.style.display = "block";
      iconCheckAnimation.playSegments([0, 60], true);
      await delay(1200);
      contactVector.classList.remove("green");
      formButton.classList.remove("active");
      iconCheck.style.display = "none";
      clearformButton();
      await delay(1200);
      busy = false;
    } else {
      busy = false;
    }
  }
}

function onInput(element) {
  element.classList.remove("error");

  if (document.querySelectorAll(".error").length == 0) {
    document.querySelector("error").className = "";
  }
}

function setError(error, element) {
  document.querySelector("error").innerHTML = error;
  document.querySelector("error").className = "active";
  element.classList.add("error");
}

function validateEmail(email) {
  var re = /\S+@\S+\.\S+/;
  return re.test(email);
}

function clearformButton() {
  document.getElementById("name").value = "";
  document.getElementById("surname").value = "";
  document.getElementById("email").value = "";
  document.getElementById("telefoonnummer").value = "";
  document.getElementById("bedrijfsnaam").value = "";
  document.getElementById("bericht").value = "";
}

let iconCheck = document.querySelector(".checkAnimation");
let contactVector = document.querySelector(".contactAnimation");

let iconCheckAnimation = bodymovin.loadAnimation({
  container: iconCheck,
  renderer: "svg",
  loop: false,
  autoplay: false,
  path: "../media/check.json",
});

let contactAnimation = bodymovin.loadAnimation({
  container: contactVector,
  renderer: "svg",
  loop: true,
  autoplay: true,
  path: "../media/contactLottie.json",
});

busy = false;

function delay(time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}
