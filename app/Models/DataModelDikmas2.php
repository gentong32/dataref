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
    // s.bentuk_pendidikan_id=67 OR 
    // s.bentuk_pendidikan_id=68 OR 
    // s.bentuk_pendidikan_id=69 OR
    // s.bentuk_pendidikan_id=70 OR 
    // s.bentuk_pendidikan_id=71 OR 
    // s.bentuk_pendidikan_id=72

    protected $dikmasallns = "bp24_n + bp24_s + 
    bp26_n + bp26_s +
    bp27_n + bp27_s + 
    bp40_n + bp40_s + 
    bp56_n + bp56_s";
    // bp67_n + bp67_s + 
    // bp68_n + bp68_s + 
    // bp69_n + bp69_s +
    // bp70_n + bp70_s + 
    // bp71_n + bp71_s + 
    // bp72_n + bp72_s

    protected $dikmasalln = "bp24_n + 
    bp26_n + 
    bp27_n + 
    bp40_n + 
    bp56_n";
    //  bp67_n +
    // bp68_n + 
    // bp69_n + 
    // bp70_n + 
    // bp71_n + 
    // bp72_n

    protected $dikmasalls = "bp24_s + 
    bp26_s + 
    bp27_s + 
    bp40_s + 
    bp56_s";
    // bp67_s + 
    // bp68_s + 
    // bp69_s +
    // bp70_s + 
    // bp71_s + 
    // bp72_s

    protected $kursus = "s.bentuk_pendidikan_id=24";
    protected $tbm = "s.bentuk_pendidikan_id=26";
    protected $pkbm = "s.bentuk_pendidikan_id=27";
    protected $skb = "s.bentuk_pendidikan_id=40";
    protected $ponpes = "s.bentuk_pendidikan_id=56";
    // protected $pdfula = "s.bentuk_pendidikan_id=67";
    // protected $pdfwustha = "s.bentuk_pendidikan_id=68";
    // protected $pdfulya = "s.bentuk_pendidikan_id=69";
    // protected $spmula = "s.bentuk_pendidikan_id=70";
    // protected $spmwustha = "s.bentuk_pendidikan_id=71";
    // protected $spmulya = "s.bentuk_pendidikan_id=72";

    protected $kursusns = "bp24_n + bp24_s";
    protected $tbmns = "bp26_n + bp26_s";
    protected $pkbmns = "bp27_n + bp27_s";
    protected $skbns = "bp40_n + bp40_s";
    protected $ponpesns = "bp56_n + bp56_s";
    // protected $pdfulans = "bp67_n + bp67_s";
    // protected $pdfwusthans = "bp68_n + bp68_s";
    // protected $pdfulyans = "bp69_n + bp69_s";
    // protected $spmulans = "bp70_n + bp70_s";
    // protected $spmwusthans = "bp71_n + bp71_s";
    // protected $spmulyans = "bp72_n + bp72_s";

    protected $kursusn = "bp24_n";
    protected $tbmn = "bp26_n";
    protected $pkbmn = "bp27_n";
    protected $skbn = "bp40_n";
    protected $ponpesn = "bp56_n";
    // protected $pdfulan = "bp67_n";
    // protected $pdfwusthan = "bp68_n";
    // protected $pdfulyan = "bp69_n";
    // protected $spmulan = "bp70_n";
    // protected $spmwusthan = "bp71_n";
    // protected $spmulyan = "bp72_n";

    protected $kursuss = "bp24_s";
    protected $tbms = "bp26_s";
    protected $pkbms = "bp27_s";
    protected $skbs = "bp40_s";
    protected $ponpess = "bp56_s";
    // protected $pdfulas = "bp67_s";
    // protected $pdfwusthas = "bp68_s";
    // protected $pdfulyas = "bp69_s";
    // protected $spmulas = "bp70_s";
    // protected $spmwusthas = "bp71_s";
    // protected $spmulyas = "bp72_s";

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

    // protected $dikmasformal = "s.bentuk_pendidikan_id=67 OR
    // s.bentuk_pendidikan_id=68 OR
    // s.bentuk_pendidikan_id=69 OR
    // s.bentuk_pendidikan_id=70 OR
    // s.bentuk_pendidikan_id=71 OR
    // s.bentuk_pendidikan_id=72";



    // protected $dikmasformalns = "bp67_n + bp67_s + 
    // bp68_n + bp68_s +
    // bp69_n + bp69_s + 
    // bp70_n + bp70_s + 
    // bp71_n + bp71_s +
    // bp72_n + bp72_s";

    // protected $dikmasformaln = "bp67_n +
    // bp68_n +
    // bp69_n + 
    // bp70_n + 
    // bp71_n + 
    // bp72_n";

    // protected $dikmasformals = "bp67_s + 
    // bp68_s +
    // bp69_s + 
    // bp70_s + 
    // bp71_s +
    // bp72_s";

    public function getTotalDikmas($status, $kode, $level, $jalur, $bentuk)
    {

        $nkar = $level * 2;
        $nkar2 = $nkar + 2;
        $levelbaru = $level + 1;
        $kodebaru = substr($kode, 0, $nkar);

        if ($status == "all")
            $statusns = "ns";
        else if ($status == "s1")
            $statusns = "n";
        else if ($status == "s2")
            $statusns = "s";

        // (" . $this->dikmasformalns . ") as dikmasformal,
        // (" . $this->dikmasformaln . ") as dikmasformal,
        // (" . $this->dikmasformals . ") as dikmasformal,

        if ($bentuk == "all") {
            if ($jalur == "all") {
                if ($status == "all")
                    $sql = "SELECT (" . $this->dikmasallns . ") as total,
                (" . $this->dikmasnonformalns . ") as dikmasnonformal,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                WHERE mst_kode_wilayah=:kode:";
                else if ($status == "s1")
                    $sql = "SELECT (" . $this->dikmasalln . ") as total,
                (" . $this->dikmasnonformaln . ") as dikmasnonformal,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                WHERE mst_kode_wilayah=:kode:";
                else if ($status == "s2")
                    $sql = "SELECT (" . $this->dikmasalls . ") as total,
                (" . $this->dikmasnonformals . ") as dikmasnonformal,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                WHERE mst_kode_wilayah=:kode:";
            } else if ($jalur == "jn") {
                if ($status == "all")
                    $sql = "SELECT (" . $this->dikmasnonformalns . ") as total,
                (" . $this->kursusns . ") as kursus,
                (" . $this->tbmns . ") as tbm,
                (" . $this->pkbmns . ") as pkbm,
                (" . $this->skbns . ") as skb,
                (" . $this->ponpesns . ") as ponpes,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                WHERE mst_kode_wilayah=:kode:";
                else if ($status == "s1")
                    $sql = "SELECT (" . $this->dikmasnonformaln . ") as total,
                (" . $this->kursusn . ") as kursus,
                (" . $this->tbmn . ") as tbm,
                (" . $this->pkbmn . ") as pkbm,
                (" . $this->skbn . ") as skb,
                (" . $this->ponpesn . ") as ponpes,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                WHERE mst_kode_wilayah=:kode:";
                else if ($status == "s2")
                    $sql = "SELECT (" . $this->dikmasnonformals . ") as total,
                (" . $this->kursuss . ") as kursus,
                (" . $this->tbms . ") as tbm,
                (" . $this->pkbms . ") as pkbm,
                (" . $this->skbs . ") as skb,
                (" . $this->ponpess . ") as ponpes,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                WHERE mst_kode_wilayah=:kode:";
            } else if ($jalur == "jf") {
                if ($status == "all")
                    $sql = "SELECT (" . $this->dikmasformalns . ") as total,
                (" . $this->pdfulans . ") as pdfula,
                (" . $this->pdfwusthans . ") as pdfwustha,
                (" . $this->pdfulyans . ") as pdfulya,
                (" . $this->spmulans . ") as spmula,
                (" . $this->spmwusthans . ") as spmwustha,
                (" . $this->spmulyans . ") as spmulya,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                WHERE mst_kode_wilayah=:kode:";
                else if ($status == "s1")
                    $sql = "SELECT (" . $this->dikmasformaln . ") as total,
                (" . $this->pdfulan . ") as pdfula,
                (" . $this->pdfwusthan . ") as pdfwustha,
                (" . $this->pdfulyan . ") as pdfulya,
                (" . $this->spmulan . ") as spmula,
                (" . $this->spmwusthan . ") as spmwustha,
                (" . $this->spmulyan . ") as spmulya,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                WHERE mst_kode_wilayah=:kode:";
                else if ($status == "s2")
                    $sql = "SELECT (" . $this->dikmasformals . ") as total,
                (" . $this->pdfulas . ") as pdfula,
                (" . $this->pdfwusthas . ") as pdfwustha,
                (" . $this->pdfulyas . ") as pdfulya,
                (" . $this->spmulas . ") as spmula,
                (" . $this->spmwusthas . ") as spmwustha,
                (" . $this->spmulyas . ") as spmulya,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                WHERE mst_kode_wilayah=:kode:";
            }

            $query = $this->db->query($sql, [
                'kode' => $kode,
            ]);
        } else {
            if ($status == "all")
                $sql   = "SELECT (bp" . $bentuk . "_n + bp" . $bentuk . "_s) as total,
            nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah
            WHERE mst_kode_wilayah=:kode:";
            else if ($status == "s1")
                $sql   = "SELECT bp" . $bentuk . "_n as total,
            nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah
            WHERE mst_kode_wilayah=:kode:";
            else if ($status == "s2")
                $sql   = "SELECT bp" . $bentuk . "_s as total,
            nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah
            WHERE mst_kode_wilayah=:kode:";

            $query = $this->db->query($sql, [
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
        $query = $this->db->query($sql, [
            'bentuknya' => $bentuk
        ]);

        return $query;
    }

    public function getDaftarBentukDikmas($jalur)
    {
        if ($jalur == "all")
            $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s 
            WHERE (" . $this->dikmasall . ") 
            ORDER BY [bentuk_pendidikan_id]";
        else if ($jalur == "jf")
            $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s 
            WHERE (" . $this->dikmasformal . ") 
            ORDER BY [bentuk_pendidikan_id]";
        else if ($jalur == "jn")
            $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s 
            WHERE (" . $this->dikmasnonformal . ") 
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

    public function getDaftarSekolahDikmas($status, $kodebaru, $jalur, $bentuk)
    {
        $opsi = "arsip";

        if ($opsi == "ods") {
            $this->db = \Config\Database::connect("dbnpsn");
            $tabelbyopsi = "ods2.bid2.sekolah";
        } else {
            $tabelbyopsi = "arsip.dbo.sekolah";
        }

        if ($status == "all")
            $wherestatus = "";
        else if ($status == "s1")
            $wherestatus = " AND status_sekolah = 1 ";
        else if ($status == "s2")
            $wherestatus = " AND status_sekolah = 2 ";

        if ($bentuk == "all") {
            if ($jalur == "all") {
                $sql = "SELECT npsn, s.nama, alamat_jalan, w.nama as desa_kelurahan, 
                    s.kode_wilayah, 
                    CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                    FROM " . $tabelbyopsi . " s 
                    JOIN Referensi.ref.mst_wilayah w ON s.kode_wilayah=w.kode_wilayah  
                    WHERE (" . $this->dikmasall . ") 
                    AND LEFT(s.kode_wilayah,6)=:kodebaru: AND soft_delete=0 and s.aktif=1 
                    " . $wherestatus . " 
                    ORDER BY s.nama";
            } else if ($jalur == "jf") {
                $sql  = "SELECT npsn, s.nama, alamat_jalan, w.nama as desa_kelurahan, 
                    s.kode_wilayah, 
                    CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                    FROM " . $tabelbyopsi . " s 
                    JOIN Referensi.ref.mst_wilayah w ON s.kode_wilayah=w.kode_wilayah  
                    WHERE (" . $this->dikmasformal . ") 
                    AND LEFT(s.kode_wilayah,6)=:kodebaru: AND soft_delete=0 and s.aktif=1 
                    " . $wherestatus . " 
                    ORDER BY s.nama";
            } else if ($jalur == "jn") {
                $sql = "SELECT npsn, s.nama, alamat_jalan, w.nama as desa_kelurahan, 
                    s.kode_wilayah, 
                    CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                    FROM " . $tabelbyopsi . " s 
                    JOIN Referensi.ref.mst_wilayah w ON s.kode_wilayah=w.kode_wilayah  
                    WHERE (" . $this->dikmasnonformal . ") 
                    AND LEFT(s.kode_wilayah,6)=:kodebaru: AND soft_delete=0 and s.aktif=1 
                    " . $wherestatus . " 
                    ORDER BY s.nama";
            }

            $query = $this->db->query($sql, [
                'kodebaru'  => $kodebaru
            ]);
        } else {
            $sql = "SELECT npsn, s.nama, alamat_jalan, w.nama as desa_kelurahan, 
                s.kode_wilayah, 
                CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                FROM " . $tabelbyopsi . " s 
                JOIN Referensi.ref.mst_wilayah w ON s.kode_wilayah=w.kode_wilayah  
                WHERE (" . $this->dikmasall . ") 
                AND LEFT(s.kode_wilayah,6)=:kodebaru: AND soft_delete=0 and s.aktif=1 
                AND s.bentuk_pendidikan_id=:bentuknya: 
                " . $wherestatus . " 
                ORDER BY s.nama";

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
