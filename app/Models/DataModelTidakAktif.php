<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModelTidakAktif extends Model
{

    public function getTotalTidakUpdate($kode,$level) {

        $nkar = $level * 2;
        $nkar2 = $nkar + 2;
        // $levelbaru = $level+1;
        // $kodebaru = substr($kode,0,$nkar);
        // $kodebaru = str_pad($kodebaru, 6, '0', STR_PAD_RIGHT);

        $sql = "SELECT kode_5,kode_4,kode_3,kode_2,kode_1, s.nama, 
                (kode_5+kode_4+kode_3+kode_2+kode_1) as total, s.kode_wilayah 
                FROM Dataprocess.rpt.rekap_sekolah_tidak_aktif_wilayah s 
                WHERE s.mst_kode_wilayah=:kodebaru: AND 
                (kode_5>0 OR kode_4>0 OR kode_3>0 OR kode_2>0 OR kode_1>0) 
                ORDER BY s.kode_wilayah";
            
        $query = $this->db->query($sql, [
            'nkar2' => $nkar2,
            'nkar'  => $nkar,
            'kodebaru'  => $kode,
        ]);
        
        return $query;
    }

    public function getDaftarTidakUpdate($kodebaru)
    {
        // $this->db = \Config\Database::connect("dbproses");
        $sql = "SELECT npsn, nama, kode_semester_tidak_aktif 
                    FROM [Dataprocess].[rpt].[rekap_sekolah_tidak_aktif] r
                    JOIN Arsip.dbo.sekolah s on s.sekolah_id=r.sekolah_id
                    WHERE LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                    AND kode_semester_tidak_aktif>0 
                    ORDER BY nama";

        $query = $this->db->query($sql, [
            'kodebaru'  => $kodebaru
        ]);
        return $query;
    }

    public function getTotalTidakAktif($kode,$level) {

        $nkar = $level * 2;
        $nkar2 = $nkar + 2;

        $sql = "SELECT kode_6, s.nama, s.kode_wilayah 
                FROM Dataprocess.rpt.rekap_sekolah_tidak_aktif_wilayah s 
                WHERE s.mst_kode_wilayah=:kodebaru: AND kode_6>0
                ORDER BY s.kode_wilayah";
            
        $query = $this->db->query($sql, [
            'nkar2' => $nkar2,
            'nkar'  => $nkar,
            'kodebaru'  => $kode,
        ]);
        
        return $query;
    }

    public function getDaftarTidakAktif($kodebaru)
    {
        $sql = "SELECT npsn, nama, alamat_jalan, kode_semester_tidak_aktif 
                    FROM [Dataprocess].[rpt].[rekap_sekolah_tidak_aktif] r
                    JOIN Arsip.dbo.sekolah s on s.sekolah_id=r.sekolah_id
                    WHERE LEFT(kode_wilayah,6)=:kodebaru: AND kode_semester_tidak_aktif=6
                    ORDER BY nama";

        $query = $this->db->query($sql, [
            'kodebaru'  => $kodebaru
        ]);
        return $query;
    }

    public function getTotalTutup($kode,$level) {

        $nkar = $level * 2;
        $nkar2 = $nkar + 2;
        $min1 = date ("Y")-1;

        $tahun = "[".date ("Y")."] as t".date ("Y");
        $tahun_1 = "[".$min1."] as t".$min1; 
        $tahun_2 = "[".(date ("Y")-2)."] as t".(date ("Y")-2);  
        $tahun_3 = "[".(date ("Y")-3)."] as t".(date ("Y")-3);  
        $tahun_4 = "kurang_dari_".((date ("Y"))-3)." as t".(date ("Y")-4);
        $total = "([".date ("Y")."] + [".((date ("Y")-1))."] + [".
        (date ("Y")-2)."] + [".((date ("Y"))-3)."] + kurang_dari_".
        (date ("Y")-3).") as total";

        $sql = "SELECT kode_wilayah,nama,".$tahun.",".$tahun_1.",".$tahun_2.",".
        $tahun_3.",".$tahun_4.",".$total."  
                FROM Dataprocess.rpt.sekolah_tutup 
                WHERE mst_kode_wilayah=:kodebaru: 
                ORDER BY kode_wilayah";

            
        $query = $this->db->query($sql, [
            'nkar2' => $nkar2,
            'nkar'  => $nkar,
            'kodebaru'  => $kode,
        ]);
        
        return $query;
    }

    public function getDaftarTutup($kodebaru)
    {
        $this->db = \Config\Database::connect("");

        $sql = "SELECT npsn, s.nama, alamat_jalan, r.last_update, tahun, b.nama as namabentuk   
                    FROM [Dataprocess].[dbo].[sekolah_tutup] r
                    JOIN Arsip.dbo.sekolah s on s.sekolah_id=r.sekolah_id
                    JOIN Referensi.ref.bentuk_pendidikan b on s.bentuk_pendidikan_id=b.bentuk_pendidikan_id
                    WHERE LEFT(r.kode_wilayah,6)=:kodebaru: 
                    ORDER BY tahun asc, s.nama asc";

        $query = $this->db->query($sql, [
            'kodebaru'  => $kodebaru
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

}
