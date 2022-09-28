<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModelDikmas2 extends Model
{
    protected $dikmasall = "s.bentuk_pendidikan_id=24 OR 
    s.bentuk_pendidikan_id=26 OR 
    s.bentuk_pendidikan_id=27 OR 
    s.bentuk_pendidikan_id=40 OR 
    s.bentuk_pendidikan_id=56";

    protected $dikmasallns = "bp24_n + bp24_s + 
    bp26_n + bp26_s +
    bp27_n + bp27_s + 
    bp40_n + bp40_s + 
    bp56_n + bp56_s";

    protected $dikmasalln = "bp24_n + 
    bp26_n + 
    bp27_n + 
    bp40_n + 
    bp56_n";

    protected $dikmasalls = "bp24_s + 
    bp26_s + 
    bp27_s + 
    bp40_s + 
    bp56_s";

    protected $kursus = "s.bentuk_pendidikan_id=24";
    protected $tbm = "s.bentuk_pendidikan_id=26";
    protected $pkbm = "s.bentuk_pendidikan_id=27";
    protected $skb = "s.bentuk_pendidikan_id=40";
    protected $ponpes = "s.bentuk_pendidikan_id=56";

    protected $kursusns = "bp24_n + bp24_s";
    protected $tbmns = "bp26_n + bp26_s";
    protected $pkbmns = "bp27_n + bp27_s";
    protected $skbns = "bp40_n + bp40_s";
    protected $ponpesns = "bp56_n + bp56_s";

    protected $kursusn = "bp24_n";
    protected $tbmn = "bp26_n";
    protected $pkbmn = "bp27_n";
    protected $skbn = "bp40_n";
    protected $ponpesn = "bp56_n";

    protected $kursuss = "bp24_s";
    protected $tbms = "bp26_s";
    protected $pkbms = "bp27_s";
    protected $skbs = "bp40_s";
    protected $ponpess = "bp56_s";

    protected $dikmasnonformal = "s.bentuk_pendidikan_id=24 OR 
    s.bentuk_pendidikan_id=26 OR 
    s.bentuk_pendidikan_id=27 OR 
    s.bentuk_pendidikan_id=40 OR 
    s.bentuk_pendidikan_id=56";

    protected $dikmasnonformalns = "bp24_n + bp24_s + 
    bp26_n + bp26_s +
    bp27_n + bp27_s + 
    bp40_n + bp40_s + 
    bp56_n + bp56_s";

    protected $dikmasnonformaln = "bp24_n + 
    bp26_n + 
    bp27_n + 
    bp40_n + 
    bp56_n";

    protected $dikmasnonformals = "bp24_s + 
    bp26_s + 
    bp27_s + 
    bp40_s + 
    bp56_s";

    protected $dikmasformal = "s.bentuk_pendidikan_id=99999";

    public function getTotalDikmas($status,$kode,$level,$jalur,$bentuk) {

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
                $sql = "SELECT (".$this->dikmasallns.") as total,
                (".$this->kursusns.") as kursus,
                (".$this->tbmns.") as tbm,
                (".$this->pkbmns.") as pkbm,
                (".$this->skbns.") as skb,
                (".$this->ponpesns.") as ponpes,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                WHERE mst_kode_wilayah=:kode:";
                else if ($status=="s1")
                $sql = "SELECT (".$this->dikmasalln.") as total,
                (".$this->kursusn.") as kursus,
                (".$this->tbmn.") as tbm,
                (".$this->pkbmn.") as pkbm,
                (".$this->skbn.") as skb,
                (".$this->ponpesn.") as ponpes,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                WHERE mst_kode_wilayah=:kode:";
                else if ($status=="s2")
                $sql = "SELECT (".$this->dikmasalls.") as total,
                (".$this->kursuss.") as kursus,
                (".$this->tbms.") as tbm,
                (".$this->pkbms.") as pkbm,
                (".$this->skbs.") as skb,
                (".$this->ponpess.") as ponpes,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                WHERE mst_kode_wilayah=:kode:";
                
            }
            else if ($jalur=="jn")
            {
                if ($status=="all")
                $sql = "SELECT (".$this->dikmasallns.") as total,
                (".$this->kursusns.") as kursus,
                (".$this->tbmns.") as tbm,
                (".$this->pkbmns.") as pkbm,
                (".$this->skbns.") as skb,
                (".$this->ponpesns.") as ponpes,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                WHERE mst_kode_wilayah=:kode:";
                else if ($status=="s1")
                $sql = "SELECT (".$this->dikmasalln.") as total,
                (".$this->kursusn.") as kursus,
                (".$this->tbmn.") as tbm,
                (".$this->pkbmn.") as pkbm,
                (".$this->skbn.") as skb,
                (".$this->ponpesn.") as ponpes,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                WHERE mst_kode_wilayah=:kode:";
                else if ($status=="s2")
                $sql = "SELECT (".$this->dikmasalls.") as total,
                (".$this->kursuss.") as kursus,
                (".$this->tbms.") as tbm,
                (".$this->pkbms.") as pkbm,
                (".$this->skbs.") as skb,
                (".$this->ponpess.") as ponpes,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                WHERE mst_kode_wilayah=:kode:";
            }
            else if ($jalur=="jf")
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

    public function getDaftarBentukDikmas($jalur)
    {
        if ($jalur=="all")
            $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s 
            WHERE (".$this->dikmasall.") 
            ORDER BY [bentuk_pendidikan_id]";
        else if ($jalur=="jf")
            $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s 
            WHERE (".$this->dikmasformal.") 
            ORDER BY [bentuk_pendidikan_id]";
        else if ($jalur=="jn")
            $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s 
            WHERE (".$this->dikmasnonformal.") 
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

    public function getDaftarSekolahDikmas($status,$kodebaru,$jalur,$bentuk)
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
                    WHERE (".$this->dikmasall.") 
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
                    WHERE (".$this->dikmasformal.") 
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
                    WHERE (".$this->dikmasnonformal.") 
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
                WHERE (".$this->dikmasall.") 
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

    public function getbentukdikmassemua()
    {
        return $this->dikmasall;
    }

    public function getbentukdikmasformal()
    {
        return $this->dikmasformal;
    }

    public function getbentukdikmasnonformal()
    {
        return $this->dikmasnonformal;
    }

}
