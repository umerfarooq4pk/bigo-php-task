
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3 class="text-center">Submit Your Application</h3>
            <form method="post" action=""  enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <p class="form-control"><?php echo $edit_job['name']; ?></p>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <p class="form-control"><?php echo $edit_job['email']; ?></p>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">LinkedIn / personal profile link</label>
                    <p class="form-control"><?php echo $edit_job['profile_url']; ?></p>
                </div>
                <div class="mb-3">
                    <label for="cover_letter" class="form-label">Cover Letter</label>
                    <textarea class="form-control" id="cover_letter" name="cover_letter" rows="3"><?php echo $edit_job['cover_letter']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="resume" class="form-label">Upload Resume</label>
                    <input type="file" class="form-control" id="resume" name="resume" accept="application/pdf">
                </div>
              <div class="d-grid">
                <button type="submit" name="edit_job" class="btn text-light main-bg btn-primary">Apply</button>
              </div>
            </form>
        </div>
    </div>
</div>