<?php

namespace App\Controllers;
use App\Models\DataModelPaud2;
use App\Models\DataModelDikdas2;
use App\Models\DataModelDikmen2;
use App\Models\DataModelDikti2;
use App\Models\DataModelDikmas2;
use App\Models\DataModelPendidikan;
use App\Models\DataModelYayasan;
use App\Models\DataModelProgram;
use App\Models\DataModelTidakAktif;

class Pendidikan extends BaseController
{
    function __construct() {
        $this->datamodelpaud = new DataModelPaud2();
        $this->datamodeldikdas = new DataModelDikdas2();
        $this->datamodeldikmen = new DataModelDikmen2();
        $this->datamodeldikti = new DataModelDikti2();
        $this->datamodeldikmas = new DataModelDikmas2();
        $this->datamodelpendidikan = new DataModelPendidikan();
        $this->datamodelyayasan = new DataModelYayasan();
        $this->datamodelprogram = new DataModelProgram();
        $this->datamodeltidakaktif = new DataModelTidakAktif();
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
            $data['namapilihan'] = "PROVINSI";
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
            $data['namapilihan'] = "PROVINSI";
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
            $data['namapilihan'] = "PROVINSI";
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
            $data['namapilihan'] = "PROVINSI";
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
            $data['namapilihan'] = "PROVINSI";
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

    public function yayasan($kode='000000', $level=0)
    {
        $data['tingkat'] = "yayasan";
        $data['kode'] = $kode;
        $data['level'] = $level;

        if ($level==0) {
            $data['namapilihan'] = "PROVINSI";
        }
        else {
            $namapilihan = $this->datamodelyayasan->getNamaPilihan($kode);
            $resultquery = $namapilihan->getResult();
            $data['namapilihan'] = strToUpper($resultquery[0]->nama);
        }

        $namalevel1 = $this->datamodelyayasan->getNamaPilihan(substr($kode,0,2)."0000");
        $result1 = $namalevel1->getResult();
        $data['namalevel1'] = $result1[0]->nama;
        $namalevel2 = $this->datamodelyayasan->getNamaPilihan(substr($kode,0,4)."00");
        $result2 = $namalevel2->getResult();
        $data['namalevel2'] = $result2[0]->nama;
        $namalevel3 = $this->datamodelyayasan->getNamaPilihan(substr($kode,0,6));
        $result3 = $namalevel3->getResult();
        $data['namalevel3'] = $result3[0]->nama;

        if ($level<3) {
            $query = $this->datamodelyayasan->getTotalYayasan($kode,$level);
            $data['datanas'] = $query->getResult();
            return view('pendidikan/data_nasional_yayasan', $data);
        }
        else
        {
            $kodebaru = substr($kode,0,6);
            $query = $this->datamodelyayasan->getDaftarYayasan($kodebaru);
            $data['datanas'] = $query->getResult();
            return view('pendidikan/daftar_yayasan', $data);       
        }

    }

    public function program($bentuk, $kode='000000', $level=0)
    {
        $data['tingkat'] = $bentuk;
        $data['kode'] = $kode;
        $data['level'] = $level;

        if ($level==0) {
            $data['namapilihan'] = "PROVINSI";
        }
        else {
            $namapilihan = $this->datamodelprogram->getNamaPilihan($kode);
            $resultquery = $namapilihan->getResult();
            $data['namapilihan'] = strToUpper($resultquery[0]->nama);
        }

        $namalevel1 = $this->datamodelprogram->getNamaPilihan(substr($kode,0,2)."0000");
        $result1 = $namalevel1->getResult();
        $data['namalevel1'] = $result1[0]->nama;
        $namalevel2 = $this->datamodelprogram->getNamaPilihan(substr($kode,0,4)."00");
        $result2 = $namalevel2->getResult();
        $data['namalevel2'] = $result2[0]->nama;
        $namalevel3 = $this->datamodelprogram->getNamaPilihan(substr($kode,0,6));
        $result3 = $namalevel3->getResult();
        $data['namalevel3'] = $result3[0]->nama;

        if ($level<3) {
            $query = $this->datamodelprogram->getTotalProgram($bentuk,$kode,$level);
            $data['datanas'] = $query->getResult();
            return view('pendidikan/data_nasional_program', $data);
        }
        else
        {
            $kodebaru = substr($kode,0,6);
            $query = $this->datamodelprogram->getDaftarProgram($bentuk,$kodebaru);
            $data['datanas'] = $query->getResult();
            return view('pendidikan/daftar_program', $data);
        }

    }

    public function kesetaraan($kode='000000', $level=0, $status="all")
    {
        $data['tingkat'] = "kesetaraan";
        $data['kode'] = $kode;
        $data['level'] = $level;
        $data['status'] = $status;

        if ($level==0) {
            $data['namapilihan'] = "PROVINSI";
        }
        else {
            $namapilihan = $this->datamodelprogram->getNamaPilihan($kode);
            $resultquery = $namapilihan->getResult();
            $data['namapilihan'] = strToUpper($resultquery[0]->nama);
        }

        $namalevel1 = $this->datamodelprogram->getNamaPilihan(substr($kode,0,2)."0000");
        $result1 = $namalevel1->getResult();
        $data['namalevel1'] = $result1[0]->nama;
        $namalevel2 = $this->datamodelprogram->getNamaPilihan(substr($kode,0,4)."00");
        $result2 = $namalevel2->getResult();
        $data['namalevel2'] = $result2[0]->nama;
        $namalevel3 = $this->datamodelprogram->getNamaPilihan(substr($kode,0,6));
        $result3 = $namalevel3->getResult();
        $data['namalevel3'] = $result3[0]->nama;

        
        if ($level<3) {
            $query = $this->datamodelprogram->getTotalSetara($status,$kode,$level);
            $data['datanas'] = $query->getResult();
            return view('pendidikan/data_nasional_setara', $data);
        }
        else
        {
            $kodebaru = substr($kode,0,6);
            $query = $this->datamodelprogram->getDaftarSetara($status,$kodebaru);
            $data['datanas'] = $query->getResult();
            return view('pendidikan/daftar_kesetaraan', $data);       
        }
    }

    public function tidakaktif($kode='000000', $level=0)
    {
        $data['tingkat'] = "ketidakaktifan";
        $data['kode'] = $kode;
        $data['level'] = $level;

        if ($level==0) {
            $data['namapilihan'] = "PROVINSI";
        }
        else {
            $namapilihan = $this->datamodeltidakaktif->getNamaPilihan($kode);
            $resultquery = $namapilihan->getResult();
            $data['namapilihan'] = strToUpper($resultquery[0]->nama);
        }

        $namalevel1 = $this->datamodeltidakaktif->getNamaPilihan(substr($kode,0,2)."0000");
        $result1 = $namalevel1->getResult();
        $data['namalevel1'] = $result1[0]->nama;
        $namalevel2 = $this->datamodeltidakaktif->getNamaPilihan(substr($kode,0,4)."00");
        $result2 = $namalevel2->getResult();
        $data['namalevel2'] = $result2[0]->nama;
        $namalevel3 = $this->datamodeltidakaktif->getNamaPilihan(substr($kode,0,6));
        $result3 = $namalevel3->getResult();
        $data['namalevel3'] = $result3[0]->nama;

        
        if ($level<3) {
            $query = $this->datamodeltidakaktif->getTotalTidakAktif($kode,$level);
            $data['datanas'] = $query->getResult();
            return view('pendidikan/data_nasional_tidakaktif', $data);
        }
        else
        {
            $kodebaru = substr($kode,0,6);
            $query = $this->datamodeltidakaktif->getDaftarSetara($kodebaru);
            $data['datanas'] = $query->getResult();
            return view('pendidikan/daftar_tidakaktif', $data);       
        }
    }


    public function lifeskill($kode='000000', $level=0, $status="all")
    {
        return view('pendidikan/data_nasional_lifeskill'); 
    }

    public function cari($kode)
    {
        $data['tingkat'] = "sekolah";
        $data['kode'] = $kode;
        $query = $this->datamodelpendidikan->getCariDaftarSekolah($kode);
        $data['datanas'] = $query->getResult();
        return view('pendidikan/hasilcari_sekolah', $data);
        
    }

    public function cariyayasan($kode)
    {
        $data['tingkat'] = "yayasan";
        $data['kode'] = $kode;
        $query = $this->datamodelpendidikan->getCariDaftarYayasan($kode);
        $data['datanas'] = $query->getResult();
        return view('pendidikan/hasilcari_yayasan', $data);
        
    }

    public function npsn($kode=null)
    {
        if ($kode==null)
        $kode = $_GET['npsn'];

        $query = $this->datamodelpendidikan->getCariNamaAtauNPSN($kode);
        $datasekolah = $query->getRow();
        $kodwil = $datasekolah->kode_wilayah;
        $data['datasekolah'] = $datasekolah;

        $query2 = $this->datamodelpendidikan->getCariNamaAtauNPSN_sekunder($kode);
        $datasekolah2 = $query2->getRow();
        $data['datasekolah2'] = $datasekolah2;

        $query2 = $this->datamodelpendidikan->getDataWilayah($kodwil);
        $data['datawilayah'] = $query2->getRow();
        
        $query3 = $this->datamodelpendidikan->getOperatorSekolah($kode);
        $data['dataoperator'] = $query3->getRow();

        $query4 = $this->datamodelpendidikan->getFileSK($datasekolah->sekolah_id);
        $data['datask'] = $query4->getRow(); 

        $query5 = $this->datamodelpendidikan->getAkreditasi($datasekolah->sekolah_id);
        $data['dataakreditasi'] = $query5->getRow(); 

        //print_r($query->getRow());
        // die();
        
        return view('pendidikan/detail_sekolah', $data);
    }

    public function npsn2()
    {
        $npsn = $_GET['npsn'];
        echo $npsn;
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
