<?php
include_once('header.php');
if(isset($_POST['register_user'])){
    $password = md5($_POST['password']);
    $email = $_POST['password'];
    $qry = "INSERT INTO users (email, password) VALUES('{$email}', '{$password}')";
    $result = $conn->query($qry);
    if($result){
        header("location: login.php");
        exit;
    }
}
?>
<!-- Login Form -->
<div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card shadow">
          <div class="card-title text-center border-bottom">
            <h2 class="p-3">Register</h2>
          </div>
          <div class="card-body">
            <form method="post" action="">
              <div class="mb-4">
                <label for="username" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="username" require />
              </div>
              <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" require />
              </div>
              <div class="d-grid">
                <button type="submit" name="register_user" class="btn text-light main-bg btn-success">Register</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
include_once('footer.php');