<?php
session_start();
require_once 'dbcon.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: ../VIEWS/login.php");
        exit();
    } else {
        // Prepare PDO statement
        $stmt = $conn->prepare("SELECT id, email, password, role FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);

        $user = $stmt->fetch(); // Fetch as associative array

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];

                // Redirect based on role
                if ($user['role'] === "youth") {
                    header("Location: ../VIEWS/dashboard.php");
                } elseif ($user['role'] === "client") {
                    header("Location: ../VIEWS/client_dashboard.php");
                } else {
                    header("Location: ../VIEWS/login.php");
                }
                exit();
            } else {
                $_SESSION['error'] = "Invalid email or password.";
                header("Location: ../VIEWS/login.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "Invalid email or password.";
            header("Location: ../VIEWS/login.php");
            exit();
        }
    }
}
