<?php

namespace App\Controllers;
use App\Models\DataModelKebudayaan;

class Kebudayaan extends BaseController
{
    function __construct() {
        // $this->db      = \Config\Database::connect('dbbudaya');
        $this->datamodelkebudayaan = new DataModelKebudayaan();
    }

    public function index()
    {
        $data['tingkat'] = "budaya";
        return view('homekebudayaan', $data);
    }

    public function cagarbudaya($kode='000000', $level=0, $kategori=null)
    {
        $data['tingkat'] = "kebudayaan";
        $data['kode'] = $kode;
        $data['level'] = $level;

        if ($level==0) {
            $data['namapilihan'] = "PROVINSI";
        }
        else {
            $namapilihan = $this->datamodelkebudayaan->getNamaPilihan($kode);
            $resultquery = $namapilihan->getResult();
            $data['namapilihan'] = strToUpper($resultquery[0]->nama);
        }

        $namalevel1 = $this->datamodelkebudayaan->getNamaPilihan(substr($kode,0,2)."0000");
        $result1 = $namalevel1->getResult();
        $data['namalevel1'] = $result1[0]->nama;
        $namalevel2 = $this->datamodelkebudayaan->getNamaPilihan(substr($kode,0,4)."00");
        $result2 = $namalevel2->getResult();
        $data['namalevel2'] = $result2[0]->nama;
        $namalevel3 = $this->datamodelkebudayaan->getNamaPilihan(substr($kode,0,6));
        $result3 = $namalevel3->getResult();
        $data['namalevel3'] = $result3[0]->nama;

        $querykategori = $this->datamodelkebudayaan->getDaftarKategoriCagarBudaya();
        $data['daftarkategori'] = $querykategori->getResult();
        if ($kategori==null)
        $kategori=0;

        $data['kategori'] = $kategori;
        
        $getkategori = $this->datamodelkebudayaan->getKategoriCagarBudaya($kategori);
        
        if ($level<3) {
            $query = $this->datamodelkebudayaan->getTotalCagarBudaya($kode,$level,$kategori);
            $data['datanas'] = $query->getResult();
            return view('kebudayaan/data_budaya_cagarbudaya', $data);
        }
        else
        {
            $kodebaru = substr($kode,0,6);
            $query = $this->datamodelkebudayaan->getDaftarCagarBudaya($kodebaru,$kategori);
            $data['datanas'] = $query->getResult();
            return view('kebudayaan/daftar_cagarbudaya', $data);       
        }
    }

    public function museum($kode='000000', $level=0)
    {
        $data['tingkat'] = "kebudayaan";
        $data['kode'] = $kode;
        $data['level'] = $level;

        if ($level==0) {
            $data['namapilihan'] = "PROVINSI";
        }
        else {
            $namapilihan = $this->datamodelkebudayaan->getNamaPilihan($kode);
            $resultquery = $namapilihan->getResult();
            $data['namapilihan'] = strToUpper($resultquery[0]->nama);
        }

        $namalevel1 = $this->datamodelkebudayaan->getNamaPilihan(substr($kode,0,2)."0000");
        $result1 = $namalevel1->getResult();
        $data['namalevel1'] = $result1[0]->nama;
        $namalevel2 = $this->datamodelkebudayaan->getNamaPilihan(substr($kode,0,4)."00");
        $result2 = $namalevel2->getResult();
        $data['namalevel2'] = $result2[0]->nama;
        $namalevel3 = $this->datamodelkebudayaan->getNamaPilihan(substr($kode,0,6));
        $result3 = $namalevel3->getResult();
        $data['namalevel3'] = $result3[0]->nama;

        // $querybentuk = $this->datamodelkebudayaan->getDaftarBentukCagarBudaya();
        // $data['daftarbentuk'] = $querybentuk->getResult();
        
        if ($level<3) {
            $query = $this->datamodelkebudayaan->getTotalMuseum($kode,$level);
            $data['datanas'] = $query->getResult();
            return view('kebudayaan/data_budaya_museum', $data);
        }
        else
        {
            $kodebaru = substr($kode,0,6);
            $query = $this->datamodelkebudayaan->getDaftarMuseum($kodebaru);
            $data['datanas'] = $query->getResult();
            return view('kebudayaan/daftar_museum', $data);
        }
    }

    public function wbtb($kode='000000', $level=0)
    {
        $data['tingkat'] = "kebudayaan";
        $data['kode'] = $kode;
        $data['level'] = $level;

        if ($level==0) {
            $data['namapilihan'] = "PROVINSI";
        }
        else {
            $namapilihan = $this->datamodelkebudayaan->getNamaPilihan($kode);
            $resultquery = $namapilihan->getResult();
            $data['namapilihan'] = strToUpper($resultquery[0]->nama);
        }

        $namalevel1 = $this->datamodelkebudayaan->getNamaPilihan(substr($kode,0,2)."0000");
        $result1 = $namalevel1->getResult();
        $data['namalevel1'] = $result1[0]->nama;
        $namalevel2 = $this->datamodelkebudayaan->getNamaPilihan(substr($kode,0,4)."00");
        $result2 = $namalevel2->getResult();
        $data['namalevel2'] = $result2[0]->nama;
        $namalevel3 = $this->datamodelkebudayaan->getNamaPilihan(substr($kode,0,6));
        $result3 = $namalevel3->getResult();
        $data['namalevel3'] = $result3[0]->nama;

        // $querybentuk = $this->datamodelkebudayaan->getDaftarBentukCagarBudaya();
        // $data['daftarbentuk'] = $querybentuk->getResult();
        
        if ($level<1) {
            $query = $this->datamodelkebudayaan->getTotalWbtb($kode,$level);
            $data['datanas'] = $query->getResult();
            return view('kebudayaan/data_budaya_wbtb', $data);
        }
        else
        {
            $kodebaru = substr($kode,0,6);
            $query = $this->datamodelkebudayaan->getDaftarWbtb($kodebaru);
            $data['datanas'] = $query->getResult();
            return view('kebudayaan/daftar_wbtb', $data);
        }
    }

