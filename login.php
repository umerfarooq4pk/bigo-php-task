<?php
session_start();
include_once('header.php');
if(isset($_POST['login_form_submit'])){
    $password = md5($_POST['password']);
    $email = $_POST['password'];
    $qry = "SELECT * FROM users WHERE email= '{$email}' AND password= '{$password}'";
    $result = $conn->query($qry);
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    if(count($data) > 0){
        $user = $data[0];
        $_SESSION["loggedin"] = true;
        $_SESSION["role"] = $user['role'];
        $_SESSION["user_id"] = $user['id'];
        header("location: index.php");
        exit;
    }else{
        $_SESSION['error'] = "Email / Password not found or incorrect";
    }
}
?>
<!-- Login Form -->
<div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card shadow">
          <div class="card-title text-center border-bottom">
            <h2 class="p-3">Login</h2>
          </div>
          <div class="card-body">
              <?php if(isset($_SESSION['error'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
                <?php endif; ?>
            <form method="post" action="" id="login_form">
              <div class="mb-4">
                <label for="username" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" require />
              </div>
              <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" minlength="5" maxlength="8" require />
              </div>
              <div class="d-grid">
                <button type="submit" name="login_form_submit" class="btn text-light main-bg btn-primary">Login</button>
                <a href="register.php" class="btn text-light main-bg btn-success mt-3">Register</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
include_once('footer.php');