<?php
$link1 = site_url('pendidikan/tidakaktif')."/".substr($kode, 0, 2)."0000"."/1/";
$link2 = site_url('pendidikan/tidakaktif')."/".substr($kode, 0, 4)."00"."/2/";
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


?>

<?= $this->extend('layout/default') ?>

<?= $this->section('titel') ?>
<title>Data Pendidikan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="breadcrumps"><a href="<?=site_url('pendidikan/tidakaktif/')?>">Indonesia</a> 
        <?=$breadcrump1;?>
        <?=$breadcrump2;?>
        <?=$breadcrump3;?>
    </div>
    <div class="judulatas">DAFTAR SATUAN PENDIDIKAN TIDAK AKTIF PER <?=$namapilihan?></div>
    <div class="card-body p-0">
        
        <div style="margin:30px;">
            <div class="">
                <table class="table table-striped" id='table1'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NPSN</th>
                            <th>Nama Satuan Pendidikan</th>
                            <th>Alamat</th>
                            <th>Bentuk Pendidikan</th>
                            <th>Residu **)</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($datanas as $key => $value) : ?>
                    <tr>
                        <td align="right"><?=$key + 1?></td>
                        <td><?=$value->npsn?></td>
                        <td><?=$value->nama?></td>
                        <td width="20%"><?=$value->alamat_jalan?></td>
                        <td><?=$value->namabentuk?></td>
                        <td><?=$value->tahun?></td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
                <span style="color:darkgrey;padding-bottom:25px;"><i>**) Terakhir Update Data / Merger / Tutup</i></span><br><br>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scriptdata') ?>
<script>
    
$(document).ready( function () {
    $('#table1').DataTable({
        responsive: true,
        columnDefs: [
            { responsivePriority: 1, targets: 1 },
            { className: 'text-center', targets: [4] },
        ]
    });
} );

</script>
<?= $this->endSection() ?>