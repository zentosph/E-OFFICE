<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Surat Masuk</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                        <form class="form-valide-with-icon" action="<?= base_url('home/aksi_surat_keluar') ?>" method="post" enctype="multipart/form-data">
                        <?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('message') ?>
    </div>
<?php elseif (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger" role="alert">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>
                        <!-- Alamat Email -->
    <div class="form-group">
        <h6 class="text-label">Alamat Email</h6>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
            </div>
            <input type="email" class="form-control" name="email" placeholder="Masukkan email penerima" required>
        </div>
    </div>

    <!-- Judul Email -->
    <div class="form-group">
        <h6 class="text-label">Judul Email</h6>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-heading"></i></span>
            </div>
            <input type="text" class="form-control" name="judul_email" placeholder="Masukkan judul email" required>
        </div>
    </div>

    <!-- File Surat -->
    <div class="form-group">
        <h6 class="text-label">File Surat</h6>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-file-pdf"></i></span>
            </div>
            <input type="file" class="form-control" name="file_surat" required>
        </div>
    </div>

    <!-- Pesan -->
    <div class="form-group">
        <h6 class="text-label">Pesan</h6>
        <textarea class="form-control" name="pesan" rows="5" placeholder="Masukkan pesan Anda di sini" required></textarea>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Kirim</button>
    <button type="button" class="btn btn-light">Batal</button>
</form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

