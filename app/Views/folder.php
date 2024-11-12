<style>
    .cardcoy {
    width: 16rem; /* Width of the card */
    height: 16rem; /* Height of the card */
    margin-bottom: 20px;
    border-radius: 10px; /* Optional: rounded corners for the card */
    overflow: hidden; /* Ensures the image stays inside the card */
}

.card-header {
    background-color: #f8f9fa; /* Light background for the header */
    padding: 10px;
}

.card-body {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
}

.card img {
    max-width: 100%;
    max-height: 100%;
    object-fit: cover; /* Ensure the image covers the card area, cropping as needed */
    border-radius: 5px; /* Optional: rounded corners for the image */
}

/* Optional: Styling for the button */
.btntambah {
    margin-bottom: 10px;
}

</style>

<div class="content-body">
    <div class="container-fluid">
        <a href="<?= base_url('home/t_folder') ?>"><button class="btntambah btn btn-dark">Tambah</button></a>
        <?php if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3): ?>
        <a href="<?= base_url('home/Folder') ?>"><button class="btntambah btn btn-dark">Setting Folder</button></a>
        <?php endif; ?>
        <div class="row">
        
            <?php 
            foreach ($folder as $key) {
            ?>
                <div class="col-xxl-4 col-lg-4 col-sm-4">
                    <a href="<?= base_Url('home/dokumen/' . $key->id_folder) ?>">
                        <div class="card cardcoy">
                            <div class="card-header">
                                <h5 class="card-title"><?= htmlspecialchars($key->nama_folder) ?></h5>
                            </div>
                            <div class="card-body">
                                <img src="<?= base_url('icon/' . $key->icon) ?>" alt="Icon" class="img-fluid mb-2">
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
            <div class="col-xxl-4 col-lg-4 col-sm-4">
                <a href="<?= base_Url('home/dokumenk/') ?>">
                    <div class="card cardcoy">
                        <div class="card-header">
                            <h5 class="card-title">Dokumen Khusus <?=session()->get('nama')?></h5>
                        </div>
                        <div class="card-body">
                            <img src="<?= base_url('icon/individual.jpg') ?>" alt="Icon" class="img-fluid mb-2">
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

