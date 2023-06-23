<?php
session_start();
require('conn.php');
if (isset($_SESSION['person_name'])) {
    // echo( $_SESSION['person_id']);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $jobTitle = validate($_POST['job_title']);
        $jobDescription = validate($_POST['job_description']);
        $jobCategory = validate($_POST['job_category']);
        $company = validate($_POST['company']);
        $location = validate($_POST['location']);
        $salary = validate($_POST['salary']);
        $personId = $_SESSION['person_id'];

        if (!empty($jobTitle) && !empty($jobDescription) && !empty($company)) {
            $sql = "INSERT INTO jobs (title, description, category, company, location, salary, person_id)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$jobTitle, $jobDescription, $jobCategory, $company, $location, $salary, $personId]);
echo "job created";
            
        } else {
            echo "Please fill in all required fields";
        }
    }
} else {
    header("Location: /html/login.html");
    exit;
}

function validate($text) {
    $text = trim($text);
    $text = htmlspecialchars($text);
    return $text;
}
?>
