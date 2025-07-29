<?php
session_start();
require_once '../INCLUDES/login.inc.php'; // <- Adjust DB path accordingly

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    // Validate
    if (empty($email) || empty($password)) {
        $error = "All fields are required.";
    } else {
        $stmt = $conn->prepare("SELECT id, email, password, role FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $db_email, $db_password, $role);
            $stmt->fetch();

            if (password_verify($password, $db_password)) {
                $_SESSION['user_id'] = $id;
                $_SESSION['email'] = $db_email;
                $_SESSION['role'] = $role;

                // Redirect to role-specific dashboard
                if ($role == "youth") {
                    header("Location: dashboard.php");
                } elseif ($role == "client") {
                    header("Location: client_dashboard.php");
                } else {
                    header("Location: login.php"); // Fallback
                }
                exit();
            } else {
                $error = "Invalid email or password.";
            }
        } else {
            $error = "Invalid email or password.";
        }
        $stmt->close();
    }
}