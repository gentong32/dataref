<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModelProgram extends Model
{
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

    public function getTotalSetara($status,$kode,$level) {

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
        
        if ($status=="all")
        $sql = "SELECT (".$this->setarans.") as total,
            (".$this->paketans.") as paketa,
            (".$this->paketbns.") as paketb,
            (".$this->paketcns.") as paketc,
            nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
            WHERE mst_kode_wilayah=:kode:";
        else if ($status=="s1")
        $sql = "SELECT (".$this->setaran.") as total,
            (".$this->paketan.") as paketa,
            (".$this->paketbn.") as paketb,
            (".$this->paketcn.") as paketc,
            nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
            WHERE mst_kode_wilayah=:kode:";
        else if ($status=="s2")
        $sql = "SELECT (".$this->setaras.") as total,
            (".$this->paketas.") as paketa,
            (".$this->paketbs.") as paketb,
            (".$this->paketcs.") as paketc,
            nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah 
            WHERE mst_kode_wilayah=:kode:";
           
        $query = $this->db->query($sql, [
            'kode' => $kode,
        ]);
        
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

    public function getNamaPilihan($kode)
    {
        $sql = 'SELECT nama FROM Referensi.ref.mst_wilayah w  
                WHERE kode_wilayah=:kodewilayah:';
        $query = $this->db->query($sql, [
            'kodewilayah'  => $kode
        ]);

        return $query;
    }

    public function getDaftarSetara($status,$kodebaru)
    {
        if ($status=="all")
            $wherestatus = "";
        else if ($status=="s1")
            $wherestatus = " AND status_sekolah = 1 ";
        else if ($status=="s2")
            $wherestatus = " AND status_sekolah = 2 ";

        $sql = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
        kode_wilayah, paket_a, paket_b, paket_c, 
        CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
        FROM Arsip.dbo.sekolah s 
        JOIN Dataprocess.dbo.sekolah_jenis_layanan d on d.sekolah_id=s.sekolah_id 
        WHERE (".$this->kesetaraanall.") 
        AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
        ".$wherestatus." 
        ORDER BY nama";

        $query = $this->db->query($sql, [
            'kodebaru'  => $kodebaru
        ]);

        return $query;
    }

}
