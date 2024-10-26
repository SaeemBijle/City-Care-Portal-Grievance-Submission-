<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "complaints_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$tracking_id = '';
$submission_success = false;
$error_message = '';
$problem = '';
$custom_problem = '';
$address = '';
$locality = '';
$mobile = '';
$description = '';
$evidence_path = ''; // Variable for storing the evidence file path

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle complaint submission
    $problem = $_POST['problem'];
    $custom_problem = $_POST['custom_problem'] ?? null;
    $address = trim($_POST['address']);
    $locality = trim($_POST['locality']);
    $mobile = trim($_POST['mobile']);
    $description = trim($_POST['description']);

    // Handle file upload
    if (isset($_FILES['evidence']) && $_FILES['evidence']['error'] == 0) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["evidence"]["name"]);
        
        // Check if directory exists, if not create it
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["evidence"]["tmp_name"], $targetFile)) {
            $evidence_path = $targetFile; // Store the file path for the database
        } else {
            $error_message = "Error uploading the evidence file.";
        }
    }

    // Generate a unique tracking ID
    $tracking_id = uniqid('CMP-', true);

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO complaints (tracking_id, problem, custom_problem, address, locality, mobile, description, evidence, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $status = 'In Review';

    try {
        // Execute the statement
        $stmt->bind_param("sssssssss", $tracking_id, $problem, $custom_problem, $address, $locality, $mobile, $description, $evidence_path, $status);
        $stmt->execute();
        $submission_success = true;
    } catch (mysqli_sql_exception $e) {
        $error_message = "Complaint submission failed: " . $e->getMessage();
    } finally {
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Submission Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e8eaf6;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #5e4b8b;
            margin-bottom: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }
        label {
            margin: 10px 0 5px;
            font-weight: bold;
            color: #5e4b8b;
        }
        select, textarea, input[type="text"], input[type="tel"], input[type="file"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #5e4b8b;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background-color: #4b3a6e;
        }
        .success-message, .error-message {
            display: block;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .hidden {
            display: none;
        }
    </style>
    <script>
        function toggleCustomProblemInput() {
            const problemSelect = document.getElementById('problem');
            const customProblemInput = document.getElementById('custom-problem-container');
            customProblemInput.classList.toggle('hidden', problemSelect.value !== 'others');
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize custom problem visibility based on the selected value
            toggleCustomProblemInput();
        });
    </script>
</head>
<body>

    <div class="container">
        <h1>Complaint Submission Form</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="problem">Select Your Complaint:</label>
            <select id="problem" name="problem" onchange="toggleCustomProblemInput()" required>
                <option value="">--Select a Problem--</option>
                <option value="sewage" <?php echo $problem === 'sewage' ? 'selected' : ''; ?>>Sewage</option>
                <option value="potholes" <?php echo $problem === 'potholes' ? 'selected' : ''; ?>>Potholes</option>
                <option value="water-shortage" <?php echo $problem === 'water-shortage' ? 'selected' : ''; ?>>Water Shortage</option>
                <option value="electricity-cutoff" <?php echo $problem === 'electricity-cutoff' ? 'selected' : ''; ?>>Electricity Cutoff</option>
                <option value="garbage" <?php echo $problem === 'garbage' ? 'selected' : ''; ?>>Garbage</option>
                <option value="corruption" <?php echo $problem === 'corruption' ? 'selected' : ''; ?>>Corruption</option>
                <option value="stray-dogs" <?php echo $problem === 'stray-dogs' ? 'selected' : ''; ?>>Stray Dogs</option>
                <option value="mosquito" <?php echo $problem === 'mosquito' ? 'selected' : ''; ?>>Mosquito</option>
                <option value="illegal-constructions" <?php echo $problem === 'illegal-constructions' ? 'selected' : ''; ?>>Illegal Constructions</option>
                <option value="road-blocks" <?php echo $problem === 'road-blocks' ? 'selected' : ''; ?>>Road Blocks</option>
                <option value="others" <?php echo $problem === 'others' ? 'selected' : ''; ?>>Others</option>
            </select>

            <div id="custom-problem-container" class="<?php echo $problem === 'others' ? '' : 'hidden'; ?>">
                <label for="custom-problem">Describe Your Custom Problem:</label>
                <input type="text" id="custom-problem" name="custom_problem" placeholder="Write your problem here..." value="<?php echo htmlspecialchars($custom_problem); ?>">
            </div>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" placeholder="Enter your address" required value="<?php echo htmlspecialchars($address); ?>">

            <label for="locality">Locality:</label>
            <input type="text" id="locality" name="locality" placeholder="Enter your locality" required value="<?php echo htmlspecialchars($locality); ?>">

            <label for="mobile">Mobile Number:</label>
            <input type="tel" id="mobile" name="mobile" placeholder="Enter your mobile number" required pattern="[0-9]{10}" value="<?php echo htmlspecialchars($mobile); ?>">

            <label for="description">Describe Your Problem:</label>
            <textarea id="description" name="description" rows="4" placeholder="Provide more details about your complaint..." required><?php echo htmlspecialchars($description); ?></textarea>

            <label for="evidence">Upload Evidence:</label>
            <input type="file" id="evidence" name="evidence" accept="image/*,application/pdf">

            <input type="submit" value="Submit Complaint">
        </form>

        <?php if ($submission_success): ?>
            <div class="success-message">
                Your complaint has been submitted successfully! Your tracking ID is: <strong><?php echo htmlspecialchars($tracking_id); ?></strong>
            </div>
        <?php elseif (!empty($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
    </div>

</body>
</html>
