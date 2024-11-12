<?php

namespace App\Controllers;
use CodeIgniter\Models\Controller;
use App\Models\M_e;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Home extends BaseController
{

    private function log_activity($activity)
    {
		$model = new M_e();
        $data = [
            'id_user'    => session()->get('id'),
            'activity'   => $activity,
			'timestamp' => date('Y-m-d H:i:s'),
			'delete' => Null
        ];

        $model->tambah('activity', $data);
    }

	public function index()
	{
        $model = new M_e();
		if(session()->get('level') > 0){

        $where5 = array('id_setting' => 1);
        $data['setting'] = $model->getwhere('setting', $where5);
        $where6 = array('level' => session()->get('level'));
        $data['menu'] = $model->getwhere('menu', $where6);
        $this->log_activity('User membuka Dashboard');
		echo view('header', $data);
		echo view('menu', $data);
		echo view('dashboard');
		echo view('footer');
	}else{
		return redirect()->to('home/login');
	}
	}

	public function login(){
        $model = new M_e();
        $where5 = array('id_setting' => 1);
        $data['setting'] = $model->getwhere('setting', $where5);
		echo view('header', $data);
		echo view('login');
	}

	public function generateCaptcha()
{
    // Create a string of possible characters
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $captcha_code = '';
    
    // Generate a random CAPTCHA code with letters and numbers
    for ($i = 0; $i < 6; $i++) {
        $captcha_code .= $characters[rand(0, strlen($characters) - 1)];
    }
    
    // Store CAPTCHA code in session
    session()->set('captcha_code', $captcha_code);
    
    // Create an image for CAPTCHA
    $image = imagecreate(120, 40); // Increased size for better readability
    $background = imagecolorallocate($image, 200, 200, 200);
    $text_color = imagecolorallocate($image, 0, 0, 0);
    $line_color = imagecolorallocate($image, 64, 64, 64);
    
    imagefilledrectangle($image, 0, 0, 120, 40, $background);
    
    // Add some random lines to the CAPTCHA image for added complexity
    for ($i = 0; $i < 5; $i++) {
        imageline($image, rand(0, 120), rand(0, 40), rand(0, 120), rand(0, 40), $line_color);
    }
    
    // Add the CAPTCHA code to the image
    imagestring($image, 5, 20, 10, $captcha_code, $text_color);
    
    // Output the CAPTCHA image
    header('Content-type: image/png');
    imagepng($image);
    imagedestroy($image);
}


public function aksi_login()
{
    // Periksa koneksi internet
    if (!$this->checkInternetConnection()) {
        // Jika tidak ada koneksi, cek CAPTCHA gambar
        $captcha_code = $this->request->getPost('captcha_code');
        if (session()->get('captcha_code') !== $captcha_code) {
            session()->setFlashdata('toast_message', 'Invalid CAPTCHA');
            session()->setFlashdata('toast_type', 'danger');
            return redirect()->to('home/login');
        }
    } else {
        // Jika ada koneksi, cek Google reCAPTCHA
        $recaptchaResponse = trim($this->request->getPost('g-recaptcha-response'));
        $secret = '6LeKfiAqAAAAAFkFzd_B9MmWjX76dhdJmJFb6_Vi'; // Ganti dengan Secret Key Anda
        $credential = array(
            'secret' => $secret,
            'response' => $recaptchaResponse
        );

        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);
        curl_close($verify);

        $status = json_decode($response, true);

        if (!$status['success']) {
            session()->setFlashdata('toast_message', 'Captcha validation failed');
            session()->setFlashdata('toast_type', 'danger');
            return redirect()->to('home/login');
        }
    }

    // Proses login seperti biasa
    $u = $this->request->getPost('username');
    $p = $this->request->getPost('password');

    $where = array(
        'username' => $u,
        'password' => md5($p),
    );
    $model = new M_e;
    $cek = $model->getWhere('user', $where);

    if ($cek) {
        // $this->log_activitys('User Mel$where5 = array('id_setting' => 1);
        session()->set('nama', $cek->username);
        session()->set('id', $cek->id_user);
        session()->set('level', $cek->level);
        return redirect()->to('home/');
    } else {
        session()->setFlashdata('toast_message', 'Invalid login credentials');
        session()->setFlashdata('toast_type', 'danger');
        return redirect()->to('home/login');
    }
}

public function checkInternetConnection()
{
    $connected = @fsockopen("www.google.com", 80);
    if ($connected) {
        fclose($connected);
        return true;
    } else {
        return false;
    }
}

public function t_folder(){
    $model = new M_e();
	$data['level'] = $model->tampil('level');
    $where5 = array('id_setting' => 1);
    $data['setting'] = $model->getwhere('setting', $where5);
    $where6 = array('level' => session()->get('level'));
    $this->log_activity('User membuka Form Folder');
        $data['menu'] = $model->getwhere('menu', $where6);
        if ($data['menu']->folder == 1) {
    echo view('header', $data);
    echo view('menu', $data);
    echo view('t_folder', $data);
    echo view('footer');
}else{
    return redirect()->to('home/login');
}
}

