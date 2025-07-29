<?php
require_once 'dbcon.php'; // ← Connect to your database here (use PDO for security)

function sanitize($input) {
    return htmlspecialchars(trim($input));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = sanitize($_POST['fullName']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = sanitize($_POST['phone']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $role = $_POST['role'];

    if ($password !== $confirmPassword) {
        die("❌ Passwords do not match.");
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        die("❌ Email already registered.");
    }

    // Default empty values
    $dob = $gender = $county = $idNumber = $skills = $bio = $portfolioPath = "";
    $clientName = $serviceCategory = $clientLocation = "";

    // Handle roles
    if ($role === 'youth') {
        $dob = $_POST['dob'] ?? null;
        $gender = $_POST['gender'] ?? null;
        $county = $_POST['county'] ?? null;
        $idNumber = sanitize($_POST['idNumber']);
        $skills = sanitize($_POST['skills']);
        $bio = sanitize($_POST['bio']);

        // Portfolio upload
        if (isset($_FILES['portfolio']) && $_FILES['portfolio']['error'] === 0) {
            $targetDir = "uploads/portfolio/";
            if (!is_dir($targetDir)) mkdir($targetDir, 0755, true);

            $filename = uniqid() . "_" . basename($_FILES['portfolio']['name']);
            $targetFile = $targetDir . $filename;

            if (move_uploaded_file($_FILES['portfolio']['tmp_name'], $targetFile)) {
                $portfolioPath = $targetFile;
            } else {
                die("❌ Failed to upload portfolio.");
            }
        }
    } elseif ($role === 'client') {
        $clientName = sanitize($_POST['clientName']);
        $serviceCategory = sanitize($_POST['serviceCategory']);
        $clientLocation = sanitize($_POST['clientLocation']);
    }

    // Insert into DB
    $query = "INSERT INTO users 
        (full_name, email, phone, password, role, dob, gender, county, id_number, skills, bio, portfolio, client_name, service_category, client_location)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($query);
    $success = $stmt->execute([
        $fullName, $email, $phone, $hashedPassword, $role,
        $dob, $gender, $county, $idNumber, $skills, $bio, $portfolioPath,
        $clientName, $serviceCategory, $clientLocation
    ]);

    if ($success) {
        echo "✅ Registration successful. <a href='login.php'>Login here</a>";
    } else {
        echo "❌ Something went wrong. Please try again.";
    }
}
?>
