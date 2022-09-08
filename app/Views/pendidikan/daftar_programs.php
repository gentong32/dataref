<?php
$link1 = site_url('pendidikan/program')."/".substr($kode, 0, 2)."0000"."/1/";
$link2 = site_url('pendidikan/program')."/".substr($kode, 0, 4)."00"."/2/";
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
    <div class="breadcrumps"><a href="<?=site_url('pendidikan/program')?>">Indonesia</a> 
    <?=$breadcrump1;?>
    <?=$breadcrump2;?>
    <?=$breadcrump3;?>
    </div>
    <div class="judulatas">DAFTAR PROGRAM LAYANAN PER <?=$namapilihan?></div>
    <div class="card-body p-0">
    
    <div class="mytable">
           <div style="align:center;margin:auto;max-width:100%;">
                <table class="table table-striped" id='table1'>
                <thead><tr>
                    <th width="10px">No</th>
                    <th>NPSN</th>
                    <th>Program Layanan</th>
                    <th>Alamat</th>
                    <th>Kelurahan</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($datanas as $key => $value) :?>
                
                <tr>
                    <td align="right"><?=$key + 1?></td>
                    <td class="link1"><a target="_blank" href="https://vervalyayasan.data.kemdikbud.go.id/index.php/Chome/profil?yayasan_id=<?=trim($value->yayasan_id)?>"><?=$value->npyp?></a></td>
                    <td><?=$value->nama?></td>
                    <td><?=$value->alamat_jalan?></td>
                    <td><?=$value->desa_kelurahan?></td>
                </tr>
                
                <?php endforeach;?>
                </tbody></table>
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
            { responsivePriority: 1, targets: 1 }
        ]
    });
} );

</script>
<?= $this->endSection() ?>