public function Folder(){
    $model = new M_e();
    $where = array('deleted' => Null);
	$data['folder'] = $model->join1where1('folder', 'level', 'folder.level = level.id_level', $where);
    $where5 = array('id_setting' => 1);
    $data['setting'] = $model->getwhere('setting', $where5);
    $where6 = array('level' => session()->get('level'));
    $this->log_activity('User membuka Folder');
        $data['menu'] = $model->getwhere('menu', $where6);
        if ($data['menu']->folder == 1) {
    echo view('header', $data);
    echo view('menu', $data);
    echo view('dfolder', $data);
    echo view('footer');
}else{
    return redirect()->to('home/login');
}
}

public function aksi_t_folder(){
    $model = new M_e();
    $nama = $this->request->getPost('nama_folder');
    $level = $this->request->getPost('level');
    $file = $this->request->getFile('icon_gambar');

    if ($file && $file->isValid()) {
        // Panggil fungsi upload untuk meng-upload file
        $uploadedFileName = $file->getName();
        $model->upload2($file);  // Upload the file
    }
    $data = [
        'nama_folder' => $nama, 
        'level' => $level, 
        'icon' => $uploadedFileName
    ];

    $model->tambah('folder', $data);
    return redirect()->to('home/Folder_Dokumen');
}
public function Folder_Dokumen(){
	$model = new M_e();
    $where = array('level' => session()->get('level'));
    $where1 = array('deleted' => Null);
    if(session()->get('level') == 1){
        $data['folder'] = $model->tampilwhere('folder',$where1);
    }else{
	$data['folder'] = $model->tampilwhere2('folder',$where, $where1);
    }
    $where5 = array('id_setting' => 1);
    $data['setting'] = $model->getwhere('setting', $where5);
    $where6 = array('level' => session()->get('level'));
    $this->log_activity('User membuka Folder Dokumen');
        $data['menu'] = $model->getwhere('menu', $where6);
        if ($data['menu']->folder == 1) {
		echo view('header', $data);
		echo view('menu', $data);
		echo view('folder',$data);
		echo view('footer');
    }else{
        return redirect()->to('home/login');
    }
}

public function dokumen($id){
    $model = new M_e();
    $where = array('id_folder' => $id);
    $where1 = array('deleted' => Null);
	$data['dokumen'] = $model->tampilwhere2('dokumen', $where, $where1);
    $where5 = array('id_setting' => 1);
    $this->log_activity('User membuka Dokumen');
    $data['setting'] = $model->getwhere('setting', $where5);
    $where6 = array('level' => session()->get('level'));
        $data['menu'] = $model->getwhere('menu', $where6);
        if ($data['menu']->folder == 1) {
        echo view('header', $data);
		echo view('menu', $data);
		echo view('dokumen',$data);
		echo view('footer');
    }else{
        return redirect()->to('home/login');
    }
        // print_r($data);
}

public function dokumenk(){
    $model = new M_e();
    $where = array('id_user' => session()->get('id'));
    $where1 = array('deleted' => Null);
	$data['dokumen'] = $model->tampilwhere2('dokumen', $where, $where1);
    $where5 = array('id_setting' => 1);
    $this->log_activity('User membuka Dokumen');
    $data['setting'] = $model->getwhere('setting', $where5);
    $where6 = array('level' => session()->get('level'));
        $data['menu'] = $model->getwhere('menu', $where6);
        if ($data['menu']->folder == 1) {
        echo view('header', $data);
		echo view('menu', $data);
		echo view('dokumen',$data);
		echo view('footer');
    }else{
        return redirect()->to('home/login');
    }
        // print_r($data);
}

public function EditFolder($id){
    $model = new M_e();
    $where = array('id_folder' => $id);
    $data['folder'] = $model->getwhere('folder', $where);
    $data['level'] = $model->tampil('level');
    $where5 = array('id_setting' => 1);
    $data['setting'] = $model->getwhere('setting', $where5);
    $where6 = array('level' => session()->get('level'));
        $data['menu'] = $model->getwhere('menu', $where6);
        $this->log_activity('User membuka Form Edit User');
        if ($data['menu']->datas == 1) {
    echo view('header', $data);
    echo view('menu', $data);
    echo view('e_folder', $data);
    echo view('footer');
}else{
    return redirect()->to('home/login');
}
}

public function Surat_Masuk(){
	$model = new M_e();
	$data['user'] = $model->tampil('user');
	$data['folders'] = $model->tampil('folder');
    $where5 = array('id_setting' => 1);
    $this->log_activity('User membuka Surat Masuk');
    $data['setting'] = $model->getwhere('setting', $where5);
    $where6 = array('level' => session()->get('level'));
        $data['menu'] = $model->getwhere('menu', $where6);
        if ($data['menu']->surat == 1) {
		echo view('header', $data);
		echo view('menu', $data);
		echo view('surat_masuk',$data);
		echo view('footer');
    }else{
        return redirect()->to('home/login');
    }
}

