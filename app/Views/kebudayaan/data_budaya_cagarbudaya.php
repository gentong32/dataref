<?php
$totalsemua = 0;
$total1 = 0;
$total2 = 0;
$total3 = 0;
$total4 = 0;
$total5 = 0;
$total6 = 0;

$link1 = site_url('pendidikan/yayasan')."/".substr($kode, 0, 2)."0000"."/1/";
$link2 = site_url('pendidikan/yayasan')."/".substr($kode, 0, 4)."00"."/2/";
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

$styletabel = "max-width:900px;";

?>

<?= $this->extend('layout/default') ?>

<?= $this->section('titel') ?>
<title>Data Referensi</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <?php if($level>0) {?>
    <div class="breadcrumps"><a href="<?=site_url('kebudayaan/cagarbudaya')?>">Indonesia</a> 
    <?=$breadcrump1;?>
    <?=$breadcrump2;?>
    </div>
    <?php } ?>
    <div class="judulatas">JUMLAH CAGAR BUDAYA PER <?=$namapilihan?></div>
    <div class="card-body p-0">
    
        <div class="mytable">
           <div style="align:center;margin:auto;<?=$styletabel?>">
                <table class="table table-striped" id='table1'>
                <thead><tr>
                    <th width="10px">No</th>
                    <th><?=$judulnama?></th>
                    <th>Benda</th>
                    <th>Bangunan</th>
                    <th>Situs</th>
                    <th>Struktur</th>
                    <th>Kawasan</th>
                    <th>Total</th>
                </tr>
                </thead>

                <tbody align="right">
                <?php foreach ($datanas as $key => $value) :?>
                    <?php
                    $totalsemua = $totalsemua +  $value->total;
                    ?>
                <tr>
                    <td><?=$key + 1?></td>
                    <?php if($level<=2){?>
                    <td align="left" class="link1"><a href="<?=site_url('kebudayaan/cagarbudaya/'.
                    '/'.trim($value->kode_wilayah).'/'.($level+1))?>"><?php
                    if ($level==0)
                    {
                        echo substr($value->nama,5);
                    }
                    else if ($level==2)
                    {
                        echo substr($value->nama,4);
                    }
                    else
                    {
                        echo $value->nama;
                    }?></a></td>
                    <?php } else {?>
                    <td align="left" class="link1"><?php
                    if ($level==0)
                    {
                        echo substr($value->nama,5);
                    }
                    else if ($level==2)
                    {
                        echo substr($value->nama,4);
                    }
                    else
                    {
                        echo $value->nama;
                    }?></td>
                    <?php } ?>
                    <td><?=$value->benda?></td>
                    <td><?=$value->bangunan?></td>
                    <td><?=$value->situs?></td>
                    <td><?=$value->struktur?></td>
                    <td><?=$value->kawasan?></td>
                    <td><?=$value->total?></td>
                </tr>
                
                <?php endforeach;?>
                </tbody>

                <tfoot align="right">
                    <tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>
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
				
	        var total2 = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
	        var total3 = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
	        var total4 = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
	        var total5 = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
	        var total6 = api
                .column( 7 )
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
            $( api.column( 3 ).footer() ).html(numFormat(total2));
            $( api.column( 3 ).footer() ).css({'text-align':'right','padding-right':'15px'});
            $( api.column( 4 ).footer() ).html(numFormat(total3));
            $( api.column( 4 ).footer() ).css({'text-align':'right','padding-right':'15px'});
            $( api.column( 5 ).footer() ).html(numFormat(total4));
            $( api.column( 5 ).footer() ).css({'text-align':'right','padding-right':'15px'});
            $( api.column( 6 ).footer() ).html(numFormat(total5));
            $( api.column( 6 ).footer() ).css({'text-align':'right','padding-right':'15px'});
            $( api.column( 7 ).footer() ).html(numFormat(total6));
            $( api.column( 7 ).footer() ).css({'text-align':'right','padding-right':'15px'});
        },
        "processing": true,
    });

} );

</script>
<?= $this->endSection() ?>