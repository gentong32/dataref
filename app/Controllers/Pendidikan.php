<?php

namespace App\Controllers;
use App\Models\DataModelPaud;
use App\Models\DataModelDikdas;
use App\Models\DataModelDikmen;
use App\Models\DataModelDikti;
use App\Models\DataModelDikmas;

class Pendidikan extends BaseController
{
    function __construct() {
        $this->datamodelpaud = new DataModelPaud();
        $this->datamodeldikdas = new DataModelDikdas();
        $this->datamodeldikmen = new DataModelDikmen();
        $this->datamodeldikti = new DataModelDikti();
        $this->datamodeldikmas = new DataModelDikmas();
    }

    public function index()
    {
        //redirect(site_url()."pendidikan/paud/000000/0/all/all/all");
    }

    public function paud($kode='000000', $level=0, $jalur="all", $bentuk="all", $status="all")
    {
        $data['tingkat'] = "paud";
        $data['kode'] = $kode;
        $data['level'] = $level;
        $data['jalur'] = $jalur;
        $data['bentuk'] = $bentuk;
        $data['status'] = $status;

        if ($level==0) {
            $data['namapilihan'] = "PROPINSI";
        }
        else {
            $namapilihan = $this->datamodelpaud->getNamaPilihan($kode);
            $resultquery = $namapilihan->getResult();
            $data['namapilihan'] = strToUpper($resultquery[0]->nama);
        }

        $namalevel1 = $this->datamodelpaud->getNamaPilihan(substr($kode,0,2)."0000");
        $result1 = $namalevel1->getResult();
        $data['namalevel1'] = $result1[0]->nama;
        $namalevel2 = $this->datamodelpaud->getNamaPilihan(substr($kode,0,4)."00");
        $result2 = $namalevel2->getResult();
        $data['namalevel2'] = $result2[0]->nama;
        $namalevel3 = $this->datamodelpaud->getNamaPilihan(substr($kode,0,6));
        $result3 = $namalevel3->getResult();
        $data['namalevel3'] = $result3[0]->nama;

        if ($bentuk=="all") {
            $namabentuk = "";
        }
        else {
            $querybentuk = $this->datamodelpaud->getBentukPendidikan($bentuk);
            $hasilbentuk=$querybentuk->getRow();
            $namabentuk = $hasilbentuk->nama; 
        }

        $querybentuk = $this->datamodelpaud->getDaftarBentukPaudTK($jalur);

        $data['daftarbentuk'] = $querybentuk->getResult();
        $data['namabentuk'] = $namabentuk;

        
        if ($level<3) {
            $query = $this->datamodelpaud->getTotalPaud($status,$kode,$level, $jalur, $bentuk);
            $data['datanas'] = $query->getResult();
            return view('pendidikan/data_nasional_paud', $data);
        }
        else
        {
            $kodebaru = substr($kode,0,6);
            $query = $this->datamodelpaud->getDaftarSekolahPaudTK($status,$kodebaru,$jalur,$bentuk);
            $data['datanas'] = $query->getResult();
            return view('pendidikan/daftar_sekolah', $data);       
        }
    }

    public function dikdas($kode='000000', $level=0, $jalur="all", $bentuk="all", $status="all")
    {
        $data['tingkat'] = "dikdas";
        $data['kode'] = $kode;
        $data['level'] = $level;
        $data['jalur'] = $jalur;
        $data['bentuk'] = $bentuk;
        $data['status'] = $status;

        if ($level==0) {
            $data['namapilihan'] = "PROPINSI";
        }
        else {
            $namapilihan = $this->datamodeldikdas->getNamaPilihan($kode);
            $resultquery = $namapilihan->getResult();
            $data['namapilihan'] = strToUpper($resultquery[0]->nama);
        }


        $namalevel1 = $this->datamodeldikdas->getNamaPilihan(substr($kode,0,2)."0000");
        $result1 = $namalevel1->getResult();
        $data['namalevel1'] = $result1[0]->nama;
        $namalevel2 = $this->datamodeldikdas->getNamaPilihan(substr($kode,0,4)."00");
        $result2 = $namalevel2->getResult();
        $data['namalevel2'] = $result2[0]->nama;
        $namalevel3 = $this->datamodeldikdas->getNamaPilihan(substr($kode,0,6));
        $result3 = $namalevel3->getResult();
        $data['namalevel3'] = $result3[0]->nama;

        

        if ($bentuk=="all") {
            $namabentuk = "";
        }
        else {
            $querybentuk = $this->datamodeldikdas->getBentukPendidikan($bentuk);
            $hasilbentuk=$querybentuk->getRow();
            $namabentuk = $hasilbentuk->nama; 
        }

        

        $querybentuk = $this->datamodeldikdas->getDaftarBentukDikdas($jalur);
        $data['daftarbentuk'] = $querybentuk->getResult();
        $data['namabentuk'] = $namabentuk;

        if ($level<3) {
            $query = $this->datamodeldikdas->getTotalDikdas($status,$kode,$level, $jalur, $bentuk);
            $data['datanas'] = $query->getResult();
            return view('pendidikan/data_nasional_dikdas', $data);
        }
        else
        {
            $kodebaru = substr($kode,0,6);
            $query = $this->datamodeldikdas->getDaftarSekolahDikdas($status,$kodebaru,$jalur,$bentuk);
            $data['datanas'] = $query->getResult();
            return view('pendidikan/daftar_sekolah', $data);       
        }

    }

