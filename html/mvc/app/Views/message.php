<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

    <!-- STYLES -->

    <style>
        .message.success {
            background-color: #00FF00; 
        }

        .message.error {
            background-color: #FF0000; 
        }
    </style>
</head>
<body>
    <div class="message <?= $type ?>">
    <?php
        echo($text);
    ?>
    </div>
</body>
</html>
