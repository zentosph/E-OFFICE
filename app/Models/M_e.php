<?php

namespace App\Models;

use CodeIgniter\Model;

class M_e extends Model
{

    public function tampil($s){
		return $this->db->table($s)
						->get()
						->getResult();

	}

    public function tampilfolder($id_user = null, $level = null) {
        $builder = $this->db->table('folder');
    
        // Apply filters based on provided parameters
        if ($id_user !== null) {
            $builder->orWhere('id_user', $id_user);
        }
        if ($level !== null) {
            $builder->orWhere('level', $level);
        }
    
        return $builder->get()->getResult();
    }
    

    public function edit($tabel, $isi, $where){
        return $this->db->table($tabel)
                        ->update($isi,$where);
    }
    public function getWhere($tabel,$where){
        return $this->db->table($tabel)
                        ->getwhere($where)
                        ->getRow();
    }

    public function getWherearray($tabel,$where){
        return $this->db->table($tabel)
                        ->getwhere($where)
                        ->getRowArray();
    }

    public function tampilwhere($tabel,$where){
        return $this->db->table($tabel)
                        ->getwhere($where)
                        ->getResult();
    }

    public function tampilwhereArray($tabel,$where){
        return $this->db->table($tabel)
                        ->getwhere($where)
                        ->getResultArray();
    }

    public function tampilwhere2($tabel,$where,$where2){
        return $this->db->table($tabel)
                        ->where($where)
                        ->where($where2)
                        ->get()
                        ->getResult();
    }

    public function tampilwhere2Row($tabel, $where)
{
    return $this->db->table($tabel)
                    ->where($where)
                    ->get()
                    ->getRowArray();
}

    public function tampilcount($tabel, $where)
{
    return $this->db->table($tabel)
                    ->where($where)
                    ->countAllResults();
}



    public function upload1($file)
    {
            $imageName = $file->getName();
            $file->move(ROOTPATH . 'public/dokumen', $imageName);
    }

    public function upload2($file)
    {
            $imageName = $file->getName();
            $file->move(ROOTPATH . 'public/icon', $imageName);
    }
    public function uploadtugas($file)
    {
        $imageName = $file->getName();
        $file->move(ROOTPATH . 'public/tugas', $imageName);
        return ROOTPATH . 'public/tugas/' . $imageName; // Mengembalikan path lengkap dari file yang dipindahkan
    }
    
    public function uploadimages($file)
    {
            $imageName = $file->getName();
            $file->move(ROOTPATH . 'public/images', $imageName);
    }

    public function uploadspp($file)
    {
            $imageName = $file->getName();
            $file->move(ROOTPATH . 'public/SPP', $imageName);
    }

    public function tambah($table, $isi)
	{
			return $this->db->table($table)
						->insert($isi);
                   
	}

    public function tambahid($table, $isi)
{
    // Melakukan insert dan mengembalikan hasilnya
    $this->db->table($table)->insert($isi);

    // Mengembalikan ID terakhir yang dimasukkan
    return $this->insertID();
}

    public function join2wheres1($pil,$tabel1,$on,$tabel2,$on2,$where)
    {
        return $this->db->table($pil)
                        ->join($tabel1,$on,"left")
                        ->join($tabel2,$on2,"left")
                        ->getWhere($where)->getResult();
                        // return $this->db->query('select * from brg_msk join barang on brg_msk.id_brg=barang.id_brg')
                        // ->getResult();
    }

    public function join2whererow($pil,$tabel1,$on,$tabel2,$on2,$where)
    {
        return $this->db->table($pil)
                        ->join($tabel1,$on,"left")
                        ->join($tabel2,$on2,"left")
                        ->getWhere($where)->getRow();
                        // return $this->db->query('select * from brg_msk join barang on brg_msk.id_brg=barang.id_brg')
                        // ->getResult();
    }
    public function join2where1($pil,$tabel1,$on,$tabel2,$on2,$where)
    {
        return $this->db->table($pil)
                        ->join($tabel1,$on,"inner")
                        ->join($tabel2,$on2,"inner")
                        ->getWhere($where)->getResult();
                        // return $this->db->query('select * from brg_msk join barang on brg_msk.id_brg=barang.id_brg')
                        // ->getResult();
    }

