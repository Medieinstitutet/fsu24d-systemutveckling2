<?php

if($_SERVER['REQUEST_METHOD'] === "POST") {
// Your Mailgun API credentials
$apiKey = '';
$domain = 'sandbox3421b94cd0834c06af6b687e5d309267.mailgun.org'; // e.g., mg.yourdomain.com

// The API endpoint
$url = "https://api.mailgun.net/v3/$domain/messages";

$name = $_POST['name'];
// Email data
$data = [
    'from'    => "Your Name <you@$domain>",
    'to'      => 'mattias@developedbyme.com',
    'subject' => "Hello $name from Mailgun!",
    'text'    => $name.'! This is a test email sent via Mailgun API using PHP.'
];

// Initialize cURL
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, 'api:' . $apiKey);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// Execute the request
$result = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    echo 'Response: ' . $result;
}

// Close connection
curl_close($ch);
}
else {
    ?>
        <form method="POST">
            <input name="name" />
            <input type="submit" />
        </form>
    <?php
}


?>