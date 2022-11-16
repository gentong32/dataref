<?php
$link1 = site_url('kebudayaan/cagarbudaya')."/".substr($kode, 0, 2)."0000"."/1/";
$link2 = site_url('kebudayaan/cagarbudaya')."/".substr($kode, 0, 4)."00"."/2/";
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

$pilstatus=[];

for ($a=1;$a<=5;$a++)
{
    $pilstatus[$a] = "";
    if ($kategori==$a)
        $pilstatus[$a] = "selected";
}


?>

<?= $this->extend('layout/default') ?>

<?= $this->section('titel') ?>
<title>Data Kebudayaan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="breadcrumps"><a href="<?=site_url('kebudayaan/cagarbudaya')?>">Indonesia</a> 
        <?=$breadcrump1;?>
        <?=$breadcrump2;?>
        <?=$breadcrump3;?>
    </div>
    <div class="judulatas">DAFTAR CAGAR BUDAYA <?=strtoupper($tingkat)?> PER <?=$namapilihan?></div>
    <div class="card-body p-0">
        <center>
        <div class="" style="display:inline-block;">
            <select class="combobox1" id="jenis_cb" name="jenis_cb">
                <option value="">--Semua Kategori--</option>
                <?php 
                $idx=0;
                foreach($daftarkategori as $value)
                {
                    $idx++;
                    echo '<option '.$pilstatus[$idx].' value='.$value->jenis_id.'>'.$value->Jenis.'</option>';
                }
                ?>
            </select>
        </div>
        <button onclick="filterdata()" class="tb_utama" type="button">
            Terapkan
        </button>
        </center>
        <div style="margin:30px;">
            <div class="">
                <table class="table table-striped" id='table1'>
                    <thead><tr>
                        <th width="10px">No</th>
                        <th>Kode</th>
                        <th width="50%">Nama Cagar Budaya</th>
                        <th>Kategori</th>
                        <th>Alamat</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($datanas as $key => $value) :?>
                    <tr>
                        <td align="right"><?=$key + 1?></td>
                        <?php 
                            $siap=true;
                            if ($siap) {?>
                        <td class="link1">
                            <a target="_blank" href="<?=site_url('kebudayaan/kode/'.trim($value->kode_pengelolaan))?>">
                            <?=$value->kode_pengelolaan?>
                            </a> 
                        </td>
                        <?php } else {?>
                        <td><?=$value->kode_pengelolaan?></td>
                        <?php } ?>
                        <td><?=$value->nama?></td>
                        <td><?=$value->Jenis?></td>
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

function filterdata()
{
    window.open("<?=site_url('kebudayaan/cagarbudaya')."/".$kode."/".$level?>"+
    "/"+$('#jenis_cb').val(), target="_self");
}

</script>
<?= $this->endSection() ?>