<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModelPendidikan extends Model
{
    protected $table   = 'bid2.skoperasional';

    public function getCariNamaAtauNPSN($kode)
    {
        $this->db = \Config\Database::connect("dbnpsn");

        $sql = "SELECT s.*, b.nama as bentuk_pendidikan, k.nama as status_kepemilikan, 
         CASE WHEN s.bentuk_pendidikan_id IN (9,10,16,17,34,36,37,38,56,39,41,57,58,59,
                 60,44,45,61,62,63,64,65) THEN 'Kementerian Agama'
             WHEN s.npsn IN ('10646356', '30314295', '69734022') THEN 'Kementerian Pertanian'
             WHEN s.npsn IN ('10110454', '30108179', '10308148', '40313544', 
             '20407427', '10814611', '20238524', '20238524') THEN 'Kementerian Perindustrian'
             WHEN s.npsn IN ('69924881','69769420','69772845','10112822','10310815',
                 '30112509','60404134','69787011','60104523') THEN 'Kementerian Kelautan dan Perikanan'
             ELSE 'Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi' 
         END AS kementerian_pembina,
         CASE WHEN s.status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_sekolah     
         FROM ods2.bid2.sekolah s 
         LEFT JOIN ref.bentuk_pendidikan b ON b.bentuk_pendidikan_id = s.bentuk_pendidikan_id 
         LEFT JOIN ref.status_kepemilikan k ON k.status_kepemilikan_id = s.status_kepemilikan_id  
         WHERE npsn = :npsn: AND s.soft_delete=0";         

        // $sql = "SELECT s.*, CASE WHEN npyp IS NULL THEN '-' ELSE npyp END AS npyp, 
        //  CASE WHEN s.bentuk_pendidikan_id IN (9,10,16,17,34,36,37,38,56,39,41,57,58,59,
        //          60,44,45,61,62,63,64,65) THEN 'Kementerian Agama'
        //      WHEN s.npsn IN ('10646356', '30314295', '69734022') THEN 'Kementerian Pertanian'
        //      WHEN s.npsn IN ('10110454', '30108179', '10308148', '40313544', 
        //      '20407427', '10814611', '20238524', '20238524') THEN 'Kementerian Perindustrian'
        //      WHEN s.npsn IN ('69924881','69769420','69772845','10112822','10310815',
        //          '30112509','60404134','69787011','60104523') THEN 'Kementerian Kelautan dan Perikanan'
        //      ELSE 'Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi' 
        //  END AS kementerian_pembina, y.nama as nama_yayasan,
        //  CASE WHEN y.kode_wilayah IS NULL THEN '-' ELSE y.kode_wilayah END AS kode_wilayah_yayasan     
        //  FROM Datamart.datamart.sekolah s 
        //  LEFT JOIN Arsip.dbo.yayasan y ON y.yayasan_id = s.yayasan_id 
        //  WHERE npsn = :npsn:";

        $query = $this->db->query($sql, [
            'npsn'  => $kode
        ]);

        $this->db = \Config\Database::connect("");

        return $query;
    }

    public function getYayasanId($kode)
    {
        // $this->db = \Config\Database::connect("dbnpsn");

        $sql = "SELECT * FROM Arsip.dbo.sekolah 
         WHERE npsn = :npsn:";

        // $sql = "SELECT * FROM [ods2].[bid2].[sekolah] 
        // WHERE npsn = :npsn:";

        $query = $this->db->query($sql, [
            'npsn'  => $kode
        ]);
        
        $this->db = \Config\Database::connect("");

        return $query;
    }

    public function getCariNamaAtauNPSN_Sekunder($kode)
    {
        $sql = "SELECT * FROM Datamart.datamart.sekolah 
         WHERE npsn = :npsn:";

        $query = $this->db->query($sql, [
            'npsn'  => $kode
        ]);

        return $query;
    }

    public function getAkreditasi($sekolah_id)
    {
        $this->db = \Config\Database::connect("");
        
        $sql = " select sekolah_id, tahun, r.nama as akreditasi from Arsip.dbo.akreditasi a 
        left join Referensi.ref.akreditasi r ON r.akreditasi_id = a.akreditasi_id 
        where sekolah_id=:sekolah_id:   
        group by sekolah_id,tanggal_sk,tahun,nama,a.last_sync 
		order by a.last_sync desc";

        $query = $this->db->query($sql, [
            'sekolah_id'  => $sekolah_id
        ]);

        return $query;
    }

    public function getFileSK($sekolahid)
    {

        $this->db = \Config\Database::connect("dbnpsn");

        $sql = "SELECT MAX(insert_date) as tgl_path,  MAX(pathfile) as pathfile, sekolah_id 
        FROM bid2.skoperasional 
        WHERE soft_delete = 0 AND sekolah_id = :sekolahid: 
        GROUP BY sekolah_id";

        $query = $this->db->query($sql, [
                'sekolahid'  => $sekolahid
            ]);

        if (!$query)
        {
            $this->db = \Config\Database::connect("");
            $query = $this->db->query("select * from Arsip.dbo.yayasan where nama='9999999'");
        }

        return $query;
    }

    public function getYayasan($yayasanid)
    {
        
        $sql = "SELECT * 
        FROM Arsip.dbo.yayasan  
        WHERE yayasan_id = :yayasanid:";

        $query = $this->db->query($sql, [
                'yayasanid'  => $yayasanid
            ]);

        if (!$query)
        {
            $this->db = \Config\Database::connect("");
            $query = $this->db->query("select * from Arsip.dbo.yayasan where nama='9999999'");
        }

        return $query;
    }

    public function getDataWilayah($kodwil)
    {
        $sql = "select w1.nama as kecamatan, w2.nama as kota, w3.nama as propinsi, w1.id_level_wilayah, w1.mst_kode_wilayah, w1.kode_wilayah 
		from Referensi.ref.mst_wilayah w1, Referensi.ref.mst_wilayah w2, Referensi.ref.mst_wilayah w3 
		where w1.kode_wilayah = :kodwil: and (w1.mst_kode_wilayah = w2.kode_wilayah) and 
		(w2.mst_kode_wilayah = w3.kode_wilayah)
		order by w1.id_level_wilayah, w2.nama, w1.nama";

        $query = $this->db->query($sql, [
            'kodwil'  => substr($kodwil,0,6)
        ]);

        return $query;
    }

    public function getCariDaftarSekolah($kode)
    {
        // $keywordsMany = explode(' ',$kode);
        $this->db = \Config\Database::connect("dbnpsn");

        $isiwhere = "s.nama like :kode:";
		// for ($a=0;$a<count($keywordsMany);$a++) {
		// 	$isiwhere = $isiwhere . " OR s.nama like '%".$keywordsMany[$a]."%'";
		// }
        $isiwhere = $isiwhere." OR npsn like :kode:";
		// for ($a=0;$a<count($keywordsMany);$a++) {
		// 	$isiwhere = $isiwhere . " OR npsn like '%".$keywordsMany[$a]."%'";
		// }
        
        // -- FROM [Arsip].[dbo].[sekolah] s 
        $sql = "SELECT TOP 3000 s.nama, s.npsn,s.alamat_jalan,s.desa_kelurahan, 
        CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl, 
        b.nama as bentuk_pendidikan 
        FROM [ods2].[bid2].[sekolah] s
        JOIN ref.bentuk_pendidikan b ON b.bentuk_pendidikan_id = s.bentuk_pendidikan_id 
        WHERE soft_delete=0 AND ($isiwhere)"; 

        $query = $this->db->query($sql,[
            'kode'  => "%".$kode."%"
        ]);

        return $query;
    }

    public function getOperatorSekolah($npsn)
    {
        $sql = "SELECT p.*  
            FROM sdm.dbo.pengguna p
            JOIN sdm.dbo.instansi_pengguna ip ON p.pengguna_id=ip.pengguna_id
            JOIN sdm.dbo.instansi i ON i.instansi_id=ip.instansi_id
            WHERE p.status_approval=1 
                AND p.soft_delete=0
                AND ip.soft_delete=0
                AND i.soft_delete=0 
                AND i.jenis_instansi_id=5
                AND kode_instansi=:npsn:";

        $query = $this->db->query($sql,[
            'npsn'  => $npsn
        ]);

        return $query;
    }

    public function getCariDaftarYayasan($kode)
    {
        $this->db = \Config\Database::connect("");
        // $keywordsMany = explode(' ',$kode);
        $isiwhere = "s.nama like :kode:";
		// for ($a=0;$a<count($keywordsMany);$a++) {
		// 	$isiwhere = $isiwhere . " OR s.nama like '%".$keywordsMany[$a]."%'";
		// }
        $isiwhere = $isiwhere." OR npyp like :kode:";
		// for ($a=0;$a<count($keywordsMany);$a++) {
		// 	$isiwhere = $isiwhere . " OR npsn like '%".$keywordsMany[$a]."%'";
		// }
        
        // FROM [Arsip].[dbo].[yayasan] s 
        $sql = "SELECT TOP 5000 s.nama, s.npyp, s.yayasan_id, s.alamat_jalan,s.desa_kelurahan,
        CASE WHEN RTRIM(LTRIM(s.nama))=:kode2: THEN '0' ELSE '1' END AS tepat 
        FROM [Arsip].[dbo].[yayasan] s
        WHERE soft_delete=0 AND ($isiwhere) 
        ORDER BY tepat";
       
        $query = $this->db->query($sql,[
            'kode'  => "%".$kode."%",
            'kode2'  => $kode,
        ]);

        return $query;
    }

    public function getLayananSekolah($idsekolah)
    {
        // $this->db = \Config\Database::connect("dbproses");
        $sql = "select *  
        from [Dataprocess].[dbo].[sekolah_jenis_layanan]
        where sekolah_id='".$idsekolah."'";

        $query = $this->db->query($sql);

        return $query;
    }

    public function setTotalPendidikan($level)
    {
        
        // $sql0 = "CREATE TABLE Dataprocess.dev.satuan_pendidikan_lv3 (
        //     ID int NOT NULL,";
        // for ($a=1;$a<=72;$a++)
        // {
        //     $sql0=$sql0."bp".$a." int NOT NULL,";
        // }
        // $sql0=$sql0."kode_wilayah char(8),
        //     PRIMARY KEY (ID)
        // );";

        // $this->db = \Config\Database::connect("dbproses");

        $level=intval($level);
        $nkar = $level*2;

        $sql0 = "TRUNCATE TABLE Dataprocess.dev.satuan_pendidikan_lv".$level;
        $this->db->query($sql0);
        $sql1 = "DBCC CHECKIDENT ('Dataprocess.dev.satuan_pendidikan_lv".$level."', RESEED, 0)";
        $this->db->query($sql1);

        

        $sql2 = "SELECT ";
        for ($a=1;$a<=72;$a++)
        {
            $sql2=$sql2." SUM(CASE WHEN s.bentuk_pendidikan_id=".$a." THEN 1 ELSE 0 END) bpi".$a.", ";
        }
        $sql2 = $sql2 . "w.nama, w.kode_wilayah, s.status_sekolah
        FROM Arsip.dbo.sekolah s 
        JOIN Referensi.ref.mst_wilayah w ON LEFT(w.kode_wilayah,".$nkar.")=LEFT(s.kode_wilayah,".$nkar.") 
        WHERE s.soft_delete=0 AND id_level_wilayah=".$level." 
        GROUP BY w.nama, w.kode_wilayah, w.mst_kode_wilayah, s.status_sekolah";

        // $query = $this->db->get();

        $query = $this->db->query($sql2);
        
        $jalankan=false;

        if ($jalankan) // if result found
        {
            $row = $query->getResult('array'); // get result in an array format
            $data = array();
            $nomor=0;
            foreach($row as $values){
                $nomor++;
                $data = [];
                for ($b=1;$b<=72;$b++)
                {
                    $data['bp'.$b] = $values['bpi'.$b];
                }
                $data['kode_wilayah'] = $values['kode_wilayah'];
                $sql3 = "INSERT INTO Dataprocess.dev.satuan_pendidikan_lv".$level." (";
                for ($c=1;$c<=71;$c++)
                {
                    $sql3=$sql3."bp".$c.",";
                }
                $sql3=$sql3."bp72,kode_wilayah,nama,status_sekolah_id) VALUES (";
                for ($c=1;$c<=71;$c++)
                {
                    $sql3=$sql3.$values['bpi'.$c].",";
                }
                $sql3=$sql3.$values['bpi'.$c].",'".$values['kode_wilayah']."','".$values['nama']."','".$values['status_sekolah']."');";
                $query = $this->db->query($sql3);
             }
         }

         $this->db = \Config\Database::connect("");
     

        // echo "<pre>";
        // echo var_dump($query->getResult());
        // echo "</pre>";
    }

    public function getpengunjung($ip, $date)
    {
        // $this->db = \Config\Database::connect("dbproses");
        $sql = "SELECT * FROM Dataprocess.dev.statdataref 
        WHERE ip='".$ip."' AND date='".$date."'";
        // echo $sql;
        $query = $this->db->query($sql)->getResult();
        $this->db = \Config\Database::connect("");
        return $query;
    }

    public function addpengunjung($ip, $date, $waktu, $timeinsert, $regionname, $city, $mobile)
    {
        // $this->db = \Config\Database::connect("dbproses");
        $this->db->query("INSERT INTO Dataprocess.dev.statdataref (ip, date, hits, online, time, regionname, city, device) 
        VALUES('".$ip."','".$date."','1','".$waktu."','".$timeinsert."','".$regionname."','".$city."','".$mobile."')");
        $this->db = \Config\Database::connect("");
    }

    public function updatepengunjung($ip, $date, $waktu)
    {
        // $this->db = \Config\Database::connect("dbproses");
        $this->db->query("UPDATE Dataprocess.dev.statdataref SET hits=hits+1, online='".$waktu."' 
        WHERE ip='".$ip."' AND date='".$date."'");
        $this->db = \Config\Database::connect("");
    }

    public function jmlpengunjungharini($date)
    {
        // $this->db = \Config\Database::connect("dbproses");
        // $query = $this->db->query("SELECT ip, date, hits, online, regionname, city, device FROM Dataprocess.dev.statdataref 
        // WHERE date='".$date."' GROUP BY ip, date, hits, online, regionname, city, device")->getResult();
        // return $query;
        $sql = "select max(date) as date, count(*) as pengunjung 
        from [Dataprocess].[dev].[statdataref] 
        where date = :date: 
        group by datepart(day, date)";
       
        $query = $this->db->query($sql,[
            'date'  => $date,
        ]);


        return $query->getRow();
        
    }

    public function jmlpengunjungbulanini($tahun, $bulan)
    {
        // $this->db = \Config\Database::connect("dbproses");
        $sql = "select month(date) as bulan, count(*) as pengunjung 
        from [Dataprocess].[dev].[statdataref] 
        where year(date)=:tahun: AND month(date)=:bulan: 
        group by datepart(month, date),month(date)";
       
        $query = $this->db->query($sql,[
            'tahun'  => $tahun,
            'bulan'  => $bulan
        ]);

        return $query->getRow();
    }

    public function jmlmobilebulanini($tahun, $bulan)
    {
        // $this->db = \Config\Database::connect("dbproses");
        $sql = "select month(date) as bulan, 
        SUM(CASE WHEN device='mobile' THEN 1 ELSE 0 END) as total_mobile, 
        SUM(CASE WHEN device='komputer' THEN 1 ELSE 0 END) as total_komputer 
        from [Dataprocess].[dev].[statdataref] 
        where year(date)=:tahun: AND month(date)=:bulan: 
        group by datepart(month, date),month(date)";
       
        $query = $this->db->query($sql,[
            'tahun'  => $tahun,
            'bulan'  => $bulan
        ]);

        return $query->getRow();
    }
    

    public function totalpengunjung()
    {
        // $this->db = \Config\Database::connect("dbproses");
        $query = $this->db->query("SELECT COUNT(hits) as hits 
        FROM Dataprocess.dev.statdataref")->getRow();
        return $query;
    }

    public function pengunjungonline($bataswaktu)
    {
        // $this->db = \Config\Database::connect("dbproses");
        $query = $this->db->query("SELECT * FROM Dataprocess.dev.statdataref 
        WHERE online > '".$bataswaktu."'")->getResult();
        
        return $query;
    }    

    public function cek_pengunjung_kemarin()
    {
        // $this->db = \Config\Database::connect("dbproses");
        $tglkemarin = date('Y-m-d',strtotime("-1 days"));
        $sql = "select *  
        from [Dataprocess].[dev].[rekapdatarefharian] 
        where tanggal='".$tglkemarin."'";

        //AND convert(varchar(10), tanggal, 102)<convert(varchar(10), getdate(), 102) 
       
        $query = $this->db->query($sql);

        return $query->getRow();
    }

    public function cek_pengunjung_bulan_kemarin()
    {
        $bulan  = date("n");
        $tahun = date("Y");
        $bulankemarin = $bulan-1;
        if ($bulankemarin==0)
        {
            $bulankemarin = 12;
            $tahun--;
        }

        // $this->db = \Config\Database::connect("dbproses");

        $sql = "select * 
        from [Dataprocess].[dev].[rekapdatarefbulanan] 
        where bulan='".$bulankemarin."' AND tahun='".$tahun."'";

        //AND convert(varchar(10), tanggal, 102)<convert(varchar(10), getdate(), 102) 
       
        $query = $this->db->query($sql);

        return $query->getRow();
    }

    public function getdata_pengunjung_harian($tahun,$bulan)
    {
        // $this->db = \Config\Database::connect("dbproses");

        $sql = "select tanggal as date, jumlah as pengunjung 
        from [Dataprocess].[dev].[rekapdatarefharian] 
        where year(tanggal) = :tahun: AND month(tanggal) = :bulan: 
		order by tanggal";

        //AND convert(varchar(10), tanggal, 102)<convert(varchar(10), getdate(), 102) 
       
        $query = $this->db->query($sql,[
            'tahun'  => $tahun,
            'bulan'  => $bulan
        ]);

        return $query->getResult();
    }

    public function getdata_pengunjung_bulanan($tahun)
    {
        // $this->db = \Config\Database::connect("dbproses");

        $sql = "select bulan, jumlah as pengunjung 
        from [Dataprocess].[dev].[rekapdatarefbulanan] 
        where tahun=:tahun: 
        order by bulan";
       
        $query = $this->db->query($sql,[
            'tahun'  => $tahun
        ]);

        return $query->getResult();
    }

    public function setdatapengunjungharian($tahun, $bulan)
    {

        // $sql0 = "TRUNCATE TABLE Dataprocess.dev.rekapdatarefharian";
        // $this->db->query($sql0);

        // $this->db = \Config\Database::connect("dbproses");
        
        $sql = "select date, count(*) as pengunjung 
        from [Dataprocess].[dev].[statdataref] 
        where date=".$tglkemarin."  
        group by datepart(day, date), date order by date";
       
        $query = $this->db->query($sql,[
            'tahun'  => $tahun,
            'bulan'  => $bulan
        ]);

        $row = $query->getResult('array'); // get result in an array format
        $data = array();
        foreach($row as $values){
            $sql2 = "INSERT INTO Dataprocess.dev.rekapdatarefharian (tanggal,jumlah) 
            VALUES ('".$values['date']."',".$values['pengunjung'].")";
            
            $query2 = $this->db->query($sql2);
            }

    }

    public function setdatapengunjungkemarin()
    {

        // $sql0 = "TRUNCATE TABLE Dataprocess.dev.rekapdatarefharian";
        // $this->db->query($sql0);
        $tglkemarin = date('Y-m-d',strtotime("-1 days"));

        // $this->db = \Config\Database::connect("dbproses");
        
        $sql = "select date, count(*) as pengunjung 
        from [Dataprocess].[dev].[statdataref] 
        where date='".$tglkemarin."'  
        group by datepart(day, date), date order by date";
       
        $query = $this->db->query($sql);

        $row = $query->getResult('array'); // get result in an array format
        $data = array();
        foreach($row as $values){
            $sql2 = "INSERT INTO Dataprocess.dev.rekapdatarefharian (tanggal,jumlah) 
            VALUES ('".$values['date']."',".$values['pengunjung'].")";
            
            $query2 = $this->db->query($sql2);
            }

    }

    public function setdatapengunjungbulankemarin()
    {
        $bulan  = date("n");
        $tahun = date("Y");
        $bulankemarin = $bulan-1;
        if ($bulankemarin==0)
        {
            $bulankemarin = 12;
            $tahun--;
        }

        // $this->db = \Config\Database::connect("dbproses");

        $sql = "select month(date) as bulan, count(*) as pengunjung 
        from [Dataprocess].[dev].[statdataref] 
        where year(date)=:tahun: AND month(date)=:bulankemarin:  
        group by datepart(month, date),month(date)";
       
        $query = $this->db->query($sql,[
            'tahun'  => $tahun,
            'bulankemarin'  => $bulankemarin
        ]);

        $row = $query->getResult('array'); // get result in an array format
        $data = array();
        foreach($row as $values){
            $sql2 = "INSERT INTO Dataprocess.dev.rekapdatarefbulanan (bulan,tahun,jumlah) 
            VALUES (".$bulankemarin.",".$tahun.",".$values['pengunjung'].")";
            
            $query2 = $this->db->query($sql2);
            }

    }

    // public function getdata_pengunjung_harian_old($tahun,$bulan)
    // {
    //     $sql = "select date, count(*) as pengunjung 
    //     from [Dataprocess].[dev].[statdataref] 
    //     where year(date) = :tahun: AND month(date) = :bulan: AND date>'2022-09-27' 
    //     group by datepart(day, date), date order by date";
       
    //     $query = $this->db->query($sql,[
    //         'tahun'  => $tahun,
    //         'bulan'  => $bulan
    //     ]);

    //     return $query->getResult();
    // }

    // public function getdata_pengunjung_bulanan_old($tahun)
    // {
    //     $sql = "select month(date) as bulan, count(*) as pengunjung 
    //     from [Dataprocess].[dev].[statdataref] 
    //     where year(date)=:tahun: AND date>'2022-09-27' 
    //     group by datepart(month, date),month(date)";
       
    //     $query = $this->db->query($sql,[
    //         'tahun'  => $tahun
    //     ]);

    //     return $query->getResult();
    // }
    public function getkodesaved()
    {
        $sql="SELECT [kode_wilayah]
        FROM [Dataprocess].[dev].[areamapkabkota]
        group by kode_wilayah";
        $query = $this->db->query($sql);
        return $query->getResult();
    }

    public function getsemuakota()
    {
        $sql = "SELECT [kode_wilayah],[nama] FROM [Referensi].[ref].[mst_wilayah] where id_level_wilayah=2 ORDER BY kode_wilayah";
        $query = $this->db->query($sql);
        return $query->getResult();
    }

    public function getdatabesar($str, $kodewilayah)
    {
        $baris = 0;
        $myFile = site_url("/template/js/geojson_kabkot_indonesia.js");
        $lines = file($myFile);//file in to an array
        foreach ($lines as $lineNumber => $line) {
            $baris++;
            $kabkot = substr($str,0,3);
            $namasaja = substr($str,5);
            $str2 = str_replace(" ","",$str);
            $namasaja2 = strtolower(substr($str2,4));

            // echo "2".$poskabkot;
            // echo "3".$kabkot;
            // $line = str_replace(" ","",$line);
           
            if (strpos(strtolower($line), strtolower($namasaja)) !== false) {
                // echo "1".$namasaja;
                $poskabkot = substr($line,strpos($line, 'TYPE_2')+10,3);
                if ($poskabkot==$kabkot)
                {
                    // echo "Baris: ".$baris; 
                    $line = str_replace("[ [ [","[",$line);
                    $line = str_replace("[ [","[",$line);
                    $line = str_replace("] ] ]","]",$line);
                    $line = str_replace("] ]","]",$line);
                    $line = str_replace(" ","",$line);
                    $pos = strpos($line, 'coordinates')+13;
                    $line2 = substr($line,$pos,-4);
                    $batasakhir = strrpos($line2,"[");
                    $mulai=0;
                    $pos1=0;
                    $barisvalue=0;
                    echo $line2;
                    
                    while ($pos1<$batasakhir)
                    {
                        $barisvalue++;
                        if ($barisvalue==1)
                        {
                            $sudahjalan=0;
                            $sql="INSERT INTO Dataprocess.dev.areamapkabkota (kode_wilayah,lintang,bujur) VALUES ";
                        }
                        $pos1=strpos($line2, "[", $mulai);
                        $poskoma=strpos($line2, ",", $pos1);
                        $pos2=strpos($line2, "]", $poskoma);
                        $panjangkekoma=$poskoma-$pos1-1;
                        $panjangkepos2=$pos2-$poskoma-1;
                        // echo "POS [ = ".$pos1;
                        // echo "<br>POS , = ".$poskoma;
                        // echo "<br>POS ] = ".$pos2;
                        $lintang=substr($line2,$pos1+1,$panjangkekoma);
                        $bujur=substr($line2,$poskoma+1,$panjangkepos2);
                        $mulai=$pos2;
                        // echo ">".$lintang."<br>";
                        // echo ">".$bujur."<br>";
                        $sql = $sql."('".$kodewilayah."',".$lintang.",".$bujur."),";
                        if ($barisvalue==999)
                        {
                            $sudahjalan=1;
                            $sql = substr($sql,0,-1);
                            $query = $this->db->query($sql);
                            $barisvalue=0;
                        }
                    }

                    if ($barisvalue>0 && $sudahjalan==0)
                    {
                        $sql = substr($sql,0,-1);
                        $query = $this->db->query($sql);
                    }

                    // echo substr($sql,0,-1);
                    
                    
                }
            }
        }

        // $sql = "
        // DECLARE @batch INT = 10000;
        // DECLARE @page INT = 0
        // DECLARE @lastCount INT = 1
        
        // WHILE @lastCount > 0
        // BEGIN
        // BEGIN TRANSACTION
        
        //     INSERT into table2
        //     SELECT col1, col2, ... -- list columns explicitly
        //     FROM    ( SELECT    ROW_NUMBER() OVER ( ORDER BY YourPrimaryKey ) AS RowNum, *
        //               FROM      table1
        //             ) AS RowConstrainedResult
        //     WHERE   RowNum >= (@page * @batch) AND RowNum < ((@page+1) * @batch)
        //     SET @lastCount = @@ROWCOUNT
        //     SET @page = @page + 1
        
        // COMMIT TRANSACTION
        
        // END";
       
        // $query = $this->db->query($sql);

        // return $query->getResult();
    }
    
}
