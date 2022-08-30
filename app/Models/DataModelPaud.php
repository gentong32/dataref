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

    protected $paudjf = "s.bentuk_pendidikan_id=1";

    protected $paudjn = "s.bentuk_pendidikan_id=2 OR 
    s.bentuk_pendidikan_id=3 OR 
    s.bentuk_pendidikan_id=4 OR 
    s.bentuk_pendidikan_id=34 OR 
    s.bentuk_pendidikan_id=41 OR 
    s.bentuk_pendidikan_id=43 OR 
    s.bentuk_pendidikan_id=52 OR 
    s.bentuk_pendidikan_id=57 OR 
    s.bentuk_pendidikan_id=61";

    protected $tksederajatall = "s.bentuk_pendidikan_id=1 OR 
    s.bentuk_pendidikan_id=34 OR 
    s.bentuk_pendidikan_id=41 OR 
    s.bentuk_pendidikan_id=52 OR 
    s.bentuk_pendidikan_id=57 OR 
    s.bentuk_pendidikan_id=61";

    protected $tksederajatjf = "s.bentuk_pendidikan_id=1";

    protected $tksederajatjn = "s.bentuk_pendidikan_id=34 OR 
    s.bentuk_pendidikan_id=41 OR 
    s.bentuk_pendidikan_id=52 OR 
    s.bentuk_pendidikan_id=57 OR 
    s.bentuk_pendidikan_id=61";

    protected $kbsederajat = "s.bentuk_pendidikan_id=2 OR 
    s.bentuk_pendidikan_id=43";

    protected $tpa = "s.bentuk_pendidikan_id=3";
    protected $sps = "s.bentuk_pendidikan_id=4";

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
                    SUM(CASE WHEN (".$this->tksederajatall.") THEN 1 ELSE 0 END) tksederajatall,
                    SUM(CASE WHEN (".$this->kbsederajat.") THEN 1 ELSE 0 END) kbsederajat,
                    SUM(CASE WHEN (".$this->tpa.") THEN 1 ELSE 0 END) tpa,
                    SUM(CASE WHEN (".$this->sps.") THEN 1 ELSE 0 END) sps,
                    w.nama, w.kode_wilayah FROM Arsip.dbo.sekolah s 
                    JOIN Referensi.ref.mst_wilayah w ON LEFT(w.kode_wilayah,:nkar2:)=LEFT(s.kode_wilayah,:nkar2:) 
                    WHERE id_level_wilayah=:levelbaru: AND soft_delete=0 AND LEFT(w.kode_wilayah,:nkar:)=:kodebaru: 
                    ".$wherestatus." 
                    GROUP BY w.nama, w.kode_wilayah, w.mst_kode_wilayah 
                    ORDER BY kode_wilayah";
            }
            else if ($jalur=="jf")
            {
                $sql = "SELECT 
                    SUM(CASE WHEN (".$this->tksederajatjf.") THEN 1 ELSE 0 END) total,
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
                    SUM(CASE WHEN (".$this->tksederajatjn.") THEN 1 ELSE 0 END) tksederajatjn,
                    SUM(CASE WHEN (".$this->kbsederajat.") THEN 1 ELSE 0 END) kbsederajat,
                    SUM(CASE WHEN (".$this->tpa.") THEN 1 ELSE 0 END) tpa,
                    SUM(CASE WHEN (".$this->sps.") THEN 1 ELSE 0 END) sps,
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
