<?php
if(isset($_POST['apply_submit'])){
    if (($_FILES['resume']['name']!="")){
        $target_dir = "applications/";
        $file = $_FILES['resume']['name'];
        $path = pathinfo($file);
        $filename = $path['filename'].time();
        $ext = $path['extension'];
        $temp_name = $_FILES['resume']['tmp_name'];
        $path_filename_ext = $target_dir.$filename.".".$ext;
         
        move_uploaded_file($temp_name,$path_filename_ext);
    }
    $name = $_POST['name'];
    $email = $_POST['email'];
    $profile = $_POST['url'];
    $cover_letter = $_POST['cover_letter'];
    $resume = $path_filename_ext;
    $user_id = $_SESSION["user_id"];
    $qry = "INSERT INTO job_applications 
            (user_id, cover_letter, name, email, profile_url, resume) 
            VALUES('{$user_id}', '{$cover_letter}', '{$name}', '{$email}', '{$profile}', '{$resume}')";
    $result = $conn->query($qry);
    ?>
    <div class="text-center">YOUR JOB APPLICATION SUCESSFULLY SUBMITTED</div>
    <a href="index.php" class="btn btn-success">Edit Job Application</a>
    <?php
}elseif(isset($_POST['edit_job'])){
    $user_id = $_SESSION['user_id'];
    if (($_FILES['resume']['name']!="")){
        $target_dir = "applications/";
        $file = $_FILES['resume']['name'];
        $path = pathinfo($file);
        $filename = $path['filename'].time();
        $ext = $path['extension'];
        $temp_name = $_FILES['resume']['tmp_name'];
        $path_filename_ext = $target_dir.$filename.".".$ext;
         
        move_uploaded_file($temp_name,$path_filename_ext);
    }
    $cover_letter = $_POST['cover_letter'];
    if (($_FILES['resume']['name']!="")){
        $resume = $path_filename_ext;
        $qry = "UPDATE job_applications 
                SET cover_letter = '{$cover_letter}', profile_url = '{$profile}'
                WHERE user_id = {$user_id}";
        $result = $conn->query($qry);
    }else{
        $qry = "UPDATE job_applications 
                SET cover_letter = '{$cover_letter}'
                WHERE user_id = {$user_id}";
        $result = $conn->query($qry);
    }
    
    ?>
    <div class="text-center">YOUR JOB APPLICATION UPDATED SUCESSFULLY</div>
    <a href="index.php" class="btn btn-success">HOME</a>
    <?php
}else{
    $user_id = $_SESSION['user_id'];
    $qry = "SELECT * FROM job_applications WHERE user_id = '{$user_id}'";
    $result = $conn->query($qry);
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    if(count($data) > 0){
        $edit_job = $data[0];
        include_once('edit_job.php');
    }else{
        echo 'apply job';
        include_once('apply_job.php');
    }
}
?>