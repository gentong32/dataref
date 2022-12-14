<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModelPaud extends Model
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

    protected $tk = "s.bentuk_pendidikan_id=1";
    protected $kb = "s.bentuk_pendidikan_id=2";
    protected $tpa = "s.bentuk_pendidikan_id=3";
    protected $sps = "s.bentuk_pendidikan_id=4";
    protected $ra = "s.bentuk_pendidikan_id=34";
    protected $seminari = "s.bentuk_pendidikan_id=41";
    protected $spkkb = "s.bentuk_pendidikan_id=43";
    protected $spktk = "s.bentuk_pendidikan_id=52";
    protected $pratama = "s.bentuk_pendidikan_id=57";
    protected $nava = "s.bentuk_pendidikan_id=61";

    // protected $paudall2 = "s.bp1 + 
    // s.bp2 + 
    // s.bp3 + 
    // s.bp4  + 
    // s.bp34  + 
    // s.bp41  + 
    // s.bp43  + 
    // s.bp52 + 
    // s.bp57  + 
    // s.bp61";
    
    // protected $paudjf2 = "s.bp1 + 
    // s.bp34 + 
    // s.bp41 + 
    // s.bp52 + 
    // s.bp57 + 
    // s.bp61";
    
    // protected $paudjn2 = "s.bp2 + 
    // s.bp3 + 
    // s.bp4 + 
    // s.bp43";
    
    // protected $tksederajat2 = "s.bp1 + 
    // s.bp34 + 
    // s.bp41 + 
    // s.bp52 + 
    // s.bp57 + 
    // s.bp61";
    
    // protected $kbsederajat2 = "s.bp2 + s.bp43";

    // protected $tk2 = "s.bp1";
    // protected $kb2 = "s.bp2";
    // protected $tpa2 = "s.bp3";
    // protected $sps2 = "s.bp4";
    // protected $ra2 = "s.bp34";
    // protected $seminari2 = "s.bp41";
    // protected $spkkb2 = "s.bp43";
    // protected $spktk2 = "s.bp52";
    // protected $pratama2 = "s.bp57";
    // protected $nava2 = "s.bp61";

    public function getTotalPaud($status,$kode,$level,$jalur,$bentuk) {

        $nkar = $level * 2;
        $nkar2 = $nkar + 2;
        $levelbaru = $level+1;
        $kodebaru = substr($kode,0,$nkar);

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
                $sql = "SELECT 
                    SUM(CASE WHEN (".$this->paudall.") THEN 1 ELSE 0 END) total,
                    SUM(CASE WHEN (".$this->tksederajat.") THEN 1 ELSE 0 END) tksederajat,
                    SUM(CASE WHEN (".$this->kbsederajat.") THEN 1 ELSE 0 END) kbsederajat,
                    SUM(CASE WHEN (".$this->tpa.") THEN 1 ELSE 0 END) tpa,
                    SUM(CASE WHEN (".$this->sps.") THEN 1 ELSE 0 END) sps,
                    w.nama, w.kode_wilayah FROM Arsip.dbo.sekolah s 
                    JOIN Referensi.ref.mst_wilayah w ON LEFT(w.kode_wilayah,:nkar2:)=LEFT(s.kode_wilayah,:nkar2:) 
                    WHERE id_level_wilayah=:levelbaru: AND LEFT(w.kode_wilayah,:nkar:)=:kodebaru: 
                    ".$wherestatus." 
                    GROUP BY w.nama, w.kode_wilayah, w.mst_kode_wilayah 
                    ORDER BY kode_wilayah";
            }
            else if ($jalur=="jf")
            {
                $sql = "SELECT 
                    SUM(CASE WHEN (".$this->paudjf.") THEN 1 ELSE 0 END) total,
                    SUM(CASE WHEN (".$this->tk.") THEN 1 ELSE 0 END) tk,
                    SUM(CASE WHEN (".$this->ra.") THEN 1 ELSE 0 END) ra,
                    SUM(CASE WHEN (".$this->seminari.") THEN 1 ELSE 0 END) seminari,
                    SUM(CASE WHEN (".$this->spktk.") THEN 1 ELSE 0 END) spktk,
                    SUM(CASE WHEN (".$this->pratama.") THEN 1 ELSE 0 END) pratama,
                    SUM(CASE WHEN (".$this->nava.") THEN 1 ELSE 0 END) nava,
                    w.nama, w.kode_wilayah FROM Arsip.dbo.sekolah s 
                    JOIN Referensi.ref.mst_wilayah w ON LEFT(w.kode_wilayah,:nkar2:)=LEFT(s.kode_wilayah,:nkar2:) 
                    WHERE id_level_wilayah=:levelbaru: AND soft_delete=0 AND LEFT(w.kode_wilayah,:nkar:)=:kodebaru: 
                    ".$wherestatus." 
                    GROUP BY w.nama, w.kode_wilayah, w.mst_kode_wilayah 
                    ORDER BY kode_wilayah";
            }
            else if ($jalur=="jn")
            {
                $sql = "SELECT 
                    SUM(CASE WHEN (".$this->paudjn.") THEN 1 ELSE 0 END) total,
                    SUM(CASE WHEN (".$this->kb.") THEN 1 ELSE 0 END) kb,
                    SUM(CASE WHEN (".$this->tpa.") THEN 1 ELSE 0 END) tpa,
                    SUM(CASE WHEN (".$this->sps.") THEN 1 ELSE 0 END) sps,
                    SUM(CASE WHEN (".$this->spkkb.") THEN 1 ELSE 0 END) spkkb,
                    w.nama, w.kode_wilayah FROM Arsip.dbo.sekolah s 
                    JOIN Referensi.ref.mst_wilayah w ON LEFT(w.kode_wilayah,:nkar2:)=LEFT(s.kode_wilayah,:nkar2:) 
                    WHERE id_level_wilayah=:levelbaru: AND soft_delete=0 AND LEFT(w.kode_wilayah,:nkar:)=:kodebaru: 
                    ".$wherestatus." 
                    GROUP BY w.nama, w.kode_wilayah, w.mst_kode_wilayah 
                    ORDER BY kode_wilayah";
            }

            $query = $this->db->query($sql, [
                'nkar2' => $nkar2,
                'nkar'  => $nkar,
                'levelbaru'  => $levelbaru,
                'kodebaru'  => $kodebaru
            ]);
        }
        else
        {
            $sql   = "SELECT SUM(CASE WHEN 
                (s.bentuk_pendidikan_id=:bentuknya:) 
                THEN 1 ELSE 0 END) total,
                w.nama, w.kode_wilayah FROM Arsip.dbo.sekolah s 
                JOIN Referensi.ref.mst_wilayah w ON LEFT(w.kode_wilayah,:nkar2:)=LEFT(s.kode_wilayah,:nkar2:) 
                    WHERE id_level_wilayah=:levelbaru: AND soft_delete=0 AND LEFT(w.kode_wilayah,:nkar:)=:kodebaru: 
                    ".$wherestatus." 
                    GROUP BY w.nama, w.kode_wilayah, w.mst_kode_wilayah 
                    ORDER BY kode_wilayah";
            
            $query = $this->db->query($sql, [
                'nkar2' => $nkar2,
                'nkar'  => $nkar,
                'levelbaru'  => $levelbaru,
                'kodebaru'  => $kodebaru,
                'bentuknya' => $bentuk
            ]);
        }

        return $query;
    }

    public function getTotalPaud2($status,$kode,$level,$jalur,$bentuk) {
        
        $nkar = $level * 2;
        $nkar2 = $nkar + 2;
        $levelbaru = $level+1;
        $kodebaru = substr($kode,0,$nkar);
        $levelbaru = intval($levelbaru);

        if ($status=="all")
            $wherestatus = "";
        else if ($status=="s1")
            $wherestatus = " AND status_sekolah_id = 1 ";
        else if ($status=="s2")
            $wherestatus = " AND status_sekolah_id = 2 ";


        if ($bentuk=="all")
        {
            if ($jalur=="all")
            {
                $sql = "SELECT nama, kode_wilayah, 
                    sum (".$this->paudall2.") as total,
                    sum (".$this->tksederajat2.") as tksederajat,
                    sum (".$this->kbsederajat2.") as kbsederajat,
                    sum (".$this->tpa2.") as tpa,
                    sum (".$this->sps2.") as sps 
                    FROM Dataprocess.dev.satuan_pendidikan_lv".$levelbaru." s 
                    WHERE LEFT(kode_wilayah,:nkar:)=:kodebaru:".$wherestatus." 
                    GROUP BY nama, kode_wilayah 
                    ORDER BY kode_wilayah";
            }
            else if ($jalur=="jf")
            {
                $sql = "SELECT nama, kode_wilayah, 
                    sum (".$this->paudjf2.") as total,
                    sum (".$this->tk2.") as tk,
                    sum (".$this->ra2.") as ra,
                    sum (".$this->seminari2.") as seminari,
                    sum (".$this->spktk2.") as spktk,
                    sum (".$this->pratama2.") as pratama,
                    sum (".$this->nava2.") as nava
                    FROM Dataprocess.dev.satuan_pendidikan_lv".$levelbaru." s 
                    ".$wherestatus." 
                    GROUP BY nama,kode_wilayah 
                    ORDER BY kode_wilayah";
            }
            else if ($jalur=="jn")
            {
                $sql = "SELECT nama, kode_wilayah, 
                    sum (".$this->paudjn2.") as total,
                    sum (".$this->kb2.") as kb,
                    sum (".$this->tpa2.") as tpa,
                    sum (".$this->sps2.") as sps,
                    sum (".$this->spkkb2.") as spkkb,
                    FROM Dataprocess.dev.satuan_pendidikan_lv".$levelbaru." s 
                    ".$wherestatus." 
                    GROUP BY nama,kode_wilayah 
                    ORDER BY kode_wilayah";
            }
            
            $query = $this->db->query($sql,[
                'nkar'  => $nkar,
                'kodebaru'  => $kodebaru
            ]);
        }
        else
        {
            $bentuk = intval($bentuk);

            $sql   = "SELECT sum(bp".$bentuk.") as total,
            nama, kode_wilayah FROM Dataprocess.dev.satuan_pendidikan_lv".$levelbaru." s 
            ".$wherestatus." 
            GROUP BY nama,kode_wilayah 
            ORDER BY kode_wilayah";
            
            $query = $this->db->query($sql);
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
