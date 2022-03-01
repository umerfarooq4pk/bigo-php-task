<?php
// Initialize the session
session_start();
// unset($_SESSION["loggedin"]);
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include_once('header.php');
?>
<div class="container">
    <div class="row justify-content-center mt-5">
      <?php
        if($_SESSION['role'] == 'applicant'){
            include_once('apply.php');
        }else{
            include_once('view_jobs.php');
        }
      ?>
    </div>
  </div>
<?php
include_once('footer.php');