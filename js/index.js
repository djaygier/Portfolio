async function sendForm() {
  if (busy == false) {
    busy = true;

    const form = document.querySelector('input[type="submit"]');

    form.classList.add("active");
    await delay(600);
    iconSkipForward.style.display = "block";
    animationSkipForward.playSegments([0, 60], true);
    await delay(1200);
    form.classList.remove("active");
    iconSkipForward.style.display = "none";
    clearForm();
    await delay(1200);
    busy = false;
  }
}

function clearForm() {
  document.getElementById("name").value = "";
  document.getElementById("surname").value = "";
  document.getElementById("email").value = "";
  document.getElementById("telefoonnummer").value = "";
  document.getElementById("bedrijfsnaam").value = "";
  document.getElementById("bericht").value = "";
}

let iconSkipForward = document.querySelector(".checkAnimation");

let animationSkipForward = bodymovin.loadAnimation({
  container: iconSkipForward,
  renderer: "svg",
  loop: false,
  autoplay: false,
  path: "media/check.json",
});

function delay(time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}

busy = false;