    public function join2wheressss($pil, $tabel1, $on1, $tabel2, $on2, $where)
    {
        $builder = $this->db->table($pil)
                            ->select('surat_cuti.*, user_requester.username AS requester_username, user_substitute.username AS substitute_username')
                            ->join("$tabel1 AS user_requester", $on1, "inner")
                            ->join("$tabel2 AS user_substitute", $on2, "inner")
                            ->where($where);
    
        $result = $builder->get()->getResult();
        
        // print_r($result); // Inspect the structure of the result
    
        return $result;
    }
    
    

    


    public function join3where1($pil,$tabel1,$on,$tabel2,$on2,$tabel3,$on3,$where)
    {
        return $this->db->table($pil)
                        ->join($tabel1,$on,"inner")
                        ->join($tabel2,$on2,"inner")
                        ->join($tabel3,$on3,"inner")
                        ->getWhere($where)->getResult();
                        // return $this->db->query('select * from brg_msk join barang on brg_msk.id_brg=barang.id_brg')
                        // ->getResult();
    }

    public function join2where1row($pil,$tabel1,$on,$tabel2,$on2,$where)
    {
        return $this->db->table($pil)
                        ->join($tabel1,$on,"inner")
                        ->join($tabel2,$on2,"inner")
                        ->getWhere($where)->getRow();
                        // return $this->db->query('select * from brg_msk join barang on brg_msk.id_brg=barang.id_brg')
                        // ->getResult();
    }
    

    public function join1where1row($pil,$tabel1,$on,$where)
    {
        return $this->db->table($pil)
                        ->join($tabel1,$on,"inner")
                        ->getWhere($where)->getRow();
                        // return $this->db->query('select * from brg_msk join barang on brg_msk.id_brg=barang.id_brg')
                        // ->getResult();
    }

    public function join1where1($pil,$tabel1,$on,$where)
    {
        return $this->db->table($pil)
                        ->join($tabel1,$on,"inner")
                        ->getWhere($where)->getResult();
                        // return $this->db->query('select * from brg_msk join barang on brg_msk.id_brg=barang.id_brg')
                        // ->getResult();
    }

    public function join1($pil,$tabel1,$on)
    {
        return $this->db->table($pil)
                        ->join($tabel1,$on,"inner")
                        ->get()
                        ->getResult();
                        // return $this->db->query('select * from brg_msk join barang on brg_msk.id_brg=barang.id_brg')
                        // ->getResult();
    }

    public function join1where2($pil,$tabel1,$on,$where,$where2)
    {
        return $this->db->table($pil)
                        ->join($tabel1,$on,"inner")
                        ->Where($where)
                        ->where($where2)
                        ->get()
                        ->getResult();
                        // return $this->db->query('select * from brg_msk join barang on brg_msk.id_brg=barang.id_brg')
                        // ->getResult();
    }

    public function join2($pil,$tabel1,$on,$tabel2,$on2)
    {
        return $this->db->table($pil)
                        ->join($tabel1,$on,"inner")
                        ->join($tabel2,$on2,"inner")
                        ->get()->getResult();
                        // return $this->db->query('select * from brg_msk join barang on brg_msk.id_brg=barang.id_brg')
                        // ->getResult();
    }

    public function join2s($pil,$tabel1,$on,$tabel2,$on2)
    {
        return $this->db->table($pil)
                        ->join($tabel1,$on, 'left')
                        ->join($tabel2,$on2, 'left')
                        ->get()->getResult();
                        // return $this->db->query('select * from brg_msk join barang on brg_msk.id_brg=barang.id_brg')
                        // ->getResult();
    }

    public function join($pil,$tabel1,$on)
    {
        return $this->db->table($pil)
                        ->join($tabel1,$on,"inner")
                        ->get()->getResult();
                        // return $this->db->query('select * from brg_msk join barang on brg_msk.id_brg=barang.id_brg')
                        // ->getResult();
    }

