<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModelTidakAktif extends Model
{

    public function getTotalTidakAktif($kode,$level) {

        $nkar = $level * 2;
        $nkar2 = $nkar + 2;
        // $levelbaru = $level+1;
        // $kodebaru = substr($kode,0,$nkar);
        // $kodebaru = str_pad($kodebaru, 6, '0', STR_PAD_RIGHT);

        $sql = "SELECT kode_5,kode_4,kode_3,kode_2,kode_1, s.nama, 
                (kode_5+kode_4+kode_3+kode_2+kode_1) as total, s.kode_wilayah 
                FROM Dataprocess.rpt.rekap_sekolah_tidak_aktif_wilayah s 
                -- JOIN Referensi.ref.mst_wilayah w ON LEFT(w.kode_wilayah,:nkar2:)=LEFT(s.kode_wilayah,:nkar2:) 
                WHERE s.mst_kode_wilayah=:kodebaru: 
                ORDER BY s.kode_wilayah";
            
        $query = $this->db->query($sql, [
            'nkar2' => $nkar2,
            'nkar'  => $nkar,
            'kodebaru'  => $kode,
        ]);
        
        return $query;
    }

    public function getNamaPilihan($kode)
    {
        $sql = 'SELECT nama FROM Referensi.ref.mst_wilayah w  
                WHERE kode_wilayah=:kodewilayah:';
        $query = $this->db->query($sql, [
            'kodewilayah'  => $kode
        ]);

        return $query;
    }

    public function getDaftarYayasan($kodebaru)
    {
        $sql = "SELECT npyp, yayasan_id, nama, alamat_jalan, desa_kelurahan, kode_wilayah 
                    FROM Arsip.dbo.yayasan s 
                    WHERE LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                    ORDER BY nama";

        $query = $this->db->query($sql, [
                'kodebaru'  => $kodebaru
            ]);
        return $query;
    }

}