public function aksi_surat_masuk()
{
    $model = new M_e();
    
    // Ambil data dari form
    $akses = $this->request->getPost('akses'); // Mengetahui apakah akses berdasarkan folder atau user
    $folders = $this->request->getPost('folder'); // Array folder yang dipilih
    $userIds = $this->request->getPost('user'); // id_user yang dipilih, bisa lebih dari satu
    $tanggal = $this->request->getPost('tanggal');
    // Ambil file yang di-upload
    $file = $this->request->getFile('file_surat'); // Ambil file dengan nama 'file_surat'
    
    $uploadedFileName = null;  // Default file name is null

    // Pastikan file ada dan valid
    if ($file && $file->isValid()) {
        // Panggil fungsi upload untuk meng-upload file
        $uploadedFileName = $file->getName();
        $model->upload1($file);  // Upload the file
    }

    // Jika akses berdasarkan folder
    if ($akses == 'folder' && !empty($folders)) {
        foreach ($folders as $folder) {
            // Data yang akan dimasukkan ke tabel dokumen untuk setiap folder yang dipilih
            $dataDokumen = [
                'nama_dokumen' => $uploadedFileName,  // Gunakan nama file yang di-upload
                'id_folder' => $folder,  // id_folder yang diambil dari form (folder yang dipilih)
                'id_user' => null,  // Tidak mengisi id_user, karena akses berdasarkan folder
                'tanggal' => $tanggal
            ];

            // Tambahkan data ke tabel dokumen untuk setiap folder
            $model->tambah('dokumen', $dataDokumen);
        }
    }
    
    // Jika akses berdasarkan user
    if ($akses == 'user' && !empty($userIds)) {
        foreach ($userIds as $id_user) {
            // Data yang akan dimasukkan ke tabel dokumen untuk setiap user yang dipilih
            $dataDokumen = [
                'nama_dokumen' => $uploadedFileName,  // Gunakan nama file yang di-upload
                'id_folder' => null,  // Tidak mengisi id_folder, karena akses berdasarkan user
                'id_user' => $id_user,  // id_user yang diambil dari form
                'tanggal' => $tanggal
            ];

            // Tambahkan data ke tabel dokumen untuk setiap user
            $model->tambah('dokumen', $dataDokumen);
        }
    }

    // Redirect setelah berhasil
    return redirect()->to('home/Surat_Masuk');
}




public function Surat_Keluar(){
    $model = new M_e();
    $where5 = array('id_setting' => 1);
    $data['setting'] = $model->getwhere('setting', $where5);
    $where6 = array('level' => session()->get('level'));
        $data['menu'] = $model->getwhere('menu', $where6);
        $this->log_activity('User membuka Surat Keluar');
        if ($data['menu']->surat == 1) {
        echo view('header', $data);
		echo view('menu', $data);
		echo view('surat_keluar');
		echo view('footer');
    }else{
        return redirect()->to('home/login');
    }
}

public function aksi_surat_keluar()
{
    // Inisialisasi model dan mengambil data dari form
    $model = new M_e();
    $email = $this->request->getPost('email');
    $judulEmail = $this->request->getPost('judul_email');  // Ambil judul email
    $pesan = $this->request->getPost('pesan');
    $file = $this->request->getFile('file_surat');

    // Load Composer's autoloader
    require ROOTPATH . 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    // Inisialisasi array untuk data dokumen
    $dataDokumen = [
        'judul' => $judulEmail,
        'email' => $email,
        'pesan' => $pesan,
        'id_user' => session()->get('id')
    ];

    // Cek apakah file valid
    if ($file && $file->isValid()) {
        // Tentukan direktori tujuan untuk menyimpan file
        $uploadDir = ROOTPATH . 'public/dokumen/';
        $uploadedFileName = $file->getName();
        
        // Pindahkan file ke folder dokumen
        if ($file->move($uploadDir, $uploadedFileName)) {
            // Simpan nama file ke dalam dataDokumen setelah berhasil dipindahkan
            $dataDokumen['dokumen'] = $uploadedFileName;

            // Lampirkan file pada email
            $filePath = $uploadDir . $uploadedFileName;
            $mail->addAttachment($filePath, $uploadedFileName);  // Lampirkan file dari path lengkap
        } else {
            // Jika file gagal dipindahkan, beri pesan kesalahan
            return redirect()->to('home/Surat_Keluar')->with('error', 'Gagal mengunggah file');
        }
    }

    // Masukkan data dokumen ke dalam database
    $model->tambah('surat_keluar', $dataDokumen);

    try {
        // Konfigurasi SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = getenv('EMAIL_USERNAME');
        $mail->Password = getenv('EMAIL_PASSWORD');
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
    
        // Penerima dan konten email
        $mail->setFrom('zentosph@gmail.com', 'Sekolah ZentoSPH');
        $mail->addAddress($email);
    
        // Konten
        $mail->isHTML(true);
        $mail->Subject = $judulEmail;  // Set judul email
        $mail->Body = "<p>{$pesan}</p>";
    
        // Kirim email
        $mail->send();
    
        // Simpan pesan sukses ke flash session
        return redirect()->to('home/Surat_Keluar')->with('message', 'Surat berhasil dikirim');
    } catch (Exception $e) {
        echo "Pesan tidak dapat dikirim. Kesalahan Mailer: {$mail->ErrorInfo}";
    }
}

