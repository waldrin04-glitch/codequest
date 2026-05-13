<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found | CodeQuest</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Figtree', sans-serif;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .container {
            text-align: center;
            padding: 2rem;
        }
        .code {
            font-size: 8rem;
            font-weight: 800;
            color: #3b82f6;
            line-height: 1;
        }
        .message {
            font-size: 1.5rem;
            font-weight: 600;
            color: #1f2937;
            margin-top: 1rem;
        }
        .sub {
            color: #6b7280;
            margin-top: 0.5rem;
        }
        .btn {
            display: inline-block;
            margin-top: 2rem;
            background: #3b82f6;
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 0.5rem;
            text-decoration: none;
            font-weight: 600;
        }
        .btn:hover { background: #2563eb; }
    </style>
</head>
<body>
    <div class="container">
        <div class="code">404</div>
        <div class="message">Page Not Found</div>
        <p class="sub">The page you're looking for doesn't exist.</p>
        <a href="/" class="btn">Go Back Home</a>
    </div>
</body>
</html>
