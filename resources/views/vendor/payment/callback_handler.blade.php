<?php session()->reflash(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processing Payment...</title>
</head>
<body>
    <div style="text-align: center; margin-top: 50px; font-family: Arial, sans-serif;">
        <h3>Processing your payment...</h3>
        <p>Please wait.</p>
    </div>
    <script>
        // Break out of the Geidea iframe and redirect the top window
        window.top.location.href = "{!! $redirectUrl !!}";
    </script>
</body>
</html>
