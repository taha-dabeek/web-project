<?php
// api.php - this code runs on the SERVER.
// The browser never sees these lines. It only sees what you echo.
// You write this file yourself. Hints name the tools, not the answer.

// TODO 1: read data.json and turn it into a PHP array.
//         Hint: file_get_contents("data.json") then json_decode($raw, true)

// TODO 2: read the search word from the address.
//         Hint: $_GET["q"] - it may not be there at all, so check first.

// TODO 3: if the search word is longer than 30 characters, stop here:
//         send status 400 and a JSON object with an "error" message.
//         Hint: http_response_code(400)

// TODO 4: if there is no search word, keep all items.
//         If there is one, keep only the items whose name contains it.
//         The search must ignore capital letters.
//         Hint: stripos($name, $q) !== false

// TODO 5: apply YOUR personal rule from the table in the handout.

// TODO 6: send the answer back as JSON, in this shape:
//         { "meta": {...}, "count": <how many items you are sending>, "items": [...] }
//         Copy "meta" straight from data.json.
//         Hint: header("Content-Type: application/json");
//               echo json_encode($out);
