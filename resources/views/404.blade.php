<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Page</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .error-container {
            text-align: center;
            max-width: 400px;
        }

        .error-code {
            font-size: 120px;
            font-weight: bold;
            color: #e74c3c;
            margin: 0;
        }

        .error-message {
            font-size: 24px;
            color: #555;
            margin: 10px 0;
        }

        .back-home {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .back-home:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<div class="error-container">
    <h1 class="error-code">404</h1>
    <p class="error-message">Page not found.</p>
    <a href="/" class="back-home">Back to Home</a>
</div>

</body>
</html>