<?php
require('conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = validate($_POST['firstname']);
    $lastName = validate($_POST['lastname']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    
    // Set freelancer based on the checkbox value
    $freelancer = isset($_POST['freelancer']) && $_POST['freelancer'] === 'true' ? 1 : 0;

    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($password)) {
        $sql = "INSERT INTO users (first_name, last_name, email, password, is_freelance) VALUES (?, ?, ?, ?, ?)";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute([$firstName, $lastName, $email, $password, $freelancer]);
      
            // Registration successful, redirect to desired page
            header("Location: /html/login.html");
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                echo "Email duplication: ";
                echo "Something happened";
                header("Location: /html/register.html");
            }
        }
    } else {
        die('Some missing information');
    }
}

function validate($text) {
    $text = trim($text);
    $text = htmlspecialchars($text);
    return $text;
}
?>
