<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #f4f4f4;
        }
        /* Header Styles */
        header {
            background-color: #6a5acd;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        /* Main Content Styles */
        .content {
            padding: 2rem;
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .button {
            background-color: #6a5acd;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
            display: inline-block;
            margin-top: 1rem;
        }
        .button:hover {
            background-color: #5c4fbc;
        }
        .update-news {
            margin-top: 2rem;
        }
        .update-news textarea {
            width: 100%;
            height: 80px;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .complaints-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2rem;
        }
        .complaints-table th, .complaints-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .complaints-table th {
            background-color: #6a5acd;
            color: white;
        }
        .error {
            color: red;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <nav>
            <a href="index.php" class="button">Home</a>
        </nav>
    </header>

    <main class="content">
        <h2>Update News</h2>
        <div class="update-news">
            <textarea id="newsInput" placeholder="Enter new news..."></textarea>
            <button class="button" onclick="updateNews()">Update News</button>
            <p class="error" id="newsError"></p>
        </div>

        <h3>User Complaints</h3>
        <table class="complaints-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Problem</th>
                    <th>Address</th>
                    <th>Locality</th>
                    <th>Mobile</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Evidence</th>
                    <th>Change Status</th>
                </tr>
            </thead>
            <tbody id="complaintsBody">
                <!-- Complaints will be dynamically inserted here -->
            </tbody>
        </table>
    </main>

    <script>
        function updateNews() {
            const newsContent = document.getElementById("newsInput").value;
            const errorMessage = document.getElementById("newsError");

            if (newsContent.trim() === "") {
                errorMessage.textContent = "Please enter some news.";
                return;
            }

            localStorage.setItem("news", newsContent);
            alert("News updated successfully!");
            document.getElementById("newsInput").value = ""; // Clear input
            errorMessage.textContent = ""; // Clear error message
        }

        // Fetch complaints from the database
        async function fetchComplaints() {
            const response = await fetch('fetch_complaints.php');
            const complaints = await response.json();
            const complaintsBody = document.getElementById("complaintsBody");

            complaints.forEach(complaint => {
                const row = document.createElement("tr");
                row.innerHTML = `
                    <td>${complaint.id}</td>
                    <td>${complaint.problem}</td>
                    <td>${complaint.address}</td>
                    <td>${complaint.locality}</td>
                    <td>${complaint.mobile}</td>
                    <td>${complaint.description}</td>
                    <td>${complaint.status}</td>
                    <td>
                        ${complaint.evidence ? `<a href="${complaint.evidence}" target="_blank">View Evidence</a>` : 'No Evidence'}
                    </td>
                    <td>
                        <select onchange="changeStatus(${complaint.id}, this.value)">
                            <option value="">--Select--</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Done">Done</option>
                        </select>
                    </td>
                `;
                complaintsBody.appendChild(row);
            });
        }

        // Change complaint status
        async function changeStatus(complaintId, newStatus) {
            if (!newStatus) return;

            const response = await fetch('update_status.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ id: complaintId, status: newStatus })
            });

            const result = await response.json();

            if (result.success) {
                alert('Status updated successfully!');
                fetchComplaints(); // Refresh complaints
            } else {
                alert('Failed to update status: ' + (result.error || 'Unknown error.'));
            }
        }

        // Call the function to fetch complaints on page load
        window.onload = fetchComplaints;
    </script>
</body>
</html>
