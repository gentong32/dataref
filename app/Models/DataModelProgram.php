<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModelProgram extends Model
{
    protected $bentukprogram = ['paketa'=>11, 'paketb'=>12, 'paketc'=>18, 'lifeskill'=>28];

    public function getTotalProgram($bentuk,$kode,$level) {

        $idbentuk = $this->bentukprogram[$bentuk];
        $nkar = $level * 2;
        $nkar2 = $nkar + 2;
        $levelbaru = $level+1;
        $kodebaru = substr($kode,0,$nkar);

        $sql = "SELECT 
                COUNT (*) as total,
                w.nama, w.kode_wilayah FROM Arsip.dbo.sekolah s 
                JOIN Referensi.ref.mst_wilayah w ON LEFT(w.kode_wilayah,:nkar2:)=LEFT(s.kode_wilayah,:nkar2:) 
                WHERE bentuk_pendidikan_id=:idbentuk: AND id_level_wilayah=:levelbaru: AND soft_delete=0 AND LEFT(w.kode_wilayah,:nkar:)=:kodebaru: 
                GROUP BY w.nama, w.kode_wilayah, w.mst_kode_wilayah 
                ORDER BY kode_wilayah";
            
        $query = $this->db->query($sql, [
            'nkar2' => $nkar2,
            'nkar'  => $nkar,
            'levelbaru'  => $levelbaru,
            'kodebaru'  => $kodebaru,
            'idbentuk' => $idbentuk,
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

    public function getDaftarProgram($bentuk,$kodebaru)
    {
        $idbentuk = $this->bentukprogram[$bentuk];
        $sql = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
                    kode_wilayah, 
                    CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                    FROM Arsip.dbo.sekolah s 
                    WHERE bentuk_pendidikan_id=:idbentuk: 
                    AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0  
                    ORDER BY nama";
                
        $query = $this->db->query($sql, [
            'kodebaru'  => $kodebaru,
            'idbentuk' => $idbentuk,
        ]);
        
        return $query;
    }

}