    public function sanggar($kode='000000', $level=0)
    {
        $data['tingkat'] = "kebudayaan";
        $data['kode'] = $kode;
        $data['level'] = $level;

        if ($level==0) {
            $data['namapilihan'] = "PROVINSI";
        }
        else {
            $namapilihan = $this->datamodelkebudayaan->getNamaPilihan($kode);
            $resultquery = $namapilihan->getResult();
            $data['namapilihan'] = strToUpper($resultquery[0]->nama);
        }

        $namalevel1 = $this->datamodelkebudayaan->getNamaPilihan(substr($kode,0,2)."0000");
        $result1 = $namalevel1->getResult();
        $data['namalevel1'] = $result1[0]->nama;
        $namalevel2 = $this->datamodelkebudayaan->getNamaPilihan(substr($kode,0,4)."00");
        $result2 = $namalevel2->getResult();
        $data['namalevel2'] = $result2[0]->nama;
        $namalevel3 = $this->datamodelkebudayaan->getNamaPilihan(substr($kode,0,6));
        $result3 = $namalevel3->getResult();
        $data['namalevel3'] = $result3[0]->nama;

        // $querybentuk = $this->datamodelkebudayaan->getDaftarBentukCagarBudaya();
        // $data['daftarbentuk'] = $querybentuk->getResult();
        
        if ($level<2) {
            $query = $this->datamodelkebudayaan->getTotalSanggar($kode,$level);
            $data['datanas'] = $query->getResult();
            return view('kebudayaan/data_budaya_sanggar', $data);
        }
        else
        {
            $kodebaru = substr($kode,0,6);
            $query = $this->datamodelkebudayaan->getDaftarSanggar($kodebaru);
            $data['datanas'] = $query->getResult();
            return view('kebudayaan/daftar_sanggar', $data);
        }
    }

    public function kode($kode=null)
    {
        if ($kode==null)
        $kode = $_GET['npsn'];

        $data = [];

        if (substr($kode,0,2)=="KB")
        {
            // $kode = "KB000154";
            $pilbudaya = "cagarbudaya";
            $query = $this->datamodelkebudayaan->getCariCagarBudaya($kode);
        }
        else if (substr($kode,0,2)=="MS")
        {
            // $kode = "MS000020";
            $pilbudaya = "museum";
            $query = $this->datamodelkebudayaan->getCariMuseum($kode);
        }
        else if (substr($kode,0,2)=="AA")
        {
            // $kode = "MS000020";
            $pilbudaya = "wbtb";
            $query = $this->datamodelkebudayaan->getCariWBTB($kode);
        }
        
        $databudaya = $query->getRow();

        $data['databudaya'] = $databudaya;
    
        
        // $query3 = $this->datamodelkebudayaan->getFotoCagarBudaya($kode);
        // $data['datafoto'] = $query3->getRow();

        if ($pilbudaya=="cagarbudaya")
        {
            $query3 = $this->datamodelkebudayaan->getPemilik($databudaya->entitas_cb_id);
            $data['datapemilik'] = $query3->getRow(); 

            $query4 = $this->datamodelkebudayaan->getFileSK($databudaya->entitas_cb_id);
            $data['datask'] = $query4->getRow(); 

            $kodwil = $databudaya->kode_wilayah;
            $query2 = $this->datamodelkebudayaan->getDataWilayah($kodwil);
            $data['datawilayah'] = $query2->getRow();
        }
        else if ($pilbudaya=="museum")
        {
            $query3 = $this->datamodelkebudayaan->getPemilikMuseum($databudaya->entitas_mus_id);
            $data['datapemilik'] = $query3->getRow(); 

            $query4 = $this->datamodelkebudayaan->getFileSKMuseum($databudaya->entitas_mus_id);
            $data['datask'] = $query4->getRow(); 

            $kodwil = $databudaya->kode_wilayah;
            $query2 = $this->datamodelkebudayaan->getDataWilayah($kodwil);
            $data['datawilayah'] = $query2->getRow();
        }
        else if ($pilbudaya=="wbtb")
        {
            $query2 = $this->datamodelkebudayaan->getMaestroWbtb($databudaya->entitas_id);
            $data['datamaestro'] = $query2->getRow();
        }

        

        //print_r($query->getRow());
        // die();

        return view('kebudayaan/detail_'.$pilbudaya, $data);
    }

    public function kode_l($kode=null)
    {
        $data = [];
        $query = $this->datamodelkebudayaan->getCariSanggar($kode);     
        $databudaya = $query->getRow();

        $data['databudaya'] = $databudaya;

        $kodwil = $databudaya->kode_kab_kota;
        $query2 = $this->datamodelkebudayaan->getDataWilayah($kodwil);
        $data['datawilayah'] = $query2->getRow();
             
        return view('kebudayaan/detail_sanggar', $data);
    }

    public function cari($kode)
    {
        $data['tingkat'] = "kebudayaan";
        $data['kode'] = $kode;
        $query = $this->datamodelkebudayaan->getCariDaftarBudaya($kode);
        $data['databudaya'] = $query->getResult();
        return view('kebudayaan/hasilcari_budaya', $data);
        
    }
}