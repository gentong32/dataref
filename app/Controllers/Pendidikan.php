<?php

namespace App\Controllers;

class Pendidikan extends BaseController
{
    public function index()
    {
        // $query   = $this->db->query("SELECT SUM(CASE WHEN (s.bentuk_pendidikan_id=5 OR 
        // s.bentuk_pendidikan_id=6 OR s.bentuk_pendidikan_id=13 OR 
        // s.bentuk_pendidikan_id=15) THEN 1 ELSE 0 END) total,
        // SUM(CASE WHEN s.bentuk_pendidikan_id=5 THEN 1 ELSE 0 END) sd,
        // SUM(CASE WHEN s.bentuk_pendidikan_id=6 THEN 1 ELSE 0 END) smp,
        // SUM(CASE WHEN s.bentuk_pendidikan_id=13 THEN 1 ELSE 0 END) sma,
        // SUM(CASE WHEN s.bentuk_pendidikan_id=15 THEN 1 ELSE 0 END) smk,
        // w.nama, w.kode_wilayah FROM Arsip.dbo.sekolah s 
        // JOIN Referensi.ref.mst_wilayah w ON LEFT(w.kode_wilayah,2)=LEFT(s.kode_wilayah,2) 
        // WHERE id_level_wilayah=1 AND soft_delete=0 
        // GROUP BY w.nama, w.kode_wilayah");
        // $data['datanas'] = $query->getResult();
        // $data['kode'] = "000000";
        // $data['level'] = 1;

        // $builder = $this->db->table('ref.agama');
        // $query   = $builder->get()->getResult();
        // $data['data_nasional'] = $query;
        // print_r($query);
        
        // return view('pendidikan/data_nasional', $data);
        //redirect(site_url()."pendidikan/paud/000000/0/all/all/all");
    }

