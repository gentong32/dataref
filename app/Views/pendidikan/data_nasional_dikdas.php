<?php
$totalsemua = 0;
$totalsd = 0;
$totalsmp = 0;

$link1 = site_url('pendidikan/dikdas')."/".substr($kode, 0, 2)."0000"."/1/".$jalur."/".$bentuk."/".$status;
$link2 = site_url('pendidikan/dikdas')."/".substr($kode, 0, 4)."00"."/2/".$jalur."/".$bentuk."/".$status;
$breadcrump1 = "";
$breadcrump2 = "";

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
    <?php if($level>0) {?>
    <div class="breadcrumps"><a href="<?=site_url('pendidikan/dikdas')?>">Indonesia</a> 
    <?=$breadcrump1;?>
    <?=$breadcrump2;?>
    </div>
    <?php } ?>
    <div class="judulatas">JUMLAH DATA SATUAN PENDIDIKAN (DIKDAS) PER <?=$namapilihan?></div>
    <!-- <div class="totaljendral">[Total Keseluruhan : ...]</div> -->
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
                <?php if (sizeof($daftarbentuk)==0)
                { ?>
                    <option <?=$piljalur1?> value="all">-tidak ada-</option>
                <?php }
                else
                { ?>
                    <option <?=$piljalur1?> value="all">-Semua Bentuk-</option>
                <?php }
                ?>  
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
        </div>
    </center>
        <div style="margin:30px;">
            <div class="">
                <table class="table table-striped" id='table1'>
                <thead><tr>
                    <th width="10px">#</th>
                    <th>Nama</th>
                    <?php if ($bentuk=="all" || $bentuk==null) {?>
                        <?php if ($jalur=="all" || $jalur==null) :?>
                        <th>SD (Sederajat)</th>
                        <th>SMP (Sederajat)</th>
                        <th>Total</th>
                        <?php endif; 
                        if ($jalur=="jf") :?>
                        <th>SD (Sederajat)</th>
                        <th>SMP (Sederajat)</th>
                        <th>Total</th>
                        <?php endif; 
                        if ($jalur=="jn") :?>
                        <th>Total</th>
                        <?php endif ?>
                    <?php } else {?> 
                      
                        <th><?=$namabentuk?></th>
                    <?php }?> 
                </tr>
                </thead>
                <tbody align="right">
                <?php foreach ($datanas as $key => $value) :?>
                    <?php
                    $totalsemua = $totalsemua +  $value->total;
                    if ($bentuk=="all")
                    {
                        $totalsd = $totalsd + $value->sdsederajat;
                        $totalsmp = $totalsmp + $value->smpsederajat;
                    }
                    ?>
                <tr>
                    <td style="padding-right:0px;"><?=$key + 1?></td>
                    <td align="left" class="link1"><a href="<?=site_url('pendidikan/dikdas/'.trim($value->kode_wilayah).'/'.($level+1).$cekjalurbentukstatus)?>"><?=$value->nama?></a></td>
                    <?php if ($bentuk=="all" || $bentuk==null) {?>
                    <?php if ($jalur=="all" || $jalur==null) :?>
                    <td><?=$value->sdsederajat?></td>
                    <td><?=$value->smpsederajat?></td>
                    <?php endif; 
                    if ($jalur=="jf") :?>
                    <td><?=$value->sdsederajat?></td>
                    <td><?=$value->smpsederajat?></td>
                    <?php endif; 
                    if ($jalur=="jn") :?>
                    <?php endif;?>
                    <?php }
                    else {?>
                  
                    <?php } ?>
                    <td><?=$value->total?></td>
                </tr>
                <?php endforeach;?>
                
                </tbody>
                <tfoot align="right">
                <?php if ($bentuk=="all") {?>
                    <?php if ($jalur=="all") { ?>
                        <tr><th></th><th></th><th></th><th></th><th></th></tr>
                    <?php } else if ($jalur=="jf") { ?>
                        <tr><th></th><th></th><th></th><th></th><th></th></tr>
                    <?php } else if ($jalur=="jn") { ?>
                        <tr><th></th></tr>
                    <?php } 
                    } else { ?>
                        <tr><th></th><th></th><th></th></tr>
                    <?php } ?>
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
            <?php if (($jalur=="all" || $jalur=="jf") && $bentuk=="all") { ?>
                { targets: 3, render: $.fn.dataTable.render.number('.', ',', 0, '') },
                { targets: 4, render: $.fn.dataTable.render.number('.', ',', 0, '') },
            <?php } ?>
            { className: 'text-right', targets: [2,3,4] }
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
			
            <?php if (($jalur=="all" || $jalur=="jf") && $bentuk=="all") { ?>
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
            
            <?php } ?>
				
	        //  var total4 = api
            //     .column( 5 )
            //     .data()
            //     .reduce( function (a, b) {
            //         return intVal(a) + intVal(b);
            //     }, 0 );
			
            // var total5 = api
            //     .column( 6 )
            //     .data()
            //     .reduce( function (a, b) {
            //         return intVal(a) + intVal(b);
            //     }, 0 );
				
            // Update footer by showing the total with the reference of the column index 
            var numFormat = $.fn.dataTable.render.number( '.', ',', 0, '' ).display;

	        $( api.column( 0 ).footer() ).html('');
            $( api.column( 1 ).footer() ).html('TOTAL SEMUA');
            $( api.column( 2 ).footer() ).html(numFormat(total1));
            $( api.column( 2 ).footer() ).css({'text-align':'right','padding-right':'15px'});
            <?php if (($jalur=="all" || $jalur=="jf") && $bentuk=="all") { ?>
                $( api.column( 3 ).footer() ).html(numFormat(total2));
                $( api.column( 3 ).footer() ).css({'text-align':'right','padding-right':'15px'});
                $( api.column( 4 ).footer() ).html(numFormat(total3));
                $( api.column( 4 ).footer() ).css({'text-align':'right','padding-right':'15px'});
            <?php } ?>
        },
        "processing": true,
    });
    
    // $('.totaljendral').html('[Total Keseluruhan : <?php //echo number_format($totalsemua,0,",",".");?>]');
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
        data: {jalurpendidikan: $('#jalur_pendidikan').val(),tingkat: 'DIKDAS'},
        dataType: 'json',
        cache: false,
        url: '<?php echo base_url();?>/pendidikan/getbentukpendidikan',
        success: function (result) {
            
            isihtml1 = '<select class="combobox1" id="bentuk_pendidikan" name="bentuk_pendidikan">'+
               '<option value="all">-Semua Bentuk-</option>';
            isihtml2 = "";
            var total=0;
            $.each(result, function (i, result) {
                total++;
                isihtml2 = isihtml2 + "<option value='" + result.bentuk_pendidikan_id + "'>" + result.nama + "</option>";
            });

            $('.tb_utama').prop('disabled', false);
            if (total==0)
            {
                isihtml1 = '<select class="combobox1" id="bentuk_pendidikan" name="bentuk_pendidikan">'+
               '<option value="all">-tidak ada-</option>';
               $('.tb_utama').prop('disabled', true);
            }
            
            $('#dbentukpendidikan').html(isihtml1 + isihtml2 + isihtml3);
        }
    });
}

function filterdata()
{
    window.open("<?=site_url('pendidikan/dikdas')."/".$kode."/".$level?>"+"/"+$('#jalur_pendidikan').val()
    +"/"+$('#bentuk_pendidikan').val()+"/"+$('#status_sekolah').val(), target="_self");
}

</script>
<?= $this->endSection() ?>