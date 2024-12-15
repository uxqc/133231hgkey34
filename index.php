<?php
// Validni token
$validToken = "131213212ksoSwosKSX09XSKXm2xXMCId3Ixcl2lZa2LSLX0CLKWo346OXLs345xk4123K03KS321KCA231MFE312i43A312StoMi312RadisToNeN132eNE31E1s";

// Fetching the specific message from Discord
$token = 'MTMxNzc4MjY0ODU3OTY5MDU1Nw.GyAR2M.Yrhs8vcMzA2AAlzw_cbQu9pmAaXbGg8GcLLG-E'; // Your bot token
$channelId = '1317234156660461568'; // Your channel ID
$messageId = '1317234244321415208'; // The message ID

// Discord API endpoint to fetch a specific message
$url = "https://discord.com/api/v10/channels/{$channelId}/messages/{$messageId}";

// Initialize cURL to fetch the specific message from Discord
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bot $token"
]);

// Execute cURL request
$response = curl_exec($ch);
curl_close($ch);

// Decode the JSON response
$messageData = json_decode($response, true);

// Check if the message was fetched successfully
if ($messageData && isset($messageData['content'])) {
    // Use the content of the fetched message as the key
    $message = $messageData['content'];
} else {
    // If no message is found or there is an issue, use a default message
    $message = "Access Denied: Could not fetch message from Discord.";
}

// Proveravamo da li postoji token u URL-u
if (isset($_GET['token']) && $_GET['token'] === $validToken) {
    // If the token is valid, show the message from Discord
    echo "<h1>Your Gen Key: {$message}</h1>";
} else {
    // If the token is invalid or missing
    echo "<h1>Access Denied: Invalid or missing token.</h1>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="content">
    </div>

    <!-- JavaScript to remove the token from the URL after loading -->
    <script>
        // Remove token from URL (if present)
        if (window.location.search.indexOf('token') !== -1) {
            const url = new URL(window.location);
            url.searchParams.delete('token');
            // Update the URL without showing the token
            history.replaceState(null, null, url.toString());
        }
    </script>
</body>
</html>
