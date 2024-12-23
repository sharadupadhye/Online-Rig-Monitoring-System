<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Under Construction</title>
    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styles */
        body {
            background-color: #f0f4f8;
            font-family: 'Arial', sans-serif;
            height: 100vh; /* Full viewport height */
            display: flex;
            justify-content: center; /* Centers horizontally */
            align-items: center; /* Centers vertically */
            margin: 0;
        }

        /* Construction Container */
        .construction-container {
            text-align: center;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 500px;
            box-sizing: border-box;
        }

        h1 {
            font-size: 100px;
            margin-bottom: 20px;
            color: #FF5722; /* Construction theme color */
        }

        h2 {
            font-size: 28px;
            margin: 10px 0;
            color: #333;
            font-weight: 600;
        }

        p {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            font-size: 16px;
            color: white;
            background-color: #FF5722;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #E64A19;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .construction-container {
                padding: 30px;
            }

            h1 {
                font-size: 80px;
            }

            h2 {
                font-size: 24px;
            }

            p {
                font-size: 14px;
            }

            .btn {
                padding: 10px 20px;
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 60px;
            }

            h2 {
                font-size: 20px;
            }

            p {
                font-size: 12px;
            }

            .btn {
                padding: 8px 15px;
                font-size: 14px;
            }
        }
    </style>
</head>


    <div class="construction-container">
        <div class="construction-content">
            <h1>🚧</h1>
            <h2>Page Under Construction</h2>
            <p>We're working hard to bring you something awesome! Please check back later.</p>
            <a href="{{ route('Home') }}" class="btn" aria-label="Go to Homepage">Go to Homepage</a>
        </div>
    </div>
</body>
</html>
