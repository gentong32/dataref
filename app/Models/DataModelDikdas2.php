<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModelDikdas2 extends Model
{
    protected $dikdasall = "s.bentuk_pendidikan_id=5 OR 
    s.bentuk_pendidikan_id=6 OR 
    s.bentuk_pendidikan_id=9 OR 
    s.bentuk_pendidikan_id=10 OR 
    s.bentuk_pendidikan_id=36 OR 
    s.bentuk_pendidikan_id=38 OR 
    s.bentuk_pendidikan_id=53 OR 
    s.bentuk_pendidikan_id=54 OR 
    s.bentuk_pendidikan_id=58 OR 
    s.bentuk_pendidikan_id=59 OR 
    s.bentuk_pendidikan_id=62 OR 
    s.bentuk_pendidikan_id=63 OR
    s.bentuk_pendidikan_id=67 OR 
    s.bentuk_pendidikan_id=68 OR
    s.bentuk_pendidikan_id=70 OR 
    s.bentuk_pendidikan_id=71 OR 
    s.bentuk_pendidikan_id=74 OR
    s.bentuk_pendidikan_id=75";

    protected $dikdasallns = "bp5_n + bp5_s +
    bp6_n + bp6_s +
    bp9_n + bp9_s +
    bp10_n + bp10_s +
    bp36_n + bp36_s +
    bp38_n + bp38_s +
    bp53_n + bp53_s +
    bp54_n + bp54_s +
    bp58_n + bp58_s +
    bp59_n + bp59_s +
    bp62_n + bp62_s +
    bp63_n + bp63_s +
    bp67_n + bp67_s +
    bp68_n + bp68_s +
    bp70_n + bp70_s +
    bp71_n + bp71_s +
    bp74_n + bp74_s +
    bp75_n + bp75_s";

    protected $dikdasalln = "bp5_n + 
    bp6_n + 
    bp9_n + 
    bp10_n + 
    bp36_n + 
    bp38_n + 
    bp53_n + 
    bp54_n + 
    bp58_n + 
    bp59_n + 
    bp62_n + 
    bp63_n +
    bp67_n +
    bp68_n +
    bp70_n +
    bp71_n +
    bp74_n +
    bp75_n";

    protected $dikdasalls = "bp5_s + 
    bp6_s + 
    bp9_s + 
    bp10_s + 
    bp36_s + 
    bp38_s + 
    bp53_s + 
    bp54_s + 
    bp58_s + 
    bp59_s + 
    bp62_s + 
    bp63_s +
    bp67_s + 
    bp68_s + 
    bp70_s + 
    bp71_s +
    bp74_s +
    bp75_s";

    protected $sdsederajat = "s.bentuk_pendidikan_id=5 OR 
    s.bentuk_pendidikan_id=9 OR 
    s.bentuk_pendidikan_id=38 OR 
    s.bentuk_pendidikan_id=53 OR 
    s.bentuk_pendidikan_id=58 OR 
    s.bentuk_pendidikan_id=62 OR
    s.bentuk_pendidikan_id=67 OR
    s.bentuk_pendidikan_id=70 OR
    s.bentuk_pendidikan_id=74";

    protected $sdsederajatns = "bp5_n + bp5_s + 
    bp9_n + bp9_s + 
    bp38_n + bp38_s + 
    bp53_n + bp53_s + 
    bp58_n + bp58_s + 
    bp62_n + bp62_s +
    bp67_n + bp67_s +
    bp70_n + bp70_s +
    bp74_n + bp74_s";

    protected $sdsederajatn = "bp5_n + 
    bp9_n + 
    bp38_n + 
    bp53_n + 
    bp58_n + 
    bp62_n +
    bp67_n +
    bp70_n +
    bp74_n";

    protected $sdsederajats = "bp5_s + 
    bp9_s + 
    bp38_s + 
    bp53_s + 
    bp58_s + 
    bp62_s +
    bp67_s +
    bp70_s +
    bp74_s";

    protected $smpsederajat = "s.bentuk_pendidikan_id=6 OR 
    s.bentuk_pendidikan_id=10 OR 
    s.bentuk_pendidikan_id=36 OR 
    s.bentuk_pendidikan_id=54 OR 
    s.bentuk_pendidikan_id=59 OR 
    s.bentuk_pendidikan_id=63 OR
    s.bentuk_pendidikan_id=68 OR
    s.bentuk_pendidikan_id=71 OR
    s.bentuk_pendidikan_id=75";

    protected $smpsederajatns = "bp6_n + bp6_s + 
    bp10_n + bp10_s + 
    bp36_n + bp36_s + 
    bp54_n + bp54_s + 
    bp59_n + bp59_s + 
    bp63_n + bp63_s +
    bp68_n + bp68_s +
    bp71_n + bp71_s +
    bp75_n + bp75_s";

    protected $smpsederajatn = "bp6_n + 
    bp10_n + 
    bp36_n + 
    bp54_n + 
    bp59_n + 
    bp63_n +
    bp68_n +
    bp71_n +
    bp75_n";

    protected $smpsederajats = "bp6_s + 
    bp10_s + 
    bp36_s + 
    bp54_s + 
    bp59_s + 
    bp63_s +
    bp68_s +
    bp71_s +
    bp75_s";

    protected $dikdasnonformal = "s.bentuk_pendidikan_id=99999";

    public function getTotalDikdas($status, $kode, $level, $jalur, $bentuk)
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

        if ($bentuk == "all") {
            if ($jalur == "all") {
                if ($status == "all")
                    $sql = "SELECT (" . $this->dikdasallns . ") as total,
                    (" . $this->sdsederajatns . ") as sdsederajat,
                    (" . $this->smpsederajatns . ") as smpsederajat,
                    nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                    WHERE mst_kode_wilayah=:kode:";
                else if ($status == "s1")
                    $sql = "SELECT (" . $this->dikdasalln . ") as total,
                    (" . $this->sdsederajatn . ") as sdsederajat,
                    (" . $this->smpsederajatn . ") as smpsederajat,
                    nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                    WHERE mst_kode_wilayah=:kode:";
                else if ($status == "s2")
                    $sql = "SELECT (" . $this->dikdasalls . ") as total,
                    (" . $this->sdsederajats . ") as sdsederajat,
                    (" . $this->smpsederajats . ") as smpsederajat,
                    nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                    WHERE mst_kode_wilayah=:kode:";
            } else if ($jalur == "jf") {
                if ($status == "all")
                    $sql = "SELECT (" . $this->dikdasallns . ") as total,
                    (" . $this->sdsederajatns . ") as sdsederajat,
                    (" . $this->smpsederajatns . ") as smpsederajat,
                    nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                    WHERE mst_kode_wilayah=:kode:";
                else if ($status == "s1")
                    $sql = "SELECT (" . $this->dikdasalln . ") as total,
                    (" . $this->sdsederajatn . ") as sdsederajat,
                    (" . $this->smpsederajatn . ") as smpsederajat,
                    nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                    WHERE mst_kode_wilayah=:kode:";
                else if ($status == "s2")
                    $sql = "SELECT (" . $this->dikdasalls . ") as total,
                    (" . $this->sdsederajats . ") as sdsederajat,
                    (" . $this->smpsederajats . ") as smpsederajat,
                    nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                    WHERE mst_kode_wilayah=:kode:";
            } else if ($jalur == "jn") {
                $sql = "SELECT bp1_n as total,
                    nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                    WHERE mst_kode_wilayah='999909999'";
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

    public function getDaftarBentukDikdas($jalur)
    {
        if ($jalur == "all")
            $wherejalur = "";
        else if ($jalur == "jf")
            $wherejalur = "AND LOWER(direktorat_pembinaan) = 'formal'";
        else if ($jalur == "jn")
            $wherejalur = "AND LOWER(direktorat_pembinaan) = 'non formal'";

        $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s 
            WHERE (" . $this->dikdasall . ") " . $wherejalur . "
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

    public function getDaftarSekolahDikdas($status, $kodebaru, $jalur, $bentuk)
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
                    w.kode_wilayah, 
                    CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                    FROM " . $tabelbyopsi . " s 
                    JOIN Referensi.ref.mst_wilayah w ON s.kode_wilayah=w.kode_wilayah  
                    WHERE (" . $this->dikdasall . ") 
                    AND LEFT(s.kode_wilayah,6)=:kodebaru: AND soft_delete=0 and s.aktif=1 
                    " . $wherestatus . " 
                    ORDER BY s.nama";
            } else if ($jalur == "jf") {
                $sql  = "SELECT npsn, s.nama, alamat_jalan, w.nama as desa_kelurahan,
                    w.kode_wilayah, 
                    CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                    FROM " . $tabelbyopsi . " s 
                    JOIN Referensi.ref.mst_wilayah w ON s.kode_wilayah=w.kode_wilayah  
                    WHERE (" . $this->dikdasall . ") 
                    AND LEFT(s.kode_wilayah,6)=:kodebaru: AND soft_delete=0 and s.aktif=1 
                    " . $wherestatus . " 
                    ORDER BY s.nama";
            } else if ($jalur == "jn") {
                $sql = "SELECT npsn, s.nama, alamat_jalan, w.nama as desa_kelurahan,
                    w.kode_wilayah, 
                    CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                    FROM " . $tabelbyopsi . " s 
                    JOIN Referensi.ref.mst_wilayah w ON s.kode_wilayah=w.kode_wilayah 
                    WHERE (" . $this->dikdasnonformal . ") 
                    AND LEFT(s.kode_wilayah,6)=:kodebaru: AND soft_delete=0 and s.aktif=1 
                    " . $wherestatus . " 
                    ORDER BY s.nama";
            }

            $query = $this->db->query($sql, [
                'kodebaru'  => $kodebaru
            ]);
        } else {
            $sql = "SELECT npsn, s.nama, alamat_jalan, w.nama as desa_kelurahan,
                w.kode_wilayah, 
                CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                FROM " . $tabelbyopsi . " s 
                JOIN Referensi.ref.mst_wilayah w ON s.kode_wilayah=w.kode_wilayah 
                WHERE (" . $this->dikdasall . ") 
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

    public function getbentukdikdassemua()
    {
        return $this->dikdasall;
    }
}
