<style>
    .tdcoy > td {
        color: black;
    }
</style>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Daftar Dokumen</h4>
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
                                        <th>Nama Dokumen</th>
                                        <th>Tanggal</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $displayedDokumen = [];
                                    foreach ($dokumen_list as $dokumen): 
                                        // Check if the document name has already been displayed
                                        if (in_array($dokumen->nama_dokumen, $displayedDokumen)) {
                                            continue; // Skip if already displayed
                                        }
                                        $displayedDokumen[] = $dokumen->nama_dokumen;
                                    ?>
                                    <tr class="tdcoy">
                                        <td><?= $dokumen->nama_dokumen ?></td>
                                        <td><?= $dokumen->tanggal ?></td>
                                        <td>
                                            <!-- View Details button to trigger modal -->
                                            <button class="btn btn-info" data-toggle="modal" data-target="#detailModal-<?= $dokumen->id_dokumen ?>">
                                                View Details
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal for Viewing Details -->
                                    <div class="modal fade" id="detailModal-<?= $dokumen->id_dokumen ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="detailModalLabel">Detail Dokumen</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Nama Dokumen:</strong> <?= $dokumen->nama_dokumen ?></p>
                                                    <p><strong>Tanggal:</strong> <?= $dokumen->tanggal ?></p>
                                                    <p><strong>Di Folder:</strong> <?= $dokumen->nama_folders?> (ID Folder: <?= $dokumen->id_folders ?>)</p>
                                                    <p><strong>Di Folder User:</strong> <?= $dokumen->nama_users ?> (ID User: <?= $dokumen->id_users ?>)</p>
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
                                        <th>Nama Dokumen</th>
                                        <th>Tanggal</th>
                                        <th>Detail</th>
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
