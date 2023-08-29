async function sendForm() {
  const form = document.querySelector('input[type="submit"]');

  form.classList.add("active");
  await delay(600);
  iconSkipForward.style.display = "block";
  animationSkipForward.playSegments([0, 60], true);
  await delay(1200);
  form.classList.remove("active");
  iconSkipForward.style.display = "none";
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
