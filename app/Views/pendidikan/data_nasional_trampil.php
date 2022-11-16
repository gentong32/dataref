<?php
$totalsemua = 0;
$total1 = 0;
$total2 = 0;
$total3 = 0;
$total4 = 0;

$link1 = site_url('pendidikan/program/terampil')."/".substr($kode, 0, 2)."0000"."/1/".$status;
$link2 = site_url('pendidikan/program/terampil')."/".substr($kode, 0, 4)."00"."/2/".$status;
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
$styletabel = "max-width:100%;";

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
<link rel="stylesheet" href="<?=base_url()?>/template/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>

    <?php if($level>0) {?>
    <div class="breadcrumps"><a href="<?=site_url('pendidikan/program/terampil')?>">Indonesia</a> 
    <?=$breadcrump1;?>
    <?=$breadcrump2;?>
    </div>
    <?php }?>
    <div class="judulatas">JUMLAH PROGRAM / LAYANAN KETERAMPILAN KERJA PER <?=$namapilihan?></div>
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
                <thead>
                <tr>
                    <th rowspan="2" width="10px">No</th>
                    <th rowspan="2" width="200px"><?=$judulnama?></th>
                    <th colspan="10">KKNI</th>
                </tr>
                <tr>
                    <th>Level 1</th>
                    <th>Level 2</th>
                    <th>Level 3</th>
                    <th>Level 4</th>
                    <th>Level 5</th>
                    <th>Level 6</th>
                    <th>Level 7</th>
                    <th>Level 8</th>
                    <th>Level 9</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody align="right">
                <?php 
                foreach ($datanas as $key => $value) :?>
                <tr>
                    <td style="padding-right:0px;"><?=$key + 1?></td>
                    <td align="left" class="link1"><a href="<?=site_url('pendidikan/program/terampil/'.
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
                    <td><?=$value->kkni1?></td>
                    <td><?=$value->kkni2?></td>
                    <td><?=$value->kkni3?></td>
                    <td><?=$value->kkni4?></td>
                    <td><?=$value->kkni5?></td>
                    <td><?=$value->kkni6?></td>
                    <td><?=$value->kkni7?></td>
                    <td><?=$value->kkni8?></td>
                    <td><?=$value->kkni9?></td>
                    <td><?=$value->total?></td>
                </tr>
                
                <?php endforeach;?>
                </tbody>

                <tfoot align="right">
                <tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>
                </tfoot>

                </table>
                <a href="<?=site_url('pustaka/keterampilankerja/penyetaraan/link');?>"><span class="link1" style="padding-bottom:25px;"><i>*) informasi level KKNI</i></span></a><br><br>
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
            { targets: 3, render: $.fn.dataTable.render.number('.', ',', 0, '') },
            { targets: 4, render: $.fn.dataTable.render.number('.', ',', 0, '') },
            { targets: 5, render: $.fn.dataTable.render.number('.', ',', 0, '') },
            { targets: 6, render: $.fn.dataTable.render.number('.', ',', 0, '') },
            { targets: 7, render: $.fn.dataTable.render.number('.', ',', 0, '') },
            { targets: 8, render: $.fn.dataTable.render.number('.', ',', 0, '') },
            { targets: 9, render: $.fn.dataTable.render.number('.', ',', 0, '') },
            { targets: 10, render: $.fn.dataTable.render.number('.', ',', 0, '') },
            { targets: 11, render: $.fn.dataTable.render.number('.', ',', 0, '') },
            { className: 'text-center', targets: [2,3,4,5,6,7,8,9,10,11] },
            
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
                
            var total7 = api
                .column( 8 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                
            var total8 = api
                .column( 9 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                
            var total9 = api
                .column( 10 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                
            var total10 = api
                .column( 11 )
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
            $( api.column( 8 ).footer() ).html(numFormat(total7));
            $( api.column( 8 ).footer() ).css({'text-align':'right','padding-right':'15px'});
            $( api.column( 9 ).footer() ).html(numFormat(total8));
            $( api.column( 9 ).footer() ).css({'text-align':'right','padding-right':'15px'});
            $( api.column( 10 ).footer() ).html(numFormat(total9));
            $( api.column( 10 ).footer() ).css({'text-align':'right','padding-right':'15px'});
            $( api.column( 11 ).footer() ).html(numFormat(total10));
            $( api.column( 11 ).footer() ).css({'text-align':'right','padding-right':'15px'});

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
        data: {jalurpendidikan: $('#jalur_pendidikan').val(),tingkat: 'PAUD'},
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
    window.open("<?=site_url('pendidikan/program/terampil')."/".$kode."/".$level?>"+
    "/"+$('#status_sekolah').val(), target="_self");
}

</script>
<?= $this->endSection() ?>