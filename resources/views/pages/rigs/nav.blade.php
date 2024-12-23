<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full-Width Navbar</title>
    <style>
        /* Reset some default browser styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        /* Navbar Style */
        .navbar {
            display: flex;
            width: 100%;
            background-color: #636668;
            justify-content: center;
            border-bottom: 3px solid #ccc; /* Bottom border for navbar */
        }

        .navbar a {
            width: 50%; /* Each link takes up 50% of the width */
            padding: 15px;
            text-align: center;
            color: white;
            text-decoration: none;
            font-size: 18px;
            background-color: #636668;
            transition: background-color 0.3s ease;
            border-right: 1px solid #ccc; /* Separator between the links */
        }

        /* Remove right border for the last link */
        .navbar a:last-child {
            border-right: none;
        }

        /* Hover effect for the navbar links */
        .navbar a:hover {
            background-color: #ccc;
            color: #333; /* Change text color on hover */
        }

    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <a href="#">Page 1</a>
        <a href="#">Page 2</a>
    </div>

</body>
</html>
