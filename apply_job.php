
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3 class="text-center">Submit Your Application</h3>
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