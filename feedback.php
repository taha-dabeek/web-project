<?php
// feedback.php — bonus: POST form + htmlspecialchars
// Receives a message via POST and prints it back safely,
// so any HTML/JS typed in by the user cannot run on the page.

$message = isset($_POST['message']) ? $_POST['message'] : '';
$safeMessage = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Feedback received</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Thanks for your feedback!</h1>
    <p>You wrote:</p>
    <p><?php echo $safeMessage; ?></p>
    <p><a href="index.html">Back to search</a></p>
</body>
</html>
