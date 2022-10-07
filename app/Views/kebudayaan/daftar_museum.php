<?php
$link1 = site_url('kebudayaan/museum')."/".substr($kode, 0, 2)."0000"."/1/";
$link2 = site_url('kebudayaan/museum')."/".substr($kode, 0, 4)."00"."/2/";
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
<title>Data Kebudayaan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="breadcrumps"><a href="<?=site_url('kebudayaan/museum')?>">Indonesia</a> 
        <?=$breadcrump1;?>
        <?=$breadcrump2;?>
        <?=$breadcrump3;?>
    </div>
    <div class="judulatas">DAFTAR MUSEUM <?=strtoupper($tingkat)?> PER <?=$namapilihan?></div>
    <div class="card-body p-0">
        <div style="margin:30px;">
            <div class="">
                <table class="table table-striped" id='table1'>
                    <thead><tr>
                        <th width="10px">No</th>
                        <th>Kode</th>
                        <th width="30%">Nama Cagar Budaya</th>
                        <th>Jenis</th>
                        <th>Alamat</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($datanas as $key => $value) :?>
                    <tr>
                        <td align="right"><?=$key + 1?></td>
                        <?php 
                            $siap=false;
                            if ($siap) {?>
                        <td class="link1">
                            <a target="_blank" href="<?=site_url('kebudayaan/kode/'.trim($value->kode_pengelolaan))?>">
                            <?=$value->kode_pengelolaan?>
                            </a> 
                        </td>
                        <?php } ?>
                        <td><?=$value->kode_pengelolaan?></td>
                        <td><?=$value->nama?></td>
                        <td><?=strtoupper($value->jenis_mus)=="NULL" ? "-": $value->jenis_mus;?></td>
                        <td><?=$value->alamat?></td>
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