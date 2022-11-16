<?php
$totalsemua = 0;
$total1 = 0;
$total2 = 0;
$total3 = 0;
$total4 = 0;
$total5 = 0;
$total6 = 0;

$link1 = site_url('pendidikan/dikmas')."/".substr($kode, 0, 2)."0000"."/1/".$jalur."/".$bentuk."/".$status;
$link2 = site_url('pendidikan/dikmas')."/".substr($kode, 0, 4)."00"."/2/".$jalur."/".$bentuk."/".$status;
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

$jalur=="jn";

$styletabel = "max-width:100%;";

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
else 
    $styletabel = "max-width:700px;";

if ($jalur=="all" && $bentuk=="all" && $status=="all")
$cekjalurbentukstatus = "";
else
$cekjalurbentukstatus = "/".$jalur."/".$bentuk."/".$status;

?>

<?= $this->extend('layout/default') ?>

<?= $this->section('titel') ?>
<title>Data Pendidikan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <?php if($level>0) {?>
    <div class="breadcrumps"><a href="<?=site_url('pendidikan/dikmas')?>">Indonesia</a> 
    <?=$breadcrump1;?>
    <?=$breadcrump2;?>
    </div>
    <?php } ?>
    <div class="judulatas">JUMLAH DATA SATUAN PENDIDIKAN (DIKMAS) PER <?=$namapilihan?></div>
    <div class="card-body p-0">
        <center>
        <div class="">
            <select class="combobox1" id="jalur_pendidikan" name="jalur_pendidikan">
                <option <?=$piljalur3?> value="jn">Jalur Nonformal</option>
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
        </div>
        </center>
        <div class="mytable">
           <div style="align:center;margin:auto;<?=$styletabel?>">
                <table class="table table-striped" id='table1'>
                <thead><tr>
                    <th width="10px">No</th>
                    <th><?=$judulnama?></th>
                    <?php if ($bentuk=="all" || $bentuk==null) {?>
                    <?php if ($jalur=="all" || $jalur==null) :?>
                    <th>Kursus</th>
                    <th>TBM</th>
                    <th>PKBM</th>
                    <th>SKB</th>
                    <th>Ponpes</th>
                    <th>Total</th>
                    <?php endif; 
                    if ($jalur=="jn") :?>
                    <th>Kursus</th>
                    <th>TBM</th>
                    <th>PKBM</th>
                    <th>SKB</th>
                    <th>Ponpes</th>
                    <th>Total</th>
                    <?php endif; 
                    if ($jalur=="jf") :?>
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
                    ?>
                <tr>
                    <td><?=$key + 1?></td>
                    <td align="left" class="link1"><a href="<?=site_url('pendidikan/dikmas/'.
                    trim($value->kode_wilayah).'/'.($level+1).$cekjalurbentukstatus)?>"><?php
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
                    <?php if ($bentuk=="all" || $bentuk==null) {?>
                    <?php if ($jalur=="all" || $jalur==null) :?>
                    <td><?=$value->kursus?></td>
                    <td><?=$value->tbm?></td>
                    <td><?=$value->pkbm?></td>
                    <td><?=$value->skb?></td>
                    <td><?=$value->ponpes?></td>
                    <?php endif; if ($jalur=="jn") :?>
                    <td><?=$value->kursus?></td>
                    <td><?=$value->tbm?></td>
                    <td><?=$value->pkbm?></td>
                    <td><?=$value->skb?></td>
                    <td><?=$value->ponpes?></td>
                    <?php endif; if ($jalur=="jf") :?>
                    <?php endif;?>
                    <?php } ?>
                    <td><?=$value->total?></td>
                </tr>
                
                <?php endforeach;?>
                </tbody>

                <tfoot align="right">
                <?php if ($bentuk=="all") {?>
                    <?php if ($jalur=="all") { ?>
                        <tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>
                    <?php } else if ($jalur=="jn") { ?>
                        <tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>
                    <?php } else if ($jalur=="jf") { ?>
                        <tr><th></th><th></th><th></th></tr>
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
            { className: 'text-right', targets: [2] },
            <?php if (($jalur=="all" || $jalur=="jn") && $bentuk=="all") { ?>
                { targets: 3, render: $.fn.dataTable.render.number('.', ',', 0, '') },
                { targets: 4, render: $.fn.dataTable.render.number('.', ',', 0, '') },
                { targets: 5, render: $.fn.dataTable.render.number('.', ',', 0, '') },
                { targets: 6, render: $.fn.dataTable.render.number('.', ',', 0, '') },
                { targets: 7, render: $.fn.dataTable.render.number('.', ',', 0, '') },
                { className: 'text-right', targets: [3,4,5,6,7] },
            <?php } ?>
            
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
            
            <?php if (($jalur=="all" || $jalur=="jn") && $bentuk=="all") { ?>
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
				
            <?php } ?>
            // Update footer by showing the total with the reference of the column index 
            var numFormat = $.fn.dataTable.render.number( '.', ',', 0, '' ).display;

	        $( api.column( 0 ).footer() ).html('');
            $( api.column( 1 ).footer() ).html('TOTAL SEMUA');
            $( api.column( 2 ).footer() ).html(numFormat(total1));
            $( api.column( 2 ).footer() ).css({'text-align':'right','padding-right':'15px'});
            <?php if (($jalur=="all" || $jalur=="jn") && $bentuk=="all") { ?>
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
            <?php } ?>
        },
        "processing": true,
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
    window.open("<?=site_url('pendidikan/dikmas')."/".$kode."/".$level?>"+"/"+$('#jalur_pendidikan').val()
    +"/"+$('#bentuk_pendidikan').val()+"/"+$('#status_sekolah').val(), target="_self");
}

</script>
<?= $this->endSection() ?>