    public function dikmen($kode='000000', $level=0, $jalur="all", $bentuk="all", $status="all")
    {
        $data['tingkat'] = "dikmen";
        $data['kode'] = $kode;
        $data['level'] = $level;
        $data['jalur'] = $jalur;
        $data['bentuk'] = $bentuk;
        $data['status'] = $status;

        if ($level==0) {
            $data['namapilihan'] = "PROPINSI";
        }
        else {
            $namapilihan = $this->datamodeldikmen->getNamaPilihan($kode);
            $resultquery = $namapilihan->getResult();
            $data['namapilihan'] = strToUpper($resultquery[0]->nama);
        }

        $namalevel1 = $this->datamodeldikmen->getNamaPilihan(substr($kode,0,2)."0000");
        $result1 = $namalevel1->getResult();
        $data['namalevel1'] = $result1[0]->nama;
        $namalevel2 = $this->datamodeldikmen->getNamaPilihan(substr($kode,0,4)."00");
        $result2 = $namalevel2->getResult();
        $data['namalevel2'] = $result2[0]->nama;
        $namalevel3 = $this->datamodeldikmen->getNamaPilihan(substr($kode,0,6));
        $result3 = $namalevel3->getResult();
        $data['namalevel3'] = $result3[0]->nama;

        if ($bentuk=="all") {
            $namabentuk = "";
        }
        else {
            $querybentuk = $this->datamodeldikmen->getBentukPendidikan($bentuk);
            $hasilbentuk=$querybentuk->getRow();
            $namabentuk = $hasilbentuk->nama;
            
        }

        $querybentuk = $this->datamodeldikmen->getDaftarBentukDikmen($jalur);
        $data['daftarbentuk'] = $querybentuk->getResult();
        $data['namabentuk'] = $namabentuk;
        

        if ($level<3) {
            $query = $this->datamodeldikmen->getTotalDikmen($status,$kode,$level, $jalur, $bentuk);
            $data['datanas'] = $query->getResult();
            return view('pendidikan/data_nasional_dikmen', $data);
        }
        else
        {
            $kodebaru = substr($kode,0,6);
            $query = $this->datamodeldikmen->getDaftarSekolahDikmen($status,$kodebaru,$jalur,$bentuk);
            $data['datanas'] = $query->getResult();
            return view('pendidikan/daftar_sekolah', $data);       
        }

    }

    public function dikti($kode='000000', $level=0, $jalur="all", $bentuk="all", $status="all")
    {
        $data['tingkat'] = "dikti";
        $data['kode'] = $kode;
        $data['level'] = $level;
        $data['jalur'] = $jalur;
        $data['bentuk'] = $bentuk;
        $data['status'] = $status;

        if ($level==0) {
            $data['namapilihan'] = "PROPINSI";
        }
        else {
            $namapilihan = $this->datamodeldikti->getNamaPilihan($kode);
            $resultquery = $namapilihan->getResult();
            $data['namapilihan'] = strToUpper($resultquery[0]->nama);
        }

        $namalevel1 = $this->datamodeldikti->getNamaPilihan(substr($kode,0,2)."0000");
        $result1 = $namalevel1->getResult();
        $data['namalevel1'] = $result1[0]->nama;
        $namalevel2 = $this->datamodeldikti->getNamaPilihan(substr($kode,0,4)."00");
        $result2 = $namalevel2->getResult();
        $data['namalevel2'] = $result2[0]->nama;
        $namalevel3 = $this->datamodeldikti->getNamaPilihan(substr($kode,0,6));
        $result3 = $namalevel3->getResult();
        $data['namalevel3'] = $result3[0]->nama;

        if ($bentuk=="all") {
            $namabentuk = "";
        }
        else {
            $querybentuk = $this->datamodeldikti->getBentukPendidikan($bentuk);
            $hasilbentuk=$querybentuk->getRow();
            $namabentuk = $hasilbentuk->nama; 
        }

        $querybentuk = $this->datamodeldikti->getDaftarBentukDikti($jalur);
        $data['daftarbentuk'] = $querybentuk->getResult();
        $data['namabentuk'] = $namabentuk;

        if ($level<3) {
            $query = $this->datamodeldikti->getTotalDikti($status,$kode,$level, $jalur, $bentuk);
            $data['datanas'] = $query->getResult();
            return view('pendidikan/data_nasional_dikti', $data);
        }
        else
        {
            $kodebaru = substr($kode,0,6);
            $query = $this->datamodeldikti->getDaftarSekolahDikti($status,$kodebaru,$jalur,$bentuk);
            $data['datanas'] = $query->getResult();
            return view('pendidikan/daftar_sekolah', $data);       
        }

    }

