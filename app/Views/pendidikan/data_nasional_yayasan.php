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

$styletabel = "max-width:700px;";

?>

<?= $this->extend('layout/default') ?>

<?= $this->section('titel') ?>
<title>Data Referensi</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <?php if($level>0) {?>
    <div class="breadcrumps"><a href="<?=site_url('pendidikan/yayasan')?>">Indonesia</a> 
    <?=$breadcrump1;?>
    <?=$breadcrump2;?>
    </div>
    <?php } ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-9 col-md-6 col-lg-8">
                <div class="judulatas">JUMLAH YAYASAN PER <?=$namapilihan?></div>
                <div class="card-body p-0">
                
                    <div class="mytable">
                    <div style="align:center;margin:auto;<?=$styletabel?>">
                            <table class="table table-striped" id='table1'>
                            <thead><tr>
                                <th width="10px">No</th>
                                <th><?=$judulnama?></th>
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
                                <td align="left" class="link1"><a href="<?=site_url('pendidikan/yayasan/'.
                                trim($value->kode_wilayah).'/'.($level+1))?>"><?php
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
                                <td><?=$value->total?></td>
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
                <span style="margin-left:20px;color:darkgrey;padding-bottom:25px;"><i>*) Proses Verifikasi dan Validasi</i></span><br><br>
            </div>
            <div class="col-sm-3 col-md-6 col-lg-4" style="margin-bottom:20px;">
                <div class="infoyayasan" style="height:90%;background-color: #e3ecee;margin:20px;padding:10px;">
                <h5>Definisi Yayasan Pendidikan</h5>
                Yayasan pendidikan adalah yayasan yang menyelenggarakan pendidikan baik formal maupun nonformal.<br>
                <h5>Dasar Hukum</h5>
                    Dasar hukum Pendirian Satuan Pendidikan <span style="font-weight:600;color:grey">(Kemdikbudristek)</span>: Permendikbud No. 81 Tahun 2013 Pasal 2, Permendikbud No. 36 Tahun 2014 Pasal 2, 
                    Permendikbud No. 84 Tahun 2014 Pasal 2, Permendikbud No. 7 Tahun 2020 Pasal 1.<br>
                    Dasar hukum Pendirian Satuan Pendidikan <span style="font-weight:600;color:grey">(Kemenag)</span>: PMA No. 14 Tahun 2014 Pasal, 
                    PMA No. 66 Tahun 2016 Pasal 9, PMA No. 30 Tahun 2020 Pasal 3, PMA No. 54 Tahun 2014 Pasal 4, 
                    PMA No. 27 Tahun 2016 Pasal 6,PMA No. 10 Tahun 2020 Pasal 6,PMA No. 39 Tahun 2014 Pasal 6.
                    <br>
                    <br>
                <!-- <h5>Aturan/mekanisme verifikasi</h5>
                    Operator melaporkan ke Pusat kemudian Operator melaporkan ke Pusat lalu Operator melaporkan ke Pusat<br> -->
                </div>
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

</script>
<?= $this->endSection() ?>