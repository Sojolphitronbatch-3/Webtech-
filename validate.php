<?php
session_start();
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input fields (same as before)
    // ... [Validation code remains the same as yours] ...

    // File Upload Validation
    if ($_FILES['library_id_proof']['error'] == UPLOAD_ERR_NO_FILE) {
        $errors['library_id_proof'] = "ID proof is required";
    } elseif ($_FILES['library_id_proof']['error'] == UPLOAD_ERR_OK) {
        $allowed = ['image/jpeg', 'image/png', 'application/pdf'];
        if (!in_array($_FILES['library_id_proof']['type'], $allowed)) {
            $errors['library_id_proof'] = "Only JPG, PNG, or PDF files allowed";
        } elseif ($_FILES['library_id_proof']['size'] > 2000000) {
            $errors['library_id_proof'] = "File too large (max 2MB)";
        }
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['form_data'] = $_POST;
        header("Location: index.php");
        exit();
    } else {
        // Move uploaded file to "uploads" directory
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        $file_path = $upload_dir . basename($_FILES["library_id_proof"]["name"]);
        move_uploaded_file($_FILES["library_id_proof"]["tmp_name"], $file_path);

        // Store form data into database
        $servername = "localhost";
        $username = "root"; // Change to your DB username
        $password = "";     // Change to your DB password
        $dbname = "libDB";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO infoTd (Full_Name, Admin_Id, Email, Phone_Number, Gender, Library_branch, admin_role)
                                VALUES (?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("sssssss",
            $_POST["admin_full_name"],
            $_POST["admin_id"],
            $_POST["admin_email"],
            $_POST["admin_phone"],
            $_POST["Gender"],
            $_POST["library_branch"],
            $_POST["admin_role"]
        );

        if ($stmt->execute()) {
            $_SESSION['success'] = "Registration successful!";
            $_SESSION['admin_id'] = $_POST["admin_id"]; // store to fetch in submit_admin.php
            $stmt->close();
            $conn->close();
            header("Location: submit_admin.php");
            exit();
        } else {
            $_SESSION['errors'] = ["db" => "Database error: " . $stmt->error];
            header("Location: index.php");
            exit();
        }
    }
}
?>
