<?php
$link1 = site_url('pendidikan/program/'.$tingkat)."/".substr($kode, 0, 2)."0000"."/1/";
$link2 = site_url('pendidikan/program/'.$tingkat)."/".substr($kode, 0, 4)."00"."/2/";
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
<title>Data Pendidikan &mdash; Data Nasional</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="breadcrumps"><a href="<?=site_url('pendidikan/program/').$tingkat?>">Indonesia</a> 
        <?=$breadcrump1;?>
        <?=$breadcrump2;?>
        <?=$breadcrump3;?>
    </div>
    <div class="judulatas">DAFTAR SATUAN PROGRAM LAYANAN <?=strtoupper($tingkat)?> PER <?=$namapilihan?></div>
    <div class="card-body p-0">
        
        <div style="margin:30px;">
            <div class="">
                <table class="table table-striped" id='table1'>
                    <thead><tr>
                        <th width="10px">No</th>
                        <th>NPSN</th>
                        <th>Nama Program Layanan</th>
                        <th>Alamat</th>
                        <th width='180px'>Kelurahan</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($datanas as $key => $value) :?>
                    <tr>
                        <td align="right"><?=$key + 1?></td>
                        <td class="link1"><a target="_blank" href="<?=site_url('pendidikan/npsn/'.trim($value->npsn))?>"><?=$value->npsn?></a></td>
                        <td><?=$value->nama?></td>
                        <td><?=$value->alamat_jalan?></td>
                        <td><?=$value->desa_kelurahan?></td>
                        <td><?=$value->status_skl?></td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
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
        ]
    });
} );

</script>
<?= $this->endSection() ?>