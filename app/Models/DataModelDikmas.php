<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModelDikmas extends Model
{
    // protected $dikmassemua = "s.bentuk_pendidikan_id=24 OR 
    // s.bentuk_pendidikan_id=25 OR 
    // s.bentuk_pendidikan_id=26 OR 
    // s.bentuk_pendidikan_id=27 OR 
    // s.bentuk_pendidikan_id=28 OR 
    // s.bentuk_pendidikan_id=40 OR 
    // s.bentuk_pendidikan_id=56 OR 
    // s.bentuk_pendidikan_id=67 OR 
    // s.bentuk_pendidikan_id=68 OR 
    // s.bentuk_pendidikan_id=69 OR 
    // s.bentuk_pendidikan_id=70 OR 
    // s.bentuk_pendidikan_id=71 OR
    // s.bentuk_pendidikan_id=72";

    protected $dikmassemua = "s.bentuk_pendidikan_id=24 OR 
    s.bentuk_pendidikan_id=27 OR 
    s.bentuk_pendidikan_id=56";

    protected $kursus = "s.bentuk_pendidikan_id=24";
    protected $ponpes = "s.bentuk_pendidikan_id=56";
    protected $pkbm = "s.bentuk_pendidikan_id=27";

    
    protected $dikmaslainsemua = "s.bentuk_pendidikan_id=25 OR 
    s.bentuk_pendidikan_id=26 OR 
    s.bentuk_pendidikan_id=28 OR 
    s.bentuk_pendidikan_id=40 OR 
    s.bentuk_pendidikan_id=67 OR 
    s.bentuk_pendidikan_id=68 OR 
    s.bentuk_pendidikan_id=69 OR
    s.bentuk_pendidikan_id=70 OR 
    s.bentuk_pendidikan_id=71 OR
    s.bentuk_pendidikan_id=72";

    // protected $dikmasformal = "s.bentuk_pendidikan_id=67 OR 
    // s.bentuk_pendidikan_id=68 OR 
    // s.bentuk_pendidikan_id=69 OR 
    // s.bentuk_pendidikan_id=70 OR 
    // s.bentuk_pendidikan_id=71 OR
    // s.bentuk_pendidikan_id=72";

    protected $dikmasformal = "s.bentuk_pendidikan_id=67 OR 
    s.bentuk_pendidikan_id=68 OR 
    s.bentuk_pendidikan_id=69";

    protected $pdfula = "s.bentuk_pendidikan_id=67";
    protected $pdfwustha = "s.bentuk_pendidikan_id=68";
    protected $pdfulya = "s.bentuk_pendidikan_id=69";

    protected $dikmasformallain = "s.bentuk_pendidikan_id=70 OR 
    s.bentuk_pendidikan_id=71 OR 
    s.bentuk_pendidikan_id=72"; 

    // protected $dikmasnonformal = "s.bentuk_pendidikan_id=24 OR 
    // s.bentuk_pendidikan_id=25 OR 
    // s.bentuk_pendidikan_id=26 OR 
    // s.bentuk_pendidikan_id=27 OR 
    // s.bentuk_pendidikan_id=28 OR 
    // s.bentuk_pendidikan_id=40 OR 
    // s.bentuk_pendidikan_id=56";

    protected $dikmasnonformal = "s.bentuk_pendidikan_id=24 OR 
    s.bentuk_pendidikan_id=27 OR 
    s.bentuk_pendidikan_id=56";

    protected $dikmasnonformallain = "s.bentuk_pendidikan_id=25 OR 
    s.bentuk_pendidikan_id=26 OR 
    s.bentuk_pendidikan_id=28 OR 
    s.bentuk_pendidikan_id=40";

    public function getTotalDikmas($status,$kode,$level,$jalur,$bentuk) {

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
                    SUM(CASE WHEN (".$this->dikmassemua.") THEN 1 ELSE 0 END) total,
                    SUM(CASE WHEN (".$this->kursus.") THEN 1 ELSE 0 END) kursus,
                    SUM(CASE WHEN (".$this->ponpes.") THEN 1 ELSE 0 END) ponpes,
                    SUM(CASE WHEN (".$this->pkbm.") THEN 1 ELSE 0 END) pkbm,
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
                    SUM(CASE WHEN (".$this->dikmasformal.") THEN 1 ELSE 0 END) total,
                    SUM(CASE WHEN (".$this->pdfula.") THEN 1 ELSE 0 END) pdfula,
                    SUM(CASE WHEN (".$this->pdfwustha.") THEN 1 ELSE 0 END) pdfwustha,
                    SUM(CASE WHEN (".$this->pdfulya.") THEN 1 ELSE 0 END) pdfulya,
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
                    SUM(CASE WHEN (".$this->dikmasnonformal.") THEN 1 ELSE 0 END) total,
                    SUM(CASE WHEN (".$this->kursus.") THEN 1 ELSE 0 END) kursus,
                    SUM(CASE WHEN (".$this->ponpes.") THEN 1 ELSE 0 END) ponpes,
                    SUM(CASE WHEN (".$this->pkbm.") THEN 1 ELSE 0 END) pkbm,
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

    public function getDaftarBentukDikmas($jalur)
    {
        if ($jalur=="all")
            $wherejalur = "";
        else if ($jalur=="jf")
            $wherejalur = "AND LOWER(direktorat_pembinaan) = 'formal'";
        else if ($jalur=="jn")
            $wherejalur = "AND LOWER(direktorat_pembinaan) = 'non formal'";

        $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s 
            WHERE (".$this->dikmassemua.") ".$wherejalur."
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
                    WHERE (".$this->dikmassemua.") 
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
                WHERE (".$this->dikmassemua.") 
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
        return $this->dikmassemua;
    }

}
