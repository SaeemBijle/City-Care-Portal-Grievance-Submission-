<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 1.5rem;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .button {
            background-color: #6a5acd;
            color: white;
            padding: 0.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        .button:hover {
            background-color: #5c4fbc;
        }
        .error {
            color: red;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form id="adminLoginForm" onsubmit="return validateLogin(event)">
            <input type="text" id="username" placeholder="Username" required>
            <input type="password" id="password" placeholder="Password" required>
            <button type="submit" class="button">Login</button>
            <p class="error" id="error-message"></p>
        </form>
    </div>

    <script>
        // Fixed credentials
        const adminUsername = "admin";
        const adminPassword = "password123"; // Change this to your desired password

        function validateLogin(event) {
            event.preventDefault(); // Prevent form submission
            const username = document.getElementById("username").value;
            const password = document.getElementById("password").value;
            const errorMessage = document.getElementById("error-message");

            // Validate credentials
            if (username === adminUsername && password === adminPassword) {
                // Redirect to admin dashboard
                window.location.href = "admin_dashboard.php"; // Path to your admin dashboard
            } else {
                errorMessage.textContent = "Invalid username or password.";
            }
        }
    </script>
</body>
</html>
