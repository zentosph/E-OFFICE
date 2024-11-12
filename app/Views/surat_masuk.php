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
                            <form class="form-valide-with-icon" action="<?=base_url('home/aksi_surat_masuk')?>" method="post" enctype="multipart/form-data">
    
                            <!-- File Surat -->
                                <div class="form-group">
                                    <h6 class="text-label">File Surat</h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-file-pdf"></i> </span>
                                        </div>
                                        <input type="file" class="form-control" name="file_surat" accept=".pdf" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h6 class="text-label">Tanggal Terima</h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-file-pdf"></i> </span>
                                        </div>
                                        <input type="date" class="form-control" name="tanggal" required>
                                    </div>
                                </div>

                                <!-- Akses Berdasarkan (Level/Folder) -->
                                <div class="form-group">
                                    <h6 class="text-label">Akses Berdasarkan</h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                        </div>
                                        <select class="form-control" name="akses" id="akses" required>
                                            <option value="">Pilih</option>
                                            <option value="folder">Folder</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Checkbox Folder (hidden by default) -->
<div class="form-group" id="checkbox-folder" style="display: none;">
    <h6 class="text-label">Dapat Diakses Oleh Folder</h6>
    <?php foreach ($folders as $folder) { ?>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="folder[]" value="<?= $folder->id_folder ?>" id="folder<?= $folder->id_folder ?>">
            <label class="form-check-label" for="folder<?= $folder->id_folder ?>"><?= $folder->nama_folder ?></label>
        </div>
    <?php } ?>
</div>


                                <div class="form-group" id="select-user" style="display: none;">
                                    <h6 class="text-label">Pilih User</h6>
                                    <div class="input-group" id="user-selection-container" style="display: flex; flex-wrap: wrap;">
                                        <!-- Dropdown user pertama -->
                                        <select class="form-control" name="user[]" id="user-select-1" style="flex: 1 1 30%; margin-right: 10px; margin-bottom: 10px;">
                                            <?php foreach ($user as $key) { ?>
                                                <option value="<?=$key->id_user?>"><?=$key->username?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <!-- Tombol untuk menambah dropdown user -->
                                    <button type="button" class="btn btn-success" id="add-user-btn" style="margin-top: 10px;">+ Tambah User</button>

                                    <!-- Menampilkan jumlah user yang dipilih -->
                                    <small id="user-quantity" class="form-text text-muted">Pilih user lebih dari satu dengan menahan tombol Ctrl (Cmd) saat memilih.</small>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk toggle antara folder dan user serta menampilkan jumlah user -->
<script>
  // Fungsi untuk menghitung jumlah user yang dipilih
function updateUserQuantity() {
    var userSelects = document.querySelectorAll('[id^="user-select-"]');
    var totalSelected = 0;
    userSelects.forEach(function(select) {
        totalSelected += select.selectedOptions.length; // Menjumlahkan jumlah user yang dipilih dari setiap dropdown
    });
    document.getElementById('user-quantity').textContent = 'Jumlah User yang Dipilih: ' + totalSelected;
}

document.getElementById('akses').addEventListener('change', function() {
    var aksesValue = this.value;

    if (aksesValue === 'folder') {
        document.getElementById('checkbox-folder').style.display = 'block';
        document.getElementById('select-user').style.display = 'none';
    } else if (aksesValue === 'user') {
        document.getElementById('checkbox-folder').style.display = 'none';
        document.getElementById('select-user').style.display = 'block';

        // Pastikan hanya menambahkan event listener sekali
        document.getElementById('add-user-btn').addEventListener('click', function() {
            var userSelectionContainer = document.getElementById('user-selection-container');
            var userSelectCount = userSelectionContainer.querySelectorAll('select').length; // Menghitung jumlah dropdown
            var newSelectId = 'user-select-' + (userSelectCount + 1); // Membuat ID baru untuk select

            // Membuat dropdown baru
            var newSelect = document.createElement('select');
            newSelect.classList.add('form-control');
            newSelect.name = 'user[]';
            newSelect.id = newSelectId;
            newSelect.style.flex = '1 1 30%'; // Flex untuk mengatur lebar dropdown
            newSelect.style.marginRight = '10px'; // Jarak antar dropdown
            newSelect.style.marginBottom = '10px'; // Jarak antar baris

            <?php foreach ($user as $key) { ?>
                newSelect.innerHTML += '<option value="<?=$key->id_user?>"><?=$key->username?></option>';
            <?php } ?>

            // Menambahkan dropdown baru ke container
            userSelectionContainer.appendChild(newSelect);

            // Mengupdate jumlah user yang dipilih
            updateUserQuantity();
        });
    }
});
</script>
