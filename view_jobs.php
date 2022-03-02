<?php
if(isset($_POST['update_status'])){
  $status = $_POST['app_status'];
  $user_id = $_POST['user_id'];
  $qry = "UPDATE `job_applications` SET status = '{$status}' WHERE user_id = {$user_id}";
  $result = $conn->query($qry);
}
$qry = "SELECT * FROM `job_applications` WHERE status = 'pending review'";
$result = $conn->query($qry);
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Cover Letter</th>
      <th scope="col">Profile URL</th>
      <th scope="col">Dowload Resume</th>
      <th scope="col">Update Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
      foreach($data as $key => $row){
        ?>
        <tr>
          <td><?php echo ++$key; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['cover_letter']; ?></td>
          <td><?php echo $row['profile_url']; ?></td>
          <td>
            <a target="_blank" href="<?php echo $row['resume']; ?>" class="btn btn-primary">View Resume</a>
          </td>
          <td>
          <button type="button" class="btn btn-primary" onclick="changeStatus(<?php echo $row['user_id']?> )">
            Change Status
          </button>
          </td>
        </tr>
        <?php
      }
      ?>
    </tr>
  </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="UpdateAppStatus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdateAppStatusLabel">Change Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-auto">
              <form method="post" action="">
                <input type="hidden" name="user_id" id="user_id" value="">
                <div class="form-check">
                  <input class="form-check-input" type="radio" value="ready to interview" name="app_status" id="app_status1">
                  <label class="form-check-label" for="app_status1">
                    ready to interview
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" value="archived" name="app_status" id="app_status2" checked>
                  <label class="form-check-label" for="app_status2">
                    archived
                  </label>
                </div>
              <div class="d-grid mt-3">
                <button type="submit" name="update_status" class="btn text-light main-bg btn-primary">Update Status</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
  function changeStatus(user_id){
    console.log("changeStatus", user_id);
    document.getElementById("user_id").value = user_id;
    var myModal = new bootstrap.Modal(document.getElementById("UpdateAppStatus"), {});
    myModal.show();
  }
</script>