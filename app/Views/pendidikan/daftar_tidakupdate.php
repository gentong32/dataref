<?php
$link1 = site_url('pendidikan/tidakupdate')."/".substr($kode, 0, 2)."0000"."/1/";
$link2 = site_url('pendidikan/tidakupdate')."/".substr($kode, 0, 4)."00"."/2/";
$breadcrump1 = "";
$breadcrump2 = "";
$breadcrump3 = "";

if ($level==1)
{
    $breadcrump1 = ">> ".$namalevel1;
}
else if ($level>1)
{
    $breadcrump1 = '>> <a href="'.$link1.'">'.$namalevel1.'</a>';
}

if ($level==2)
{
    $breadcrump2 = ">> ".$namalevel2;
}
else if ($level>2)
{
    $breadcrump2 = '>> <a href="'.$link2.'">'.$namalevel2.'</a>';
}

if ($level==3)
{
    $breadcrump3 = ">> ".$namalevel3;
}

$date=date_create('now');
$tahun = date_format($date,('Y'));
$tahundepan = date_format($date,('y'))+1;
$tahunkemarinB = date_format($date,('Y'))-1;
$tahunkemarin = date_format($date,('y'))-1;
$duatahunkemarinB = date_format($date,('Y'))-2;
$duatahunkemarin = date_format($date,('y'))-2;
$tigatahunkemarinB = date_format($date,('Y'))-3;

$bulan = date_format($date,('n'));

if ($bulan>=7)
{
    $m1s = $tahun."/".$tahundepan." Ganjil";
    $m2s = $tahunkemarinB."/".$tahun." Genap";
    $m3s = $tahunkemarinB."/".$tahun." Ganjil";
    $m4s = $duatahunkemarinB."/".$tahunkemarin." Genap";
    $m5s = $duatahunkemarinB."/".$tahunkemarin." Ganjil";
}
else
{
    $m1s = $tahunkemarinB."/".$tahun." Genap";
    $m2s = $tahunkemarinB."/".$tahun." Ganjil";
    $m3s = $duatahunkemarinB."/".$tahunkemarin." Genap";
    $m4s = $duatahunkemarinB."/".$tahunkemarin." Ganjil";
    $m5s = $tigatahunkemarinB."/".$duatahunkemarin." Genap";
}

?>

<?= $this->extend('layout/default') ?>

<?= $this->section('titel') ?>
<title>Data Pendidikan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="breadcrumps"><a href="<?=site_url('pendidikan/tidakupdate/')?>">Indonesia</a> 
        <?=$breadcrump1;?>
        <?=$breadcrump2;?>
        <?=$breadcrump3;?>
    </div>
    <div class="judulatas">DAFTAR SATUAN PENDIDIKAN TIDAK MENGUPDATE DATA PER <?=$namapilihan?></div>
    <div class="card-body p-0">
        
        <div style="margin:30px;">
            <div class="">
                <table class="table table-striped" id='table1'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NPSN</th>
                            <th>Nama Satuan Pendidikan</th>
                            <th class="dttengah"><center><?=$m5s;?></center></th>
                            <th class="dttengah"><center><?=$m4s;?></center></th>
                            <th class="dttengah"><center><?=$m3s;?></center></th>
                            <th class="dttengah"><center><?=$m2s;?></center></th>
                            <th class="dttengah"><center><?=$m1s;?></center></th>
                                                  
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($datanas as $key => $value) :
                        $kosong = [];
                        $ks = $value->kode_semester_tidak_aktif;
                        $ks2 = 6-$ks;
                        for ($a=5;$a>=$ks2;$a--)
                        {
                            $kosong[$a]='<svg width="40" height="20">
                            <rect width="40" height="20" style="fill:#ea6a6d" /></svg>';
                            //"<table style='padding:0'><tr><td bgcolor='#d6b44b'></td></tr></table>";//bgcolor='#d6b44b'
                        }
                        for ($a=($ks2-1);$a>=1;$a--)
                        {
                            $kosong[$a]="";
                        }
                        ?>
                    <tr>
                        <td align="right"><?=$key + 1?></td>
                        <td class="link1"><a target="_blank" href="<?=site_url('pendidikan/npsn/'.trim($value->npsn))?>"><?=$value->npsn?></a></td>
                        <td><?=$value->nama?></td>
                        <td><?=$kosong[1]?></td>
                        <td><?=$kosong[2]?></td>
                        <td><?=$kosong[3]?></td>
                        <td><?=$kosong[4]?></td>
                        <td><?=$kosong[5]?></td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <span style="margin-left:30px;color:darkgrey;padding-bottom:25px;"><i><svg width="40" height="20">
                            <rect width="30" height="15" style="fill:#ea6a6d" /></svg>= tidak update-data</i></span><br><br>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scriptdata') ?>
<script>
    
$(document).ready( function () {
    $('#table1').DataTable({
        responsive: true,
        columnDefs: [
            { responsivePriority: 1, targets: 1 },
            { className: 'dttengahisi', targets: [3,4,5,6,7] }
        ]
    });
} );

</script>
<?= $this->endSection() ?>