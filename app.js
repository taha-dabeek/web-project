// app.js - this code runs in the BROWSER.
// You write this file yourself. The comments below tell you what is needed.
// Hints name the tools to use. They do not give you the answer.

// TODO 1: get the three elements you need from the page.
//         Hint: document.getElementById("q"), "go", "status", "results"

// TODO 2: write an async function that loads the data.
//         a) show the word "Loading..." in #status
//         b) send the request to api.php, with the search word in the URL
//            Hint: fetch("api.php?q=" + encodeURIComponent(word))
//            IMPORTANT: ask api.php. Never ask data.json directly.
//         c) check if the answer is good. Hint: response.ok
//            If it is not good, read the error message and show it in #status.
//         d) turn the answer into a JavaScript value. Hint: await response.json()

// TODO 3: put the items on the page.
//         a) empty #results first
//         b) for each item, make an <li> and put the name and note inside
//            Hint: document.createElement("li") and element.textContent
//            Use textContent, NOT innerHTML. You will be asked why.
//         c) if there are zero items, show "No results found." in #status

// TODO 4: run your function when the page opens,
//         and again when the button #go is clicked.

// TODO 5: add YOUR personal rule if it belongs here.
//         (Check the table in the handout. Most rules belong in api.php.)
