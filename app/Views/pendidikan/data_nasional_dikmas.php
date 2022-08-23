<?php
$link1 = site_url('pendidikan/dikmas')."/".substr($kode, 0, 2)."0000"."/1/".$jalur."/".$bentuk."/".$status;
$link2 = site_url('pendidikan/dikmas')."/".substr($kode, 0, 4)."00"."/2/".$jalur."/".$bentuk."/".$status;
$breadcrump1 = "";
$breadcrump2 = "";

if ($level==1)
{
    $breadcrump1 = ">> ".$namalevel1;
}
else
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

$piljalur1 = "";
$piljalur2 = "";
$piljalur3 = "";

if ($jalur=="all")
    $piljalur1 = "selected";
else if ($jalur=="jf")
    $piljalur2 = "selected";
else if ($jalur=="jn")
    $piljalur3 = "selected";

$pilstatus1 = "";
$pilstatus2 = "";
$pilstatus3 = "";

if ($status=="all")
    $pilstatus1 = "selected";
else if ($status=="s1")
    $pilstatus2 = "selected";
else if ($status=="s2")
    $pilstatus3 = "selected";

$pilbentuk1 = "";

if ($bentuk=="all")
    $pilbentuk1 = "selected";

if ($jalur=="all" && $bentuk=="all" && $status=="all")
$cekjalurbentukstatus = "";
else
$cekjalurbentukstatus = "/".$jalur."/".$bentuk."/".$status;

?>

<?= $this->extend('layout/default') ?>

<?= $this->section('titel') ?>
<title>Data Pendidikan &mdash; Data Nasional</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="breadcrumps"><a href="<?=site_url('pendidikan/dikmas')?>">Indonesia</a> 
    <?=$breadcrump1;?>
    <?=$breadcrump2;?>
    </div>
    <div class="judulatas">JUMLAH DATA SATUAN PENDIDIKAN (DIKMAS) PER <?=$namapilihan?></div>
    <div class="card-body p-0">
    <center>
        <div class="">
            <select class="combobox1" id="jalur_pendidikan" name="jalur_pendidikan">
                <option <?=$piljalur1?> value="all">-Semua Jalur-</option>
                <option <?=$piljalur2?> value="jf">Jalur Formal</option>
                <option <?=$piljalur3?> value="jn">Jalur Non formal</option>
            </select>
            <div id="dbentukpendidikan" style="display:inline-block;">
            <select class="combobox1" id="bentuk_pendidikan" name="bentuk_pendidikan">
                <option <?=$piljalur1?> value="all">-Semua Bentuk-</option>
                <?php foreach ($daftarbentuk as $key => $value) :?>
                    <option <?php 
                    if ($bentuk==$value->bentuk_pendidikan_id)
                        echo "selected";?> value="<?=$value->bentuk_pendidikan_id?>"><?=$value->nama?></option>
                <?php endforeach;?>
            </select>
            </div>
            <div id="cbok2" style="display:inline-block;">
            <select class="combobox1" id="status_sekolah" name="status_sekolah">
                <option <?=$pilstatus1?> value="all">-Semua Status-</option>
                <option <?=$pilstatus2?> value="s1">Negeri</option>
                <option <?=$pilstatus3?> value="s2">Swasta</option>
            </select>
            </div>
            <button onclick="filterdata()" class="tb_utama" type="button">
                Terapkan
            </button>
    </center>
        </div>
        <div style="margin:30px;">
            <div class="">
                <table class="table table-striped" id='table1'>
                <thead><tr>
                    <th>#</th>
                    <th>Nama</th>
                    <?php if ($bentuk=="all" || $bentuk==null) {?>
                    <?php if ($jalur=="all" || $jalur==null) :?>
                    <th>Kursus</th>
                    <th>Ponpes</th>
                    <th>PKBM</th>
                    <th>Total</th>
                    <?php endif; 
                    if ($jalur=="jf") :?>
                    <th>PDF Ula</th>
                    <th>PDF Wustha</th>
                    <th>PDF Ulya</th>
                    <th>Total</th>
                    <?php endif; 
                    if ($jalur=="jn") :?>
                    <th>Kursus</th>
                    <th>Ponpes</th>
                    <th>PKBM</th>
                    <th>Total</th>
                    <?php endif ?>
                    <?php } else {?> 
                    <th><?=$namabentuk?></th>
                    <?php }?> 
                </tr>
                </thead>
                <tbody>
                <?php foreach ($datanas as $key => $value) :?>
                
                <tr>
                    <td><?=$key + 1?></td>
                    <td class="link1"><a href="<?=site_url('pendidikan/dikmas/'.trim($value->kode_wilayah).'/'.($level+1).$cekjalurbentukstatus)?>"><?=$value->nama?></a></td>
                    <?php if ($bentuk=="all" || $bentuk==null) {?>
                    <?php if ($jalur=="all" || $jalur==null) :?>
                    <td><?=number_format($value->kursus,0,",",".")?></td>
                    <td><?=number_format($value->ponpes,0,",",".")?></td>
                    <td><?=number_format($value->pkbm,0,",",".")?></td>
                    <?php endif; if ($jalur=="jf") :?>
                    <td><?=number_format($value->pdfula,0,",",".")?></td>
                    <td><?=number_format($value->pdfwustha,0,",",".")?></td>
                    <td><?=number_format($value->pdfulya,0,",",".")?></td>
                    <?php endif; if ($jalur=="jn") :?>
                    <td><?=number_format($value->kursus,0,",",".")?></td>
                    <td><?=number_format($value->ponpes,0,",",".")?></td>
                    <td><?=number_format($value->pkbm,0,",",".")?></td>
                    <?php endif;?>
                    <?php } ?>
                    <td><?=number_format($value->total,0,",",".")?></td>
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
            { responsivePriority: 1, targets: -1 }
        ]
    });
} );

$(document).on('change', '#jalur_pendidikan', function () {
        getdaftarbentuk();
    });

function getdaftarbentuk() {
    isihtml1 = '<select class="combobox1" id="bentuk_pendidikan" name="bentuk_pendidikan">'+
               '<option value="all">.. tunggu ..</option>';
    isihtml3 = '</select>';
    $('#dbentukpendidikan').html(isihtml1 + isihtml3);
    $.ajax({
        type: 'GET',
        data: {jalurpendidikan: $('#jalur_pendidikan').val(),tingkat: 'DIKMAS'},
        dataType: 'json',
        cache: false,
        url: '<?php echo base_url();?>/pendidikan/getbentukpendidikan',
        success: function (result) {
            // alert ($('#jalur_pendidikan').val());
            isihtml1 = '<select class="combobox1" id="bentuk_pendidikan" name="bentuk_pendidikan">'+
               '<option value="all">-Semua Bentuk-</option>';
            isihtml2 = "";
            $.each(result, function (i, result) {
                isihtml2 = isihtml2 + "<option value='" + result.bentuk_pendidikan_id + "'>" + result.nama + "</option>";
            });
            $('#dbentukpendidikan').html(isihtml1 + isihtml2 + isihtml3);
        }
    });
}

function filterdata()
{
    window.open("<?=site_url('pendidikan/dikmas')."/".$kode."/".$level?>"+"/"+$('#jalur_pendidikan').val()
    +"/"+$('#bentuk_pendidikan').val()+"/"+$('#status_sekolah').val(), target="_self");
}

</script>
<?= $this->endSection() ?>