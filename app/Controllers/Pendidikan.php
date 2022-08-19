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

        if ($bentuk=="all") {
            $namabentuk = "";
        }
        else {
            $querybentuk = $this->datamodeldikmas->getBentukPendidikan($bentuk);
            $hasilbentuk=$querybentuk->getRow();
            $namabentuk = $hasilbentuk->nama; 
        }

        $querybentuk = $this->datamodeldikmen->getDaftarBentukDikmen($jalur);
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
                $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s
                WHERE (".$this->datamodelpaud->getbentukpaudsemua().") AND LOWER(direktorat_pembinaan) = ".$pilihan;
            }
            else if ($tingkat=="DIKDAS")
            {
                $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] s 
                WHERE (".$this->datamodeldikdas->getbentukdikdassemua().") AND LOWER(direktorat_pembinaan) = ".$pilihan;
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

    public function tes()
    {
        $sql = "SELECT * FROM [Referensi].[ref].[bentuk_pendidikan] 
        WHERE (".$this->datamodelpaud->getbentukpaudsemua().")";
        echo $sql;
    }
}
