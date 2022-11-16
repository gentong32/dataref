<?php

namespace App\Controllers;
use App\Models\DataModelPendidikan;

class Home extends BaseController
{
    function __construct()
    {
        $this->datamodelpendidikan = new DataModelPendidikan();
        helper('filesystem');
    }

    public function index()
    {

        $timenow = strtotime(date("Y-m-d H:i:s"));
        $timekemarin = $timenow-(3600);
        // $map = directory_map('./writable/session', false, true);
        $session_info = get_dir_file_info('./writable/session');
        $logs_info = get_dir_file_info('./writable/logs');

        // if (session('id_user')) :
        //     echo "INFO<br>";
        //     echo "<pre>";
        //     echo var_dump($session_info,'date');
        //     echo "</pre>"; 
        // endif;

        foreach ($session_info as $value)
        {
            if ($value['date']<=$timekemarin)
            {
                $path = 'writable/session/'.$value['name'];
                unlink($path);
            }
        }
        foreach ($logs_info as $value)
        {
            if ($value['date']<=$timekemarin)
            {
                $path = 'writable/logs/'.$value['name'];
                unlink($path);
            }
        }
        // echo strtotime("2022-10-29 00:00:00")."<hr>";
        // echo strtotime("2022-10-28 00:00:00")."<hr>";
        // echo "<pre>";
        // echo var_dump($models_info,'date');
        // echo "</pre>";
        // delete_files('./path/to/directory/');

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

        // $path = './writable/session';
        // if ($handle = opendir($path)) {

        //     while (false !== ($file = readdir($handle))) { 
        //         $filelastmodified = filemtime($path . $file);
        //         //24 hours in a day * 3600 seconds per hour
        //         if((time() - $filelastmodified) > 24*3600)
        //         {
        //         //unlink($path . $file);
        //         echo $file;
        //         }

        //     }

        //     closedir($handle); 
        // }

        return view('home', $data);
    }

    public function home2()
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
        
        $pengunjunghariini  = $this->datamodelpendidikan->jmlpengunjungharini($date)->pengunjung;
        $dbpengunjung = $this->datamodelpendidikan->totalpengunjung(); 
        $totalpengunjung = isset($dbpengunjung->hits)?($dbpengunjung->hits):0;
        $bataswaktu = time() - 300;
        $pengunjungonline  = sizeof($this->datamodelpendidikan->pengunjungonline($bataswaktu));
        
        $data['pengunjunghariini']=$pengunjunghariini;
        $data['totalpengunjung']=$totalpengunjung;
        $data['pengunjungonline']=$pengunjungonline;

        return view('home2', $data);
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

    public function chart_pengunjung($nbulan=null, $ntahun=null)
    {

        $this->cekpengunjungkemarin();
        $this->cekpengunjungbulankemarin();

        $namabulan = Array('Januari', 'Pebruari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
            'Agustus', 'September', 'Oktober', 'Nopember', 'Desember');
        if ($nbulan==null)
            $bulan  = date("n");
        else
            $bulan = $nbulan;
        if ($ntahun==null)
            $tahun  = date("Y");
        else
            $tahun = $ntahun;

        $date0 = strtotime("2022-10");
        $date1 = strtotime($tahun."-".$bulan);
        $date2 = strtotime(date("Y")."-".date("n"));
        
        if ($date1<$date0)
        {
            $bulan=10;
            $tahun=2022;
        }
        else if ($date1>$date2)
        {
            $bulan=date("n");
            $tahun=date("Y");
        }
        

        $date  = date("Y-m-d"); 

        $data['namabulan'] = $namabulan[$bulan-1];
        $data['bulan'] = $bulan;
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
        $mobilemonth = $this->datamodelpendidikan->jmlmobilebulanini($tahun,$bulan);
        $data['datamobilebulanini'] = $mobilemonth;

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

    public function savedatapetakedatabase($kode)
    {
        $semuakota = $this->datamodelpendidikan->getsemuakota();

        foreach ($semuakota as $kota)
        {
            if (intval($kota->kode_wilayah)==intval($kode))
            {
                echo $kota->kode_wilayah."=>".$kota->nama."<br>";
                $this->datamodelpendidikan->getdatabesar($kota->nama, $kota->kode_wilayah);
            }
            
        }
        //$databesar = $this->datamodelpendidikan->getdatabesar($namakota);
        //echo $databesar[1000]->nama;
    }

    public function cekdatamasuk()
    {
        $do_not_duplicate = array();

        $ambilsaved = $this->datamodelpendidikan->getkodesaved();
        foreach ($ambilsaved as $saved)
        {
            $do_not_duplicate[] = trim($saved->kode_wilayah);
        }

        $semuakota = $this->datamodelpendidikan->getsemuakota();
        foreach ($semuakota as $kota)
        {
            if (in_array(trim($kota->kode_wilayah), $do_not_duplicate)) {
                continue;
            } else {
                echo "Kode ".$kota->kode_wilayah." belum masuk<br>";
                $this->datamodelpendidikan->getdatabesar($kota->nama, $kota->kode_wilayah);
            }
        }
    }


}
