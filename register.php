
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        /* Global Colors */
        :root {
            --primary-color: #6a5acd; /* Lavender */
            --accent-color: #9370db; /* Medium Lavender */
            --text-color: #333; /* Dark Text */
            --background-light: #f4f4f4; /* Light Background */
            --input-border: #ccc; /* Input Border Color */
            --button-bg: #8a2be2; /* Blue Violet Background */
            --button-bg-hover: #7b68ee; /* Darker Blue Violet on Hover */
        }

        body {
            font-family: Arial, sans-serif;
            background: var(--background-light);
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 2em auto;
            padding: 2em;
            background-color: #ffffff;
            border-radius: 0.5em;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-container {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
            gap: 2em;
        }

        .image-side {
            flex: 1;
            max-width: 300px;
            display: flex;
            justify-content: center;
        }

        .image-side img {
            width: 100%;
            height: auto;
            border-radius: 0.5em;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-side {
            flex: 2;
            max-width: 800px;
            margin: auto;
        }

        h1, h2 {
            text-align: center;
            color: var(--primary-color);
        }

        hr {
            border: none;
            height: 2px;
            background-color: var(--primary-color);
            margin: 1em 0;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 1em;
            margin-bottom: 1em;
        }

        .form-group {
            flex: 1;
            margin-bottom: 1em;
        }

        label {
            display: block;
            margin-bottom: 0.2em;
            font-weight: bold;
            color: #555;
        }

        input, select {
            width: 100%;
            padding: 0.75em;
            border: 1px solid var(--input-border);
            border-radius: 0.25em;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 0.75em;
            border: none;
            border-radius: 0.25em;
            background-color: var(--button-bg);
            color: white;
            font-size: 1em;
            cursor: pointer;
        }

        button:hover {
            background-color: var(--button-bg-hover);
        }

        .pincode-locality-row,
        .username-password-row {
            display: flex;
            flex-wrap: wrap;
            gap: 1em;
            margin-bottom: 1em;
        }

        .pincode-locality-row .form-group,
        .username-password-row .form-group {
            flex: 1;
        }

        .pincode-locality-row .form-group {
            max-width: calc(50% - 0.5em);
        }

        .username-password-row .form-group {
            max-width: calc(33.33% - 0.67em);
        }

        .declaration {
            display: flex;
            align-items: center;
            gap: 0.5em;
            margin-bottom: 1em;
        }

        .declaration input[type="checkbox"] {
            margin: 0;
        }

        .declaration label {
            font-size: 0.9em;
            color: #555;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .form-container {
                flex-direction: column;
                align-items: center;
            }
            .image-side {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="image-side">
                <img src="Emblem.jpg" alt="Side Image">
            </div>
            <div class="form-side">
                <form action="process_registration.php" method="post">
                    <h1>Registration Form</h1>
                    <hr>
                    <h2>Personal Information</h2>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstName">First Name:</label>
                            <input type="text" id="firstName" name="firstName" required>
                        </div>
                        <div class="form-group">
                            <label for="middleName">Middle Name:</label>
                            <input type="text" id="middleName" name="middleName">
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name:</label>
                            <input type="text" id="lastName" name="lastName" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="mobile">Mobile:</label>
                            <input type="tel" id="mobile" name="mobile" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" id="dob" name="dob" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" required>
                    </div>
                    <div class="pincode-locality-row">
                        <div class="form-group">
                            <label for="pincode">Pincode:</label>
                            <input type="text" id="pincode" name="pincode" required>
                        </div>
                        <div class="form-group">
                            <label for="locality">Locality:</label>
                            <input type="text" id="locality" name="locality" required>
                        </div>
                    </div>
                    <hr>
                    <h2>Login Details</h2>
                    <div class="username-password-row">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password:</label>
                            <input type="password" id="confirmPassword" name="confirmPassword" required>
                        </div>
                    </div>
                    <div class="declaration">
                        <input type="checkbox" id="declaration" name="declaration" required>
                        <label for="declaration">
                            I agree to the terms and conditions. I declare that the above-mentioned information submitted by me is true and correct to my knowledge and belief. I hereby agree to be liable for legal consequences for any information found incorrect or false under section 200 of the Indian Penal Code 1960.
                        </label>
                    </div>
                    <button type="submit">Register</button>
                    <p style="text-align: center; margin-top: 1em;">
                        Already have an account? <a href="login.php" style="color: var(--button-bg);">Login here</a>.
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