    public function ambilemail($tabel,  $tabel1, $on, $where)
{
    return $this->db->table($tabel)
                    ->select('pendaftaran.email,pendaftaran.username')
                    ->join($tabel1, $on, 'inner')
                    ->where($where)  // menggunakan where() untuk kondisi
                    ->get()  // menggunakan get() untuk mengambil hasil
                    ->getResult();
}

public function ambil_id_anak($tabel,$where)
{
    return $this->db->table($tabel)
                    ->select('anak.nama_anak, anak.id_ortu, anak.id_anak')
                    ->where($where)  // menggunakan where() untuk kondisi
                    ->get()  // menggunakan get() untuk mengambil hasil
                    ->getResult();
}


public function hapus($table,$where)
{
    return $this->db->table($table)
                    ->delete($where);

}

public function checkAttendanceExists($id_kelas, $tanggal) {
    return $this->db->table('absen')
                    ->where('id_kelas', $id_kelas)
                    ->where('tanggal', $tanggal)
                    ->countAllResults();
}

public function tambahBatch($table, $data) {
    return $this->db->table($table)
                    ->insertBatch($data);
}

public function getLaporanKeuangan($startDate, $endDate) {
    // Mengambil total pendapatan per kategori dan kuantitas
    $pendapatan = $this->db->table('pendapatan')
        ->select('kategori, SUM(pendapatan) as total_pendapatan, COUNT(*) as kuantitas') // Tambahkan COUNT(*)
        ->where('tanggal_pendapatan >=', $startDate)
        ->where('tanggal_pendapatan <=', $endDate)
        ->groupBy('kategori')
        ->get()
        ->getResult();

    // Mengambil total pengeluaran per kategori dan kuantitas
    $pengeluaran = $this->db->table('pengeluaran')
        ->select('kategori_pengeluaran, SUM(pengeluaran) as total_pengeluaran, COUNT(*) as kuantitas') // Tambahkan COUNT(*)
        ->where('tanggal_pengeluaran >=', $startDate)
        ->where('tanggal_pengeluaran <=', $endDate)
        ->groupBy('kategori_pengeluaran')
        ->get()
        ->getResult();

    return [
        'pendapatan' => $pendapatan,
        'pengeluaran' => $pengeluaran
    ];
}


public function getLastInsertedId($table) {
    return $this->db->insertID();
}

public function getLaporanByMonthYear($month, $year){
    return $this->db->table('laporan_keuangan')
                    ->where('MONTH(tanggal)', $month)
                    ->where('YEAR(tanggal)', $year)
                    ->get()
                    ->getRow();
}

public function softdelete($table, $kolom, $noTrans, $where)
{
    $this->db->table($table)->update([$kolom => $noTrans], $where);
}

public function getwherecount($table, $where)
{
    return $this->db->table($table)->where($where)->countAllResults();
}

public function restoreProduct($table,$column,$id)
{
    // Ambil data dari tabel backup
    $backupData = $this->db->table($table)->where($column, $id)->get()->getRowArray();

    if ($backupData) {
        // Tentukan nama tabel utama tempat data akan di-restore
        $mainTable = str_replace('_backup', '', $table);

        // Update data di tabel utama
        $this->db->table($mainTable)->where($column, $id)->update($backupData);
    }
}

public function getGroupedDocuments() {
    $builder = $this->db->table('dokumen');
    $builder->select('
        dokumen.nama_dokumen, dokumen.id_dokumen,
        MIN(dokumen.tanggal) as tanggal,
        GROUP_CONCAT(dokumen.id_folder) as id_folders,
        GROUP_CONCAT(dokumen.id_user) as id_users,
        GROUP_CONCAT(user.username SEPARATOR ", ") as nama_users,
        GROUP_CONCAT(folder.nama_folder SEPARATOR ", ") as nama_folders
    ');
    $builder->join('user', 'dokumen.id_user = user.id_user', 'left');
    $builder->join('folder', 'dokumen.id_folder = folder.id_folder', 'left');
    $builder->groupBy('dokumen.nama_dokumen');
    
    return $builder->get()->getResult();
}

public function updateMenuVisibility($tabel, $isi, $where)
{
    // Log the table name, update data, and where condition
    log_message('debug', 'Table: ' . $tabel);
    log_message('debug', 'Update Data: ' . json_encode($isi));
    log_message('debug', 'Where Condition: ' . json_encode($where));

    // Perform the update and check for any database error
    $result = $this->db->table($tabel)->update($isi, $where);

    // Log the generated query and the result of the update
    log_message('debug', 'Executed Query: ' . $this->db->getLastQuery());
    log_message('debug', 'Update Result: ' . ($result ? 'Success' : 'Failed'));

    if (!$result) {
        // Log any database error if update fails
        log_message('error', 'Database Error: ' . json_encode($this->db->error()));
    }

    return $result;
}

public function updateSettings($name, $icon, $menu)
{
    // Data to be updated
    $data = [
        'nama' => $name,
        'icon' => $icon,
        'menu' => $menu,
    ];

    // Use query builder to update
    return $this->db->table('setting')
                    ->where(['id_setting' => 1]) // Specify the condition
                    ->update($data); // Update with the new data
}

}