    public function paud($kode=null, $level=0, $jalur="all", $bentuk="all", $status="all")
    {
        if ($kode==null)
        {
            $kode='000000';
        }
        if ($status==null || $status=="all")
            $wherestatus = "";
        else if ($status=="s1")
            $wherestatus = " AND status_sekolah = 1 ";
        else if ($status=="s2")
            $wherestatus = " AND status_sekolah = 2 ";

        $nkar = $level*2;
        $nkar2 = $nkar + 2;
        $levelbaru = $level+1;

        if ($level<3)    
        {
            $kodebaru = substr($kode,0,$nkar);
            if ($bentuk==null || $bentuk=="all")
            {
                $namabentuk = "";
                if ($jalur==null || $jalur=="all")
                {
                    $wherejalur = "";
                    $sql   = "SELECT SUM(CASE WHEN 
                    (s.bentuk_pendidikan_id=1 OR s.bentuk_pendidikan_id=2 OR 
                    s.bentuk_pendidikan_id=3 OR s.bentuk_pendidikan_id=4 OR
                    s.bentuk_pendidikan_id=30 OR s.bentuk_pendidikan_id=32 OR 
                    s.bentuk_pendidikan_id=34 OR s.bentuk_pendidikan_id=41 OR 
                    s.bentuk_pendidikan_id=42 OR 
                    s.bentuk_pendidikan_id=43 OR s.bentuk_pendidikan_id=45 OR 
                    s.bentuk_pendidikan_id=51 OR s.bentuk_pendidikan_id=52 OR 
                    s.bentuk_pendidikan_id=57 OR s.bentuk_pendidikan_id=61) 
                    THEN 1 ELSE 0 END) total,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=1 OR 
                    s.bentuk_pendidikan_id=34 OR 
                    s.bentuk_pendidikan_id=41 OR 
                    s.bentuk_pendidikan_id=42 OR 
                    s.bentuk_pendidikan_id=45 OR
                    s.bentuk_pendidikan_id=52 OR 
                    s.bentuk_pendidikan_id=57 OR 
                    s.bentuk_pendidikan_id=61) THEN 1 ELSE 0 END) tk,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=2 OR 
                    s.bentuk_pendidikan_id=43 OR 
                    s.bentuk_pendidikan_id=51) THEN 1 ELSE 0 END) kb,
                    SUM(CASE WHEN s.bentuk_pendidikan_id=3 THEN 1 ELSE 0 END) tpa,
                    SUM(CASE WHEN s.bentuk_pendidikan_id=4 THEN 1 ELSE 0 END) sps,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=30 OR 
                    s.bentuk_pendidikan_id=32) THEN 1 ELSE 0 END) lain,
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
                        'kodebaru'  => $kodebaru
                    ]);
                }
                else if ($jalur=="jf")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'formal'";
                    $sql   = "SELECT SUM(CASE WHEN 
                    (s.bentuk_pendidikan_id=1 OR 
                    s.bentuk_pendidikan_id=30 OR s.bentuk_pendidikan_id=32 OR 
                    s.bentuk_pendidikan_id=41 OR s.bentuk_pendidikan_id=42 OR 
                    s.bentuk_pendidikan_id=51 OR s.bentuk_pendidikan_id=52 OR 
                    s.bentuk_pendidikan_id=57 OR s.bentuk_pendidikan_id=61) 
                    THEN 1 ELSE 0 END) total,
                    SUM(CASE WHEN s.bentuk_pendidikan_id=1 THEN 1 ELSE 0 END) tk,
                    SUM(CASE WHEN s.bentuk_pendidikan_id=42 THEN 1 ELSE 0 END) tklb,
                    SUM(CASE WHEN s.bentuk_pendidikan_id=51 THEN 1 ELSE 0 END) spkpg,
                    SUM(CASE WHEN s.bentuk_pendidikan_id=52 THEN 1 ELSE 0 END) spktk,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=30 OR s.bentuk_pendidikan_id=32 OR 
                    s.bentuk_pendidikan_id=41 OR s.bentuk_pendidikan_id=57 OR
                    s.bentuk_pendidikan_id=61) THEN 1 ELSE 0 END) lain,
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
                        'kodebaru'  => $kodebaru
                    ]);
                } else if ($jalur=="jn")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'non formal'";
                    $sql = "SELECT SUM(CASE WHEN 
                    (s.bentuk_pendidikan_id=2 OR 
                    s.bentuk_pendidikan_id=3 OR s.bentuk_pendidikan_id=4 OR
                    s.bentuk_pendidikan_id=34 OR s.bentuk_pendidikan_id=43 OR 
                    s.bentuk_pendidikan_id=45) 
                    THEN 1 ELSE 0 END) total,
                    SUM(CASE WHEN s.bentuk_pendidikan_id=2 THEN 1 ELSE 0 END) kb,
                    SUM(CASE WHEN s.bentuk_pendidikan_id=3 THEN 1 ELSE 0 END) tpa,
                    SUM(CASE WHEN s.bentuk_pendidikan_id=4 THEN 1 ELSE 0 END) sps,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=34 OR s.bentuk_pendidikan_id=43 OR 
                    s.bentuk_pendidikan_id=45) THEN 1 ELSE 0 END) lain,
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
                        'kodebaru'  => $kodebaru
                    ]);
                }
            }
            else 
            {
                if ($jalur==null || $jalur=="all")
                {
                    $wherejalur = "";
                } else if ($jalur=="jf")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'formal'";
                } else if ($jalur=="jn")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'non formal'";
                }
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

                $sqlbentuk = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
                WHERE ([jenjang_paud]=1 OR [jenjang_tk]=1) AND [bentuk_pendidikan_id]=:bentuknya:
                ORDER BY [bentuk_pendidikan_id]";
                $hasilbentuk = $this->db->query($sqlbentuk,[
                    'bentuknya' => $bentuk
                ])->getRow();
                $namabentuk = $hasilbentuk->nama;

            }

            $data['datanas'] = $query->getResult();
            $data['kode'] = $kode;
            $data['level'] = $level;
            $data['jalur'] = $jalur;
            $data['bentuk'] = $bentuk;
            $data['status'] = $status;
            $data['namabentuk'] = $namabentuk;

            if ($level==0)
            {
                $data['namapilihan'] = "PROPINSI";
            }
            else
            {
                $sql = 'SELECT nama FROM Referensi.ref.mst_wilayah w  
                WHERE kode_wilayah=:kodewilayah:';
                $querysql = $this->db->query($sql, [
                    'kodewilayah'  => $kode
                ]);
                $resultquery = $querysql->getResult();
                $data['namapilihan'] = strToUpper($resultquery[0]->nama);
            } 

            $querybentuk = $this->db->query("SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
            WHERE ([jenjang_paud]=1 OR [jenjang_tk]=1) ".$wherejalur."
            ORDER BY [bentuk_pendidikan_id]");
            $data['daftarbentuk'] = $querybentuk->getResult();

            return view('pendidikan/data_nasional_paud', $data);
            
        }
        else
        {
            $kodebaru = substr($kode,0,6);
            if ($bentuk==null || $bentuk=="all")
            {
                $namabentuk = "";
                if ($jalur==null || $jalur=="all")
                {
                    $wherejalur = "";
                    $sql   = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
                    kode_wilayah, 
                    CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                    FROM Arsip.dbo.sekolah s 
                    WHERE (s.bentuk_pendidikan_id=1 OR s.bentuk_pendidikan_id=2 OR 
                    s.bentuk_pendidikan_id=3 OR s.bentuk_pendidikan_id=4 OR
                    s.bentuk_pendidikan_id=30 OR s.bentuk_pendidikan_id=32 OR 
                    s.bentuk_pendidikan_id=34 OR s.bentuk_pendidikan_id=41 OR 
                    s.bentuk_pendidikan_id=42 OR 
                    s.bentuk_pendidikan_id=43 OR s.bentuk_pendidikan_id=45 OR 
                    s.bentuk_pendidikan_id=51 OR s.bentuk_pendidikan_id=52 OR 
                    s.bentuk_pendidikan_id=57 OR s.bentuk_pendidikan_id=61) 
                    AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                    ".$wherestatus." 
                    ORDER BY nama";
                  
                    $query = $this->db->query($sql, [
                        'kodebaru'  => $kodebaru
                    ]);
                }
                else if ($jalur=="jf")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'formal'";
                    $sql   = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
                    kode_wilayah, 
                    CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                    FROM Arsip.dbo.sekolah s 
                    WHERE (s.bentuk_pendidikan_id=1 OR 
                    s.bentuk_pendidikan_id=30 OR s.bentuk_pendidikan_id=32 OR 
                    s.bentuk_pendidikan_id=41 OR s.bentuk_pendidikan_id=42 OR 
                    s.bentuk_pendidikan_id=51 OR s.bentuk_pendidikan_id=52 OR 
                    s.bentuk_pendidikan_id=57 OR s.bentuk_pendidikan_id=61) 
                    AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                    ".$wherestatus." 
                    ORDER BY nama";
                  
                    $query = $this->db->query($sql, [
                        'kodebaru'  => $kodebaru
                    ]);

                } else if ($jalur=="jn")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'non formal'";
                    $sql = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
                    kode_wilayah, 
                    CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                    FROM Arsip.dbo.sekolah s 
                    WHERE (s.bentuk_pendidikan_id=2 OR 
                    s.bentuk_pendidikan_id=3 OR s.bentuk_pendidikan_id=4 OR
                    s.bentuk_pendidikan_id=34 OR s.bentuk_pendidikan_id=43 OR 
                    s.bentuk_pendidikan_id=45) 
                    AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                    ".$wherestatus." 
                    ORDER BY nama";
                  
                    $query = $this->db->query($sql, [
                        'kodebaru'  => $kodebaru
                    ]);
                }
            }
            else 
            {
                if ($jalur==null || $jalur=="all")
                {
                    $wherejalur = "";
                } else if ($jalur=="jf")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'formal'";
                } else if ($jalur=="jn")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'non formal'";
                }
                
                $sql = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
                kode_wilayah, 
                CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                FROM Arsip.dbo.sekolah s 
                WHERE (s.bentuk_pendidikan_id=1 OR s.bentuk_pendidikan_id=2 OR 
                s.bentuk_pendidikan_id=3 OR s.bentuk_pendidikan_id=4 OR
                s.bentuk_pendidikan_id=30 OR s.bentuk_pendidikan_id=32 OR 
                s.bentuk_pendidikan_id=34 OR s.bentuk_pendidikan_id=41 OR 
                s.bentuk_pendidikan_id=42 OR 
                s.bentuk_pendidikan_id=43 OR s.bentuk_pendidikan_id=45 OR 
                s.bentuk_pendidikan_id=51 OR s.bentuk_pendidikan_id=52 OR 
                s.bentuk_pendidikan_id=57 OR s.bentuk_pendidikan_id=61) 
                AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                AND s.bentuk_pendidikan_id=:bentuknya: 
                ".$wherestatus." 
                ORDER BY nama";
                
                $query = $this->db->query($sql, [
                    'kodebaru'  => $kodebaru,
                    'bentuknya' => $bentuk
                ]);

                $sqlbentuk = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
                WHERE ([jenjang_paud]=1 OR [jenjang_tk]=1) AND [bentuk_pendidikan_id]=:bentuknya:
                ORDER BY [bentuk_pendidikan_id]";
                $hasilbentuk = $this->db->query($sqlbentuk,[
                    'bentuknya' => $bentuk
                ])->getRow();
                $namabentuk = $hasilbentuk->nama;

            }

            $data['datanas'] = $query->getResult();
            $data['kode'] = $kode;
            $data['level'] = $level;
            $data['jalur'] = $jalur;
            $data['bentuk'] = $bentuk;
            $data['status'] = $status;
            $data['namabentuk'] = $namabentuk;

            
            $sql = 'SELECT nama FROM Referensi.ref.mst_wilayah w  
            WHERE kode_wilayah=:kodewilayah:';
            $querysql = $this->db->query($sql, [
                'kodewilayah'  => $kode
            ]);
            $resultquery = $querysql->getResult();
            $data['namapilihan'] = strToUpper($resultquery[0]->nama);

            $querybentuk = $this->db->query("SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
            WHERE ([jenjang_paud]=1 OR [jenjang_tk]=1) ".$wherejalur."
            ORDER BY [bentuk_pendidikan_id]");
            $data['daftarbentuk'] = $querybentuk->getResult();
            $data['tingkat'] = "paud";
           
            return view('pendidikan/daftar_sekolah', $data);
                    
        }

    }

    public function dikdas($kode=null, $level=0, $jalur="all", $bentuk="all", $status="all")
    {
        if ($kode==null)
        {
            $kode='000000';
        }
        if ($status==null || $status=="all")
            $wherestatus = "";
        else if ($status=="s1")
            $wherestatus = " AND status_sekolah = 1 ";
        else if ($status=="s2")
            $wherestatus = " AND status_sekolah = 2 ";

        $nkar = $level*2;
        $nkar2 = $nkar + 2;
        $levelbaru = $level+1;

        if ($level<3)    
        {
            $kodebaru = substr($kode,0,$nkar);
            if ($bentuk==null || $bentuk=="all")
            {
                $namabentuk = "";
                if ($jalur==null || $jalur=="all")
                {
                    $wherejalur = "";
                    $sql   = "SELECT SUM(CASE WHEN 
                    (s.bentuk_pendidikan_id=5 OR s.bentuk_pendidikan_id=6 OR 
                    s.bentuk_pendidikan_id=7 OR s.bentuk_pendidikan_id=8 OR 
                    s.bentuk_pendidikan_id=9 OR s.bentuk_pendidikan_id=10 OR 
                    s.bentuk_pendidikan_id=11 OR s.bentuk_pendidikan_id=12 OR 
                    s.bentuk_pendidikan_id=29 OR s.bentuk_pendidikan_id=30 OR 
                    s.bentuk_pendidikan_id=31 OR s.bentuk_pendidikan_id=32 OR 
                    s.bentuk_pendidikan_id=33 OR s.bentuk_pendidikan_id=35 OR 
                    s.bentuk_pendidikan_id=36 OR s.bentuk_pendidikan_id=38 OR 
                    s.bentuk_pendidikan_id=53 OR s.bentuk_pendidikan_id=54 OR 
                    s.bentuk_pendidikan_id=58 OR 
                    s.bentuk_pendidikan_id=59 OR s.bentuk_pendidikan_id=62 OR 
                    s.bentuk_pendidikan_id=63) THEN 1 ELSE 0 END) total,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=5 OR 
                    s.bentuk_pendidikan_id=9) THEN 1 ELSE 0 END) sd,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=6 OR 
                    s.bentuk_pendidikan_id=10) THEN 1 ELSE 0 END) smp,
                    SUM(CASE WHEN s.bentuk_pendidikan_id=35 THEN 1 ELSE 0 END) smpt,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=7 OR s.bentuk_pendidikan_id=8 OR 
                    s.bentuk_pendidikan_id=11 OR s.bentuk_pendidikan_id=12 OR 
                    s.bentuk_pendidikan_id=29 OR s.bentuk_pendidikan_id=30 OR 
                    s.bentuk_pendidikan_id=31 OR s.bentuk_pendidikan_id=32 OR 
                    s.bentuk_pendidikan_id=33 OR s.bentuk_pendidikan_id=35 OR 
                    s.bentuk_pendidikan_id=36 OR s.bentuk_pendidikan_id=38 OR 
                    s.bentuk_pendidikan_id=53 OR s.bentuk_pendidikan_id=54 OR 
                    s.bentuk_pendidikan_id=58 OR 
                    s.bentuk_pendidikan_id=59 OR s.bentuk_pendidikan_id=62 OR 
                    s.bentuk_pendidikan_id=63) THEN 1 ELSE 0 END) lain,
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
                        'kodebaru'  => $kodebaru
                    ]);
                }
                else if ($jalur=="jf")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'formal'";
                    $sql   = "SELECT SUM(CASE WHEN 
                    (s.bentuk_pendidikan_id=5 OR s.bentuk_pendidikan_id=6 OR 
                    s.bentuk_pendidikan_id=7 OR s.bentuk_pendidikan_id=8 OR 
                    s.bentuk_pendidikan_id=9 OR s.bentuk_pendidikan_id=10 OR 
                    s.bentuk_pendidikan_id=11 OR s.bentuk_pendidikan_id=12 OR 
                    s.bentuk_pendidikan_id=29 OR s.bentuk_pendidikan_id=30 OR 
                    s.bentuk_pendidikan_id=31 OR s.bentuk_pendidikan_id=32 OR 
                    s.bentuk_pendidikan_id=33 OR s.bentuk_pendidikan_id=35 OR 
                    s.bentuk_pendidikan_id=36 OR s.bentuk_pendidikan_id=38 OR 
                    s.bentuk_pendidikan_id=53 OR s.bentuk_pendidikan_id=54 OR 
                    s.bentuk_pendidikan_id=58 OR 
                    s.bentuk_pendidikan_id=59 OR s.bentuk_pendidikan_id=62 OR 
                    s.bentuk_pendidikan_id=63) 
                    THEN 1 ELSE 0 END) total,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=5 OR 
                    s.bentuk_pendidikan_id=9) THEN 1 ELSE 0 END) sd,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=6 OR 
                    s.bentuk_pendidikan_id=10) THEN 1 ELSE 0 END) smp,
                    SUM(CASE WHEN s.bentuk_pendidikan_id=35 THEN 1 ELSE 0 END) smpt,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=7 OR s.bentuk_pendidikan_id=8 OR 
                    s.bentuk_pendidikan_id=11 OR s.bentuk_pendidikan_id=12 OR 
                    s.bentuk_pendidikan_id=29 OR s.bentuk_pendidikan_id=30 OR 
                    s.bentuk_pendidikan_id=31 OR s.bentuk_pendidikan_id=32 OR 
                    s.bentuk_pendidikan_id=33 OR s.bentuk_pendidikan_id=35 OR 
                    s.bentuk_pendidikan_id=36 OR s.bentuk_pendidikan_id=38 OR 
                    s.bentuk_pendidikan_id=53 OR s.bentuk_pendidikan_id=54 OR 
                    s.bentuk_pendidikan_id=58 OR 
                    s.bentuk_pendidikan_id=59 OR s.bentuk_pendidikan_id=62 OR 
                    s.bentuk_pendidikan_id=63) THEN 1 ELSE 0 END) lain,
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
                        'kodebaru'  => $kodebaru
                    ]);
                } else if ($jalur=="jn")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'non formal'";
                    $sql = "SELECT SUM(CASE WHEN 
                    (s.bentuk_pendidikan_id=99999) 
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
                        'kodebaru'  => $kodebaru
                    ]);
                }
            }
            else 
            {
                if ($jalur==null || $jalur=="all")
                {
                    $wherejalur = "";
                } else if ($jalur=="jf")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'formal'";
                } else if ($jalur=="jn")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'non formal'";
                }
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

                $sqlbentuk = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
                WHERE ([jenjang_sd]=1 OR [jenjang_smp]=1) AND [bentuk_pendidikan_id]=:bentuknya:
                ORDER BY [bentuk_pendidikan_id]";
                $hasilbentuk = $this->db->query($sqlbentuk,[
                    'bentuknya' => $bentuk
                ])->getRow();
                $namabentuk = $hasilbentuk->nama;

            }

            $data['datanas'] = $query->getResult();
            $data['kode'] = $kode;
            $data['level'] = $level;
            $data['jalur'] = $jalur;
            $data['bentuk'] = $bentuk;
            $data['status'] = $status;
            $data['namabentuk'] = $namabentuk;

            if ($level==0)
            {
                $data['namapilihan'] = "PROPINSI";
            }
            else
            {
                $sql = 'SELECT nama FROM Referensi.ref.mst_wilayah w  
                WHERE kode_wilayah=:kodewilayah:';
                $querysql = $this->db->query($sql, [
                    'kodewilayah'  => $kode
                ]);
                $resultquery = $querysql->getResult();
                $data['namapilihan'] = strToUpper($resultquery[0]->nama);
            } 

            $querybentuk = $this->db->query("SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
            WHERE ([jenjang_sd]=1 OR [jenjang_smp]=1) AND (
                bentuk_pendidikan_id<>56 AND bentuk_pendidikan_id<>67 AND 
                bentuk_pendidikan_id<>68 AND bentuk_pendidikan_id<>70 AND 
                bentuk_pendidikan_id<>71) ".$wherejalur."
            ORDER BY [bentuk_pendidikan_id]");
            $data['daftarbentuk'] = $querybentuk->getResult();

            return view('pendidikan/data_nasional_dikdas', $data);
            
        }
        else
        {
            $kodebaru = substr($kode,0,6);
            if ($bentuk==null || $bentuk=="all")
            {
                $namabentuk = "";
                if ($jalur==null || $jalur=="all")
                {
                    $wherejalur = "";
                    $sql   = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
                    kode_wilayah, 
                    CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                    FROM Arsip.dbo.sekolah s 
                    WHERE (s.bentuk_pendidikan_id=5 OR s.bentuk_pendidikan_id=6 OR 
                    s.bentuk_pendidikan_id=7 OR s.bentuk_pendidikan_id=8 OR 
                    s.bentuk_pendidikan_id=9 OR s.bentuk_pendidikan_id=10 OR 
                    s.bentuk_pendidikan_id=11 OR s.bentuk_pendidikan_id=12 OR 
                    s.bentuk_pendidikan_id=29 OR s.bentuk_pendidikan_id=30 OR 
                    s.bentuk_pendidikan_id=31 OR s.bentuk_pendidikan_id=32 OR 
                    s.bentuk_pendidikan_id=33 OR s.bentuk_pendidikan_id=35 OR 
                    s.bentuk_pendidikan_id=36 OR s.bentuk_pendidikan_id=38 OR 
                    s.bentuk_pendidikan_id=53 OR s.bentuk_pendidikan_id=54 OR 
                    s.bentuk_pendidikan_id=58 OR 
                    s.bentuk_pendidikan_id=59 OR s.bentuk_pendidikan_id=62 OR 
                    s.bentuk_pendidikan_id=63) 
                    AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                    ".$wherestatus." 
                    ORDER BY nama";
                  
                    $query = $this->db->query($sql, [
                        'kodebaru'  => $kodebaru
                    ]);
                }
                else if ($jalur=="jf")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'formal'";
                    $sql   = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
                    kode_wilayah, 
                    CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                    FROM Arsip.dbo.sekolah s 
                    WHERE (s.bentuk_pendidikan_id=5 OR s.bentuk_pendidikan_id=6 OR 
                    s.bentuk_pendidikan_id=7 OR s.bentuk_pendidikan_id=8 OR 
                    s.bentuk_pendidikan_id=9 OR s.bentuk_pendidikan_id=10 OR 
                    s.bentuk_pendidikan_id=11 OR s.bentuk_pendidikan_id=12 OR 
                    s.bentuk_pendidikan_id=29 OR s.bentuk_pendidikan_id=30 OR 
                    s.bentuk_pendidikan_id=31 OR s.bentuk_pendidikan_id=32 OR 
                    s.bentuk_pendidikan_id=33 OR s.bentuk_pendidikan_id=35 OR 
                    s.bentuk_pendidikan_id=36 OR s.bentuk_pendidikan_id=38 OR 
                    s.bentuk_pendidikan_id=53 OR s.bentuk_pendidikan_id=54 OR 
                    s.bentuk_pendidikan_id=58 OR 
                    s.bentuk_pendidikan_id=59 OR s.bentuk_pendidikan_id=62 OR 
                    s.bentuk_pendidikan_id=63) 
                    AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                    ".$wherestatus." 
                    ORDER BY nama";
                  
                    $query = $this->db->query($sql, [
                        'kodebaru'  => $kodebaru
                    ]);

                } else if ($jalur=="jn")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'non formal'";
                    $sql = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
                    kode_wilayah, 
                    CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                    FROM Arsip.dbo.sekolah s 
                    WHERE (s.bentuk_pendidikan_id=99999) 
                    AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                    ".$wherestatus." 
                    ORDER BY nama";
                  
                    $query = $this->db->query($sql, [
                        'kodebaru'  => $kodebaru
                    ]);
                }
            }
            else 
            {
                if ($jalur==null || $jalur=="all")
                {
                    $wherejalur = "";
                } else if ($jalur=="jf")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'formal'";
                } else if ($jalur=="jn")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'non formal'";
                }
                
                $sql = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
                kode_wilayah, 
                CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                FROM Arsip.dbo.sekolah s 
                WHERE (s.bentuk_pendidikan_id=5 OR s.bentuk_pendidikan_id=6 OR 
                    s.bentuk_pendidikan_id=7 OR s.bentuk_pendidikan_id=8 OR 
                    s.bentuk_pendidikan_id=9 OR s.bentuk_pendidikan_id=10 OR 
                    s.bentuk_pendidikan_id=11 OR s.bentuk_pendidikan_id=12 OR 
                    s.bentuk_pendidikan_id=29 OR s.bentuk_pendidikan_id=30 OR 
                    s.bentuk_pendidikan_id=31 OR s.bentuk_pendidikan_id=32 OR 
                    s.bentuk_pendidikan_id=33 OR s.bentuk_pendidikan_id=35 OR 
                    s.bentuk_pendidikan_id=36 OR s.bentuk_pendidikan_id=38 OR 
                    s.bentuk_pendidikan_id=53 OR s.bentuk_pendidikan_id=54 OR 
                    s.bentuk_pendidikan_id=58 OR 
                    s.bentuk_pendidikan_id=59 OR s.bentuk_pendidikan_id=62 OR 
                    s.bentuk_pendidikan_id=63) 
                AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                AND s.bentuk_pendidikan_id=:bentuknya: 
                ".$wherestatus." 
                ORDER BY nama";
                
                $query = $this->db->query($sql, [
                    'kodebaru'  => $kodebaru,
                    'bentuknya' => $bentuk
                ]);

                $sqlbentuk = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
                WHERE ([jenjang_sd]=1 OR [jenjang_smp]=1) AND [bentuk_pendidikan_id]=:bentuknya:
                ORDER BY [bentuk_pendidikan_id]";
                $hasilbentuk = $this->db->query($sqlbentuk,[
                    'bentuknya' => $bentuk
                ])->getRow();
                $namabentuk = $hasilbentuk->nama;

            }

            $data['datanas'] = $query->getResult();
            $data['kode'] = $kode;
            $data['level'] = $level;
            $data['jalur'] = $jalur;
            $data['bentuk'] = $bentuk;
            $data['status'] = $status;
            $data['namabentuk'] = $namabentuk;

            
            $sql = 'SELECT nama FROM Referensi.ref.mst_wilayah w  
            WHERE kode_wilayah=:kodewilayah:';
            $querysql = $this->db->query($sql, [
                'kodewilayah'  => $kode
            ]);
            $resultquery = $querysql->getResult();
            $data['namapilihan'] = strToUpper($resultquery[0]->nama);

            $querybentuk = $this->db->query("SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
            WHERE ([jenjang_sd]=1 OR [jenjang_smp]=1) AND (
                bentuk_pendidikan_id<>56 AND bentuk_pendidikan_id<>67 AND 
                bentuk_pendidikan_id<>68 AND bentuk_pendidikan_id<>70 AND 
                bentuk_pendidikan_id<>71) ".$wherejalur."
            ORDER BY [bentuk_pendidikan_id]");
            $data['daftarbentuk'] = $querybentuk->getResult();
            $data['tingkat'] = "dikdas";
           
            return view('pendidikan/daftar_sekolah', $data);
                    
        }

    }

    public function dikmen($kode=null, $level=0, $jalur="all", $bentuk="all", $status="all")
    {
        if ($kode==null)
        {
            $kode='000000';
        }
        if ($status==null || $status=="all")
            $wherestatus = "";
        else if ($status=="s1")
            $wherestatus = " AND status_sekolah = 1 ";
        else if ($status=="s2")
            $wherestatus = " AND status_sekolah = 2 ";

        $nkar = $level*2;
        $nkar2 = $nkar + 2;
        $levelbaru = $level+1;

        if ($level<3)    
        {
            $kodebaru = substr($kode,0,$nkar);
            if ($bentuk==null || $bentuk=="all")
            {
                $namabentuk = "";
                if ($jalur==null || $jalur=="all")
                {
                    $wherejalur = "";
                    $sql   = "SELECT SUM(CASE WHEN 
                    (s.bentuk_pendidikan_id=13 OR s.bentuk_pendidikan_id=15 OR 
                    s.bentuk_pendidikan_id=16 OR s.bentuk_pendidikan_id=17 OR 
                    s.bentuk_pendidikan_id=18 OR s.bentuk_pendidikan_id=29 OR 
                    s.bentuk_pendidikan_id=33 OR s.bentuk_pendidikan_id=37 OR 
                    s.bentuk_pendidikan_id=55 OR s.bentuk_pendidikan_id=39 OR 
                    s.bentuk_pendidikan_id=60 OR s.bentuk_pendidikan_id=44 OR 
                    s.bentuk_pendidikan_id=64 OR 
                    s.bentuk_pendidikan_id=65) THEN 1 ELSE 0 END) total,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=13) THEN 1 ELSE 0 END) sma,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=15) THEN 1 ELSE 0 END) smk,
                    SUM(CASE WHEN s.bentuk_pendidikan_id=16 THEN 1 ELSE 0 END) ma,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=17 OR 
                    s.bentuk_pendidikan_id=18 OR s.bentuk_pendidikan_id=29 OR 
                    s.bentuk_pendidikan_id=33 OR s.bentuk_pendidikan_id=37 OR 
                    s.bentuk_pendidikan_id=55 OR s.bentuk_pendidikan_id=39 OR 
                    s.bentuk_pendidikan_id=60 OR s.bentuk_pendidikan_id=44 OR 
                    s.bentuk_pendidikan_id=64 OR 
                    s.bentuk_pendidikan_id=65) THEN 1 ELSE 0 END) lain,
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
                        'kodebaru'  => $kodebaru
                    ]);
                }
                else if ($jalur=="jf")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'formal'";
                    $sql   = "SELECT SUM(CASE WHEN 
                    (s.bentuk_pendidikan_id=13 OR s.bentuk_pendidikan_id=15 OR 
                    s.bentuk_pendidikan_id=16 OR s.bentuk_pendidikan_id=17 OR 
                    s.bentuk_pendidikan_id=18 OR s.bentuk_pendidikan_id=29 OR 
                    s.bentuk_pendidikan_id=33 OR s.bentuk_pendidikan_id=37 OR 
                    s.bentuk_pendidikan_id=55 OR s.bentuk_pendidikan_id=39 OR 
                    s.bentuk_pendidikan_id=60 OR s.bentuk_pendidikan_id=44 OR 
                    s.bentuk_pendidikan_id=64 OR 
                    s.bentuk_pendidikan_id=65) 
                    THEN 1 ELSE 0 END) total,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=13) THEN 1 ELSE 0 END) sma,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=15) THEN 1 ELSE 0 END) smk,
                    SUM(CASE WHEN s.bentuk_pendidikan_id=16 THEN 1 ELSE 0 END) ma,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=17 OR 
                    s.bentuk_pendidikan_id=18 OR s.bentuk_pendidikan_id=29 OR 
                    s.bentuk_pendidikan_id=33 OR s.bentuk_pendidikan_id=37 OR 
                    s.bentuk_pendidikan_id=55 OR s.bentuk_pendidikan_id=39 OR 
                    s.bentuk_pendidikan_id=60 OR s.bentuk_pendidikan_id=44 OR 
                    s.bentuk_pendidikan_id=64 OR 
                    s.bentuk_pendidikan_id=65) THEN 1 ELSE 0 END) lain,
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
                        'kodebaru'  => $kodebaru
                    ]);
                } else if ($jalur=="jn")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'non formal'";
                    $sql = "SELECT SUM(CASE WHEN 
                    (s.bentuk_pendidikan_id=99999) 
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
                        'kodebaru'  => $kodebaru
                    ]);
                }
            }
            else 
            {
                if ($jalur==null || $jalur=="all")
                {
                    $wherejalur = "";
                } else if ($jalur=="jf")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'formal'";
                } else if ($jalur=="jn")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'non formal'";
                }
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

                $sqlbentuk = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
                WHERE ([jenjang_sma]=1) AND [bentuk_pendidikan_id]=:bentuknya:
                ORDER BY [bentuk_pendidikan_id]";
                $hasilbentuk = $this->db->query($sqlbentuk,[
                    'bentuknya' => $bentuk
                ])->getRow();
                $namabentuk = $hasilbentuk->nama;

            }

            $data['datanas'] = $query->getResult();
            $data['kode'] = $kode;
            $data['level'] = $level;
            $data['jalur'] = $jalur;
            $data['bentuk'] = $bentuk;
            $data['status'] = $status;
            $data['namabentuk'] = $namabentuk;

            if ($level==0)
            {
                $data['namapilihan'] = "PROPINSI";
            }
            else
            {
                $sql = 'SELECT nama FROM Referensi.ref.mst_wilayah w  
                WHERE kode_wilayah=:kodewilayah:';
                $querysql = $this->db->query($sql, [
                    'kodewilayah'  => $kode
                ]);
                $resultquery = $querysql->getResult();
                $data['namapilihan'] = strToUpper($resultquery[0]->nama);
            } 

            $querybentuk = $this->db->query("SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
            WHERE ([jenjang_sma]=1) AND (
                bentuk_pendidikan_id<>56 AND bentuk_pendidikan_id<>69 AND 
                bentuk_pendidikan_id<>72) ".$wherejalur."
            ORDER BY [bentuk_pendidikan_id]");
            $data['daftarbentuk'] = $querybentuk->getResult();

            return view('pendidikan/data_nasional_dikmen', $data);
            
        }
        else
        {
            $kodebaru = substr($kode,0,6);
            if ($bentuk==null || $bentuk=="all")
            {
                $namabentuk = "";
                if ($jalur==null || $jalur=="all")
                {
                    $wherejalur = "";
                    $sql   = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
                    kode_wilayah, 
                    CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                    FROM Arsip.dbo.sekolah s 
                    WHERE (s.bentuk_pendidikan_id=13 OR s.bentuk_pendidikan_id=15 OR 
                    s.bentuk_pendidikan_id=16 OR s.bentuk_pendidikan_id=17 OR 
                    s.bentuk_pendidikan_id=18 OR s.bentuk_pendidikan_id=29 OR 
                    s.bentuk_pendidikan_id=33 OR s.bentuk_pendidikan_id=37 OR 
                    s.bentuk_pendidikan_id=55 OR s.bentuk_pendidikan_id=39 OR 
                    s.bentuk_pendidikan_id=60 OR s.bentuk_pendidikan_id=44 OR 
                    s.bentuk_pendidikan_id=64 OR 
                    s.bentuk_pendidikan_id=65) 
                    AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                    ".$wherestatus." 
                    ORDER BY nama";
                  
                    $query = $this->db->query($sql, [
                        'kodebaru'  => $kodebaru
                    ]);
                }
                else if ($jalur=="jf")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'formal'";
                    $sql   = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
                    kode_wilayah, 
                    CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                    FROM Arsip.dbo.sekolah s 
                    WHERE (s.bentuk_pendidikan_id=13 OR s.bentuk_pendidikan_id=15 OR 
                    s.bentuk_pendidikan_id=16 OR s.bentuk_pendidikan_id=17 OR 
                    s.bentuk_pendidikan_id=18 OR s.bentuk_pendidikan_id=29 OR 
                    s.bentuk_pendidikan_id=33 OR s.bentuk_pendidikan_id=37 OR 
                    s.bentuk_pendidikan_id=55 OR s.bentuk_pendidikan_id=39 OR 
                    s.bentuk_pendidikan_id=60 OR s.bentuk_pendidikan_id=44 OR 
                    s.bentuk_pendidikan_id=64 OR 
                    s.bentuk_pendidikan_id=65) 
                    AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                    ".$wherestatus." 
                    ORDER BY nama";
                  
                    $query = $this->db->query($sql, [
                        'kodebaru'  => $kodebaru
                    ]);

                } else if ($jalur=="jn")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'non formal'";
                    $sql = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
                    kode_wilayah, 
                    CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                    FROM Arsip.dbo.sekolah s 
                    WHERE (s.bentuk_pendidikan_id=999999) 
                    AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                    ".$wherestatus." 
                    ORDER BY nama";
                  
                    $query = $this->db->query($sql, [
                        'kodebaru'  => $kodebaru
                    ]);
                }
            }
            else 
            {
                if ($jalur==null || $jalur=="all")
                {
                    $wherejalur = "";
                } else if ($jalur=="jf")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'formal'";
                } else if ($jalur=="jn")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'non formal'";
                }
                
                $sql = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
                kode_wilayah, 
                CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                FROM Arsip.dbo.sekolah s 
                WHERE (s.bentuk_pendidikan_id=13 OR s.bentuk_pendidikan_id=15 OR 
                    s.bentuk_pendidikan_id=16 OR s.bentuk_pendidikan_id=17 OR 
                    s.bentuk_pendidikan_id=18 OR s.bentuk_pendidikan_id=29 OR 
                    s.bentuk_pendidikan_id=33 OR s.bentuk_pendidikan_id=37 OR 
                    s.bentuk_pendidikan_id=55 OR s.bentuk_pendidikan_id=39 OR 
                    s.bentuk_pendidikan_id=60 OR s.bentuk_pendidikan_id=44 OR 
                    s.bentuk_pendidikan_id=64 OR 
                    s.bentuk_pendidikan_id=65) 
                AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                AND s.bentuk_pendidikan_id=:bentuknya: 
                ".$wherestatus." 
                ORDER BY nama";
                
                $query = $this->db->query($sql, [
                    'kodebaru'  => $kodebaru,
                    'bentuknya' => $bentuk
                ]);

                $sqlbentuk = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
                WHERE ([jenjang_sma]=1) AND [bentuk_pendidikan_id]=:bentuknya:
                ORDER BY [bentuk_pendidikan_id]";
                $hasilbentuk = $this->db->query($sqlbentuk,[
                    'bentuknya' => $bentuk
                ])->getRow();
                $namabentuk = $hasilbentuk->nama;

            }

            $data['datanas'] = $query->getResult();
            $data['kode'] = $kode;
            $data['level'] = $level;
            $data['jalur'] = $jalur;
            $data['bentuk'] = $bentuk;
            $data['status'] = $status;
            $data['namabentuk'] = $namabentuk;

            
            $sql = 'SELECT nama FROM Referensi.ref.mst_wilayah w  
            WHERE kode_wilayah=:kodewilayah:';
            $querysql = $this->db->query($sql, [
                'kodewilayah'  => $kode
            ]);
            $resultquery = $querysql->getResult();
            $data['namapilihan'] = strToUpper($resultquery[0]->nama);

            $querybentuk = $this->db->query("SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
            WHERE ([jenjang_sma]=1) AND (
                bentuk_pendidikan_id<>56 AND bentuk_pendidikan_id<>69 AND 
                bentuk_pendidikan_id<>72) ".$wherejalur."
            ORDER BY [bentuk_pendidikan_id]");
            $data['daftarbentuk'] = $querybentuk->getResult();
            $data['tingkat'] = "dikmen";
           
            return view('pendidikan/daftar_sekolah', $data);
                    
        }

    }

    public function dikti($kode=null, $level=0, $jalur="all", $bentuk="all", $status="all")
    {
        if ($kode==null)
        {
            $kode='000000';
        }
        if ($status==null || $status=="all")
            $wherestatus = "";
        else if ($status=="s1")
            $wherestatus = " AND status_sekolah = 1 ";
        else if ($status=="s2")
            $wherestatus = " AND status_sekolah = 2 ";

        $nkar = $level*2;
        $nkar2 = $nkar + 2;
        $levelbaru = $level+1;

        if ($level<3)    
        {
            $kodebaru = substr($kode,0,$nkar);
            if ($bentuk==null || $bentuk=="all")
            {
                $namabentuk = "";
                if ($jalur==null || $jalur=="all")
                {
                    $wherejalur = "";
                    $sql   = "SELECT SUM(CASE WHEN 
                    (s.bentuk_pendidikan_id=19 OR s.bentuk_pendidikan_id=20 OR 
                    s.bentuk_pendidikan_id=21 OR s.bentuk_pendidikan_id=22 OR 
                    s.bentuk_pendidikan_id=23 OR  
                    s.bentuk_pendidikan_id=66) THEN 1 ELSE 0 END) total,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=19) THEN 1 ELSE 0 END) akademik,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=20) THEN 1 ELSE 0 END) politeknik,
                    SUM(CASE WHEN s.bentuk_pendidikan_id=21 THEN 1 ELSE 0 END) sekolahtinggi,
                    SUM(CASE WHEN s.bentuk_pendidikan_id=23 THEN 1 ELSE 0 END) universitas,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=22 OR 
                    s.bentuk_pendidikan_id=66) THEN 1 ELSE 0 END) lain,
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
                        'kodebaru'  => $kodebaru
                    ]);
                }
                else if ($jalur=="jf")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'formal'";
                    $sql   = "SELECT SUM(CASE WHEN 
                    (s.bentuk_pendidikan_id=19 OR s.bentuk_pendidikan_id=20 OR 
                    s.bentuk_pendidikan_id=21 OR s.bentuk_pendidikan_id=22 OR 
                    s.bentuk_pendidikan_id=23 OR  
                    s.bentuk_pendidikan_id=66) 
                    THEN 1 ELSE 0 END) total,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=19) THEN 1 ELSE 0 END) akademik,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=20) THEN 1 ELSE 0 END) politeknik,
                    SUM(CASE WHEN s.bentuk_pendidikan_id=21 THEN 1 ELSE 0 END) sekolahtinggi,
                    SUM(CASE WHEN s.bentuk_pendidikan_id=23 THEN 1 ELSE 0 END) universitas,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=22 OR 
                    s.bentuk_pendidikan_id=66) THEN 1 ELSE 0 END) lain,
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
                        'kodebaru'  => $kodebaru
                    ]);
                } else if ($jalur=="jn")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'non formal'";
                    $sql = "SELECT SUM(CASE WHEN 
                    (s.bentuk_pendidikan_id=99999) 
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
                        'kodebaru'  => $kodebaru
                    ]);
                }
            }
            else 
            {
                if ($jalur==null || $jalur=="all")
                {
                    $wherejalur = "";
                } else if ($jalur=="jf")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'formal'";
                } else if ($jalur=="jn")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'non formal'";
                }
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

                $sqlbentuk = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
                WHERE ([jenjang_tinggi]=1)]=:bentuknya:
                ORDER BY [bentuk_pendidikan_id]";
                $hasilbentuk = $this->db->query($sqlbentuk,[
                    'bentuknya' => $bentuk
                ])->getRow();
                $namabentuk = $hasilbentuk->nama;

            }

            $data['datanas'] = $query->getResult();
            $data['kode'] = $kode;
            $data['level'] = $level;
            $data['jalur'] = $jalur;
            $data['bentuk'] = $bentuk;
            $data['status'] = $status;
            $data['namabentuk'] = $namabentuk;

            if ($level==0)
            {
                $data['namapilihan'] = "PROPINSI";
            }
            else
            {
                $sql = 'SELECT nama FROM Referensi.ref.mst_wilayah w  
                WHERE kode_wilayah=:kodewilayah:';
                $querysql = $this->db->query($sql, [
                    'kodewilayah'  => $kode
                ]);
                $resultquery = $querysql->getResult();
                $data['namapilihan'] = strToUpper($resultquery[0]->nama);
            } 

            $querybentuk = $this->db->query("SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
            WHERE ([jenjang_tinggi]=1) ".$wherejalur."
            ORDER BY [bentuk_pendidikan_id]");
            $data['daftarbentuk'] = $querybentuk->getResult();

            return view('pendidikan/data_nasional_dikti', $data);
            
        }
        else
        {
            $kodebaru = substr($kode,0,6);
            if ($bentuk==null || $bentuk=="all")
            {
                $namabentuk = "";
                if ($jalur==null || $jalur=="all")
                {
                    $wherejalur = "";
                    $sql   = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
                    kode_wilayah, 
                    CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                    FROM Arsip.dbo.sekolah s 
                    WHERE (s.bentuk_pendidikan_id=19 OR s.bentuk_pendidikan_id=20 OR 
                    s.bentuk_pendidikan_id=21 OR s.bentuk_pendidikan_id=22 OR 
                    s.bentuk_pendidikan_id=23 OR  
                    s.bentuk_pendidikan_id=66) 
                    AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                    ".$wherestatus." 
                    ORDER BY nama";
                  
                    $query = $this->db->query($sql, [
                        'kodebaru'  => $kodebaru
                    ]);
                }
                else if ($jalur=="jf")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'formal'";
                    $sql   = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
                    kode_wilayah, 
                    CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                    FROM Arsip.dbo.sekolah s 
                    WHERE (s.bentuk_pendidikan_id=19 OR s.bentuk_pendidikan_id=20 OR 
                    s.bentuk_pendidikan_id=21 OR s.bentuk_pendidikan_id=22 OR 
                    s.bentuk_pendidikan_id=23 OR  
                    s.bentuk_pendidikan_id=66) 
                    AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                    ".$wherestatus." 
                    ORDER BY nama";
                  
                    $query = $this->db->query($sql, [
                        'kodebaru'  => $kodebaru
                    ]);

                } else if ($jalur=="jn")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'non formal'";
                    $sql = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
                    kode_wilayah, 
                    CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                    FROM Arsip.dbo.sekolah s 
                    WHERE (s.bentuk_pendidikan_id=999999) 
                    AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                    ".$wherestatus." 
                    ORDER BY nama";
                  
                    $query = $this->db->query($sql, [
                        'kodebaru'  => $kodebaru
                    ]);
                }
            }
            else 
            {
                if ($jalur==null || $jalur=="all")
                {
                    $wherejalur = "";
                } else if ($jalur=="jf")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'formal'";
                } else if ($jalur=="jn")
                {
                    $wherejalur = "AND LOWER(direktorat_pembinaan) = 'non formal'";
                }
                
                $sql = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
                kode_wilayah, 
                CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                FROM Arsip.dbo.sekolah s 
                WHERE (s.bentuk_pendidikan_id=19 OR s.bentuk_pendidikan_id=20 OR 
                    s.bentuk_pendidikan_id=21 OR s.bentuk_pendidikan_id=22 OR 
                    s.bentuk_pendidikan_id=23 OR  
                    s.bentuk_pendidikan_id=66) 
                AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                AND s.bentuk_pendidikan_id=:bentuknya: 
                ".$wherestatus." 
                ORDER BY nama";
                
                $query = $this->db->query($sql, [
                    'kodebaru'  => $kodebaru,
                    'bentuknya' => $bentuk
                ]);

                $sqlbentuk = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
                WHERE ([jenjang_tinggi]=1) AND [bentuk_pendidikan_id]=:bentuknya:
                ORDER BY [bentuk_pendidikan_id]";
                $hasilbentuk = $this->db->query($sqlbentuk,[
                    'bentuknya' => $bentuk
                ])->getRow();
                $namabentuk = $hasilbentuk->nama;

            }

            $data['datanas'] = $query->getResult();
            $data['kode'] = $kode;
            $data['level'] = $level;
            $data['jalur'] = $jalur;
            $data['bentuk'] = $bentuk;
            $data['status'] = $status;
            $data['namabentuk'] = $namabentuk;

            
            $sql = 'SELECT nama FROM Referensi.ref.mst_wilayah w  
            WHERE kode_wilayah=:kodewilayah:';
            $querysql = $this->db->query($sql, [
                'kodewilayah'  => $kode
            ]);
            $resultquery = $querysql->getResult();
            $data['namapilihan'] = strToUpper($resultquery[0]->nama);

            $querybentuk = $this->db->query("SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
            WHERE ([jenjang_tinggi]=1) ".$wherejalur."
            ORDER BY [bentuk_pendidikan_id]");
            $data['daftarbentuk'] = $querybentuk->getResult();
            $data['tingkat'] = "dikti";
           
            return view('pendidikan/daftar_sekolah', $data);
                    
        }

    }

    public function dikmas($kode=null, $level=0, $jalur="all", $bentuk="all", $status="all")
    {
        if ($kode==null)
        {
            $kode='000000';
        }
        if ($status==null || $status=="all")
            $wherestatus = "";
        else if ($status=="s1")
            $wherestatus = " AND status_sekolah = 1 ";
        else if ($status=="s2")
            $wherestatus = " AND status_sekolah = 2 ";

        $nkar = $level*2;
        $nkar2 = $nkar + 2;
        $levelbaru = $level+1;

        if ($level<3)    
        {
            $kodebaru = substr($kode,0,$nkar);
            if ($bentuk==null || $bentuk=="all")
            {
                $namabentuk = "";
                if ($jalur==null || $jalur=="all")
                {
                    $wherejalur = "WHERE (bentuk_pendidikan_id=24 OR bentuk_pendidikan_id=25 OR 
                    bentuk_pendidikan_id=26 OR bentuk_pendidikan_id=27 OR 
                    bentuk_pendidikan_id=28 OR bentuk_pendidikan_id=40 OR 
                    bentuk_pendidikan_id=56 OR bentuk_pendidikan_id=67 OR 
                    bentuk_pendidikan_id=68 OR bentuk_pendidikan_id=69 OR 
                    bentuk_pendidikan_id=70 OR bentuk_pendidikan_id=71 OR
                    bentuk_pendidikan_id=72)";
                    $sql   = "SELECT SUM(CASE WHEN 
                    (s.bentuk_pendidikan_id=24 OR s.bentuk_pendidikan_id=25 OR 
                    s.bentuk_pendidikan_id=26 OR s.bentuk_pendidikan_id=27 OR 
                    s.bentuk_pendidikan_id=28 OR s.bentuk_pendidikan_id=40 OR 
                    s.bentuk_pendidikan_id=56 OR s.bentuk_pendidikan_id=67 OR 
                    s.bentuk_pendidikan_id=68 OR s.bentuk_pendidikan_id=69 OR 
                    s.bentuk_pendidikan_id=70 OR s.bentuk_pendidikan_id=71 OR
                    s.bentuk_pendidikan_id=72) THEN 1 ELSE 0 END) total,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=24) THEN 1 ELSE 0 END) kursus,
                    SUM(CASE WHEN s.bentuk_pendidikan_id=56 THEN 1 ELSE 0 END) ponpes,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=67 OR 
                    s.bentuk_pendidikan_id=68 OR s.bentuk_pendidikan_id=69) THEN 1 ELSE 0 END) pdf,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=25 OR 
                    s.bentuk_pendidikan_id=26 OR s.bentuk_pendidikan_id=27 OR 
                    s.bentuk_pendidikan_id=28 OR s.bentuk_pendidikan_id=40 OR 
                    s.bentuk_pendidikan_id=70 OR s.bentuk_pendidikan_id=71 OR
                    s.bentuk_pendidikan_id=72) THEN 1 ELSE 0 END) lain,
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
                        'kodebaru'  => $kodebaru
                    ]);
                }
                else if ($jalur=="jf")
                {
                    $wherejalur = "WHERE (bentuk_pendidikan_id=67 OR 
                    bentuk_pendidikan_id=68 OR bentuk_pendidikan_id=69 OR 
                    bentuk_pendidikan_id=70 OR bentuk_pendidikan_id=71 OR
                    bentuk_pendidikan_id=72) AND LOWER(direktorat_pembinaan) = 'formal'";
                    $sql   = "SELECT SUM(CASE WHEN 
                    (s.bentuk_pendidikan_id=67 OR 
                    s.bentuk_pendidikan_id=68 OR s.bentuk_pendidikan_id=69 OR 
                    s.bentuk_pendidikan_id=70 OR s.bentuk_pendidikan_id=71 OR
                    s.bentuk_pendidikan_id=72) 
                    THEN 1 ELSE 0 END) total,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=67) THEN 1 ELSE 0 END) pdfula,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=68) THEN 1 ELSE 0 END) pdfwustha,
                    SUM(CASE WHEN s.bentuk_pendidikan_id=69 THEN 1 ELSE 0 END) pdfulya,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=70 OR 
                    s.bentuk_pendidikan_id=71 OR 
                    s.bentuk_pendidikan_id=72) THEN 1 ELSE 0 END) lain,
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
                        'kodebaru'  => $kodebaru
                    ]);
                } else if ($jalur=="jn")
                {
                    $wherejalur = "WHERE (bentuk_pendidikan_id=24 OR bentuk_pendidikan_id=25 OR 
                    bentuk_pendidikan_id=26 OR bentuk_pendidikan_id=27 OR 
                    bentuk_pendidikan_id=28 OR bentuk_pendidikan_id=40 OR 
                    bentuk_pendidikan_id=56) AND LOWER(direktorat_pembinaan) = 'non formal'";
                    $sql = "SELECT SUM(CASE WHEN 
                    (s.bentuk_pendidikan_id=24 OR s.bentuk_pendidikan_id=25 OR 
                    s.bentuk_pendidikan_id=26 OR s.bentuk_pendidikan_id=27 OR 
                    s.bentuk_pendidikan_id=28 OR s.bentuk_pendidikan_id=40 OR 
                    s.bentuk_pendidikan_id=56) 
                    THEN 1 ELSE 0 END) total,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=24) THEN 1 ELSE 0 END) kursus,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=27) THEN 1 ELSE 0 END) pkbm,
                    SUM(CASE WHEN s.bentuk_pendidikan_id=56 THEN 1 ELSE 0 END) ponpes,
                    SUM(CASE WHEN (s.bentuk_pendidikan_id=25 OR 
                    s.bentuk_pendidikan_id=26 OR s.bentuk_pendidikan_id=28 OR 
                    s.bentuk_pendidikan_id=40) THEN 1 ELSE 0 END) lain,
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
                        'kodebaru'  => $kodebaru
                    ]);
                }
            }
            else 
            {
                if ($jalur==null || $jalur=="all")
                {
                    $wherejalur = "WHERE (bentuk_pendidikan_id=24 OR bentuk_pendidikan_id=25 OR 
                    bentuk_pendidikan_id=26 OR bentuk_pendidikan_id=27 OR 
                    bentuk_pendidikan_id=28 OR bentuk_pendidikan_id=40 OR 
                    bentuk_pendidikan_id=56 OR bentuk_pendidikan_id=67 OR 
                    bentuk_pendidikan_id=68 OR bentuk_pendidikan_id=69 OR 
                    bentuk_pendidikan_id=70 OR bentuk_pendidikan_id=71 OR
                    bentuk_pendidikan_id=72)";
                } else if ($jalur=="jf")
                {
                    $wherejalur = "WHERE (bentuk_pendidikan_id=67 OR 
                    bentuk_pendidikan_id=68 OR bentuk_pendidikan_id=69 OR 
                    bentuk_pendidikan_id=70 OR bentuk_pendidikan_id=71 OR
                    bentuk_pendidikan_id=72)";
                } else if ($jalur=="jn")
                {
                    $wherejalur = "WHERE (bentuk_pendidikan_id=24 OR bentuk_pendidikan_id=25 OR 
                    bentuk_pendidikan_id=26 OR bentuk_pendidikan_id=27 OR 
                    bentuk_pendidikan_id=28 OR bentuk_pendidikan_id=40 OR 
                    bentuk_pendidikan_id=56)";
                }
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

                $sqlbentuk = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
                WHERE [bentuk_pendidikan_id]=:bentuknya:
                ORDER BY [bentuk_pendidikan_id]";
                $hasilbentuk = $this->db->query($sqlbentuk,[
                    'bentuknya' => $bentuk
                ])->getRow();
                $namabentuk = $hasilbentuk->nama;

            }

            $data['datanas'] = $query->getResult();
            $data['kode'] = $kode;
            $data['level'] = $level;
            $data['jalur'] = $jalur;
            $data['bentuk'] = $bentuk;
            $data['status'] = $status;
            $data['namabentuk'] = $namabentuk;

            if ($level==0)
            {
                $data['namapilihan'] = "PROPINSI";
            }
            else
            {
                $sql = 'SELECT nama FROM Referensi.ref.mst_wilayah w  
                WHERE kode_wilayah=:kodewilayah:';
                $querysql = $this->db->query($sql, [
                    'kodewilayah'  => $kode
                ]);
                $resultquery = $querysql->getResult();
                $data['namapilihan'] = strToUpper($resultquery[0]->nama);
            } 

            $sqlbentuk = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
            ".$wherejalur." 
            ORDER BY [bentuk_pendidikan_id]";
            
            $querybentuk = $this->db->query($sqlbentuk);
            $data['daftarbentuk'] = $querybentuk->getResult();

            return view('pendidikan/data_nasional_dikmas', $data);
            
        }
        else
        {
            $kodebaru = substr($kode,0,6);
            if ($bentuk==null || $bentuk=="all")
            {
                $namabentuk = "";
                if ($jalur==null || $jalur=="all")
                {
                    $wherejalur = "WHERE (bentuk_pendidikan_id=24 OR bentuk_pendidikan_id=25 OR 
                    bentuk_pendidikan_id=26 OR bentuk_pendidikan_id=27 OR 
                    bentuk_pendidikan_id=28 OR bentuk_pendidikan_id=40 OR 
                    bentuk_pendidikan_id=56 OR bentuk_pendidikan_id=67 OR 
                    bentuk_pendidikan_id=68 OR bentuk_pendidikan_id=69 OR 
                    bentuk_pendidikan_id=70 OR bentuk_pendidikan_id=71 OR
                    bentuk_pendidikan_id=72)";
                    $sql   = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
                    kode_wilayah, 
                    CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                    FROM Arsip.dbo.sekolah s 
                    WHERE (s.bentuk_pendidikan_id=24 OR s.bentuk_pendidikan_id=25 OR 
                    s.bentuk_pendidikan_id=26 OR s.bentuk_pendidikan_id=27 OR 
                    s.bentuk_pendidikan_id=28 OR s.bentuk_pendidikan_id=40 OR 
                    s.bentuk_pendidikan_id=56 OR s.bentuk_pendidikan_id=67 OR 
                    s.bentuk_pendidikan_id=68 OR s.bentuk_pendidikan_id=69 OR 
                    s.bentuk_pendidikan_id=70 OR s.bentuk_pendidikan_id=71 OR
                    s.bentuk_pendidikan_id=72) 
                    AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                    ".$wherestatus." 
                    ORDER BY nama";
                  
                    $query = $this->db->query($sql, [
                        'kodebaru'  => $kodebaru
                    ]);
                }
                else if ($jalur=="jf")
                {
                    $wherejalur = "WHERE (bentuk_pendidikan_id=24 OR bentuk_pendidikan_id=25 OR 
                    bentuk_pendidikan_id=26 OR bentuk_pendidikan_id=27 OR 
                    bentuk_pendidikan_id=28 OR bentuk_pendidikan_id=40 OR 
                    bentuk_pendidikan_id=56 OR bentuk_pendidikan_id=67 OR 
                    bentuk_pendidikan_id=68 OR bentuk_pendidikan_id=69 OR 
                    bentuk_pendidikan_id=70 OR bentuk_pendidikan_id=71 OR
                    bentuk_pendidikan_id=72) AND LOWER(direktorat_pembinaan) = 'formal'";
                    $sql   = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
                    kode_wilayah, 
                    CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                    FROM Arsip.dbo.sekolah s 
                    WHERE (s.bentuk_pendidikan_id=67 OR 
                    s.bentuk_pendidikan_id=68 OR s.bentuk_pendidikan_id=69 OR 
                    s.bentuk_pendidikan_id=70 OR s.bentuk_pendidikan_id=71 OR
                    s.bentuk_pendidikan_id=72) 
                    AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                    ".$wherestatus." 
                    ORDER BY nama";
                  
                    $query = $this->db->query($sql, [
                        'kodebaru'  => $kodebaru
                    ]);

                } else if ($jalur=="jn")
                {
                    $wherejalur = "WHERE (bentuk_pendidikan_id=24 OR bentuk_pendidikan_id=25 OR 
                    bentuk_pendidikan_id=26 OR bentuk_pendidikan_id=27 OR 
                    bentuk_pendidikan_id=28 OR bentuk_pendidikan_id=40 OR 
                    bentuk_pendidikan_id=56 OR bentuk_pendidikan_id=67 OR 
                    bentuk_pendidikan_id=68 OR bentuk_pendidikan_id=69 OR 
                    bentuk_pendidikan_id=70 OR bentuk_pendidikan_id=71 OR
                    bentuk_pendidikan_id=72) AND LOWER(direktorat_pembinaan) = 'non formal'";
                    $sql = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
                    kode_wilayah, 
                    CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                    FROM Arsip.dbo.sekolah s 
                    WHERE (s.bentuk_pendidikan_id=24 OR s.bentuk_pendidikan_id=25 OR 
                    s.bentuk_pendidikan_id=26 OR s.bentuk_pendidikan_id=27 OR 
                    s.bentuk_pendidikan_id=28 OR s.bentuk_pendidikan_id=40 OR 
                    s.bentuk_pendidikan_id=56) 
                    AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                    ".$wherestatus." 
                    ORDER BY nama";
                  
                    $query = $this->db->query($sql, [
                        'kodebaru'  => $kodebaru
                    ]);
                }
            }
            else 
            {
                if ($jalur==null || $jalur=="all")
                {
                    $wherejalur = "WHERE (bentuk_pendidikan_id=24 OR bentuk_pendidikan_id=25 OR 
                    bentuk_pendidikan_id=26 OR bentuk_pendidikan_id=27 OR 
                    bentuk_pendidikan_id=28 OR bentuk_pendidikan_id=40 OR 
                    bentuk_pendidikan_id=56 OR bentuk_pendidikan_id=67 OR 
                    bentuk_pendidikan_id=68 OR bentuk_pendidikan_id=69 OR 
                    bentuk_pendidikan_id=70 OR bentuk_pendidikan_id=71 OR
                    bentuk_pendidikan_id=72)";
                } else if ($jalur=="jf")
                {
                    $wherejalur = "WHERE (bentuk_pendidikan_id=24 OR bentuk_pendidikan_id=25 OR 
                    bentuk_pendidikan_id=26 OR bentuk_pendidikan_id=27 OR 
                    bentuk_pendidikan_id=28 OR bentuk_pendidikan_id=40 OR 
                    bentuk_pendidikan_id=56 OR bentuk_pendidikan_id=67 OR 
                    bentuk_pendidikan_id=68 OR bentuk_pendidikan_id=69 OR 
                    bentuk_pendidikan_id=70 OR bentuk_pendidikan_id=71 OR
                    bentuk_pendidikan_id=72) AND LOWER(direktorat_pembinaan) = 'formal'";
                } else if ($jalur=="jn")
                {
                    $wherejalur = "WHERE (bentuk_pendidikan_id=24 OR bentuk_pendidikan_id=25 OR 
                    bentuk_pendidikan_id=26 OR bentuk_pendidikan_id=27 OR 
                    bentuk_pendidikan_id=28 OR bentuk_pendidikan_id=40 OR 
                    bentuk_pendidikan_id=56 OR bentuk_pendidikan_id=67 OR 
                    bentuk_pendidikan_id=68 OR bentuk_pendidikan_id=69 OR 
                    bentuk_pendidikan_id=70 OR bentuk_pendidikan_id=71 OR
                    bentuk_pendidikan_id=72) AND LOWER(direktorat_pembinaan) = 'non formal'";
                }
                
                $sql = "SELECT npsn, nama, alamat_jalan, desa_kelurahan, 
                kode_wilayah, 
                CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl
                FROM Arsip.dbo.sekolah s 
                WHERE (bentuk_pendidikan_id=24 OR bentuk_pendidikan_id=25 OR 
                    bentuk_pendidikan_id=26 OR bentuk_pendidikan_id=27 OR 
                    bentuk_pendidikan_id=28 OR bentuk_pendidikan_id=40 OR 
                    bentuk_pendidikan_id=56 OR bentuk_pendidikan_id=67 OR 
                    bentuk_pendidikan_id=68 OR bentuk_pendidikan_id=69 OR 
                    bentuk_pendidikan_id=70 OR bentuk_pendidikan_id=71 OR
                    bentuk_pendidikan_id=72) 
                AND LEFT(kode_wilayah,6)=:kodebaru: AND soft_delete=0 
                AND s.bentuk_pendidikan_id=:bentuknya: 
                ".$wherestatus." 
                ORDER BY nama";
                
                $query = $this->db->query($sql, [
                    'kodebaru'  => $kodebaru,
                    'bentuknya' => $bentuk
                ]);

                $sqlbentuk = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
                WHERE [bentuk_pendidikan_id]=:bentuknya:
                ORDER BY [bentuk_pendidikan_id]";
                $hasilbentuk = $this->db->query($sqlbentuk,[
                    'bentuknya' => $bentuk
                ])->getRow();
                $namabentuk = $hasilbentuk->nama;

            }

            $data['datanas'] = $query->getResult();
            $data['kode'] = $kode;
            $data['level'] = $level;
            $data['jalur'] = $jalur;
            $data['bentuk'] = $bentuk;
            $data['status'] = $status;
            $data['namabentuk'] = $namabentuk;

            
            $sql = 'SELECT nama FROM Referensi.ref.mst_wilayah w  
            WHERE kode_wilayah=:kodewilayah:';
            $querysql = $this->db->query($sql, [
                'kodewilayah'  => $kode
            ]);
            $resultquery = $querysql->getResult();
            $data['namapilihan'] = strToUpper($resultquery[0]->nama);

            $querybentuk = $this->db->query("SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
            ".$wherejalur." 
            ORDER BY [bentuk_pendidikan_id]");
            $data['daftarbentuk'] = $querybentuk->getResult();
            $data['tingkat'] = "dikmas";
           
            return view('pendidikan/daftar_sekolah', $data);
                    
        }

    }

    public function npsn($kode)
    {
        $sql   = "SELECT *,s.nama as nama_sekolah, k.nama as naungan,
        CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl,
        b.nama as bentuk_pendidikan   
        FROM Arsip.dbo.sekolah s 
		JOIN Referensi.ref.bentuk_pendidikan b ON b.bentuk_pendidikan_id = s.bentuk_pendidikan_id 
        JOIN Referensi.ref.status_kepemilikan k ON k.status_kepemilikan_id = s.status_kepemilikan_id 
		WHERE npsn = :npsn:";
        $query = $this->db->query($sql, [
            'npsn'  => $kode
        ]);
        $datasekolah = $query->getRow();
        $kodwil = $datasekolah->kode_wilayah;

        $data['datasekolah'] = $datasekolah;

        $sql2 = "select w1.nama as kecamatan, w2.nama as kota, w3.nama as propinsi, w1.id_level_wilayah, w1.mst_kode_wilayah, w1.kode_wilayah 
		from Referensi.ref.mst_wilayah w1, Referensi.ref.mst_wilayah w2, Referensi.ref.mst_wilayah w3 
		where w1.kode_wilayah = :kodwil: and (w1.mst_kode_wilayah = w2.kode_wilayah) and 
		(w2.mst_kode_wilayah = w3.kode_wilayah)
		order by w1.id_level_wilayah, w2.nama, w1.nama";

        $query2 = $this->db->query($sql2, [
            'kodwil'  => substr($kodwil,0,6)
        ]);

        $data['datawilayah'] = $query2->getRow();

         
        //print_r($query->getRow());
        
        return view('pendidikan/detail_sekolah', $data);
    }

    public function getbentukpendidikan()
	{
		$jalurpendidikan = $_GET['jalurpendidikan'];
        $tingkat = $_GET['tingkat'];
        // $jalurpendidikan = "jf";
        if ($jalurpendidikan=="all")
        {
            if ($tingkat=="PAUD")
            {
                $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
                WHERE [jenjang_paud]=1 OR [jenjang_tk]=1";
            }
            else if ($tingkat=="DIKDAS")
            {
                $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
                WHERE [jenjang_sd]=1 OR [jenjang_smp]=1";
            }
            else if ($tingkat=="DIKMEN")
            {
                $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
                WHERE ([jenjang_sma]=1) AND (
                bentuk_pendidikan_id<>56 AND bentuk_pendidikan_id<>69 AND 
                bentuk_pendidikan_id<>72)";
            }
            else if ($tingkat=="DIKTI")
            {
                $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
                WHERE [jenjang_tinggi]=1";
            }
            else if ($tingkat=="DIKMAS")
            {
                $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
                WHERE (bentuk_pendidikan_id=24 OR bentuk_pendidikan_id=25 OR 
                    bentuk_pendidikan_id=26 OR bentuk_pendidikan_id=27 OR 
                    bentuk_pendidikan_id=28 OR bentuk_pendidikan_id=40 OR 
                    bentuk_pendidikan_id=56 OR bentuk_pendidikan_id=67 OR 
                    bentuk_pendidikan_id=68 OR bentuk_pendidikan_id=69 OR 
                    bentuk_pendidikan_id=70 OR bentuk_pendidikan_id=71 OR
                    bentuk_pendidikan_id=72)";
            }
        }
        else
        {
            if ($jalurpendidikan=="jf")
                $pilihan = "'formal'";
            else if ($jalurpendidikan=="jn")
                $pilihan = "'non formal'";
            if ($tingkat=="PAUD")
            {
                $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
                WHERE ([jenjang_paud]=1 OR [jenjang_tk]=1) AND LOWER(direktorat_pembinaan) = ".$pilihan;
            }
            else if ($tingkat=="DIKDAS")
            {
                $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
                WHERE ([jenjang_sd]=1 OR [jenjang_smp]=1) AND (
                bentuk_pendidikan_id<>56 AND bentuk_pendidikan_id<>67 AND 
                bentuk_pendidikan_id<>68 AND bentuk_pendidikan_id<>70 AND 
                bentuk_pendidikan_id<>71) AND LOWER(direktorat_pembinaan) = ".$pilihan;
            }
            else if ($tingkat=="DIKMEN")
            {
                $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
                WHERE ([jenjang_sma]=1) AND (
                bentuk_pendidikan_id<>56 AND bentuk_pendidikan_id<>69 AND 
                bentuk_pendidikan_id<>72) AND LOWER(direktorat_pembinaan) = ".$pilihan;
            }
            else if ($tingkat=="DIKTI")
            {
                $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
                WHERE ([jenjang_tinggi]=1) AND LOWER(direktorat_pembinaan) = ".$pilihan;
            }
            else if ($tingkat=="DIKMAS")
            {
                $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
                WHERE (bentuk_pendidikan_id=24 OR bentuk_pendidikan_id=25 OR 
                    bentuk_pendidikan_id=26 OR bentuk_pendidikan_id=27 OR 
                    bentuk_pendidikan_id=28 OR bentuk_pendidikan_id=40 OR 
                    bentuk_pendidikan_id=56 OR bentuk_pendidikan_id=67 OR 
                    bentuk_pendidikan_id=68 OR bentuk_pendidikan_id=69 OR 
                    bentuk_pendidikan_id=70 OR bentuk_pendidikan_id=71 OR
                    bentuk_pendidikan_id=72) AND LOWER(direktorat_pembinaan) = ".$pilihan;
            }
        }
            
        $query = $this->db->query($sql);

        $isi = $query->getResult();
		echo json_encode($isi);
	}

}
