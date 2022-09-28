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

    public function cagarbudaya($kode='000000', $level=0)
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
            $query = $this->datamodelkebudayaan->getTotalCagarBudaya($kode,$level);
            $data['datanas'] = $query->getResult();
            return view('kebudayaan/data_budaya_cagarbudaya', $data);
        }
        else
        {
            $kodebaru = substr($kode,0,6);
            $query = $this->datamodelkebudayaan->getDaftarCagarBudaya($kodebaru);
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

    public function kode($kode=null)
    {
        if ($kode==null)
        $kode = $_GET['npsn'];

        $data = [];

        if (substr($kode,0,2)=="KB")
        {
            $kode = "KB000154";
            $pilbudaya = "cagarbudaya";
            $query = $this->datamodelkebudayaan->getCariCagarBudaya($kode);
        }
        else if (substr($kode,0,2)=="MS")
        {
            $kode = "MS000020";
            $pilbudaya = "museum";
            $query = $this->datamodelkebudayaan->getCariMuseum($kode);
        }
        
        $databudaya = $query->getRow();
        $kodwil = $databudaya->kode_wilayah;
        $data['databudaya'] = $databudaya;

        $query2 = $this->datamodelkebudayaan->getDataWilayah($kodwil);
        $data['datawilayah'] = $query2->getRow();
        
        // $query3 = $this->datamodelkebudayaan->getFotoCagarBudaya($kode);
        // $data['datafoto'] = $query3->getRow();

        // $query4 = $this->datamodelkebudayaan->getFileSK($databudaya->sekolah_id);
        // $data['datask'] = $query4->getRow(); 

        //print_r($query->getRow());
        // die();

        return view('kebudayaan/detail_'.$pilbudaya, $data);
    }
}