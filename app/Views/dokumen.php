<style>
    .tdcoy > td {
        color: black;
    }
    .attendance-container {
        display: flex;
        align-items: center;
        margin-left: 20px;
    }
    .attendance-checkbox {
        margin-right: 10px;
    }
    .attendance-reason {
        display: none;
        width: 150px;
    }
</style>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Dokumen</h4>
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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach ($dokumen as $key) {
                                        // Get the file extension
                                        $file_extension = pathinfo($key->nama_dokumen, PATHINFO_EXTENSION);
                                    ?> 
                                    <tr class="tdcoy">
                                        <td><?= $key->nama_dokumen ?></td>
                                        <td>
                                            <?php if (in_array($file_extension, ['pdf', 'jpg', 'jpeg', 'png', 'gif'])): ?>
                                                <!-- For PDF and Image files, show both View and Download buttons -->
                                                <a href="<?=base_url('dokumen/' . $key->nama_dokumen)?>" target="_blank">
                                                    <button class="btn btn-info">View</button>
                                                </a>
                                            <?php endif; ?>
                                            
                                            <!-- For Word and Excel files, only show the Download button -->
                                            <a href="<?=base_url('dokumen/' . $key->nama_dokumen)?>" download>
                                                <button class="btn btn-success">Download</button>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama Dokumen</th>
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