public function PengajuanCuti(){
    $model = new M_e();
    $where5 = array('id_setting' => 1);
    $data['setting'] = $model->getwhere('setting', $where5);
    $where6 = array('level' => session()->get('level'));
    $this->log_activity('User membuka PengajuanCuti');
        $data['menu'] = $model->getwhere('menu', $where6);
        $data['users'] = $model->tampil('user');
        if ($data['menu']->surat == 1) {
    echo view('header', $data);
    echo view('menu', $data);
    echo view('pengajuancuti');
    echo view('footer');
}else{
    return redirect()->to('home/login');
}
}

public function aksi_t_surat_cuti() {
    $model = new M_e();

    // Retrieve form data
    $jabatan = $this->request->getPost('jabatan');
    $tanggal_pengajuan = $this->request->getPost('tanggal_pengajuan');
    $jenis_cuti = $this->request->getPost('jenis_cuti');
    $tanggal_mulai_cuti = $this->request->getPost('tanggal_mulai_cuti');
    $tanggal_terakhir_cuti = $this->request->getPost('tanggal_terakhir_cuti');
    $total_hari_cuti = $this->request->getPost('total_hari_cuti');
    $tanggal_kembali_kerja = $this->request->getPost('tanggal_kembali_kerja');
    $id_pengganti = $this->request->getPost('id_pengganti');
    $alasan_cuti = $this->request->getPost('alasan_cuti');

    // Validate required fields
    if (empty($jabatan) || empty($tanggal_pengajuan) || empty($jenis_cuti) || empty($tanggal_mulai_cuti) || 
        empty($tanggal_terakhir_cuti) || empty($total_hari_cuti) || empty($tanggal_kembali_kerja) || 
        empty($id_pengganti) || empty($alasan_cuti)) {
        return redirect()->back()->with('error', 'All fields are required.');
    }

    // Prepare the data array to insert into the 'surat_cuti' table
    $data = [
        'jabatan' => $jabatan,
        'id_user' => session()->get('id'),
        'tanggal_pengajuan' => $tanggal_pengajuan,
        'jenis_cuti' => $jenis_cuti,
        'tanggal_mulai_cuti' => $tanggal_mulai_cuti,
        'tanggal_terakhir_cuti' => $tanggal_terakhir_cuti,
        'total_hari_cuti' => $total_hari_cuti,
        'tanggal_kembali_kerja' => $tanggal_kembali_kerja,
        'id_pengganti' => $id_pengganti,
        'alasan_cuti' => $alasan_cuti,
        'status' => 'menunggu', // Default status is 'Pending'
        'diajukan_oleh' => session()->get('id'), // Assume 'user_id' is stored in session
    ];

    // Insert the new leave request into the 'surat_cuti' table
    if ($model->tambah('surat_cuti', $data)) {
        return redirect()->to('home/PengajuanCuti')->with('message', 'Surat Cuti berhasil ditambahkan!');
    } else {
        return redirect()->back()->with('error', 'Failed to add leave request.');
    }
}


public function aksi_edit_folder() {
    $model = new M_e();

    // Retrieve form data
    $nama_folder = $this->request->getPost('nama_folder');
    $id = $this->request->getPost('id');
    $level = $this->request->getPost('level');
    $icon = $this->request->getFile('icon_gambar'); // For the file upload

    // Additional validation
    if (empty($nama_folder) || empty($level)) {
        return redirect()->back()->with('error', 'Folder name and level are required.');
    }

    // Prepare data array for update
    $data = [
        'nama_folder' => $nama_folder,
        'level' => $level,
    ];

    // If a new icon is uploaded, process the file
    if ($icon && $icon->isValid()) {
        // Define the path to upload the file
        $uploadPath = WRITEPATH . 'uploads/icons/'; // Modify this as needed
        $iconName = $icon->getName();

        // Move the uploaded file to the desired location
        $icon->move($uploadPath, $iconName);

        // Add the new icon to the data array
        $data['icon'] = $iconName;
    }

    // Prepare the where condition for the update
    $where = ['id_folder' => $id];

    // Update the folder in the 'folder' table
    if ($model->edit('folder', $data, $where)) {
        return redirect()->to('home/Folder')->with('message', 'Folder updated successfully.');
    } else {
        return redirect()->back()->with('error', 'Failed to update folder.');
    }
}


