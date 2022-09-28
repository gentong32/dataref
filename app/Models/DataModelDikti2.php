<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModelDikti2 extends Model
{
    protected $diktiall = "s.bentuk_pendidikan_id=19 OR 
    s.bentuk_pendidikan_id=20 OR 
    s.bentuk_pendidikan_id=21 OR 
    s.bentuk_pendidikan_id=22 OR 
    s.bentuk_pendidikan_id=23";

    protected $diktiallns = "bp19_n + bp19_s + 
    bp20_n + bp20_s + 
    bp21_n + bp21_s + 
    bp22_n + bp22_s + 
    bp23_n + bp23_s";

    protected $diktialln = "bp19_n +  
    bp20_n + 
    bp21_n + 
    bp22_n + 
    bp23_n";

    protected $diktialls = "bp19_s +  
    bp20_s + 
    bp21_s + 
    bp22_s + 
    bp23_s";

    protected $akademik = "s.bentuk_pendidikan_id=19";
    protected $politeknik = "s.bentuk_pendidikan_id=20";
    protected $sekolahtinggi = "s.bentuk_pendidikan_id=21";
    protected $institut = "s.bentuk_pendidikan_id=22";
    protected $universitas = "s.bentuk_pendidikan_id=23";

    protected $akademikns = "bp19_n + bp19_s";
    protected $politeknikns = "bp20_n + bp20_s";
    protected $sekolahtinggins = "bp21_n + bp21_s";
    protected $institutns = "bp22_n + bp22_s";
    protected $universitasns = "bp23_n + bp23_s";

    protected $akademikn = "bp19_n";
    protected $politeknikn = "bp20_n";
    protected $sekolahtinggin = "bp21_n";
    protected $institutn = "bp22_n";
    protected $universitasn = "bp23_n";

    protected $akademiks = "bp19_s";
    protected $politekniks = "bp20_s";
    protected $sekolahtinggis = "bp21_s";
    protected $instituts = "bp22_s";
    protected $universitass = "bp23_s";
    
    protected $diktiformal = "s.bentuk_pendidikan_id=19 OR 
    s.bentuk_pendidikan_id=20 OR 
    s.bentuk_pendidikan_id=21 OR 
    s.bentuk_pendidikan_id=22 OR 
    s.bentuk_pendidikan_id=23";
    
    protected $diktiformalns = "bp19_n + bp19_s + 
    bp20_n + bp20_s + 
    bp21_n + bp21_s + 
    bp22_n + bp22_s + 
    bp23_n + bp23_s";
    
    protected $diktiformaln = "bp19_n + 
    bp20_n + 
    bp21_n + 
    bp22_n + 
    bp23_n";
    
    protected $diktiformals = "bp19_s + 
    bp20_s + 
    bp21_s + 
    bp22_s + 
    bp23_s";

    protected $diktinonformal = "s.bentuk_pendidikan_id=99999"; 

    public function getTotalDikti($status,$kode,$level,$jalur,$bentuk) {

        $nkar = $level * 2;
        $nkar2 = $nkar + 2;
        $levelbaru = $level+1;
        $kodebaru = substr($kode,0,$nkar);

        if ($status=="all")
            $statusns = "ns";
        else if ($status=="s1")
            $statusns = "n";
        else if ($status=="s2")
            $statusns = "s";


        if ($bentuk=="all")
        {
            if ($jalur=="all")
            {
                if ($status=="all")
                $sql = "SELECT (".$this->diktiallns.") as total,
                (".$this->akademikns.") as akademik,
                (".$this->politeknikns.") as politeknik,
                (".$this->sekolahtinggins.") as sekolahtinggi,
                (".$this->institutns.") as institut,
                (".$this->universitasns.") as universitas,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                WHERE mst_kode_wilayah=:kode:";
                else if ($status=="s1")
                $sql = "SELECT (".$this->diktialln.") as total,
                (".$this->akademikn.") as akademik,
                (".$this->politeknikn.") as politeknik,
                (".$this->sekolahtinggin.") as sekolahtinggi,
                (".$this->institutn.") as institut,
                (".$this->universitasn.") as universitas,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                WHERE mst_kode_wilayah=:kode:";
                else if ($status=="s2")
                $sql = "SELECT (".$this->diktialls.") as total,
                (".$this->akademiks.") as akademik,
                (".$this->politekniks.") as politeknik,
                (".$this->sekolahtinggis.") as sekolahtinggi,
                (".$this->instituts.") as institut,
                (".$this->universitass.") as universitas,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                WHERE mst_kode_wilayah=:kode:";
               
            }
            else if ($jalur=="jf")
            {
                
                if ($status=="all")
                {
                    $sql = "SELECT (".$this->diktiallns.") as total,
                    (".$this->akademikns.") as akademik,
                    (".$this->politeknikns.") as politeknik,
                    (".$this->sekolahtinggins.") as sekolahtinggi,
                    (".$this->institutns.") as institut,
                    (".$this->universitasns.") as universitas,
                    nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                    WHERE mst_kode_wilayah=:kode:";

                    
                }
                else if ($status=="s1")
                {
                    $sql = "SELECT (".$this->diktialln.") as total,
                    (".$this->akademikn.") as akademik,
                    (".$this->politeknikn.") as politeknik,
                    (".$this->sekolahtinggin.") as sekolahtinggi,
                    (".$this->institutn.") as institut,
                    (".$this->universitasn.") as universitas,
                    nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                    WHERE mst_kode_wilayah=:kode:";
                }
                else if ($status=="s2")
                {
                    
                    $sql = "SELECT (".$this->diktialls.") as total,
                    (".$this->akademiks.") as akademik,
                    (".$this->politekniks.") as politeknik,
                    (".$this->sekolahtinggis.") as sekolahtinggi,
                    (".$this->instituts.") as institut,
                    (".$this->universitass.") as universitas,
                    nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                    WHERE mst_kode_wilayah=:kode:";
                    
                }
                
            }
            else if ($jalur=="jn")
            {
                $sql = "SELECT bp1_n as total,
                    nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                    WHERE mst_kode_wilayah='999909999'";
            }

            $query = $this->db->query($sql,[
                'kode' => $kode,
            ]);
        }
        else
        {
            if($status=="all")
            $sql   = "SELECT (bp".$bentuk."_n + bp".$bentuk."_s) as total,
            nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah
            WHERE mst_kode_wilayah=:kode:";
            else if($status=="s1")
            $sql   = "SELECT bp".$bentuk."_n as total,
            nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah
            WHERE mst_kode_wilayah=:kode:";
            else if($status=="s2")
            $sql   = "SELECT bp".$bentuk."_s as total,
            nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah
            WHERE mst_kode_wilayah=:kode:";
            
            $query = $this->db->query($sql,[
                'kode' => $kode,
            ]);
        }

        return $query;
    }

    public function getBentukPendidikan($bentuk)
    {
        $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
                WHERE [bentuk_pendidikan_id]=:bentuknya: 
                ORDER BY [bentuk_pendidikan_id]";
        $query = $this->db->query($sql,[
            'bentuknya' => $bentuk
        ]);

        return $query;
    }

    public function getDaftarBentukDikti($jalur)
    {
        if ($jalur=="all")
            $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s 
            WHERE (".$this->diktiall.") 
            ORDER BY [bentuk_pendidikan_id]";
        else if ($jalur=="jf")
            $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s 
            WHERE (".$this->diktiformal.") 
            ORDER BY [bentuk_pendidikan_id]";
        else if ($jalur=="jn")
            $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s 
            WHERE (".$this->diktinonformal.") 
            ORDER BY [bentuk_pendidikan_id]";

        $query = $this->db->query($sql);

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

    public function getDaftarSekolahDikti($status,$kodebaru,$jalur,$bentuk)
    {
        if ($status=="all")
            $wherestatus = "";
        else if ($status=="s1")
            $wherestatus = " AND status_sekolah = 1 ";
        else if ($status=="s2")
            $wherestatus = " AND status_sekolah = 2 ";

        if ($bentuk=="all")
        {
            if ($jalur=="all")
            {
                $sql = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
                    kode_wilayah, 
                    CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                    FROM Arsip.dbo.sekolah s 
                    WHERE (".$this->diktiall.") 
                    AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                    ".$wherestatus." 
                    ORDER BY nama";
            }
            else if ($jalur=="jf")
            {
                $sql  = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
                    kode_wilayah, 
                    CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                    FROM Arsip.dbo.sekolah s 
                    WHERE (".$this->diktiformal.") 
                    AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                    ".$wherestatus." 
                    ORDER BY nama";
            }
            else if ($jalur=="jn")
            {
                $sql = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
                    kode_wilayah, 
                    CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                    FROM Arsip.dbo.sekolah s 
                    WHERE (".$this->diktinonformal.") 
                    AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                    ".$wherestatus." 
                    ORDER BY nama";
            }

            $query = $this->db->query($sql, [
                'kodebaru'  => $kodebaru
            ]);
        }
        else
        {
            $sql = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
                kode_wilayah, 
                CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                FROM Arsip.dbo.sekolah s 
                WHERE (".$this->diktiall.") 
                AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                AND s.bentuk_pendidikan_id=:bentuknya: 
                ".$wherestatus." 
                ORDER BY nama";
                
            $query = $this->db->query($sql, [
                'kodebaru'  => $kodebaru,
                'bentuknya' => $bentuk
            ]);
        }
        return $query;
    }

    public function getbentukdiktisemua()
    {
        return $this->diktiall;
    }

    public function getbentukdiktiformal()
    {
        return $this->diktiformal;
    }

    public function getbentukdiktinonformal()
    {
        return $this->diktinonformal;
    }

}
