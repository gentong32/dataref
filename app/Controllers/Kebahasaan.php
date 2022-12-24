<?php

namespace App\Controllers;
use App\Models\DataModelKebahasaan;

class Kebahasaan extends BaseController
{
    function __construct() {
        // $this->db      = \Config\Database::connect('dbbudaya');
        $this->datamodelkebahasaan = new DataModelKebahasaan();
    }

    public function index()
    {
        $data['tingkat'] = "bahasa";
        return view('homekebahasaan', $data);
    }

    public function bahasadaerah($kode='000000', $level=0)
    {
        $data['tingkat'] = "bahasa";
        $data['kode'] = $kode;
        $data['level'] = $level;

        if ($level==0) {
            $data['namapilihan'] = "PROVINSI";
        }
        else {
            $namapilihan = $this->datamodelkebahasaan->getNamaPilihan($kode);
            $resultquery = $namapilihan->getResult();
            $data['namapilihan'] = strToUpper($resultquery[0]->nama);
        }

        $namalevel1 = $this->datamodelkebahasaan->getNamaPilihan(substr($kode,0,2)."0000");
        $result1 = $namalevel1->getResult();
        $data['namalevel1'] = $result1[0]->nama;
        $namalevel2 = $this->datamodelkebahasaan->getNamaPilihan(substr($kode,0,4)."00");
        $result2 = $namalevel2->getResult();
        $data['namalevel2'] = $result2[0]->nama;
        $namalevel3 = $this->datamodelkebahasaan->getNamaPilihan(substr($kode,0,6));
        $result3 = $namalevel3->getResult();
        $data['namalevel3'] = $result3[0]->nama;

        if ($level<2) {
            $query = $this->datamodelkebahasaan->getTotalBahasa($kode,$level);
            $data['datanas'] = $query->getResult();
            return view('kebahasaan/data_bahasadaerah', $data);
        }
        else
        {
            $kodebaru = substr($kode,0,6);
            $query = $this->datamodelkebahasaan->getDaftarBahasa($kodebaru);
            $data['datanas'] = $query->getResult();
            return view('kebahasaan/daftar_bahasadaerah', $data);
        }
    }

    public function komunitasbahasa($kode='000000', $level=0)
    {
        $data['tingkat'] = "bahasa";
        $data['kode'] = $kode;
        $data['level'] = $level;

        if ($level==0) {
            $data['namapilihan'] = "PROVINSI";
        }
        else {
            $namapilihan = $this->datamodelkebahasaan->getNamaPilihan($kode);
            $resultquery = $namapilihan->getResult();
            $data['namapilihan'] = strToUpper($resultquery[0]->nama);
        }

        $namalevel1 = $this->datamodelkebahasaan->getNamaPilihan(substr($kode,0,2)."0000");
        $result1 = $namalevel1->getResult();
        $data['namalevel1'] = $result1[0]->nama;
        $namalevel2 = $this->datamodelkebahasaan->getNamaPilihan(substr($kode,0,4)."00");
        $result2 = $namalevel2->getResult();
        $data['namalevel2'] = $result2[0]->nama;
        $namalevel3 = $this->datamodelkebahasaan->getNamaPilihan(substr($kode,0,6));
        $result3 = $namalevel3->getResult();
        $data['namalevel3'] = $result3[0]->nama;

        if ($level<3) {
            $query = $this->datamodelkebahasaan->getTotalKomunitas($kode,$level);
            $data['datanas'] = $query->getResult();
            return view('kebahasaan/data_komunitas', $data);
        }
        else
        {
            $kodebaru = substr($kode,0,6);
            $query = $this->datamodelkebahasaan->getDaftarKomunitas($kodebaru);
            $data['datanas'] = $query->getResult();
            return view('kebahasaan/daftar_komunitas', $data);
        }
    }

    public function kode($kode=null)
    {
        if ($kode==null)
        $kode = $_GET['npsn'];

        $data = [];
        $query = $this->datamodelkebahasaan->getCariKomunitas($kode);
        
        $databudaya = $query->getRow();

        $data['databudaya'] = $databudaya;

        $kodwil = $databudaya->kode_wilayah;
        $query2 = $this->datamodelkebahasaan->getDataWilayah($kodwil);
        $data['datawilayah'] = $query2->getRow();
        
        return view('kebahasaan/detail_komunitas', $data);
    }

    public function cari($kode)
    {
        $data['tingkat'] = "bahasa";
        $data['kode'] = $kode;
        $query = $this->datamodelkebahasaan->getCariDaftarBahasa($kode);
        $data['databudaya'] = $query->getResult();
        return view('kebahasaan/hasilcari_budaya', $data);
        
    }
}