public function SuratKeterlambatan(){
    $model = new M_e();
    $where5 = array('id_setting' => 1);
    $data['setting'] = $model->getwhere('setting', $where5);
    $where6 = array('level' => session()->get('level'));
        $data['menu'] = $model->getwhere('menu', $where6);
        $this->log_activity('User membuka Surat Keterlambatan');
    if ($data['menu']->surat == 1) {
    echo view('header', $data);
    echo view('menu', $data);
    echo view('izintelat');
    echo view('footer');
}else{
    return redirect()->to('home/login');
}
}

public function aksi_surat_keterlambatan() {
    $model = new M_e();

    // Retrieve form data
    $nama = $this->request->getPost('nama');
    $nik = $this->request->getPost('nik');
    $tanggal = $this->request->getPost('tanggal');
    $jam_kedatangan = $this->request->getPost('jam_kedatangan');
    $total_keterlambatan = $this->request->getPost('total_keterlambatan');
    $alasan_terlambat = $this->request->getPost('alasan_terlambat');

    // Prepare data array for insertion
    $data = [
        'nama' => $nama,
        'nik' => $nik,
        'tanggal' => $tanggal,
        'jam_kedatangan' => $jam_kedatangan,
        'total_keterlambatan' => $total_keterlambatan,
        'alasan_terlambat' => $alasan_terlambat,
        'created_at' => date('Y-m-d H:i:s'),
        'status' => 'menunggu',
        'id_user' => session()->get('id')
    ];

    // Insert data into 'surat_keterlambatan' table
    $model->tambah('surat_keterlambatan', $data);

    // Redirect to the lateness records page
    return redirect()->to('home/SuratKeterlambatan');
}

public function Data_SuratKeterlambatan(){
    $model = new M_e();
    $where5 = array('id_setting' => 1);
    $data['setting'] = $model->getwhere('setting', $where5);
    $where6 = array('level' => session()->get('level'));
        $data['menu'] = $model->getwhere('menu', $where6);
        $this->log_activity('User membuka Data Keterlambatan');
if ($data['menu']->data == 1) {
if(session()->get('level') == 2){
    $where = array('kepsek' => Null);
    $data['surat_keterlambatan'] = $model->tampilwhere('surat_keterlambatan', $where);
    echo view('header', $data);
    echo view('menu', $data);
    echo view('data_keterlambatan',$data);
    echo view('footer');
}elseif(session()->get('level') == 3){
    $where = array('kepsek' => 'disetuju');
    $data['surat_keterlambatan'] = $model->tampilwhere('surat_keterlambatan', $where);
    echo view('header', $data);
    echo view('menu', $data);
    echo view('data_keterlambatan',$data);
    echo view('footer');
}elseif(session()->get('level') == 1){
    $data['surat_keterlambatan'] = $model->tampil('surat_keterlambatan');
    echo view('header', $data);
    echo view('menu', $data);
    echo view('data_keterlambatan',$data);
    echo view('footer');
}else{
    $where = array('id_user' => session()->get('id'));
    $data['surat_keterlambatan'] = $model->tampilwhere('surat_keterlambatan', $where);
    echo view('header', $data);
    echo view('menu', $data);
    echo view('data_keterlambatan',$data);
    echo view('footer');
}}else{
    return redirect()->to('home/login');
}

}

public function Data_Surat_Masuk(){
    $model = new M_e();
    $where = array('deleted' => Null);
    $data['dokumen_list'] = $model->getGroupedDocuments();
    $where5 = array('id_setting' => 1);
    $data['setting'] = $model->getwhere('setting', $where5);
    $where6 = array('level' => session()->get('level'));
    $data['menu'] = $model->getwhere('menu', $where6);
    $this->log_activity('User membuka Data Surat Masuk');
    if ($data['menu']->data == 1) {
    echo view('header', $data);
    echo view('menu', $data);
    echo view('datasurat',$data);
    echo view('footer');
}else{
    return redirect()->to('home/login');
}
}

public function Data_PengajuanCuti(){
    $model = new M_e();
    $where = array('surat_cuti.deleted' => Null);
    $data['surat_cuti'] = $model->join2wheressss('surat_cuti', 'user', 'surat_cuti.id_user = user_requester.id_user', 'user', 'surat_cuti.id_pengganti = user_substitute.id_user', $where);

    $where5 = array('id_setting' => 1);
    $data['setting'] = $model->getwhere('setting', $where5);
    $where6 = array('level' => session()->get('level'));
    $data['menu'] = $model->getwhere('menu', $where6);
    $this->log_activity('User membuka Data Surat Masuk');
    if ($data['menu']->data == 1) {
    echo view('header', $data);
    echo view('menu', $data);
    echo view('dcuti',$data);
    echo view('footer');
    // print_r($data['surat_cuti']);
}else{
    return redirect()->to('home/login');
}
}

