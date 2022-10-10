<?php

namespace App\Controllers;
use App\Models\DataModelPendidikan;

class Home extends BaseController
{
    function __construct()
    {
        $this->datamodelpendidikan = new DataModelPendidikan();
    }

    public function index()
    {
        $data['tingkat'] = "sekolah";
        
        $ip = $this->getClientIpAddress();//$this->request->getIPAddress();
        // if (session('id_user')) :
        //     echo $this->getClientIpAddress();
        // endif;

        $date  = date("Y-m-d"); 
        $waktu = time(); //
        $timeinsert = date("Y-m-d H:i:s");

        if ($ip=="::1")
        $ip = "0:0:0:0:0:0:0:0001";

       
        $pengunjung = $this->datamodelpendidikan->getpengunjung($ip, $date);
        
        $s=sizeof($pengunjung);

        $ss = isset($s)?($s):0;

              
        if($ss == 0){
            $details = json_decode(file_get_contents("http://ip-api.com/json/".$ip."?fields=126975"));
            $device="komputer";
            $region="banten";
            $kota="tangsel";

            if(isset($details->mobile))
            {
                $region = $details->regionName;
                $kota = $details->city;
            if ($details->mobile)
                $device="mobile";
            else
                $device="komputer";
            }
            $this->datamodelpendidikan->addpengunjung($ip, $date, $waktu, $timeinsert, 
            $region, $kota, $device);
        }
        else {
            $this->datamodelpendidikan->updatepengunjung($ip, $date, $waktu);
        }

        // echo "<pre>";
        // echo var_dump($this->datamodelpendidikan->jmlpengunjungharini($date));
        // echo "</pre>";
        
        
        $pengunjunghariini  = $this->datamodelpendidikan->jmlpengunjungharini($date)->pengunjung;
        $dbpengunjung = $this->datamodelpendidikan->totalpengunjung(); 
        $totalpengunjung = isset($dbpengunjung->hits)?($dbpengunjung->hits):0;
        $bataswaktu = time() - 300;
        $pengunjungonline  = sizeof($this->datamodelpendidikan->pengunjungonline($bataswaktu));
        
        $data['pengunjunghariini']=$pengunjunghariini;
        $data['totalpengunjung']=$totalpengunjung;
        $data['pengunjungonline']=$pengunjungonline;

        return view('home', $data);
    }

    private function getClientIpAddress()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //Checking IP From Shared Internet
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //To Check IP is Pass From Proxy
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }

    public function setotal()
    {
        // $this->datamodelpendidikan->setTotalPendidikan(1);
        // $this->datamodelpendidikan->setTotalPendidikan(2);
        // $this->datamodelpendidikan->setTotalPendidikan(3);
    }

    public function chart_pengunjung()
    {

        $this->cekpengunjungkemarin();
        $this->cekpengunjungbulankemarin();

        $namabulan = Array('Januari', 'Pebruari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
            'Agustus', 'September', 'Oktober', 'Nopember', 'Desember');
        $bulan  = date("n");
        $tahun = date("Y");
        $date  = date("Y-m-d"); 

        $data['namabulan'] = $namabulan[$bulan-1];
        $data['tahun'] = $tahun;

        $data['tingkat'] = "sekolah";
        $pengunjung = $this->datamodelpendidikan->getdata_pengunjung_harian($tahun,$bulan);
        $data['datapengunjungharian'] = $pengunjung;
        $pengunjungnow = $this->datamodelpendidikan->jmlpengunjungharini($date);
        $data['datapengunjunghariini'] = $pengunjungnow;
        
        $pengunjung2 = $this->datamodelpendidikan->getdata_pengunjung_bulanan($tahun);
        $data['datapengunjungbulanan'] = $pengunjung2;
        $pengunjungmonth = $this->datamodelpendidikan->jmlpengunjungbulanini($tahun,$bulan);
        $data['datapengunjungbulanini'] = $pengunjungmonth;
        // $pengunjungdevice = $this->datamodelpendidikan->getdata_pengunjung_device();
        // $data['datapengunjungbulanan'] = $pengunjung2;

        return view('stat_linechart', $data);
    }

    private function cekpengunjungkemarin()
    {
        $pengunjung = $this->datamodelpendidikan->cek_pengunjung_kemarin();
        if(!$pengunjung)
        {
            $this->datamodelpendidikan->setdatapengunjungkemarin();
        }
        
    }

    private function cekpengunjungbulankemarin()
    {
        $pengunjung = $this->datamodelpendidikan->cek_pengunjung_bulan_kemarin();
        if(!$pengunjung)
        {
            $this->datamodelpendidikan->setdatapengunjungbulankemarin();
        }
        
    }
}
