<?php
session_start();
require('conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if (!empty($email) && !empty($password)) {
        $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email, $password]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $_SESSION['person_id'] = $user['id']; // Store the user's ID in the session
            $_SESSION['person_name'] = $user['first_name']; // Store the user's ID in the session
            if ($user['is_freelance'] == 1) {
                $_SESSION['frelancer']=true;
                echo($_SESSION['person_id']);
                header("Location: freelance.php");
                exit;
            } else {
                $_SESSION['frelancer']=true;
                echo($_SESSION['person_id']);
                header("Location: /html/hire.html");
                exit;
            }
        } else {
            echo "Invalid email or password";
        }
    } else {
        echo "Email and password are required";
    }
}

function validate($text) {
    $text = trim($text);
    $text = htmlspecialchars($text);
    return $text;
}
?>
