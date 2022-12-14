<?php
$totalsemua = 0;
$total1 = 0;
$total2 = 0;
$total3 = 0;
$total4 = 0;

$link1 = site_url('pendidikan/program/paud')."/".substr($kode, 0, 2)."0000"."/1/".$status;
$link2 = site_url('pendidikan/program/paud')."/".substr($kode, 0, 4)."00"."/2/".$status;
$breadcrump1 = "";
$breadcrump2 = "";
$judulnama = "Nama Provinsi";

if ($level==1)
{
    $breadcrump1 = ">> ".$namalevel1;
    if (substr($kode,0,2)!='35')
        $judulnama = "Nama Kota/Kabupaten";
    else
        $judulnama = "Nama Negara";
}
else if ($level>1)
{
    $breadcrump1 = '>> <a href="'.$link1.'">'.$namalevel1.'</a>';
}

if ($level==2)
{
    $breadcrump2 = ">> ".$namalevel2;
    if (substr($kode,0,2)!='35')
        $judulnama = "Nama Kecamatan";
    else
        $judulnama = "Nama Kota";
}
else if ($level>2)
{
    $breadcrump2 = '>> <a href="'.$link2.'">'.$namalevel2.'</a>';
}


$piljalur1 = "";
$piljalur2 = "";
$piljalur3 = "";

$pilbentuk1 = "";

$piljalur1 = "selected";
$styletabel = "max-width:900px;";

$pilstatus1 = "";
$pilstatus2 = "";
$pilstatus3 = "";

if ($status=="all")
    $pilstatus1 = "selected";
else if ($status=="s1")
    $pilstatus2 = "selected";
else if ($status=="s2")
    $pilstatus3 = "selected";

?>

<?= $this->extend('layout/default') ?>

<?= $this->section('titel') ?>
<title>Data Pendidikan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <?php if($level>0) {?>
    <div class="breadcrumps"><a href="<?=site_url('pendidikan/program/paud')?>">Indonesia</a> 
    <?=$breadcrump1;?>
    <?=$breadcrump2;?>
    </div>
    <?php }?>
    <div class="judulatas">JUMLAH PROGRAM / LAYANAN PAUD PER <?=$namapilihan?></div>
    <div class="card-body p-0">
    <center>
        <div class="">
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
        </div>
    </center>
        
        <div class="mytable">
           <div style="align:center;margin:auto;<?=$styletabel?>">
                <table class="table table-striped" id='table1'>
                <thead><tr>
                    <th width="10px">No</th>
                    <th width="200px"><?=$judulnama?></th>
                    <th>PAUD</th>
                </tr>
                </thead>
                <tbody align="right">
                <?php 
                foreach ($datanas as $key => $value) :?>
                <?php
                    // $total1 = $total1 + $value->paketa;
                    // $total2 = $total2 + $value->paketb;
                    // $total3 = $total3 + $value->paketc;
                    // $total4 = $total4 + $value->total;
                ?>
                <tr>
                    <td style="padding-right:0px;"><?=$key + 1?></td>
                    <td align="left" class="link1"><a href="<?=site_url('pendidikan/program/paud/'.
                    trim($value->kode_wilayah).'/'.($level+1).'/'.$status)?>"><?php
                    if ($level==0 && $value->nama!="Luar Negeri")
                    {
                        echo substr($value->nama,5);
                    }
                    else if ($level==2 && substr($kode,0,2)!='35')
                    {
                        echo substr($value->nama,4);
                    }
                    else
                    {
                        echo $value->nama;
                    }?></a></td>
                    <td><?=$value->paud?></td>
                </tr>
                
                <?php endforeach;?>
                </tbody>

                <tfoot align="right">
                <tr><th></th><th></th><th></th></tr>
                </tfoot>

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
            { responsivePriority: 1, targets: -1 },
            { targets: 2, render: $.fn.dataTable.render.number('.', ',', 0, '') },
            { className: 'text-right', targets: [2] },
            
            // { width: '200px', targets: [1] },
            // { width: '100px', targets: [1,2] },
        ],
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // converting to interger to find total
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // var monTotal = api
            //     .column( 1 )
            //     .data()
            //     .reduce( function (a, b) {
            //         return intVal(a) + intVal(b);
            //     }, 0 );
				
	        var total1 = api
                .column( 2 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            

            // Update footer by showing the total with the reference of the column index 
            var numFormat = $.fn.dataTable.render.number( '.', ',', 0, '' ).display;

	        $( api.column( 0 ).footer() ).html('');
            $( api.column( 1 ).footer() ).html('TOTAL SEMUA');
            $( api.column( 2 ).footer() ).html(numFormat(total1));
            $( api.column( 2 ).footer() ).css({'text-align':'right','padding-right':'15px'});

        },
        "processing": true,
    });

} );

function filterdata()
{
    window.open("<?=site_url('pendidikan/program/paud')."/".$kode."/".$level?>"+
    "/"+$('#status_sekolah').val(), target="_self");
}

</script>
<?= $this->endSection() ?>