    public function dikmas($kode='000000', $level=0, $jalur="all", $bentuk="all", $status="all")
    {
        $data['tingkat'] = "dikmas";
        $data['kode'] = $kode;
        $data['level'] = $level;
        $data['jalur'] = $jalur;
        $data['bentuk'] = $bentuk;
        $data['status'] = $status;

        if ($level==0) {
            $data['namapilihan'] = "PROPINSI";
        }
        else {
            $namapilihan = $this->datamodeldikmas->getNamaPilihan($kode);
            $resultquery = $namapilihan->getResult();
            $data['namapilihan'] = strToUpper($resultquery[0]->nama);
        }

        $namalevel1 = $this->datamodeldikmas->getNamaPilihan(substr($kode,0,2)."0000");
        $result1 = $namalevel1->getResult();
        $data['namalevel1'] = $result1[0]->nama;
        $namalevel2 = $this->datamodeldikmas->getNamaPilihan(substr($kode,0,4)."00");
        $result2 = $namalevel2->getResult();
        $data['namalevel2'] = $result2[0]->nama;
        $namalevel3 = $this->datamodeldikmas->getNamaPilihan(substr($kode,0,6));
        $result3 = $namalevel3->getResult();
        $data['namalevel3'] = $result3[0]->nama;

        if ($bentuk=="all") {
            $namabentuk = "";
        }
        else {
            $querybentuk = $this->datamodeldikmas->getBentukPendidikan($bentuk);
            $hasilbentuk=$querybentuk->getRow();
            $namabentuk = $hasilbentuk->nama; 
        }

        $querybentuk = $this->datamodeldikmas->getDaftarBentukDikmas($jalur);
        $data['daftarbentuk'] = $querybentuk->getResult();
        $data['namabentuk'] = $namabentuk;

        if ($level<3) {
            $query = $this->datamodeldikmas->getTotalDikmas($status,$kode,$level, $jalur, $bentuk);
            $data['datanas'] = $query->getResult();
            return view('pendidikan/data_nasional_dikmas', $data);
        }
        else
        {
            $kodebaru = substr($kode,0,6);
            $query = $this->datamodeldikmas->getDaftarSekolahDikmas($status,$kodebaru,$jalur,$bentuk);
            $data['datanas'] = $query->getResult();
            return view('pendidikan/daftar_sekolah', $data);       
        }

    }

