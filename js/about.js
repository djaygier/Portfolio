async function loadIframe() {
  await delay(1300);
  document.getElementById("trailer").src =
    "https://www.youtube.com/embed/Fbb4bFZVE2M?si=Y7aUaXhyFFElzn8n";
}
function delay(time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}
