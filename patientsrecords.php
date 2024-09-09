<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) { // Ensure nurse is logged in
    header("Location: login.html");
    exit();
}

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'healthcare_db');

// Check for a connection error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Records</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .content {
            padding: 60px 20px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        .dashboard-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1200px;
            margin: 20px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="content">
    <div class="dashboard-container">
        <h2>Patient Records</h2>
        <center>
            <table>
                <thead>
                    <tr>
                        <th>Record ID</th>
                        <th>Patient ID</th>
                        <th>Vital Signs</th>
                        <th>Notes</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // Fetch all patient records
                $sql = "SELECT * FROM patient_records";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $record_id = $row['id'];
                        $patient_id = $row['patient_id'];
                        $vital_signs = $row['vital_signs'];
                        $notes = $row['notes'];
                        $date = $row['record_date'];

                        echo '
                        <tr>
                            <td>' . $record_id . '</td>
                            <td>' . $patient_id . '</td>
                            <td>' . $vital_signs . '</td>
                            <td>' . $notes . '</td>
                            <td>' . $date . '</td>
                            <td>
                                <a href="r_update.php?id=' . $record_id . '" class="btn btn-warning btn-sm">Update</a>
                                <a href="r_delete.php?id=' . $record_id . '" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>';
                    }
                } else {
                    echo "<tr><td colspan='6'>No records found.</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </center>
    </div>
</div>

<!-- Include Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
