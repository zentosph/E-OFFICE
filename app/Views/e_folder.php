<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Folder</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form class="form-valide-with-icon" action="<?= base_url('home/aksi_edit_folder/') ?>" method="post" enctype="multipart/form-data">
                                
                                <?php if (session()->getFlashdata('message')): ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session()->getFlashdata('message') ?>
                                    </div>
                                <?php elseif (session()->getFlashdata('error')): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= session()->getFlashdata('error') ?>
                                    </div>
                                <?php endif; ?>
                                
                                <!-- Nama Folder -->
                                <div class="form-group">
                                    <h6 class="text-label">Nama Folder</h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-folder"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="nama_folder" value="<?= $folder->nama_folder ?>" placeholder="Masukkan nama folder" required>
                                    </div>
                                </div>

                                <!-- Level -->
                                <div class="form-group">
                                    <h6 class="text-label">Level</h6>
                                    <select class="form-control" name="level" required>
                                        <option value="">Pilih Level</option>
                                        <?php foreach ($level as $lvl): ?>
                                            <option value="<?= $lvl->id_level ?>" <?= $lvl->id_level == $folder->level ? 'selected' : '' ?>><?= $lvl->level ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Icon Upload -->
                                <div class="form-group">
                                    <h6 class="text-label">Icon</h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-image"></i></span>
                                        </div>
                                        <input type="file" class="form-control" name="icon_gambar">
                                    </div>
                                    <?php if ($folder->icon): ?>
                                        <small class="form-text text-muted">Current icon: <?= $folder->icon ?></small>
                                    <?php endif; ?>
                                </div>
                                <input type="hidden" value="<?=$folder->id_folder?>" name="id">
                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Update Folder</button>
                                <a href="<?= base_url('home/Folder') ?>"><button type="button" class="btn btn-light">Batal</button></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
