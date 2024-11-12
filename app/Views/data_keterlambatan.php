<style>
    .tdcoy > td {
        color: black;
    }

    .modal-body > p{
        color: black;
    }
</style>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Surat Keterlambatan</h4>
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
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Tanggal</th>
                                        <th>Total Keterlambatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($surat_keterlambatan as $key): ?>
                                    <tr class="tdcoy">
                                        <td><?= $key->nama ?></td>
                                        <td><?= $key->nik ?></td>
                                        <td><?= $key->tanggal ?></td>
                                        <td><?= $key->total_keterlambatan ?></td>
                                        <td>
                                            <!-- View Details button to trigger modal -->
                                            <button class="btn btn-info" data-toggle="modal" data-target="#detailModal-<?= $key->id_keterlambatan ?>">
                                                View Details
                                            </button>

                                            <?php if (session()->get('level') == 2 && $key->kepsek == null): ?>
                                        <a href="<?= base_url('home/statusketerlambatan/' . $key->id_keterlambatan) ?>">
                                            <button class="btn btn-info">
                                              Setuju
                                            </button>
                                        </a>

                                        <a href="<?= base_url('home/statustidaksetuju/' . $key->id_keterlambatan) ?>">
                                            <button class="btn btn-danger">
                                              tidak setuju
                                            </button>
                                        </a>
                                            <?php endif; ?>

                                            <?php if (session()->get('level') == 3 && $key->kepsek == 'disetuju'): ?>
                                        <a href="<?= base_url('home/statusksetuju/' . $key->id_keterlambatan) ?>">
                                            <button class="btn btn-info">
                                              Setuju
                                            </button>
                                        </a>
                                        <a href="<?= base_url('home/statusditolak/' . $key->id_keterlambatan) ?>">
                                            <button class="btn btn-info">
                                              tidak setuju
                                            </button>
                                        </a>
                                            <?php endif; ?>

                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Modal for Viewing Details -->
                                    <div class="modal fade" id="detailModal-<?= $key->id_keterlambatan ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="detailModalLabel">Detail Keterlambatan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Nama:</strong> <?= $key->nama ?></p>
                                                    <p><strong>NIK:</strong> <?= $key->nik ?></p>
                                                    <p><strong>Tanggal:</strong> <?= $key->tanggal ?></p>
                                                    <p><strong>Jam Kedatangan:</strong> <?= $key->jam_kedatangan ?></p>
                                                    <p><strong>Total Keterlambatan:</strong> <?= $key->total_keterlambatan ?></p>
                                                    <p><strong>Alasan:</strong> <?= $key->alasan_terlambat ?></p>
                                                    <?php if ($key->kepsek === null && $key->hrd === null): ?>
    <p><strong>Kepala Sekolah</strong> Menunggu</p>
    <p><strong>Kesiswaan</strong> Menunggu</p>
    <?php elseif ($key->kepsek === 'tidak disetujui' && $key->hrd === null): ?>
    <p><strong>Kepala Sekolah</strong> Tidak Setuju</p>
    <p><strong>Kesiswaan</strong> Tidak Setuju</p>
<?php elseif ($key->kepsek === 'setuju' && $key->hrd === null): ?>
    <p><strong>Kepala Sekolah</strong> Disetujui</p>
    <p><strong>Kesiswaan</strong> Menunggu</p>
<?php elseif ($key->kepsek === 'setuju' && $key->hrd === 'tidak disetujui'): ?>
    <p><strong>Kepala Sekolah</strong> Disetujui</p>
    <p><strong>Kesiswaan</strong> Tidak Setuju</p>
<?php elseif ($key->kepsek === 1 && $key->hrd === 1): ?>
    <p><strong>Kepala Sekolah</strong> Disetujui</p>
    <p><strong>Kesiswaan</strong> Disetujui</p>
<?php endif; ?>

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
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Tanggal</th>
                                        <th>Total Keterlambatan</th>
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
