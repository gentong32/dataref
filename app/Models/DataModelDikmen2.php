<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModelDikmen2 extends Model
{
    protected $dikmenall = "s.bentuk_pendidikan_id=7 OR 
    s.bentuk_pendidikan_id=8 OR 
    s.bentuk_pendidikan_id=13 OR 
    s.bentuk_pendidikan_id=14 OR 
    s.bentuk_pendidikan_id=15 OR 
    s.bentuk_pendidikan_id=16 OR 
    s.bentuk_pendidikan_id=17 OR 
    s.bentuk_pendidikan_id=29 OR 
    s.bentuk_pendidikan_id=37 OR 
    s.bentuk_pendidikan_id=39 OR 
    s.bentuk_pendidikan_id=42 OR 
    s.bentuk_pendidikan_id=44 OR 
    s.bentuk_pendidikan_id=55 OR 
    s.bentuk_pendidikan_id=60 OR 
    s.bentuk_pendidikan_id=64 OR 
    s.bentuk_pendidikan_id=65";

    protected $dikmenallns = "bp7_n + bp7_s +  
    bp8_n + bp8_s + 
    bp13_n + bp13_s + 
    bp14_n + bp14_s + 
    bp15_n + bp15_s + 
    bp16_n + bp16_s + 
    bp17_n + bp17_s + 
    bp29_n + bp29_s + 
    bp37_n + bp37_s + 
    bp39_n + bp39_s + 
    bp42_n + bp42_s + 
    bp44_n + bp44_s + 
    bp55_n + bp55_s + 
    bp60_n + bp60_s + 
    bp64_n + bp64_s + 
    bp65_n + bp65_s";

    protected $dikmenalln = "bp7_n + 
    bp8_n + 
    bp13_n + 
    bp14_n + 
    bp15_n + 
    bp16_n + 
    bp17_n + 
    bp29_n + 
    bp37_n + 
    bp39_n + 
    bp42_n + 
    bp44_n + 
    bp55_n + 
    bp60_n + 
    bp64_n + 
    bp65_n";

    protected $dikmenalls = "bp7_s + 
    bp8_s + 
    bp13_s + 
    bp14_s + 
    bp15_s + 
    bp16_s + 
    bp17_s + 
    bp29_s + 
    bp37_s + 
    bp39_s + 
    bp42_s + 
    bp44_s + 
    bp55_s + 
    bp60_s + 
    bp64_s + 
    bp65_s";
    
    protected $slb = "s.bentuk_pendidikan_id=7 OR 
    s.bentuk_pendidikan_id=8 OR 
    s.bentuk_pendidikan_id=14 OR 
    s.bentuk_pendidikan_id=29 OR 
    s.bentuk_pendidikan_id=42";
    
    protected $slbns = "bp7_n + bp7_s +
    bp8_n + bp8_s +
    bp14_n + bp14_s +
    bp29_n + bp29_s +
    bp42_n + bp42_s";
    
    protected $slbn = "bp7_n + 
    bp8_n + 
    bp14_n + 
    bp29_n + 
    bp42_n";
    
    protected $slbs = "bp7_s + 
    bp8_s + 
    bp14_s + 
    bp29_s + 
    bp42_s";

    protected $smasederajat = "s.bentuk_pendidikan_id=13 OR  
    s.bentuk_pendidikan_id=16 OR 
    s.bentuk_pendidikan_id=37 OR 
    s.bentuk_pendidikan_id=39 OR 
    s.bentuk_pendidikan_id=44 OR 
    s.bentuk_pendidikan_id=55 OR 
    s.bentuk_pendidikan_id=60 OR 
    s.bentuk_pendidikan_id=64";

    protected $smasederajatns = "bp13_n + bp13_s + 
    bp16_n + bp16_s +  
    bp37_n + bp37_s + 
    bp39_n + bp39_s + 
    bp44_n + bp44_s + 
    bp55_n + bp55_s + 
    bp60_n + bp60_s +
    bp64_n + bp64_s";

    protected $smasederajatn = "bp13_n +
    bp16_n + 
    bp37_n +  
    bp39_n + 
    bp44_n + 
    bp55_n + 
    bp60_n + 
    bp64_n";

    protected $smasederajats = "bp13_s +
    bp16_s + 
    bp37_s +  
    bp39_s + 
    bp44_s + 
    bp55_s + 
    bp60_s + 
    bp64_s";

    protected $smksederajat = "s.bentuk_pendidikan_id=15 OR   
    s.bentuk_pendidikan_id=17 OR 
    s.bentuk_pendidikan_id=65";

    protected $smksederajatns = "bp15_n + bp15_s +   
    bp17_n + bp17_s +  
    bp65_n + bp65_s";

    protected $smksederajatn = "bp15_n + 
    bp17_n +  
    bp65_n";

    protected $smksederajats = "bp15_s + 
    bp17_s +  
    bp65_s";

    protected $dikmennonformal = "s.bentuk_pendidikan_id=99999"; 

    public function getTotalDikmen($status,$kode,$level,$jalur,$bentuk) {

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
                $sql = "SELECT (".$this->dikmenallns.") as total,
                (".$this->smasederajatns.") as smasederajat,
                (".$this->smksederajatns.") as smksederajat,
                (".$this->slbns.") as slb,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                WHERE mst_kode_wilayah=:kode:";
                else if ($status=="s1")
                $sql = "SELECT (".$this->dikmenalln.") as total,
                (".$this->smasederajatn.") as smasederajat,
                (".$this->smksederajatn.") as smksederajat,
                (".$this->slbn.") as slb,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                WHERE mst_kode_wilayah=:kode:";
                else if ($status=="s2")
                $sql = "SELECT (".$this->dikmenalls.") as total,
                (".$this->smasederajats.") as smasederajat,
                (".$this->smksederajats.") as smksederajat,
                (".$this->slbs.") as slb,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                WHERE mst_kode_wilayah=:kode:";
            }
            else if ($jalur=="jf")
            {
                if ($status=="all")
                $sql = "SELECT (".$this->dikmenallns.") as total,
                (".$this->smasederajatns.") as smasederajat,
                (".$this->smksederajatns.") as smksederajat,
                (".$this->slbns.") as slb,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                WHERE mst_kode_wilayah=:kode:";
                else if ($status=="s1")
                $sql = "SELECT (".$this->dikmenalln.") as total,
                (".$this->smasederajatn.") as smasederajat,
                (".$this->smksederajatn.") as smksederajat,
                (".$this->slbn.") as slb,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                WHERE mst_kode_wilayah=:kode:";
                else if ($status=="s2")
                $sql = "SELECT (".$this->dikmenalls.") as total,
                (".$this->smasederajats.") as smasederajat,
                (".$this->smksederajats.") as smksederajat,
                (".$this->slbs.") as slb,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                WHERE mst_kode_wilayah=:kode:";
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

    public function getDaftarBentukDikmen($jalur)
    {
        if ($jalur=="all")
            $wherejalur = "";
        else if ($jalur=="jf")
            $wherejalur = "AND LOWER(direktorat_pembinaan) = 'formal'";
        else if ($jalur=="jn")
            $wherejalur = "AND LOWER(direktorat_pembinaan) = 'non formal'";

        $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s 
            WHERE (".$this->dikmenall.") ".$wherejalur."
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

    public function getDaftarSekolahDikmen($status,$kodebaru,$jalur,$bentuk)
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
                    WHERE (".$this->dikmenall.") 
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
                    WHERE (".$this->dikmenall.") 
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
                    WHERE (".$this->dikmennonformal.") 
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
                WHERE (".$this->dikmenall.") 
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

    public function getbentukdikmensemua()
    {
        return $this->dikmenall;
    }

    public function getbentukdikmenformal()
    {
        return $this->dikmenall;
    }

    public function getbentukdikmennonformal()
    {
        return $this->dikmennonformal;
    }

}
