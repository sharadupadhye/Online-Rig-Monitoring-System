<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logo in Corner</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .logo {
            position: fixed; /* Fixes the logo position */
            top: 20px; /* Distance from the top */
            right: 20px; /* Distance from the right */
            z-index: 1000; /* Ensures the logo is on top */
        }

        .logo img {
            width: 100px; /* Adjust the size as needed */
            height: auto; /* Maintain aspect ratio */
        }
    </style>
</head>
<body>
    <div class="logo">
        <img src="images/logo.jpg" alt="Logo">
    </div>
   
</body>
</html>
