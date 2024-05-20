<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModelProgram extends Model
{

    /////////////////////// KESETARAAN  --------------------
    protected $kesetaraanall = "s.bentuk_pendidikan_id=27 OR 
    s.bentuk_pendidikan_id=40";

    protected $setarans = "bp27_n_a + bp27_s_a + 
    bp40_n_a + bp40_s_a +
    bp27_n_b + bp27_s_b + 
    bp40_n_b + bp40_s_b + 
    bp27_n_c + bp27_s_c + 
    bp40_n_c + bp40_s_c";

    protected $setaran = "bp27_n_a + 
    bp40_n_a + 
    bp27_n_b + 
    bp40_n_b + 
    bp27_n_c + 
    bp40_n_c";

    protected $setaras = "bp27_s_a + 
    bp40_s_a + 
    bp27_s_b + 
    bp40_s_b +  
    bp27_s_c +  
    bp40_s_c";

    //----------------------------------------

    protected $paketans = "bp27_n_a + bp27_s_a + 
    bp40_n_a + bp40_s_a";
    protected $paketan = "bp27_n_a + 
    bp40_n_a";
    protected $paketas = "bp27_s_a + 
    bp40_s_a";

    protected $paketbns = "bp27_n_b + bp27_s_b + 
    bp40_n_b + bp40_s_b";
    protected $paketbn = "bp27_n + 
    bp40_n_b";
    protected $paketbs = "bp27_s_b + 
    bp40_s_b";

    protected $paketcns = "bp27_n_c + bp27_s_c + 
    bp40_n_c + bp40_s_c";
    protected $paketcn = "bp27_n_c + 
    bp40_n_c";
    protected $paketcs = "bp27_s_c + 
    bp40_s_c";

    /////// KETRAMPILAN KERJA---------------
    protected $trampilall = "s.bentuk_pendidikan_id=24 OR 
    s.bentuk_pendidikan_id=27 OR 
    s.bentuk_pendidikan_id=40";

    protected $trampilns = "bp24_s_kl1 + 
    bp27_n_kl1 + bp27_s_kl1 + 
    bp40_n_kl1 + bp40_s_kl1 + 
    bp24_s_kl2 + 
    bp27_n_kl2 + bp27_s_kl2 + 
    bp40_n_kl2 + bp40_s_kl2 + 
    bp24_s_kl3 + 
    bp27_n_kl3 + bp27_s_kl3 + 
    bp40_n_kl3 + bp40_s_kl3 + 
    bp24_s_kl4 + 
    bp27_n_kl4 + bp27_s_kl4 + 
    bp40_n_kl4 + bp40_s_kl4 + 
    bp24_s_kl5 + 
    bp27_n_kl5 + bp27_s_kl5 + 
    bp40_n_kl5 + bp40_s_kl5 + 
    bp24_s_kl6 + 
    bp27_n_kl6 + bp27_s_kl6 + 
    bp40_n_kl6 + bp40_s_kl6 + 
    bp24_s_kl7 + 
    bp27_n_kl7 + bp27_s_kl7 + 
    bp40_n_kl7 + bp40_s_kl7 + 
    bp24_s_kl8 + 
    bp27_n_kl8 + bp27_s_kl8 + 
    bp40_n_kl8 + bp40_s_kl8 + 
    bp24_s_kl9 + 
    bp27_n_kl9 + bp27_s_kl9 + 
    bp40_n_kl9 + bp40_s_kl9";

    protected $trampiln = "bp27_n_kl1 + 
    bp40_n_kl1 + 
    bp27_n_kl2 + 
    bp40_n_kl2 + 
    bp27_n_kl3 + 
    bp40_n_kl3 +
    bp27_n_kl4 + 
    bp40_n_kl4 +
    bp27_n_kl5 + 
    bp40_n_kl5 +
    bp27_n_kl6 + 
    bp40_n_kl6 +
    bp27_n_kl7 + 
    bp40_n_kl7 +
    bp27_n_kl8 + 
    bp40_n_kl8 +
    bp27_n_kl9 + 
    bp40_n_kl9";

    protected $trampils = "bp24_s_kl1 + 
    bp27_s_kl1 + 
    bp40_s_kl1 + 
    bp24_s_kl2 + 
    bp27_s_kl2 + 
    bp40_s_kl2 + 
    bp24_s_kl3 + 
    bp27_s_kl3 + 
    bp40_s_kl3 +
    bp24_s_kl4 + 
    bp27_s_kl4 + 
    bp40_s_kl4 +
    bp24_s_kl5 + 
    bp27_s_kl5 + 
    bp40_s_kl5 +
    bp24_s_kl6 + 
    bp27_s_kl6 + 
    bp40_s_kl6 +
    bp24_s_kl7 + 
    bp27_s_kl7 + 
    bp40_s_kl7 +
    bp24_s_kl8 + 
    bp27_s_kl8 + 
    bp40_s_kl8 +
    bp24_s_kl9 + 
    bp27_s_kl9 + 
    bp40_s_kl9";

    //-------------------------------------

    protected $kkni1_ns = "bp24_s_kl1 + 
    bp27_n_kl1 + bp27_s_kl1 +
    bp40_n_kl1 + bp40_s_kl1";
    protected $kkni1_n = "bp27_n_kl1 + 
    bp40_n_kl1";
    protected $kkni1_s = "bp24_s_kl1 + 
    bp27_s_kl1 + 
    bp40_s_kl1";

    protected $kkni2_ns = "bp24_s_kl2 + 
    bp27_n_kl2 + bp27_s_kl2 +
    bp40_n_kl2 + bp40_s_kl2";
    protected $kkni2_n = "bp27_n_kl2 + 
    bp40_n_kl2";
    protected $kkni2_s = "bp24_s_kl2 + 
    bp27_s_kl2 + 
    bp40_s_kl2";

    protected $kkni3_ns = "bp24_s_kl3 + 
    bp27_n_kl3 + bp27_s_kl3 +
    bp40_n_kl3 + bp40_s_kl3";
    protected $kkni3_n = "bp27_n_kl3 + 
    bp40_n_kl3";
    protected $kkni3_s = "bp24_s_kl3 + 
    bp27_s_kl3 + 
    bp40_s_kl3";

    protected $kkni4_ns = "bp24_s_kl4 + 
    bp27_n_kl4 + bp27_s_kl4 +
    bp40_n_kl4 + bp40_s_kl4";
    protected $kkni4_n = "bp27_n_kl4 + 
    bp40_n_kl4";
    protected $kkni4_s = "bp24_s_kl4 + 
    bp27_s_kl4 + 
    bp40_s_kl4";

    protected $kkni5_ns = "bp24_s_kl5 + 
    bp27_n_kl5 + bp27_s_kl5 +
    bp40_n_kl5 + bp40_s_kl5";
    protected $kkni5_n = "bp27_n_kl5 + 
    bp40_n_kl5";
    protected $kkni5_s = "bp24_s_kl5 + 
    bp27_s_kl5 + 
    bp40_s_kl5";

    protected $kkni6_ns = "bp24_s_kl6 + 
    bp27_n_kl6 + bp27_s_kl6 +
    bp40_n_kl6 + bp40_s_kl6";
    protected $kkni6_n = "bp27_n_kl6 + 
    bp40_n_kl6";
    protected $kkni6_s = "bp24_s_kl6 + 
    bp27_s_kl6 + 
    bp40_s_kl6";

    protected $kkni7_ns = "bp24_s_kl7 + 
    bp27_n_kl7 + bp27_s_kl7 +
    bp40_n_kl7 + bp40_s_kl7";
    protected $kkni7_n = "bp27_n_kl7 + 
    bp40_n_kl7";
    protected $kkni7_s = "bp24_s_kl7 + 
    bp27_s_kl7 + 
    bp40_s_kl7";

    protected $kkni8_ns = "bp24_s_kl8 + 
    bp27_n_kl8 + bp27_s_kl8 +
    bp40_n_kl8 + bp40_s_kl8";
    protected $kkni8_n = "bp27_n_kl8 + 
    bp40_n_kl8";
    protected $kkni8_s = "bp24_s_kl8 + 
    bp27_s_kl8 + 
    bp40_s_kl8";

    protected $kkni9_ns = "bp24_s_kl9 + 
    bp27_n_kl9 + bp27_s_kl9 +
    bp40_n_kl9 + bp40_s_kl9";
    protected $kkni9_n = "bp27_n_kl9 + 
    bp40_n_kl9";
    protected $kkni9_s = "bp24_s_kl9 + 
    bp27_s_kl9 + 
    bp40_s_kl9";


    /////////////////////// PKBMPAUD --------------------
    protected $paudall = "s.bentuk_pendidikan_id=27 OR 
    s.bentuk_pendidikan_id=40";

    protected $paudns = "bp27_n_paud + bp27_s_paud + 
    bp40_n_paud + bp40_s_paud";

    protected $paudn = "bp27_n_paud + 
    bp40_n_paud";

    protected $pauds = "bp27_s_paud + 
    bp40_s_paud";


    /////////////////////// SLB  ---7, 8, 14, 42 -----------------
    protected $slball = "s.bentuk_pendidikan_id=7 OR 
    s.bentuk_pendidikan_id=8 OR 
    s.bentuk_pendidikan_id=14 OR 
    s.bentuk_pendidikan_id=29 OR 
    s.bentuk_pendidikan_id=42";

    protected $slbns = "bp29_n_tk + bp29_s_tk + 
    bp29_n_sd + bp29_s_sd + 
    bp29_n_smp + bp29_s_smp + 
    bp29_n_sma + bp29_s_sma";

    protected $slbn = "bp29_n_tk + 
    bp29_n_sd + 
    bp29_n_smp + 
    bp29_n_sma";

    protected $slbs = "bp29_s_tk + 
    bp29_s_sd + 
    bp29_s_smp + 
    bp29_s_sma";

    protected $tklbns = "bp29_n_tk + bp29_s_tk";
    protected $tklbn = "bp29_n_tk";
    protected $tklbs = "bp29_s_tk";

    protected $sdlbns = "bp29_n_sd + bp29_s_sd";
    protected $sdlbn = "bp29_n_sd";
    protected $sdlbs = "bp29_s_sd";

    protected $smplbns = "bp29_n_smp + bp29_s_smp";
    protected $smplbn = "bp29_n_smp";
    protected $smplbs = "bp29_s_smp";

    protected $smlbns = "bp29_n_sma + bp29_s_sma";
    protected $smlbn = "bp29_n_sma";
    protected $smlbs = "bp29_s_sma";

    /////////////------------------------------------

    public function getTotalSetara($status, $kode, $level)
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

        if ($status == "all")
            $sql = "SELECT (" . $this->setarans . ") as total,
            (" . $this->paketans . ") as paketa,
            (" . $this->paketbns . ") as paketb,
            (" . $this->paketcns . ") as paketc,
            nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
            WHERE mst_kode_wilayah=:kode:";
        else if ($status == "s1")
            $sql = "SELECT (" . $this->setaran . ") as total,
            (" . $this->paketan . ") as paketa,
            (" . $this->paketbn . ") as paketb,
            (" . $this->paketcn . ") as paketc,
            nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
            WHERE mst_kode_wilayah=:kode:";
        else if ($status == "s2")
            $sql = "SELECT (" . $this->setaras . ") as total,
            (" . $this->paketas . ") as paketa,
            (" . $this->paketbs . ") as paketb,
            (" . $this->paketcs . ") as paketc,
            nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah 
            WHERE mst_kode_wilayah=:kode:";

        $query = $this->db->query($sql, [
            'kode' => $kode,
        ]);

        return $query;
    }

    public function getDaftarSetara($status, $kodebaru)
    {
        if ($status == "all")
            $wherestatus = "";
        else if ($status == "s1")
            $wherestatus = " AND status_sekolah = 1 ";
        else if ($status == "s2")
            $wherestatus = " AND status_sekolah = 2 ";

        $sql = "SELECT npsn, s.nama, alamat_jalan, w.nama as desa_kelurahan, 
        s.kode_wilayah, paket_a, paket_b, paket_c, 
        CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
        FROM Arsip.dbo.sekolah s 
        JOIN Referensi.ref.mst_wilayah w ON s.kode_wilayah=w.kode_wilayah 
        JOIN Dataprocess.dbo.sekolah_jenis_layanan d on d.sekolah_id=s.sekolah_id 
        WHERE (" . $this->kesetaraanall . ") 
        AND LEFT(s.kode_wilayah,6)=:kodebaru: AND soft_delete=0 and s.aktif=1 
        " . $wherestatus . " 
        ORDER BY s.nama";

        $query = $this->db->query($sql, [
            'kodebaru'  => $kodebaru
        ]);

        return $query;
    }

    ////////////////////// KETRAMPILAN KERJA 

    public function getTotalTrampil($status, $kode, $level)
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

        if ($status == "all")
            $sql = "SELECT (" . $this->trampilns . ") as total,
            (" . $this->kkni1_ns . ") as kkni1,
            (" . $this->kkni2_ns . ") as kkni2,
            (" . $this->kkni3_ns . ") as kkni3,
            (" . $this->kkni4_ns . ") as kkni4,
            (" . $this->kkni5_ns . ") as kkni5,
            (" . $this->kkni6_ns . ") as kkni6,
            (" . $this->kkni7_ns . ") as kkni7,
            (" . $this->kkni8_ns . ") as kkni8,
            (" . $this->kkni9_ns . ") as kkni9,
            nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
            WHERE mst_kode_wilayah=:kode: AND (" . $this->trampilns . ")>0";
        else if ($status == "s1")
            $sql = "SELECT (" . $this->trampiln . ") as total,
            (" . $this->kkni1_n . ") as kkni1,
            (" . $this->kkni2_n . ") as kkni2,
            (" . $this->kkni3_n . ") as kkni3,
            (" . $this->kkni4_n . ") as kkni4,
            (" . $this->kkni5_n . ") as kkni5,
            (" . $this->kkni6_n . ") as kkni6,
            (" . $this->kkni7_n . ") as kkni7,
            (" . $this->kkni8_n . ") as kkni8,
            (" . $this->kkni9_n . ") as kkni9,
            nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
            WHERE mst_kode_wilayah=:kode: AND (" . $this->trampiln . ")>0";
        else if ($status == "s2")
            $sql = "SELECT (" . $this->trampils . ") as total,
            (" . $this->kkni1_s . ") as kkni1,
            (" . $this->kkni2_s . ") as kkni2,
            (" . $this->kkni3_s . ") as kkni3,
            (" . $this->kkni4_s . ") as kkni4,
            (" . $this->kkni5_s . ") as kkni5,
            (" . $this->kkni6_s . ") as kkni6,
            (" . $this->kkni7_s . ") as kkni7,
            (" . $this->kkni8_s . ") as kkni8,
            (" . $this->kkni9_s . ") as kkni9,
            nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah 
            WHERE mst_kode_wilayah=:kode: AND (" . $this->trampils . ")>0";

        $query = $this->db->query($sql, [
            'kode' => $kode,
        ]);

        return $query;
    }

    public function getDaftarTrampil($status, $kodebaru)
    {
        if ($status == "all")
            $wherestatus = "";
        else if ($status == "s1")
            $wherestatus = " AND status_sekolah = 1 ";
        else if ($status == "s2")
            $wherestatus = " AND status_sekolah = 2 ";

        $sql = "SELECT npsn, s.nama, alamat_jalan, w.nama as desa_kelurahan, 
        s.kode_wilayah, kkni_level_1, kkni_level_2, kkni_level_3, kkni_level_4, kkni_level_5,
        kkni_level_6, kkni_level_7, kkni_level_8, kkni_level_9,
        CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
        FROM Arsip.dbo.sekolah s 
        JOIN Referensi.ref.mst_wilayah w ON s.kode_wilayah=w.kode_wilayah 
        JOIN Dataprocess.dbo.sekolah_jenis_layanan d on d.sekolah_id=s.sekolah_id 
        WHERE (" . $this->trampilall . ") AND 
         (d.kkni_level_1 > 0 OR d.kkni_level_2 > 0 OR d.kkni_level_3 > 0 OR
          d.kkni_level_4 > 0 OR d.kkni_level_5 > 0 OR d.kkni_level_6 > 0 OR
          d.kkni_level_7 > 0 OR d.kkni_level_8 > 0 OR d.kkni_level_9 > 0) 
        AND LEFT(s.kode_wilayah,6)=:kodebaru: AND soft_delete=0 and s.aktif=1 
        " . $wherestatus . " 
        ORDER BY s.nama";

        $query = $this->db->query($sql, [
            'kodebaru'  => $kodebaru
        ]);

        return $query;
    }

    /////////////////////////// PROGRAM PAUD ///////////

    public function getTotalPKBMPaud($status, $kode, $level)
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

        if ($status == "all")
            $sql = "SELECT (" . $this->paudns . ") as paud,
            nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
            WHERE mst_kode_wilayah=:kode:";
        else if ($status == "s1")
            $sql = "SELECT (" . $this->paudn . ") as paud,
            nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
            WHERE mst_kode_wilayah=:kode:";
        else if ($status == "s2")
            $sql = "SELECT (" . $this->pauds . ") as paud,
            nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah 
            WHERE mst_kode_wilayah=:kode:";

        $query = $this->db->query($sql, [
            'kode' => $kode,
        ]);

        return $query;
    }

    public function getDaftarPKBMPaud($status, $kodebaru)
    {
        if ($status == "all")
            $wherestatus = "";
        else if ($status == "s1")
            $wherestatus = " AND status_sekolah = 1 ";
        else if ($status == "s2")
            $wherestatus = " AND status_sekolah = 2 ";

        $sql = "SELECT npsn, s.nama, alamat_jalan, w.nama as desa_kelurahan, 
        s.kode_wilayah, paud, 
        CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
        FROM Arsip.dbo.sekolah s 
        JOIN Referensi.ref.mst_wilayah w ON s.kode_wilayah=w.kode_wilayah 
        JOIN Dataprocess.dbo.sekolah_jenis_layanan d on d.sekolah_id=s.sekolah_id 
        WHERE (" . $this->paudall . ") AND d.paud = 1 
        AND LEFT(s.kode_wilayah,6)=:kodebaru: AND soft_delete=0 and s.aktif=1 
        " . $wherestatus . " 
        ORDER BY s.nama";

        $query = $this->db->query($sql, [
            'kodebaru'  => $kodebaru
        ]);

        return $query;
    }


    //////////////// PROGRAM SLB /////////////////////////
    public function getTotalSLB($status, $kode, $level)
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

        if ($status == "all")
            $sql = "SELECT (" . $this->slbns . ") as total,
            (" . $this->tklbns . ") as tklb,
            (" . $this->sdlbns . ") as sdlb,
            (" . $this->smplbns . ") as smplb,
            (" . $this->smlbns . ") as smlb,
            nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
            WHERE mst_kode_wilayah=:kode:";
        else if ($status == "s1")
            $sql = "SELECT (" . $this->slbn . ") as total,
            (" . $this->tklbn . ") as tklb,
            (" . $this->sdlbn . ") as sdlb,
            (" . $this->smplbn . ") as smplb,
            (" . $this->smlbn . ") as smlb,
            nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
            WHERE mst_kode_wilayah=:kode:";
        else if ($status == "s2")
            $sql = "SELECT (" . $this->slbs . ") as total,
            (" . $this->tklbs . ") as tklb,
            (" . $this->sdlbs . ") as sdlb,
            (" . $this->smplbs . ") as smplb,
            (" . $this->smlbs . ") as smlb,
            nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah 
            WHERE mst_kode_wilayah=:kode:";

        $query = $this->db->query($sql, [
            'kode' => $kode,
        ]);

        return $query;
    }

    public function getDaftarSLB($status, $kodebaru)
    {
        if ($status == "all")
            $wherestatus = "";
        else if ($status == "s1")
            $wherestatus = " AND status_sekolah = 1 ";
        else if ($status == "s2")
            $wherestatus = " AND status_sekolah = 2 ";

        $sql = "SELECT npsn, s.nama, alamat_jalan, w.nama as desa_kelurahan, 
        s.kode_wilayah, tklb, sdlb, smplb,smlb, 
        CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
        FROM Arsip.dbo.sekolah s 
        JOIN Referensi.ref.mst_wilayah w ON s.kode_wilayah=w.kode_wilayah 
        JOIN Dataprocess.dbo.sekolah_jenis_layanan d on d.sekolah_id=s.sekolah_id 
        WHERE (" . $this->slball . ") 
        AND LEFT(s.kode_wilayah,6)=:kodebaru: AND soft_delete=0 and s.aktif=1 
        " . $wherestatus . " 
        ORDER BY s.nama";

        $query = $this->db->query($sql, [
            'kodebaru'  => $kodebaru
        ]);

        return $query;
    }
    //////////////////////////////////////////////////////

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
