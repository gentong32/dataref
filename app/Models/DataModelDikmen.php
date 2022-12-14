<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModelDikmen extends Model
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
    
    protected $slb = "s.bentuk_pendidikan_id=7 OR 
    s.bentuk_pendidikan_id=8 OR 
    s.bentuk_pendidikan_id=14 OR 
    s.bentuk_pendidikan_id=29 OR 
    s.bentuk_pendidikan_id=42";

    protected $smasederajat = "s.bentuk_pendidikan_id=13 OR  
    s.bentuk_pendidikan_id=16 OR 
    s.bentuk_pendidikan_id=37 OR 
    s.bentuk_pendidikan_id=39 OR 
    s.bentuk_pendidikan_id=44 OR 
    s.bentuk_pendidikan_id=55 OR 
    s.bentuk_pendidikan_id=60 OR 
    s.bentuk_pendidikan_id=64";

    protected $smksederajat = "s.bentuk_pendidikan_id=15 OR   
    s.bentuk_pendidikan_id=17 OR 
    s.bentuk_pendidikan_id=65";

    protected $dikmennonformal = "s.bentuk_pendidikan_id=99999"; 

    public function getTotalDikmen($status,$kode,$level,$jalur,$bentuk) {

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
                    SUM(CASE WHEN (".$this->dikmenall.") THEN 1 ELSE 0 END) total,
                    SUM(CASE WHEN (".$this->smasederajat.") THEN 1 ELSE 0 END) smasederajat,
                    SUM(CASE WHEN (".$this->smksederajat.") THEN 1 ELSE 0 END) smksederajat,
                    SUM(CASE WHEN (".$this->slb.") THEN 1 ELSE 0 END) slb,
                    w.nama, w.kode_wilayah FROM ods2.bid2.sekolah s 
                    JOIN Referensi.ref.mst_wilayah w ON LEFT(w.kode_wilayah,:nkar2:)=LEFT(s.kode_wilayah,:nkar2:) 
                    WHERE id_level_wilayah=:levelbaru: AND soft_delete=0 AND LEFT(w.kode_wilayah,:nkar:)=:kodebaru: 
                    ".$wherestatus." 
                    GROUP BY w.nama, w.kode_wilayah, w.mst_kode_wilayah 
                    ORDER BY kode_wilayah";
            }
            else if ($jalur=="jf")
            {
                $sql = "SELECT 
                    SUM(CASE WHEN (".$this->dikmenall.") THEN 1 ELSE 0 END) total,
                    SUM(CASE WHEN (".$this->smasederajat.") THEN 1 ELSE 0 END) smasederajat,
                    SUM(CASE WHEN (".$this->smksederajat.") THEN 1 ELSE 0 END) smksederajat,
                    SUM(CASE WHEN (".$this->slb.") THEN 1 ELSE 0 END) slb,
                    w.nama, w.kode_wilayah FROM ods2.bid2.sekolah s 
                    JOIN Referensi.ref.mst_wilayah w ON LEFT(w.kode_wilayah,:nkar2:)=LEFT(s.kode_wilayah,:nkar2:) 
                    WHERE id_level_wilayah=:levelbaru: AND soft_delete=0 AND LEFT(w.kode_wilayah,:nkar:)=:kodebaru: 
                    ".$wherestatus." 
                    GROUP BY w.nama, w.kode_wilayah, w.mst_kode_wilayah 
                    ORDER BY kode_wilayah";
            }
            else if ($jalur=="jn")
            {
                $sql = "SELECT 
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=99999) THEN 1 ELSE 0 END) total,
                    w.nama, w.kode_wilayah FROM ods2.bid2.sekolah s 
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
                w.nama, w.kode_wilayah FROM ods2.bid2.sekolah s 
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
        $this->db = \Config\Database::connect("dbnpsn");
        
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
                    FROM ods2.bid2.sekolah s 
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
                    FROM ods2.bid2.sekolah s 
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
                    FROM ods2.bid2.sekolah s 
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
                FROM ods2.bid2.sekolah s 
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
