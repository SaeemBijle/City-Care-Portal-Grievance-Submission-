City Care Portal
Overview
City Care Portal is a web-based application designed to facilitate citizen engagement by allowing users to submit and track complaints while providing admins with tools to manage and respond to those complaints. The platform features a dynamic dashboard that displays the latest city news, user information, and complaint tracking capabilities.

Features
User and Admin Login: Secure login for both users and admin.
Dashboard: Displays city news in a marquee format.
City Information: Users can view relevant city information.
Complaint Submission: Users must register to submit complaints (currently, this feature is not functioning as expected).
Complaint Tracking: Each complaint receives a unique tracking ID for user follow-up.
Admin Management: Admin can view user complaints, mark them as "Done" or "In Progress," and update city news.

Known Issues
Users must register first to file a complaint, but this feature is currently not working.
Users are unable to log in.

Technologies Used
Frontend: HTML, CSS, PHP
Backend: PHP
Server: Apache
Database: MySQL


Installation
Clone the repository:

git clone https://github.com/SaeemBijle/City-Care-Portal-Grievance-Submission.git
Navigate to the project directory:

Make sure Apache is installed and running.
Place the project files in the server's root directory (e.g., htdocs for XAMPP).
Set up MySQL:

Create the database and tables by executing the following SQL script:
sql

CREATE DATABASE IF NOT EXISTS complaints_db;
USE complaints_db;

-- Table: complaints
CREATE TABLE IF NOT EXISTS complaints (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    problem VARCHAR(255),
    description TEXT,
    address VARCHAR(255),
    locality VARCHAR(255),
    status ENUM('in review', 'in progress', 'done') DEFAULT 'in review',
    tracking_id VARCHAR(50) UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    custom_problem VARCHAR(255),
    mobile VARCHAR(15)
);

-- Table: evidence
CREATE TABLE IF NOT EXISTS evidence (
    problem VARCHAR(255) NOT NULL,
    custom_problem VARCHAR(255),
    address VARCHAR(255) NOT NULL,
    locality VARCHAR(255) NOT NULL,
    mobile VARCHAR(15) NOT NULL,
    description TEXT,
    evidence VARCHAR(255)
);
Usage

Start the Apache server.
Access the portal at http://localhost/file directory

Contact
[Saeem Bijle]
[saeembijle@gmail.com]
