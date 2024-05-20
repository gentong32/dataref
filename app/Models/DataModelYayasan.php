<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModelYayasan extends Model
{

    public function getTotalYayasan($kode,$level) {

        $nkar = $level * 2;
        $nkar2 = $nkar + 2;
        $levelbaru = $level+1;
        $kodebaru = substr($kode,0,$nkar);

        $sql = "SELECT 
                COUNT (*) as total,
                w.nama, w.kode_wilayah FROM Arsip.dbo.yayasan s 
                JOIN Referensi.ref.mst_wilayah w ON LEFT(w.kode_wilayah,:nkar2:)=LEFT(s.kode_wilayah,:nkar2:) 
                WHERE id_level_wilayah=:levelbaru: AND soft_delete=0 AND LEFT(w.kode_wilayah,:nkar:)=:kodebaru: 
                GROUP BY w.nama, w.kode_wilayah, w.mst_kode_wilayah 
                ORDER BY kode_wilayah";
            
        $query = $this->db->query($sql, [
            'nkar2' => $nkar2,
            'nkar'  => $nkar,
            'levelbaru'  => $levelbaru,
            'kodebaru'  => $kodebaru,
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
        $sql = "SELECT npyp, yayasan_id, s.nama, alamat_jalan, w.nama as desa_kelurahan, s.kode_wilayah 
                    FROM Arsip.dbo.yayasan s 
                    JOIN Referensi.ref.mst_wilayah w ON s.kode_wilayah=w.kode_wilayah 
                    WHERE LEFT(s.kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                    ORDER BY s.nama";

        $query = $this->db->query($sql, [
                'kodebaru'  => $kodebaru
            ]);
        return $query;
    }

}