    public function npsn($kode)
    {
        $sql   = "SELECT max(ak.tahun) as tahun,s.sk_izin_operasional,s.tanggal_sk_izin_operasional,
        s.tanggal_sk_pendirian,s.sk_pendirian_sekolah,s.yayasan_id, s.lintang, s.bujur,
        s.kode_wilayah,s.nama as nama_sekolah,s.npsn,s.alamat_jalan, ra.nama as akreditasi,
        s.desa_kelurahan, k.nama as naungan, s.luas_tanah_milik, s.luas_tanah_bukan_milik, 
        CASE WHEN status_sekolah=1 THEN 'NEGERI' ELSE 'SWASTA' END AS status_skl, b.nama as bentuk_pendidikan, 
        CASE WHEN npyp IS NULL THEN '-' ELSE npyp END AS npyp, 
        CASE WHEN s.bentuk_pendidikan_id IN (9,10,16,17,34,36,37,38,56,39,41,57,58,59,
                60,44,45,61,62,63,64,65) THEN 'Kementerian Agama'
            WHEN s.npsn IN ('10646356', '30314295', '69734022') THEN 'Kementerian Pertanian'
            WHEN s.npsn IN ('10110454', '30108179', '10308148', '40313544', 
            '20407427', '10814611', '20238524') THEN 'Kementerian Perindustrian'
            WHEN s.npsn IN ('69924881','69769420','69772845','10112822','10310815',
                '30112509','60404134','69787011','60104523') THEN 'Kementerian Kelautan dan Perikanan'
            ELSE 'Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi' 
        END AS kementerian_pembina,
        CASE WHEN y.kode_wilayah IS NULL THEN '-' ELSE y.kode_wilayah END AS kode_wilayah_yayasan     
        FROM Arsip.dbo.sekolah s 
		JOIN Referensi.ref.bentuk_pendidikan b ON b.bentuk_pendidikan_id = s.bentuk_pendidikan_id 
        JOIN Referensi.ref.status_kepemilikan k ON k.status_kepemilikan_id = s.status_kepemilikan_id 
        LEFT JOIN Arsip.dbo.yayasan y ON y.yayasan_id = s.yayasan_id 
        LEFT JOIN Arsip.dbo.akreditasi ak ON ak.sekolah_id = s.sekolah_id 
        LEFT JOIN Referensi.ref.akreditasi ra ON ra.akreditasi_id = ak.akreditasi_id
		WHERE npsn = :npsn:  
		GROUP BY s.sk_izin_operasional,s.tanggal_sk_pendirian,s.sk_pendirian_sekolah,
        s.yayasan_id,s.alamat_jalan,s.desa_kelurahan,y.kode_wilayah,s.lintang, s.bujur,
        s.kode_wilayah,npyp,b.nama,status_sekolah,k.nama,s.nama,s.sekolah_id,
        s.master,s.aktif, s.nama, s.npsn,  s.bentuk_pendidikan_id, ra.nama, 
        s.tanggal_sk_izin_operasional,s.luas_tanah_milik,s.luas_tanah_bukan_milik,
        s.status_kepemilikan_id, s.yayasan_id ";

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
                $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s 
                WHERE (".$this->datamodelpaud->getbentukpaudsemua().")";
            }
            else if ($tingkat=="DIKDAS")
            {
                $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s 
                WHERE (".$this->datamodeldikdas->getbentukdikdassemua().")";
            }
            else if ($tingkat=="DIKMEN")
            {
                $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s
                WHERE (".$this->datamodeldikmen->getbentukdikmensemua().")";
            }
            else if ($tingkat=="DIKTI")
            {
                $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s
                WHERE (".$this->datamodeldikti->getbentukdiktisemua().")";
            }
            else if ($tingkat=="DIKMAS")
            {
                $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s
                WHERE (".$this->datamodeldikmas->getbentukdikmassemua().")";
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
                if ($jalurpendidikan=="jf")
                    $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s
                    WHERE (".$this->datamodelpaud->getbentukpaudformal().")";
                else if ($jalurpendidikan=="jn")
                    $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s
                    WHERE (".$this->datamodelpaud->getbentukpaudnonformal().")";
                
            }
            else if ($tingkat=="DIKDAS")
            {
                $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s 
                WHERE (".$this->datamodeldikdas->getbentukdikdassemua().") AND LOWER(direktorat_pembinaan) = ".$pilihan;
            }
            else if ($tingkat=="DIKMEN")
            {
                if ($jalurpendidikan=="jf")
                    $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s
                    WHERE (".$this->datamodeldikmen->getbentukdikmenformal().")";
                else if ($jalurpendidikan=="jn")
                    $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s
                    WHERE (".$this->datamodeldikmen->getbentukdikmennonformal().")";
            }
            else if ($tingkat=="DIKTI")
            {
                if ($jalurpendidikan=="jf")
                    $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s
                    WHERE (".$this->datamodeldikti->getbentukdiktiformal().")";
                else if ($jalurpendidikan=="jn")
                    $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s
                    WHERE (".$this->datamodeldikti->getbentukdiktinonformal().")";
            }
            else if ($tingkat=="DIKMAS")
            {
                if ($jalurpendidikan=="jf")
                    $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s
                    WHERE (".$this->datamodeldikmas->getbentukdikmasformal().")";
                else if ($jalurpendidikan=="jn")
                    $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s
                    WHERE (".$this->datamodeldikmas->getbentukdikmasnonformal().")";
            }
        }
            
        $query = $this->db->query($sql);

        $isi = $query->getResult();
		echo json_encode($isi);
	}

    public function tes()
    {
        $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
        WHERE (".$this->datamodelpaud->getbentukpaudsemua().")";
        echo $sql;
    }
}
