<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    echo "No admin ID provided.";
    exit();
}

$admin_id = $_SESSION['admin_id'];

$servername = "localhost";
$username = "root"; // Change this if needed
$password = "";     // Change this if needed
$dbname = "libDB";

// Connect to DB
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve admin data
$sql = "SELECT * FROM infoTd WHERE Admin_Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $admin_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Registration Success</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #acb6e5);
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: white;
            max-width: 600px;
            margin: 60px auto;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: #f6f8fa;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e1f5fe;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            margin-top: 30px;
            background-color: #4caf50;
            color: white;
            border: none;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>
    <div class="container">
        <?php if ($result->num_rows == 1):
            $admin = $result->fetch_assoc(); ?>
            <h2>🎉 Registration Successful</h2>
            <table>
                <tr><th>Full Name</th><td><?= htmlspecialchars($admin['Full_Name']) ?></td></tr>
                <tr><th>Admin ID</th><td><?= htmlspecialchars($admin['Admin_Id']) ?></td></tr>
                <tr><th>Email</th><td><?= htmlspecialchars($admin['Email']) ?></td></tr>
                <tr><th>Phone Number</th><td><?= htmlspecialchars($admin['Phone_Number']) ?></td></tr>
                <tr><th>Gender</th><td><?= htmlspecialchars($admin['Gender']) ?></td></tr>
                <tr><th>Library Branch</th><td><?= htmlspecialchars($admin['Library_branch']) ?></td></tr>
                <tr><th>Admin Role</th><td><?= htmlspecialchars($admin['admin_role']) ?></td></tr>
            </table>
            <a class="btn" href="index.php">Register Another Admin</a>
        <?php else: ?>
            <h2 style="color: red;">Error: Admin not found</h2>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
