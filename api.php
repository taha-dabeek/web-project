<?php
// api.php — my tiny web service
// Reads data.json, filters items by the search word, and sends back JSON.
//
// My rule (from Table B): "Starts with"
//   Instead of keeping items whose name just CONTAINS the search word,
//   I only keep items whose name STARTS WITH the search word.

header('Content-Type: application/json');

// --- Read the data file -----------------------------------------------
$dataFile = __DIR__ . '/data.json';
$raw = file_get_contents($dataFile);
$data = json_decode($raw, true);

// --- Read the search word ----------------------------------------------
$q = isset($_GET['q']) ? $_GET['q'] : '';

// --- Rule: search word too long → 400 -----------------------------------
if (strlen($q) > 30) {
    http_response_code(400);
    echo json_encode([
        'error' => 'Search word is too long. Please use 30 characters or fewer.'
    ]);
    exit;
}

$items = $data['items'];

// --- Filter: empty q keeps everything; otherwise apply my rule ---------
if ($q !== '') {
    $qLower = strtolower($q);
    $filtered = [];

    foreach ($items as $item) {
        $nameLower = strtolower($item['name']);

        // "Starts with" rule: keep only names that START WITH the search
        // word (case-insensitive), not just any name that contains it.
        if (strpos($nameLower, $qLower) === 0) {
            $filtered[] = $item;
        }
    }

    $items = $filtered;
}

// --- Build and send the response ----------------------------------------
$response = [
    'meta'  => $data['meta'],
    'count' => count($items),
    'items' => $items
];

echo json_encode($response);
