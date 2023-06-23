
<?php
session_start();
if (isset($_SESSION['person_name'])) {
  if($_SESSION['frelancer'])
    header("Location: /php/freelance.php");
  else 
    header("Location: /html/hire.html");
}
else{
    header("Location: /upwork_landingpage/");
}
?>