public function Pengganti(){
    $model = new M_e();
    $where = array('id_pengganti' => session()->get('id'));
    $data['surat_cuti'] = $model->join2wheressss('surat_cuti', 'user', 'surat_cuti.id_user = user_requester.id_user', 'user', 'surat_cuti.id_pengganti = user_substitute.id_user', $where);

    $where5 = array('id_setting' => 1);
    $data['setting'] = $model->getwhere('setting', $where5);
    $where6 = array('level' => session()->get('level'));
    $data['menu'] = $model->getwhere('menu', $where6);
    $this->log_activity('User membuka Data Surat Masuk');
    if ($data['menu']->data == 1) {
    echo view('header', $data);
    echo view('menu', $data);
    echo view('pengganti',$data);
    echo view('footer');
    // print_r($data['surat_cuti']);
}else{
    return redirect()->to('home/login');
}
}

public function User(){
    $model = new M_e();
    $where = array('deleted' => Null);
    $data['user'] = $model->tampilwhere('user',$where);
    $where5 = array('id_setting' => 1);
    $data['setting'] = $model->getwhere('setting', $where5);
    $where6 = array('level' => session()->get('level'));
        $data['menu'] = $model->getwhere('menu', $where6);
        $this->log_activity('User membuka Data User');
        if ($data['menu']->datas == 1) {
    echo view('header', $data);
    echo view('menu', $data);
    echo view('user',$data);
    echo view('footer');
}else{
    return redirect()->to('home/login');
}
}

public function t_user(){
    $model = new M_e();
    $data['level'] = $model->tampil('level');
    $where5 = array('id_setting' => 1);
    $data['setting'] = $model->getwhere('setting', $where5);
    $where6 = array('level' => session()->get('level'));
        $data['menu'] = $model->getwhere('menu', $where6);
        $this->log_activity('User membuka Form User');
        if ($data['menu']->datas == 1) {
    echo view('header', $data);
    echo view('menu', $data);
    echo view('t_user', $data);
    echo view('footer');
}else{
    return redirect()->to('home/login');
}
}

public function aksi_t_user() {
    $model = new M_e();

    // Retrieve form data
    $username = $this->request->getPost('username');
    $email = $this->request->getPost('email');
    $level = $this->request->getPost('level');

    // Additional validation
    if (empty($username) || empty($email) || empty($level)) {
        return redirect()->back()->with('error', 'All fields are required.');
    }

    // Prepare data array for insertion
    $data = [
        'username' => $username,
        'password' => md5('sph'),
        'email' => $email,
        'level' => $level,
        'created_at' => date('Y-m-d H:i:s'),
    ];

    // Insert data into 'users' table
    $model->tambah('user_backup', $data);
    if ($model->tambah('user', $data)) {
        return redirect()->to('home/user')->with('message', 'User added successfully.');
    } else {
        return redirect()->back()->with('error', 'Failed to add user.');
    }
}

public function resetpassword($id){
    $model = new M_e();
    $where = array('id_user' => $id);
    $data = [
        'password' => md5('sph')
    ];
    $model->edit('user', $data, $where);
    return redirect()->to('home/user');
}

public function EditUser($id){
    $model = new M_e();
    $where = array('id_user' => $id);
    $data['user'] = $model->getwhere('user', $where);
    $data['level'] = $model->tampil('level');
    $where5 = array('id_setting' => 1);
    $data['setting'] = $model->getwhere('setting', $where5);
    $where6 = array('level' => session()->get('level'));
        $data['menu'] = $model->getwhere('menu', $where6);
        $this->log_activity('User membuka Form Edit User');
        if ($data['menu']->datas == 1) {
    echo view('header', $data);
    echo view('menu', $data);
    echo view('e_user', $data);
    echo view('footer');
}else{
    return redirect()->to('home/login');
}
}

public function aksi_edit_user($id) {
    $model = new M_e();

    // Retrieve form data
    $username = $this->request->getPost('username');
    $email = $this->request->getPost('email');
    $level = $this->request->getPost('level');
    $password = $this->request->getPost('password'); // Optional field for password

    // Additional validation
    if (empty($username) || empty($email) || empty($level)) {
        return redirect()->back()->with('error', 'All fields are required.');
    }

    // Prepare data array for update
    $data = [
        'username' => $username,
        'email' => $email,
        'level' => $level,
    ];

    // Only update the password if a new password is provided
    if (!empty($password)) {
        $data['password'] = md5($password); // Encrypt the new password
    }
    $where = array('id_user' => $id);
    // Update the user in the 'user' table
    if ($model->edit('user', $data, $where)) {
        return redirect()->to('home/user')->with('message', 'User updated successfully.');
    } else {
        return redirect()->back()->with('error', 'Failed to update user.');
    }
}


