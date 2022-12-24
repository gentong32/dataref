<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModelKebahasaan extends Model
{

    public function getNamaPilihan($kode)
    {
        $sql = 'SELECT nama FROM Referensi.ref.mst_wilayah w  
                WHERE kode_wilayah=:kodewilayah:';
        $query = $this->db->query($sql, [
            'kodewilayah'  => $kode
        ]);

        return $query;
    }

    public function getTotalBahasa($kode,$level) {

        $nkar = $level * 2;
        $nkar2 = $nkar + 2;
        $levelbaru = $level+1;
        $kodebaru = substr($kode,0,$nkar);

        $sql = "SELECT 
                COUNT (*) as total,
                w.nama, w.kode_wilayah FROM Bahasa.dbo.bahasa_wilayah s 
                JOIN Referensi.ref.mst_wilayah w ON LEFT(w.kode_wilayah,:nkar2:)=LEFT(s.kode_wilayah,:nkar2:) 
                WHERE w.id_level_wilayah=:levelbaru: AND LEFT(w.kode_wilayah,:nkar:)=:kodebaru: AND s.soft_delete = 0   
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

    public function getDaftarBahasa($kodebaru)
    {
        $sql = "SELECT s.bahasa_id,kode_bahasa, nama, s.deskripsi 
                    FROM Bahasa.dbo.bahasa_wilayah s 
                    LEFT JOIN Bahasa.ref.bahasa r ON s.bahasa_id=r.bahasa_id 
                    WHERE LEFT(kode_wilayah,6)=:kodebaru: 
                    ORDER BY nama";

        $query = $this->db->query($sql, [
                'kodebaru'  => $kodebaru
            ]);
        return $query;
    }

    public function getTotalKomunitas($kode,$level) {

        $nkar = $level * 2;
        $nkar2 = $nkar + 2;
        $levelbaru = $level+1;
        $kodebaru = substr($kode,0,$nkar);

        $sql = "SELECT 
                COUNT (*) as total,
                w.nama, w.kode_wilayah FROM sdm.dbo.instansi s 
                JOIN Referensi.ref.mst_wilayah w ON LEFT(w.kode_wilayah,:nkar2:)=LEFT(s.kode_wilayah,:nkar2:) 
                WHERE s.jenis_instansi_id = 15 AND w.id_level_wilayah=:levelbaru: AND LEFT(w.kode_wilayah,:nkar:)=:kodebaru: AND s.soft_delete = 0   
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

    public function getDaftarKomunitas($kodebaru)
    {
        $sql = "SELECT s.instansi_id, nama, alamat 
                    FROM sdm.dbo.instansi s 
                    WHERE jenis_instansi_id = 15 AND LEFT(kode_wilayah,6)=:kodebaru: 
                    ORDER BY nama";

        $query = $this->db->query($sql, [
                'kodebaru'  => $kodebaru
            ]);
        return $query;
    }

    public function getCariKomunitas($kode)
    {
        $sql = "SELECT * 
         FROM sdm.dbo.instansi 
         WHERE instansi_id = :kode:";

        $query = $this->db->query($sql, [
            'kode'  => $kode
        ]);

        return $query;
    }

    public function getDataWilayah($kodwil)
    {
        $sql = "select w1.nama as kecamatan, w2.nama as kota, w3.nama as propinsi, w1.id_level_wilayah, w1.mst_kode_wilayah, w1.kode_wilayah 
		from Referensi.ref.mst_wilayah w1, Referensi.ref.mst_wilayah w2, Referensi.ref.mst_wilayah w3 
		where w1.kode_wilayah = :kodwil: and (w1.mst_kode_wilayah = w2.kode_wilayah) and 
		(w2.mst_kode_wilayah = w3.kode_wilayah)
		order by w1.id_level_wilayah, w2.nama, w1.nama";

        $query = $this->db->query($sql, [
            'kodwil'  => substr($kodwil,0,6)
        ]);

        return $query;
    }

   
}
