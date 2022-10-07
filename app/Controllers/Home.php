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
            if ($details->mobile)
                $device="mobile";
            else
                $device="komputer";
            $this->datamodelpendidikan->addpengunjung($ip, $date, $waktu, $timeinsert, 
            $details->regionName, $details->city, $device);
        }
        else {
            $this->datamodelpendidikan->updatepengunjung($ip, $date, $waktu);
        }
        
        $pengunjunghariini  = sizeof($this->datamodelpendidikan->jmlpengunjungharini($date));
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

        $namabulan = Array('Januari', 'Pebruari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
            'Agustus', 'September', 'Oktober', 'Nopember', 'Desember');
        $bulan  = date("n");
        $tahun = date("Y");

        $data['namabulan'] = $namabulan[$bulan-1];
        $data['tahun'] = $tahun;

        $data['tingkat'] = "sekolah";
        $pengunjung = $this->datamodelpendidikan->getdata_pengunjung_harian($tahun,$bulan);
        $data['datapengunjungharian'] = $pengunjung;
        $pengunjung2 = $this->datamodelpendidikan->getdata_pengunjung_bulanan($tahun);
        $data['datapengunjungbulanan'] = $pengunjung2;
        //echo $pengunjung[1]->pengunjung;

        return view('stat_linechart', $data);
    }
}
