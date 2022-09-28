<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModelPaud2 extends Model
{
    protected $paudall = "s.bentuk_pendidikan_id=1 OR 
    s.bentuk_pendidikan_id=2 OR 
    s.bentuk_pendidikan_id=3 OR 
    s.bentuk_pendidikan_id=4 OR 
    s.bentuk_pendidikan_id=34 OR 
    s.bentuk_pendidikan_id=41 OR 
    s.bentuk_pendidikan_id=43 OR 
    s.bentuk_pendidikan_id=52 OR 
    s.bentuk_pendidikan_id=57 OR 
    s.bentuk_pendidikan_id=61";
    
    protected $paudjf = "s.bentuk_pendidikan_id=1 OR 
    s.bentuk_pendidikan_id=34 OR 
    s.bentuk_pendidikan_id=41 OR 
    s.bentuk_pendidikan_id=52 OR 
    s.bentuk_pendidikan_id=57 OR 
    s.bentuk_pendidikan_id=61";

    protected $paudjn = "s.bentuk_pendidikan_id=2 OR 
    s.bentuk_pendidikan_id=3 OR 
    s.bentuk_pendidikan_id=4 OR 
    s.bentuk_pendidikan_id=43";

    protected $tksederajat = "s.bentuk_pendidikan_id=1 OR 
    s.bentuk_pendidikan_id=34 OR 
    s.bentuk_pendidikan_id=41 OR 
    s.bentuk_pendidikan_id=52 OR 
    s.bentuk_pendidikan_id=57 OR 
    s.bentuk_pendidikan_id=61";

    protected $kbsederajat = "s.bentuk_pendidikan_id=2 OR 
    s.bentuk_pendidikan_id=43";

    protected $paudallns = "bp1_n + bp1_s + 
    bp2_n + bp2_s + 
    bp3_n + bp3_s + 
    bp4_n + bp4_s + 
    bp34_n + bp34_s + 
    bp41_n + bp41_s + 
    bp43_n + bp43_s + 
    bp52_n + bp52_s + 
    bp57_n + bp57_s + 
    bp61_n + bp61_s";

    protected $paudalln = "bp1_n +
    bp2_n + 
    bp3_n + 
    bp4_n +  
    bp34_n +  
    bp41_n +  
    bp43_n +  
    bp52_n + 
    bp57_n +  
    bp61_n";

    protected $paudalls = "bp1_s +
    bp2_s + 
    bp3_s + 
    bp4_s + 
    bp34_s + 
    bp41_s + 
    bp43_s + 
    bp52_s + 
    bp57_s + 
    bp61_s";
    
    protected $paudjfns = "bp1_n + bp1_s + 
    bp34_n + bp34_s + 
    bp41_n + bp41_s + 
    bp52_n + bp52_s + 
    bp57_n + bp57_s + 
    bp61_n + bp61_s";
    
    protected $paudjfn = "bp1_n + 
    bp34_n + 
    bp41_n + 
    bp52_n + 
    bp57_n + 
    bp61_n";
    
    protected $paudjfs = "bp1_s + 
    bp34_s + 
    bp41_s + 
    bp52_s + 
    bp57_s + 
    bp61_s";
    
    protected $paudjnns = "bp2_n + bp2_s + 
    bp3_n + bp3_s + 
    bp4_n + bp4_s + 
    bp43_n + bp43_s";
    
    protected $paudjnn = "bp2_n + 
    bp3_n + 
    bp4_n + 
    bp43_n";
    
    protected $paudjns = "bp2_s + 
    bp3_s + 
    bp4_s + 
    bp43_s";
    
    protected $tksederajatns = "bp1_n + bp1_s + 
    bp34_n + bp34_s + 
    bp41_n + bp41_s + 
    bp52_n + bp52_s + 
    bp57_n + bp57_s + 
    bp61_n + bp61_s";
    
    protected $tksederajatn = "bp1_n + 
    bp34_n + 
    bp41_n + 
    bp52_n + 
    bp57_n + 
    bp61_n";
    
    protected $tksederajats = "bp1_s + 
    bp34_s + 
    bp41_s + 
    bp52_s + 
    bp57_s + 
    bp61_s";
    
    protected $kbsederajatns = "bp2_n + bp2_s + bp43_n + bp43_s";
    protected $kbsederajatn = "bp2_n + bp43_n";
    protected $kbsederajats = "bp2_s + bp43_s";

    protected $tkns = "bp1_n + bp1_s";
    protected $tkn = "bp1_n";
    protected $tks = "bp1_s";

    protected $kbns = "bp2_n + bp2_s";
    protected $kbn = "bp2_n";
    protected $kbs = "bp2_s";

    protected $tpans = "bp3_n + bp3_s";
    protected $tpan = "bp3_n";
    protected $tpas = "bp3_s";

    protected $spsns = "bp4_n + bp4_s";
    protected $spsn = "bp4_n";
    protected $spss = "bp4_s";

    protected $rans = "bp34_n + bp34_s";
    protected $ran = "bp34_n";
    protected $ras = "bp34_s";
    
    protected $seminarins = "bp41_n + bp41_s";
    protected $seminarin = "bp41_n";
    protected $seminaris = "bp41_s";
    
    protected $spkkbns = "bp43_n + bp43_s";
    protected $spkkbn = "bp43_n";
    protected $spkkbs = "bp43_s";
    
    protected $spktkns = "bp52_n + bp52_s";
    protected $spktkn = "bp52_n";
    protected $spktks = "bp52_s";
    
    protected $pratamans = "bp57_n + bp57_s";
    protected $prataman = "bp57_n";
    protected $pratamas = "bp57_s";
    
    protected $navans = "bp61_n + bp61_s";
    protected $navan = "bp61_n";
    protected $navas = "bp61_s";

    public function getTotalPaud($status,$kode,$level,$jalur,$bentuk) {

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
                $sql = "SELECT (".$this->paudallns.") as total,
                    (".$this->tksederajatns.") as tksederajat,
                    (".$this->kbsederajatns.") as kbsederajat,
                    (".$this->tpans.") as tpa,
                    (".$this->spsns.") as sps,
                    nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                    WHERE mst_kode_wilayah=:kode:";
                else if ($status=="s1")
                $sql = "SELECT (".$this->paudalln.") as total,
                    (".$this->tksederajatn.") as tksederajat,
                    (".$this->kbsederajatn.") as kbsederajat,
                    (".$this->tpan.") as tpa,
                    (".$this->spsn.") as sps,
                    nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah s 
                    WHERE mst_kode_wilayah=:kode:";
                else if ($status=="s2")
                $sql = "SELECT (".$this->paudalls.") as total,
                    (".$this->tksederajats.") as tksederajat,
                    (".$this->kbsederajats.") as kbsederajat,
                    (".$this->tpas.") as tpa,
                    (".$this->spss.") as sps,
                    nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah 
                    WHERE mst_kode_wilayah=:kode:";

            }
            else if ($jalur=="jf")
            {
                if ($status=="all")
                $sql = "SELECT (".$this->paudjfns.") as total,
                    (".$this->tkns.") as tk,
                    (".$this->rans.") as ra,
                    (".$this->seminarins.") as seminari,
                    (".$this->spktkns.") as spktk,
                    (".$this->pratamans.") as pratama,
                    (".$this->navans.") as nava,
                    nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah
                    WHERE mst_kode_wilayah=:kode:";
                else if ($status=="s1")
                $sql = "SELECT (".$this->paudjfn.") as total,
                    (".$this->tkn.") as tk,
                    (".$this->ran.") as ra,
                    (".$this->seminarin.") as seminari,
                    (".$this->spktkn.") as spktk,
                    (".$this->prataman.") as pratama,
                    (".$this->navan.") as nava,
                    nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah
                    WHERE mst_kode_wilayah=:kode:";
                else if ($status=="s2")
                $sql = "SELECT (".$this->paudjfs.") as total,
                    (".$this->tks.") as tk,
                    (".$this->ras.") as ra,
                    (".$this->seminaris.") as seminari,
                    (".$this->spktks.") as spktk,
                    (".$this->pratamas.") as pratama,
                    (".$this->navas.") as nava,
                    nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah
                    WHERE mst_kode_wilayah=:kode:";
                
            }
            else if ($jalur=="jn")
            {
                if ($status=="all")
                $sql = "SELECT (".$this->paudjnns.") as total,
                    (".$this->kbns.") as kb,
                    (".$this->tpans.") as tpa,
                    (".$this->spsns.") as sps,
                    (".$this->spkkbns.") as spkkb,
                    nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah
                    WHERE mst_kode_wilayah=:kode:";
                else if ($status=="s1")
                $sql = "SELECT (".$this->paudjnn.") as total,
                    (".$this->kbn.") as kb,
                    (".$this->tpan.") as tpa,
                    (".$this->spsn.") as sps,
                    (".$this->spkkbn.") as spkkb,
                    nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah
                    WHERE mst_kode_wilayah=:kode:";
                else if ($status=="s2")
                $sql = "SELECT (".$this->paudjns.") as total,
                    (".$this->kbs.") as kb,
                    (".$this->tpas.") as tpa,
                    (".$this->spss.") as sps,
                    (".$this->spkkbs.") as spkkb,
                    nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah
                    WHERE mst_kode_wilayah=:kode:";
            }

            $query = $this->db->query($sql, [
                'kode' => $kode,
            ]);
        }
        else
        {
            

            if($status=="all")
            {
                $sql   = "SELECT (bp".$bentuk."_n + bp".$bentuk."_s) as total,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah
                WHERE mst_kode_wilayah=:kode:";
            }
            else if($status=="s1")
            {
                $sql   = "SELECT bp".$bentuk."_n as total,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah
                WHERE mst_kode_wilayah=:kode:";
            }
            else if($status=="s2")
            { 
                $sql   = "SELECT bp".$bentuk."_s as total,
                nama, kode_wilayah FROM Dataprocess.rpt.rekap_referensi_sekolah
                WHERE mst_kode_wilayah=:kode:";
            }
            
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

    public function getDaftarBentukPaudTK($jalur)
    {
       
        if ($jalur=="all")
            $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s 
            WHERE (".$this->paudall.") 
            ORDER BY [bentuk_pendidikan_id]"; 
        else if ($jalur=="jf")
            $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s 
            WHERE (".$this->paudjf.") 
            ORDER BY [bentuk_pendidikan_id]"; 
        else if ($jalur=="jn")
            $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s 
            WHERE (".$this->paudjn.") 
            ORDER BY [bentuk_pendidikan_id]";

        // $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s 
        // WHERE (".$this->paudall.") ".$wherejalur."
        // ORDER BY [bentuk_pendidikan_id]";

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

    public function getDaftarSekolahPaudTK($status,$kodebaru,$jalur,$bentuk)
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
                    WHERE (".$this->paudall.") 
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
                    WHERE (".$this->tksederajatjf.") 
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
                    WHERE (".$this->paudjn.") 
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
                WHERE LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
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

    public function getbentukpaudsemua()
    {
        return $this->paudall;
    }

    public function getbentukpaudformal()
    {
        return $this->paudjf;
    }

    public function getbentukpaudnonformal()
    {
        return $this->paudjn;
    }

}
