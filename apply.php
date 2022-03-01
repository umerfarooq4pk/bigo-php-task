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
         
        // move_uploaded_file($temp_name,$path_filename_ext);
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
    die("YOUR JOB APPLICATION SUCESSFULLY SUBMITTED");
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <form method="post" action=""  enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" require>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" require>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">LinkedIn / personal profile link</label>
                    <input type="url" class="form-control" id="url" name="url" require>
                </div>
                <div class="mb-3">
                    <label for="cover_letter" class="form-label">Cover Letter</label>
                    <textarea class="form-control" id="cover_letter" name="cover_letter" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="resume" class="form-label">Upload Resume</label>
                    <input type="file" class="form-control" id="resume" name="resume" accept="application/pdf" require>
                </div>
              <div class="d-grid">
                <button type="submit" name="apply_submit" class="btn text-light main-bg btn-primary">Apply</button>
              </div>
            </form>
        </div>
    </div>
</div>