<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Dashboard</title>
    <style>
        /* Global Colors */
        :root {
            --primary-color: #6a5acd; /* Lavender */
            --accent-color: #9370db; /* Medium Lavender */
            --accent-color-dark: #7b68ee; /* Darker Lavender */
            --text-color: #333; /* Dark Text */
            --background-light: #f4f4f4; /* Light Background */
            --background-main: #ffffff; /* Main Content Background */
            --box-shadow: rgba(0, 0, 0, 0.1); /* Box Shadow Color */
            --button-bg: #8a2be2; /* Blue Violet Background */
            --button-bg-hover: #7b68ee; /* Darker Blue Violet on Hover */
            --hero-overlay: rgba(0, 0, 0, 0.4); /* Dark Overlay for Hero Section */
            --hero-text-color: #ffffff; /* White Text for Hero Section */
        }

        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: var(--text-color);
            background-color: var(--background-light);
        }

        /* Header Styles */
        header {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .logo h1 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .nav {
            display: flex;
            gap: 1rem;
        }

        .nav a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .nav a:hover {
            background-color: var(--accent-color);
        }

        /* Hero Section Styles */
        .hero {
            position: relative;
            background: url('hero-image.jpg') no-repeat center center;
            background-size: cover;
            color: var(--hero-text-color);
            text-align: center;
            padding: 3rem 1.5rem;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--hero-overlay);
            z-index: 1;
        }

        .hero h2,
        .hero p {
            position: relative;
            z-index: 2;
        }

        /* Main Content Styles */
        .content {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            background-color: var(--background-main);
            border-radius: 8px;
            box-shadow: 0 2px 4px var(--box-shadow);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .button-group {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .button-group .button {
            display: inline-block;
            padding: 1rem 2rem;
            background-color: var(--accent-color);
            color: white;
            text-decoration: none;
            border-radius: 0.3125rem;
            font-size: 1rem;
            transition: background-color 0.3s;
            text-align: center;
        }

        .button-group .button:hover {
            background-color: var(--accent-color-dark);
        }

        /* Marquee Styles */
        .marquee {
            background-color: var(--accent-color);
            color: white;
            padding: 0.5rem;
            font-size: 1rem;
            overflow: hidden;
            white-space: nowrap;
        }

        /* Footer Styles */
        footer {
            background-color: var(--primary-color);
            color: white;
            text-align: center;
            padding: 1rem;
            position: fixed;
            width: 100%;
            bottom: 0;
            box-shadow: 0 -2px 4px var(--box-shadow);
        }

        footer p {
            margin: 0;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .hero h2 {
                font-size: 1.5rem;
            }

            .button-group {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <h1>City Care</h1>
        </div>
        <nav class="nav">
            <a href="Register.php" class="button">Register</a>
            <a href="Login.php" class="button">Login</a>
            <a href="admin_login.php" class="button">Admin Login</a>
        </nav>
    </header>

    <div class="hero">
        <h2>Welcome to City Care</h2>
        <p>Your go-to platform for filing and tracking complaints.</p>
    </div>

    <!-- Marquee Section -->
    <div class="marquee">
        <marquee behavior="scroll" direction="left" id="newsMarquee">Loading news...</marquee>
    </div>

    <main class="content">
        <div class="button-group">
            <a href="submit_complaint.php" class="button">File a Complaint</a>
            <a href="track_complaint.php" class="button">Track a Complaint</a>
            <a href="city_info.php" class="button">City Info</a>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 City Dashboard. All rights reserved.</p>
    </footer>

    <script>
        // Load news from localStorage
        const news = localStorage.getItem("news") || "No news available.";
        document.getElementById("newsMarquee").textContent = news;
    </script>
</body>
</html>
