<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModelPendidikan extends Model
{
    public function getCariNamaAtauNPSN($kode)
    {
        // $sql   = "SELECT max(ak.tahun) as tahun,s.sk_izin_operasional,s.tanggal_sk_izin_operasional,
        // s.tanggal_sk_pendirian,s.sk_pendirian_sekolah,s.yayasan_id, s.lintang, s.bujur,
        // s.kode_wilayah,s.nama as nama_sekolah,s.npsn,s.alamat_jalan, ra.nama as akreditasi,
        // s.desa_kelurahan, k.nama as naungan, s.luas_tanah_milik, s.luas_tanah_bukan_milik, 
        // CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl, b.nama as bentuk_pendidikan, 
        // CASE WHEN npyp IS NULL THEN '-' ELSE npyp END AS npyp, 
        // CASE WHEN s.bentuk_pendidikan_id IN (9,10,16,17,34,36,37,38,56,39,41,57,58,59,
        //         60,44,45,61,62,63,64,65) THEN 'Kementerian Agama'
        //     WHEN s.npsn IN ('10646356', '30314295', '69734022') THEN 'Kementerian Pertanian'
        //     WHEN s.npsn IN ('10110454', '30108179', '10308148', '40313544', 
        //     '20407427', '10814611', '20238524') THEN 'Kementerian Perindustrian'
        //     WHEN s.npsn IN ('69924881','69769420','69772845','10112822','10310815',
        //         '30112509','60404134','69787011','60104523') THEN 'Kementerian Kelautan dan Perikanan'
        //     ELSE 'Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi' 
        // END AS kementerian_pembina,
        // CASE WHEN y.kode_wilayah IS NULL THEN '-' ELSE y.kode_wilayah END AS kode_wilayah_yayasan     
        // FROM Arsip.dbo.sekolah s 
		// JOIN Referensi.ref.bentuk_pendidikan b ON b.bentuk_pendidikan_id = s.bentuk_pendidikan_id 
        // JOIN Referensi.ref.status_kepemilikan k ON k.status_kepemilikan_id = s.status_kepemilikan_id 
        // LEFT JOIN Arsip.dbo.yayasan y ON y.yayasan_id = s.yayasan_id 
        // LEFT JOIN Arsip.dbo.akreditasi ak ON ak.sekolah_id = s.sekolah_id 
        // LEFT JOIN Referensi.ref.akreditasi ra ON ra.akreditasi_id = ak.akreditasi_id
		// WHERE npsn = :npsn:  
		// GROUP BY s.sk_izin_operasional,s.tanggal_sk_pendirian,s.sk_pendirian_sekolah,
        // s.yayasan_id,s.alamat_jalan,s.desa_kelurahan,y.kode_wilayah,s.lintang, s.bujur,
        // s.kode_wilayah,npyp,b.nama,status_sekolah,k.nama,s.nama,s.sekolah_id,
        // s.master,s.aktif, s.nama, s.npsn,  s.bentuk_pendidikan_id, ra.nama, 
        // s.tanggal_sk_izin_operasional,s.luas_tanah_milik,s.luas_tanah_bukan_milik,
        // s.status_kepemilikan_id, s.yayasan_id ";

        $sql = "SELECT s.*, CASE WHEN npyp IS NULL THEN '-' ELSE npyp END AS npyp, 
         CASE WHEN s.bentuk_pendidikan_id IN (9,10,16,17,34,36,37,38,56,39,41,57,58,59,
                 60,44,45,61,62,63,64,65) THEN 'Kementerian Agama'
             WHEN s.npsn IN ('10646356', '30314295', '69734022') THEN 'Kementerian Pertanian'
             WHEN s.npsn IN ('10110454', '30108179', '10308148', '40313544', 
             '20407427', '10814611', '20238524') THEN 'Kementerian Perindustrian'
             WHEN s.npsn IN ('69924881','69769420','69772845','10112822','10310815',
                 '30112509','60404134','69787011','60104523') THEN 'Kementerian Kelautan dan Perikanan'
             ELSE 'Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi' 
         END AS kementerian_pembina, y.nama as nama_yayasan,
         CASE WHEN y.kode_wilayah IS NULL THEN '-' ELSE y.kode_wilayah END AS kode_wilayah_yayasan     
         FROM Datamart.datamart.sekolah s 
         LEFT JOIN Arsip.dbo.yayasan y ON y.yayasan_id = s.yayasan_id 
         WHERE npsn = :npsn:";

        $query = $this->db->query($sql, [
            'npsn'  => $kode
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

    public function getCariDaftarSekolah($kode)
    {
        // $keywordsMany = explode(' ',$kode);


        $isiwhere = "s.nama like :kode:";
		// for ($a=0;$a<count($keywordsMany);$a++) {
		// 	$isiwhere = $isiwhere . " OR s.nama like '%".$keywordsMany[$a]."%'";
		// }
        $isiwhere = $isiwhere." OR npsn like :kode:";
		// for ($a=0;$a<count($keywordsMany);$a++) {
		// 	$isiwhere = $isiwhere . " OR npsn like '%".$keywordsMany[$a]."%'";
		// }

        $sql = "SELECT TOP 5000 s.nama, s.npsn,s.alamat_jalan,s.desa_kelurahan, 
        CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl, 
        b.nama as bentuk_pendidikan 
        FROM [Arsip].[dbo].[sekolah] s 
        JOIN Referensi.ref.bentuk_pendidikan b ON b.bentuk_pendidikan_id = s.bentuk_pendidikan_id 
        WHERE soft_delete=0 AND ($isiwhere)"; 
       
        $query = $this->db->query($sql,[
            'kode'  => "%".$kode."%"
        ]);

        return $query;
    }

    public function getOperatorSekolah($npsn)
    {
        $sql = "SELECT p.*  
            FROM sdm.dbo.pengguna p
            JOIN sdm.dbo.instansi_pengguna ip ON p.pengguna_id=ip.pengguna_id
            JOIN sdm.dbo.instansi i ON i.instansi_id=ip.instansi_id
            WHERE p.status_approval=1 
                AND p.soft_delete=0
                AND ip.soft_delete=0
                AND i.soft_delete=0 
                AND i.jenis_instansi_id=5
                AND kode_instansi=:npsn:";

        $query = $this->db->query($sql,[
            'npsn'  => $npsn
        ]);

        return $query;
    }

}
