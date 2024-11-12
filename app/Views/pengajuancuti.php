<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Surat Cuti</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form class="form-valide-with-icon" action="<?= base_url('home/aksi_t_surat_cuti') ?>" method="post">
                                
                                <?php if (session()->getFlashdata('message')): ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session()->getFlashdata('message') ?>
                                    </div>
                                <?php elseif (session()->getFlashdata('error')): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= session()->getFlashdata('error') ?>
                                    </div>
                                <?php endif; ?>
                                
                                <!-- Jabatan -->
                                <div class="form-group">
                                    <h6 class="text-label">Jabatan</h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="jabatan" placeholder="Masukkan jabatan" required>
                                    </div>
                                </div>

                                <!-- Tanggal Pengajuan -->
                                <div class="form-group">
                                    <h6 class="text-label">Tanggal Pengajuan</h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        <input type="date" class="form-control" name="tanggal_pengajuan" required>
                                    </div>
                                </div>

                                <!-- Jenis Cuti -->
                                <div class="form-group">
                                    <h6 class="text-label">Jenis Cuti</h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-calendar-check"></i></span>
                                        </div>
                                        <select class="form-control" name="jenis_cuti" required>
                                            <option value="cuti_tahunan">Cuti Tahunan</option>
                                            <option value="cuti_khusus">Cuti Khusus</option>
                                            <option value="sakit_srt_dokter">Sakit Surat Dokter / MC</option>
                                            <option value="sakit_tanpa_srt_dokter">Sakit Tanpa Surat Dokter</option>
                                            <option value="wfh">WFH</option>
                                            <option value="itb">Ijin Tanpa Bayar / ITB</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Tanggal Mulai Cuti -->
                                <div class="form-group">
                                    <h6 class="text-label">Tanggal Mulai Cuti</h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        <input type="date" class="form-control" id="tanggal_mulai_cuti" name="tanggal_mulai_cuti" required>
                                    </div>
                                </div>

                                <!-- Tanggal Terakhir Cuti -->
                                <div class="form-group">
                                    <h6 class="text-label">Tanggal Terakhir Cuti</h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        <input type="date" class="form-control" id="tanggal_terakhir_cuti" name="tanggal_terakhir_cuti" required>
                                    </div>
                                </div>

                                <!-- Total Hari Cuti -->
                                <div class="form-group">
                                    <h6 class="text-label">Total Hari Cuti</h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-clock"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="total_hari_cuti" name="total_hari_cuti" readonly>
                                    </div>
                                </div>

                                <!-- Tanggal Kembali Kerja -->
                                <div class="form-group">
                                    <h6 class="text-label">Tanggal Kembali Kerja</h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        <input type="date" class="form-control" name="tanggal_kembali_kerja" required>
                                    </div>
                                </div>

                                <!-- Pengganti -->
                                <div class="form-group">
                                    <h6 class="text-label">Pengganti</h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                        <select class="form-control" name="id_pengganti" required>
                                            <?php foreach ($users as $user): ?>
                                                <option value="<?= $user->id_user ?>"><?= $user->username ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- Alasan Cuti -->
                                <div class="form-group">
                                    <h6 class="text-label">Alasan Cuti</h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-pencil-alt"></i></span>
                                        </div>
                                        <textarea class="form-control" name="alasan_cuti" required></textarea>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Tambah Surat Cuti</button>
                                <button type="button" class="btn btn-light">Batal</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript to automatically calculate total cuti days
    document.getElementById("tanggal_mulai_cuti").addEventListener("change", calculateCutiDays);
    document.getElementById("tanggal_terakhir_cuti").addEventListener("change", calculateCutiDays);

    function calculateCutiDays() {
        const startDate = new Date(document.getElementById("tanggal_mulai_cuti").value);
        const endDate = new Date(document.getElementById("tanggal_terakhir_cuti").value);

        if (startDate && endDate) {
            const diffTime = endDate - startDate;
            const diffDays = diffTime / (1000 * 3600 * 24);
            document.getElementById("total_hari_cuti").value = diffDays + 1; // Including start day
        }
    }
</script>