public function SDuser($id){
    $model = new M_e();
    $data = [
        'deleted' => date('Y-m-d H:i:s')
    ];
    $where = array('id_user' => $id);
    $model->edit('user', $data, $where);
    return redirect()->to('home/user');
}

public function RDuser($id){
    $model = new M_e();
    $data = [
        'deleted' => Null
    ];
    $where = array('id_user' => $id);
    $model->edit('user', $data, $where);
    return redirect()->to('home/Ruser');
}

public function SDfolder($id){
    $model = new M_e();
    $data = [
        'deleted' => date('Y-m-d H:i:s')
    ];
    $where = array('id_folder' => $id);
    $model->edit('folder', $data, $where);
    return redirect()->to('home/Folder');
}

public function RDfolder($id){
    $model = new M_e();
    $data = [
        'deleted' => Null
    ];
    $where = array('id_folder' => $id);
    $model->edit('folder', $data, $where);
    return redirect()->to('home/Rfolder');
}

public function MenuManage(){
    $model = new M_e();
    $data['menus'] = $model->tampil('menu');
    $where5 = array('id_setting' => 1);
    $data['setting'] = $model->getwhere('setting', $where5);
    $where6 = array('level' => session()->get('level'));
        $data['menu'] = $model->getwhere('menu', $where6);
        $this->log_activity('User membuka Manage Menu');
        if ($data['menu']->setting == 1) {
    echo view('header', $data);
    echo view('menu', $data);
    echo view('menu_manage', $data);
    echo view('footer');
}else{
    return redirect()->to('home/login');
}
}

public function Website(){
    $model = new M_e();
    $data['menus'] = $model->tampil('menu');
    $where5 = array('id_setting' => 1);
    $data['setting'] = $model->getwhere('setting', $where5);
    $where6 = array('level' => session()->get('level'));
        $data['menu'] = $model->getwhere('menu', $where6);
        $this->log_activity('User membuka Setting Website');
        if ($data['menu']->setting == 1) {
    echo view('header', $data);
    echo view('menu', $data);
    echo view('website', $data);
    echo view('footer');
}else{
    return redirect()->to('home/login');
}
}

public function updateMenuVisibilityAjax()
{
    // Get data from the AJAX request
    $menu = $this->request->getPost('menu'); // e.g., 'data', 'dashboard'
    $level = $this->request->getPost('level'); // e.g., 1, 2, 3
    $visibility = $this->request->getPost('visibility'); // 1 or 0

    // Logging the data received from AJAX request
    log_message('debug', 'Received data from AJAX - Menu: ' . $menu . ', Level: ' . $level . ', Visibility: ' . $visibility);

    // Prepare data for the update
    $updateData = [$menu => $visibility];
    $whereCondition = ['level' => $level];

    // Logging the prepared data for the update
    log_message('debug', 'Update Data: ' . json_encode($updateData));
    log_message('debug', 'Where Condition: ' . json_encode($whereCondition));

    // Initialize the model
    $menuModel = new M_e();

    // Call the model method to update the menu visibility
    $result = $menuModel->updateMenuVisibility('menu', $updateData, $whereCondition);

    // Check if the update was successful and log the result
    if ($result) {
        log_message('debug', 'Menu visibility updated successfully.');
        return $this->response->setJSON(['status' => 'success', 'message' => 'Menu visibility updated successfully.']);
    } else {
        log_message('error', 'Failed to update menu visibility.');
        return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update menu visibility.']);
    }
}

public function aksi_edit_website()
{
    // Load the model that interacts with your settings
    $model = new M_e(); // Replace M_p with the actual model name

    // Retrieve the settings from the database
    $where5 = array('id_setting' => 1);
    $setting = $model->getwhere('setting',$where5); // Assuming you have a method to get current settings

    // Get the name from the request
    $name = $this->request->getPost('name');

    $icon = $this->request->getFile('icon');
    $menu = $this->request->getFile('menu');

    // Array to hold image names
    $images = [];

    // Check and upload icon
    if ($icon && $icon->isValid()) {
        $images['icon'] = $icon->getName();
        $model->uploadimages($icon); // Call uploadimages from the model
    } else {
        // Keep the existing icon name if no new file is uploaded
        $images['icon'] = $setting->icon;
    }

    // Check and upload menu image
    if ($menu && $menu->isValid()) {
        $images['menu'] = $menu->getName();
        $model->uploadimages($menu); // Call uploadimages from the model
    } else {
        // Keep the existing menu image name if no new file is uploaded
        $images['menu'] = $setting->menu;
    }



    // Update the settings in the database with the new image names and the new name
    $model->updateSettings($name, $images['icon'], $images['menu']); // Corrected parameter usage

    return redirect()->to('home/Website'); // Redirect after processing
}

public function statusketerlambatan($id){
    $model = new M_e();
    $data = [
        'kepsek' => 'disetuju'
    ];
    $where = array('id_keterlambatan' => $id);
    $model->edit('surat_keterlambatan', $data, $where);
    return redirect()->to('home/Data_SuratKeterlambatan');
}

