<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Surat Keterlambatan</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form class="form-valide-with-icon" action="<?=base_url('home/aksi_surat_keterlambatan')?>" method="post" enctype="multipart/form-data">

                                <!-- Nama -->
                                <div class="form-group">
                                    <h6 class="text-label">Nama</h6>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="nama" value="<?=session()->get('nama')?>" disabled>
                                    </div>
                                </div>

                                <!-- NIK -->
                                <div class="form-group">
                                    <h6 class="text-label">NIK</h6>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="nik" required>
                                    </div>
                                </div>

                                <!-- Tanggal -->
                                <div class="form-group">
                                    <h6 class="text-label">Tanggal</h6>
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="tanggal" required>
                                    </div>
                                </div>

                                <!-- Jam Kedatangan -->
                                <div class="form-group">
                                    <h6 class="text-label">Jam Kedatangan</h6>
                                    <div class="input-group">
                                        <input type="time" class="form-control" name="jam_kedatangan" id="jam_kedatangan" required onchange="calculateLateness()">
                                    </div>
                                </div>

                                <!-- Total Keterlambatan -->
                                <div class="form-group">
                                    <h6 class="text-label">Total Keterlambatan</h6>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="total_keterlambatan" id="total_keterlambatan" placeholder="Misal: 1 jam 15 menit" readonly>
                                    </div>
                                </div>

                                <!-- Alasan Keterlambatan -->
                                <div class="form-group">
                                    <h6 class="text-label">Alasan Keterlambatan</h6>
                                    <div class="input-group">
                                        <textarea class="form-control" name="alasan_terlambat" rows="3" placeholder="Jelaskan alasan keterlambatan" required></textarea>
                                    </div>
                                </div>

                                <!-- Submit and Cancel Buttons -->
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

<!-- JavaScript for calculating lateness -->
<script>
function calculateLateness() {
    // Set fixed start time
    const startHour = 7;
    const startMinute = 0;
    
    // Get arrival time from input
    const arrivalTime = document.getElementById("jam_kedatangan").value;
    if (!arrivalTime) return;

    // Parse arrival time into hours and minutes
    const [arrivalHour, arrivalMinute] = arrivalTime.split(":").map(Number);

    // Calculate lateness in minutes
    const latenessMinutes = (arrivalHour - startHour) * 60 + (arrivalMinute - startMinute);
    
    // If late, display lateness in "Total Keterlambatan" field
    const totalKeterlambatan = document.getElementById("total_keterlambatan");
    if (latenessMinutes > 0) {
        const hours = Math.floor(latenessMinutes / 60);
        const minutes = latenessMinutes % 60;
        totalKeterlambatan.value = `${hours > 0 ? hours + " jam " : ""}${minutes} menit`;
    } else {
        totalKeterlambatan.value = "Tepat waktu";
    }
}
</script>
