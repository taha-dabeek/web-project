// app.js — runs in the browser
// Asks api.php for data, and puts the answer on the page.

const input = document.getElementById("q");
const button = document.getElementById("go");
const status = document.getElementById("status");
const results = document.getElementById("results");

// Ask api.php (never data.json directly) and show whatever comes back.
async function runSearch() {
  const word = input.value;

  status.textContent = "Loading...";
  results.innerHTML = "";

  try {
    const response = await fetch("api.php?q=" + encodeURIComponent(word));
    const data = await response.json();

    if (!response.ok) {
      // The server sent back {"error": "..."} — show that message.
      status.textContent = data.error || "Something went wrong.";
      return;
    }

    renderItems(data.items);

    if (data.items.length === 0) {
      status.textContent = "No results found.";
    } else {
      status.textContent = data.count + " item(s) found.";
    }
  } catch (err) {
    status.textContent = "Could not reach the server.";
  }
}

// Build each result item safely with createElement/textContent.
// Never innerHTML for data that came from the file — that would let
// the <b>bold</b> in the safety-test item run as real HTML.
function renderItems(items) {
  results.innerHTML = "";

  items.forEach((item) => {
    const li = document.createElement("li");

    const name = document.createElement("strong");
    name.textContent = item.name;

    const note = document.createElement("p");
    note.textContent = item.note;

    li.appendChild(name);
    li.appendChild(note);
    results.appendChild(li);
  });
}

button.addEventListener("click", runSearch);
window.addEventListener("DOMContentLoaded", runSearch);