public function statusksetuju($id){
    $model = new M_e();
    $data = [
        'hrd' => 'disetuju'
    ];
    $where = array('id_keterlambatan' => $id);
    $model->edit('surat_keterlambatan', $data, $where);
    return redirect()->to('home/Data_SuratKeterlambatan');
}

public function statusditolak($id){
    $model = new M_e();
    $data = [
        'hrd' => 'tidak disetujui'
    ];
    $where = array('id_keterlambatan' => $id);
    $model->edit('surat_keterlambatan', $data, $where);
    return redirect()->to('home/Data_SuratKeterlambatan');
}

public function statustidaksetuju($id){
    $model = new M_e();
    $data = [
        'kepsek' => 'tidak disetujui'
    ];
    $where = array('id_keterlambatan' => $id);
    $model->edit('surat_keterlambatan', $data, $where);
    return redirect()->to('home/Data_SuratKeterlambatan');
}

public function logout()
{
    // $this->log_activity('User Logout');
    session()->destroy();
    return redirect()->to('home/login');
}

public function LogActivity(){
    $model = new M_e();
    $where1 = array('activity.delete' => '0');
    $data['log'] = $model->join1where1('activity','user','activity.id_user = user.id_user',$where1);
    $data['menus'] = $model->tampil('menu');
    $data['users'] = $model->tampil('user');
    $where5 = array('id_setting' => 1);
    $data['setting'] = $model->getwhere('setting', $where5);
    $where6 = array('level' => session()->get('level'));
        $data['menu'] = $model->getwhere('menu', $where6);
        $this->log_activity('User membuka Setting Website');
        if ($data['menu']->datas == 1) {
    echo view('header', $data);
    echo view('menu', $data);
    echo view('activitylog', $data);
    echo view('footer');
}else{
    return redirect()->to('home/login');
}
}

public function filteruserlog() {
    $model = new M_e(); // Make sure to replace with your actual model for logs
    $idUser = $this->request->getGet('id_user'); // Get the selected user ID from the query string

    // Fetch users for the filter dropdown
    $data['users'] = $model->tampil('user'); // Adjust this method based on how you retrieve users

    // Get logs based on user filter
    if ($idUser) {
        $where = array('activity.id_user' => $idUser, 'activity.delete' => Null);
        $data['log'] = $model->join1where1('activity','user','activity.id_User = user.id_user',$where); // Method to get logs for a specific user
    } else {
        $data['log'] = $model->join1('activity','user','activity.id_User = user.id_user'); // Fetch all logs if no user is selected
    }
    $data['logss'] = $model->join1('activity','user','activity.id_User = user.id_user'); // Fetch all logs if no user is selected
    $where5 = array('id_setting' => 1);
    $data['setting'] = $model->getwhere('setting', $where5);
    $where6 = array('level' => session()->get('level'));
        $data['menu'] = $model->getwhere('menu', $where6);
        if ($data['menu']->datas == 1) {
    echo view('header',$data);
    echo view('menu',$data);
    echo view('activitylog', $data);
    echo view('footer');
}else{
    return redirect()->to('home/login');
}
}

public function resetedituser($id)
{
    $model = new M_e();

    // Get the current data from the barang table
    $currentData = $model->getWherearray('user', ['id_user' => $id]);

    // Get the backup data from the barang_backup table
    $backupData = $model->getWherearray('user_backup', ['id_user' => $id]);

    // Restore product data from backup
    $this->log_activity('User Restore Update User');
    $model->restoreProduct('user_backup', 'id_user', $id);

    return redirect()->to('home/User');
}

public function Ruser(){
    $model = new M_e();
    $where ='deleted is not null';
    $data['user'] = $model->tampilwhere('user',$where);
    $where5 = array('id_setting' => 1);
    $data['setting'] = $model->getwhere('setting', $where5);
    $where6 = array('level' => session()->get('level'));
        $data['menu'] = $model->getwhere('menu', $where6);
        $this->log_activity('User membuka Data User');
        if ($data['menu']->datas == 1) {
    echo view('header', $data);
    echo view('menu', $data);
    echo view('ruser',$data);
    echo view('footer');
    }else{
        return redirect()->to('home/login');
    }
}

public function Rfolder(){
    $model = new M_e();
    $where = 'deleted is not null';
	$data['folder'] = $model->join1where1('folder', 'level', 'folder.level = level.id_level', $where);
    $where5 = array('id_setting' => 1);
    $data['setting'] = $model->getwhere('setting', $where5);
    $where6 = array('level' => session()->get('level'));
    $this->log_activity('User membuka Folder');
        $data['menu'] = $model->getwhere('menu', $where6);
        if ($data['menu']->folder == 1) {
    echo view('header', $data);
    echo view('menu', $data);
    echo view('rfolder', $data);
    echo view('footer');
}else{
    return redirect()->to('home/login');
}
}
}
