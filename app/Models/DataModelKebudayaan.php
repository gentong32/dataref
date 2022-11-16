<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModelKebudayaan extends Model
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

    public function getTotalCagarBudaya($kode,$level,$kategori) {

        $nkar = $level * 2;
        $nkar2 = $nkar + 2;
        $levelbaru = $level+1;
        $kodebaru = substr($kode,0,$nkar);
        $wherekategori="";
        if ($kategori>0)
        $wherekategori = " AND jenis_id=".$kategori;

        $sql = "SELECT 
                COUNT (*) as total,
                SUM(CASE WHEN (jenis_id=1) THEN 1 ELSE 0 END) benda,
                SUM(CASE WHEN (jenis_id=2) THEN 1 ELSE 0 END) bangunan,
                SUM(CASE WHEN (jenis_id=3) THEN 1 ELSE 0 END) situs,
                SUM(CASE WHEN (jenis_id=4) THEN 1 ELSE 0 END) struktur,
                SUM(CASE WHEN (jenis_id=5) THEN 1 ELSE 0 END) kawasan,
                w.nama, w.kode_wilayah FROM Kebudayaan.dbo.cagar_budaya s 
                JOIN Referensi.ref.mst_wilayah w ON LEFT(w.kode_wilayah,:nkar2:)=LEFT(s.kode_wilayah,:nkar2:) 
                WHERE id_level_wilayah=:levelbaru: AND soft_delete=0 AND LEFT(w.kode_wilayah,:nkar:)=:kodebaru: 
                ".$wherekategori." 
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

    public function getTotalMuseum($kode,$level) {

        $nkar = $level * 2;
        $nkar2 = $nkar + 2;
        $levelbaru = $level+1;
        $kodebaru = substr($kode,0,$nkar);

        $sql = "SELECT 
                COUNT (*) as total,
                w.nama, w.kode_wilayah FROM Kebudayaan.dbo.museum s 
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

    public function getTotalWbtb($kode,$level) {

        $nkar = $level * 2;
        $nkar2 = $nkar + 2;
        $levelbaru = $level+1;
        $kodebaru = substr($kode,0,$nkar);

        $sql = "SELECT 
                COUNT (*) as total,
                w.nama, w.kode_wilayah FROM Kebudayaan.dbo.wbtb s 
                JOIN Referensi.ref.mst_wilayah w ON LEFT(w.kode_wilayah,:nkar2:)=LEFT(s.kode_prov,:nkar2:) 
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

    public function getTotalSanggar($kode,$level) {

        $nkar = $level * 2;
        $nkar2 = $nkar + 2;
        $levelbaru = $level+1;
        $kodebaru = substr($kode,0,$nkar);

        $sql = "SELECT 
                COUNT (*) as total,
                w.nama, w.kode_wilayah FROM Kebudayaan.dbo.lembaga_kebudayaan s 
                JOIN Referensi.ref.mst_wilayah w ON LEFT(w.kode_wilayah,:nkar2:)=LEFT(s.kode_kab_kota,:nkar2:) 
                WHERE id_level_wilayah=:levelbaru: AND LEFT(w.kode_wilayah,:nkar:)=:kodebaru: AND kode_huruf='SG' 
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

    public function getDaftarKategoriCagarBudaya()
    {
        $sql = "SELECT * FROM [Kebudayaan].[dbo].[jenis_cb] 
                ORDER BY [jenis_id]";
        $query = $this->db->query($sql);

        return $query;
    }

    public function getKategoriCagarBudaya($kategori)
    {
        $sql = "SELECT * FROM [Kebudayaan].[dbo].[jenis_cb] 
                WHERE [jenis_id]=:kategori:";
        $query = $this->db->query($sql,[
            'kategori' => $kategori
        ]);

        return $query;
    }

    public function getDaftarCagarBudaya($kodebaru, $kategori)
    {
        $wherekategori="";
        if ($kategori>0)
        $wherekategori = " AND s.jenis_id=".$kategori;

        $sql = "SELECT kode_pengelolaan,nama, Jenis, alamat, kode_wilayah 
                    FROM Kebudayaan.dbo.cagar_budaya s 
                    JOIN Kebudayaan.dbo.jenis_cb w ON w.jenis_id = s.jenis_id 
                    WHERE LEFT(kode_wilayah,6)=:kodebaru: AND s.soft_delete=0 
                    ".$wherekategori." 
                    ORDER BY kode_pengelolaan";

        $query = $this->db->query($sql, [
                'kodebaru'  => $kodebaru
            ]);
        return $query;
    }

    public function getDaftarWbtb($kode)
    {
        $kodebaru = substr($kode,0,2);

        $sql = "SELECT kode_pengelolaan, cb.nama as nama, jc.jenis_wbtb  
                FROM [Kebudayaan].[dbo].[wbtb] cb 
                LEFT JOIN [Kebudayaan].[dbo].[jenis_wbtb] jc  
                ON jc.jenis_id=cb.jenis 
                WHERE LEFT(kode_prov,2)=:kodebaru: AND cb.soft_delete=0 
                GROUP BY kode_pengelolaan,cb.nama, jc.jenis_wbtb 
                ORDER BY kode_pengelolaan";

        $query = $this->db->query($sql, [
                'kodebaru'  => $kodebaru
            ]);
        return $query;
    }

    public function getDaftarMuseum($kodebaru)
    {
        $sql = "SELECT kode_pengelolaan,nama, jenis_mus, alamat, kode_wilayah 
                    FROM Kebudayaan.dbo.museum s 
                    WHERE LEFT(kode_wilayah,6)=:kodebaru: AND s.soft_delete=0 
                    ORDER BY kode_pengelolaan";

        $query = $this->db->query($sql, [
                'kodebaru'  => $kodebaru
            ]);
        return $query;
    }

    public function getDaftarSanggar($kodebaru)
    {
        $sql = "SELECT lembaga_id,nama_lembaga, fokus_bidang, alamat, kode_kab_kota 
                    FROM Kebudayaan.dbo.lembaga_kebudayaan s 
                    WHERE LEFT(kode_kab_kota,6)=:kodebaru: AND kode_huruf='SG' 
                    ORDER BY nama_lembaga";

        $query = $this->db->query($sql, [
                'kodebaru'  => $kodebaru
            ]);
        return $query;
    }

    public function getCariCagarBudaya($kode)
    {
        $sql = "SELECT cb.*, Jenis  
         FROM Kebudayaan.dbo.cagar_budaya cb
         JOIN Kebudayaan.dbo.jenis_cb w ON w.jenis_id = cb.jenis_id  
         WHERE kode_pengelolaan = :kode:";

        $query = $this->db->query($sql, [
            'kode'  => $kode
        ]);

        return $query;
    }

    public function getCariMuseum($kode)
    {
        $sql = "SELECT * 
         FROM Kebudayaan.dbo.museum 
         WHERE kode_pengelolaan = :kode:";

        $query = $this->db->query($sql, [
            'kode'  => $kode
        ]);

        return $query;
    }

    public function getCariSanggar($kode)
    {
        $sql = "SELECT * 
         FROM Kebudayaan.dbo.lembaga_kebudayaan 
         WHERE lembaga_id = :kode:";

        $query = $this->db->query($sql, [
            'kode'  => $kode
        ]);

        return $query;
    }

    public function getCariWBTB($kode)
    {
        $sql = "SELECT w.*,j.*,r.nama as propinsi  
         FROM Kebudayaan.dbo.wbtb w
         JOIN Kebudayaan.dbo.jenis_wbtb j ON j.jenis_id = w.jenis  
         JOIN Referensi.ref.mst_wilayah r ON r.kode_wilayah = w.kode_prov 
         WHERE kode_pengelolaan = :kode:";

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

    public function getPemilik($sekolahid)
    {
        $sql = "select * from Kebudayaan.dbo.kepemilikan_cb where entitas_cb_id = :cbid: ";

        $query = $this->db->query($sql, [
            'cbid'  => $sekolahid
        ]);

        return $query;
    }

    public function getFileSK($sekolahid)
    {
        $sql = "select * from Kebudayaan.dbo.sk_cb where entitas_cb_id = :cbid: ";

        $query = $this->db->query($sql, [
            'cbid'  => $sekolahid
        ]);

        return $query;
    }

    public function getPemilikMuseum($sekolahid)
    {
        $sql = "select * from Kebudayaan.dbo.kepemilikan_museum where entitas_mus_id = :cbid: ";

        $query = $this->db->query($sql, [
            'cbid'  => $sekolahid
        ]);

        return $query;
    }

    public function getFileSKMuseum($sekolahid)
    {
        $sql = "select * from Kebudayaan.dbo.sk_museum where entitas_mus_id = :cbid: ";

        $query = $this->db->query($sql, [
            'cbid'  => $sekolahid
        ]);

        return $query;
    }

    public function getMaestroWbtb($entitas_id)
    {
        $sql = "select * from Kebudayaan.dbo.wbtb_maestro k 
        join Kebudayaan.dbo.maestro m on m.maestro_id=k.maestro_id 
        where entitas_wbtb_id = :wbid: ";

        $query = $this->db->query($sql, [
            'wbid'  => $entitas_id
        ]);

        return $query;
    }

    public function getCariDaftarBudaya($kode)
    {
        $isiwhere = "s.nama like :kode:";

        $sql = "SELECT TOP 1000 kode_pengelolaan,nama,Jenis as jenis,alamat, 
        CASE WHEN RTRIM(LTRIM(s.nama))=:kode2: THEN '0' ELSE '1' END AS tepat 
        FROM [Kebudayaan].[dbo].[cagar_budaya] s
        LEFT JOIN [Kebudayaan].[dbo].jenis_cb c ON s.jenis_id = c.jenis_id 
        WHERE s.soft_delete=0 AND ($isiwhere) 
        UNION SELECT TOP 1000 kode_pengelolaan,nama,jenis_mus as jenis,alamat, 
        CASE WHEN RTRIM(LTRIM(nama))=:kode2: THEN '0' ELSE '1' END AS tepat 
        FROM [Kebudayaan].[dbo].[museum] s 
        WHERE soft_delete=0 AND ($isiwhere) 
        ORDER BY tepat";
       
        $query = $this->db->query($sql,[
            'kode'  => "%".$kode."%",
            'kode2'  => $kode,
        ]);

        return $query;
    }

}
