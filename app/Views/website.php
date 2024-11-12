<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Website Settings</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form class="form-valide-with-icon" action="<?=base_url('home/aksi_edit_website')?>" method="post" enctype="multipart/form-data">
                                
                                <!-- New input field for Name -->
                                <div class="form-group">
                                    <h6 class="text-label">Name</h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                        </div>
                                        <input type="text" class="form-control" name="name" value="<?= $setting->nama ?>" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h6 class="text-label">Icon</h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-image"></i> </span>
                                        </div>
                                        <input type="file" class="form-control" name="icon" onchange="previewImage(event, 'iconPreview')" accept="image/*">
                                    </div>
                                    <img id="iconPreview" src="<?= base_url('images/' . $setting->icon) ?>" alt="Icon Preview" style="max-width: 100px; margin-top: 10px;">
                                </div>

                                <div class="form-group">
                                    <h6 class="text-label">Menu</h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-list"></i> </span>
                                        </div>
                                        <input type="file" class="form-control" name="menu" onchange="previewImage(event, 'menuPreview')" accept="image/*">
                                    </div>
                                    <img id="menuPreview" src="<?= base_url('images/' . $setting->menu) ?>" alt="Menu Preview" style="max-width: 100px; margin-top: 10px;">
                                </div>



                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="button" class="btn btn-light" onclick="window.history.back();">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(event, previewId) {
    const preview = document.getElementById(previewId);
    const file = event.target.files[0];
    const reader = new FileReader();
    
    reader.onload = function(e) {
        preview.src = e.target.result;
    }
    
    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = ''; // Reset the preview if no file is selected
    }
}
</script>
