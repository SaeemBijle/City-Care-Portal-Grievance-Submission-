<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Information Hub</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        header {
            background-color: #E6E6FA; /* Lavender */
            color: #333;
            padding: 15px;
            text-align: center;
            box-shadow: 0px 4px 6px rgba(0,0,0,0.1);
        }
        nav {
            background-color: #333;
            box-shadow: 0px 2px 4px rgba(0,0,0,0.1);
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        nav ul li {
            margin: 0;
        }
        nav ul li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        nav ul li a:hover {
            background-color: #BA55D3; /* Medium Orchid */
        }
        main {
            padding: 20px;
            max-width: 1000px;
            margin: 20px auto;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        h2 {
            color: #4A90E2;
            border-bottom: 2px solid #E6E6FA; /* Lavender */
            padding-bottom: 5px;
            margin-bottom: 20px;
        }
        .info-section {
            margin-bottom: 30px;
        }
        .info-section p {
            margin: 5px 0;
            line-height: 1.6;
            font-size: 1rem;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 20px;
            box-shadow: 0px -2px 4px rgba(0,0,0,0.1);
        }
        footer p {
            margin: 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
            }
            nav ul li a {
                padding: 10px;
            }
            main {
                margin: 10px;
                padding: 15px;
            }
            h2 {
                font-size: 1.5rem;
            }
        }

        /* Content Section Styles */
        .content-section {
            display: none;
            opacity: 0;
            transition: opacity 0.5s ease;
        }
        .content-section.active {
            display: block;
            opacity: 1;
        }
    </style>
</head>
<body>
    <header>
        <h1>City Care Information Hub</h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="#" onclick="showSection('banks')">Banks</a></li>
            <li><a href="#" onclick="showSection('hospitals')">Hospitals</a></li>
            <li><a href="#" onclick="showSection('schools')">Schools</a></li>
            <li><a href="#" onclick="showSection('government')">Government Offices</a></li>
            <li><a href="#" onclick="showSection('other')">Other Places</a></li>
        </ul>
    </nav>
    
    <main>
        <section id="banks" class="content-section active">
            <h2>Banks</h2>
            <div class="info-section">
                <p><strong><a href="https://www.saraswatbank.com" target="_blank">Saraswat Bank</a></strong> - X4W5+9FM, Shree Balaji Apartment, Swami Nityanand Rd, Near Garden, HOC Colony, Panvel, Navi Mumbai, Maharashtra 410206. Phone: 022 2746 1161</p>
                <p><strong><a href="https://www.rblbank.com" target="_blank">RBL Bank Ltd</a></strong> - Crown Plaza, Shop no. 1/2, Uran Naka Circle, Old Panvel, Maharashtra 410206. Phone: 022 2749 0486</p>
                <p><strong><a href="https://www.icicibank.com" target="_blank">ICICI Bank Ltd</a></strong> - Plot No. 5, ICICI Bank Ltd, Panvel Matheran Rd, Sector 19, New Panvel East, Panvel, Navi Mumbai, Maharashtra 410206. Phone: 1800 1080</p>
            </div>
        </section>
        
        <section id="hospitals" class="content-section">
            <h2>Hospitals</h2>
            <div class="info-section">
                <p><strong><a href="https://lifelinepanvel.com/about-lifelinepanvel-hospital.php" target="_blank">Lifeline Hospital</a></strong> - OPP. S.T. STAND, राष्ट्रीय महामार्ग ४, Panvel, 410206. Phone: (123) 456-7893</p>
                <p><strong><a href="http://www.prachinhealthcare.com/" target="_blank">Prachin Hospital</a></strong> - Plot No.69/2, Near Hotel Garden Swami Nityanand Road, Lane, behind Garden Hotel, HOC Colony, Panvel, Maharashtra 410206. Phone: 022 7133 3258</p>
                <p><strong><a href="https://matoshreehospital.com/" target="_blank">Matoshree Hospital</a></strong> - behind LIC Building, Line Ali, Old Panvel, Panvel, Navi Mumbai, Maharashtra 410206. Phone: 098333 10836</p>
            </div>
        </section>
        
        <section id="schools" class="content-section">
            <h2>Schools</h2>
            <div class="info-section">
                <p><strong><a href="https://www.nhpspanvel.com/?utm_source=GMB&utm_medium=Organic&utm_campaign=Website" target="_blank">New Horizon Public School Panvel</a></strong> - Khanda Colony, Kaira Path, near Bhartiya Sweets, Sector - 13, Greater Khanda, Panvel, Navi Mumbai, Maharashtra 410206. Phone: 022 2746 1567</p>
                <p><strong><a href="https://mahatmainternational.ac.in/" target="_blank">Mahatma International School</a></strong> - Sector - 8, Greater Khanda, Panvel, Navi Mumbai, Maharashtra 410206 Phone: 022 2748 0295</p>
                <p><strong><a href="https://davnewpanvel.com/" target="_blank">DAV Public School, New Panvel</a></strong> - Plot No 267, 268, Sector-9, Sector 10, Panvel, Navi Mumbai, Maharashtra 410206. Phone: 022 2745 1793</p>
            </div>
        </section>
        
        <section id="government" class="content-section">
            <h2>Government Offices</h2>
            <div class="info-section">
                <p><strong>Tahsildar Office Panvel</strong> - X4W4+282, Banglow Society, Old Panvel, Panvel, Navi Mumbai, Maharashtra 410206</p>
                <p><strong><a href="https://www.panvelcorporation.com/" target="_blank">Panvel Municipal Corporation</a></strong> - X4Q5+X7G, Swami Nityanand Rd, opp. GOKHALE Marriage Hall, Old Panvel, Panvel, Tal, Navi Mumbai, Maharashtra 410206</p>
                <p><strong><a href="https://navimumbaipolice.gov.in/policestation?ps=12" target="_blank">Police Station Panvel</a></strong> - 746/10, Sai Nagar Rd, Banglow Society, Old Panvel, Panvel, Maharashtra 410206. Phone: 022 2745 2333</p>
            </div>
        </section>
        
        <section id="other" class="content-section">
            <h2>Other Places</h2>
            <div class="info-section">
                <p>Information about other important places in the city will be provided here.</p>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 City Information Hub. All rights reserved.</p>
    </footer>

    <script>
        function showSection(sectionId) {
            const sections = document.querySelectorAll('.content-section');
            
            sections.forEach(section => {
                section.classList.toggle('active', section.id === sectionId);
            });
        }

        // Show the first section by default
        document.addEventListener('DOMContentLoaded', () => {
            showSection('banks');
        });
    </script>
</body>
</html>
