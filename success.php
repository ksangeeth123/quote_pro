<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="q.png" rel="icon">
    <title>QuotePro | Success</title>
    <style>
        body {
            background: #fff;
            padding: 20px;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .success-container {
            text-align: center;
            max-width: 600px;
            margin: auto;
        }

        .success-message {
            color: #4caf50;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .back-to-dashboard {
            text-decoration: none;
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <p class="success-message">Form submitted successfully!</p>
        <a href="add_quote.php" class="back-to-dashboard">Back to Dashboard</a>
    </div>
</body>
</html>
