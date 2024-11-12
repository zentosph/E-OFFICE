<style>
    .tdcoy > td {
        color: black;
    }

    .modal-body > p {
        color: black;
    }
</style>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Surat Cuti</h4>
                    <span class="ml-1">Datatable</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Jabatan</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Jenis Cuti</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($surat_cuti as $cuti): ?>
                                    <tr class="tdcoy">
                                        <td><?= $cuti->requester_username ?></td>
                                        <td><?= $cuti->jabatan ?></td>
                                        <td><?= $cuti->tanggal_pengajuan ?></td>
                                        <td><?= $cuti->jenis_cuti ?></td>
                                        <td><?= ucfirst($cuti->status) ?></td>
                                        <td>
                                            
                                            <a href="<?=base_url('home/tolakganti/'.$cuti->id_surat_cuti)?>"><button class="btn btn-danger">Tolak</button></a>
                                            <a href="<?=base_url('home/setujuganti/'.$cuti->id_surat_cuti)?>"><button class="btn btn-dark">setuju</button></a>
                                            <!-- View Details button to trigger modal -->
                                            <button class="btn btn-info" data-toggle="modal" data-target="#detailModal-<?= $cuti->id_surat_cuti ?>">
                                                View Details
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal for Viewing Details -->
                                    <div class="modal fade" id="detailModal-<?= $cuti->id_surat_cuti ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="detailModalLabel">Detail Surat Cuti</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Username:</strong> <?= $cuti->requester_username ?></p>
                                                    <p><strong>Jabatan:</strong> <?= $cuti->jabatan ?></p>
                                                    <p><strong>Tanggal Pengajuan:</strong> <?= $cuti->tanggal_pengajuan ?></p>
                                                    <p><strong>Jenis Cuti:</strong> <?= $cuti->jenis_cuti ?></p>
                                                    <p><strong>Tanggal Mulai Cuti:</strong> <?= $cuti->tanggal_mulai_cuti ?></p>
                                                    <p><strong>Tanggal Terakhir Cuti:</strong> <?= $cuti->tanggal_terakhir_cuti ?></p>
                                                    <p><strong>Total Hari Cuti:</strong> <?= $cuti->total_hari_cuti ?></p>
                                                    <p><strong>Tanggal Kembali Kerja:</strong> <?= $cuti->tanggal_kembali_kerja ?></p>
                                                    <p><strong>Digantikan Oleh</strong> <?= $cuti->substitute_username ?></p>
                                                    <p><strong>Persetujuan Pengganti:</strong> <?= ucfirst($cuti->persetujuan_pengganti) ?></p>
                                                    <p><strong>Alasan Cuti:</strong> <?= $cuti->alasan_cuti ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Username</th>
                                        <th>Jabatan</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Jenis Cuti</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?=base_url('vendor/global/global.min.js')?>"></script>
<script src="<?=base_url('js/quixnav-init.js')?>"></script>
<script src="<?=base_url('js/custom.min.js')?>"></script>
<script src="<?=base_url('vendor/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?=base_url('js/plugins-init/datatables.init.js')?>"></script>
