<?php
$totalsemua = 0;
$total1 = 0;

$link1 = site_url('pendidikan/tidakaktif')."/".substr($kode, 0, 2)."0000"."/1/";
$link2 = site_url('pendidikan/tidakaktif')."/".substr($kode, 0, 4)."00"."/2/";
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
<title>Data Pendidikan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php if($level>0) {?>
<div class="breadcrumps"><a href="<?=site_url('pendidikan/tidakaktif')?>">Indonesia</a>
    <?=$breadcrump1;?>
    <?=$breadcrump2;?>
</div>
<?php } ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="judulatas">JUMLAH SATUAN PENDIDIKAN TIDAK AKTIF PER <?=$namapilihan?></div>
            <div class="card-body p-0">

                <div class="mytable">
                    <div style="align:center;margin:auto;<?=$styletabel?>">
                        <table class="table table-striped" id='table1'>
                            <thead>
                                <tr>
                                    <th rowspan="2" width="10px">No</th>
                                    <th rowspan="2"><?=$judulnama?></th>
                                    <th colspan="6">Tahun Sekolah Tidak Aktif</th>
                                </tr>
                                <tr>
                                    <th>&lt;<?=date('Y')-3; ?></th>
                                    <th><?=date('Y')-3; ?></th>
                                    <th><?=date('Y')-2; ?></th>
                                    <th><?=date('Y')-1; ?></th>
                                    <th><?=date('Y'); ?></th>
                                    <th>Total</th>
                                </tr>
                            </thead>

                            <tbody align="right">
                                <?php foreach ($datanas as $key => $value) :?>
                                <tr>
                                    <td><?=$key + 1?></td>
                                    <td align="left" class="link1">
                                        <?php if($level<=2) {?>
                                        <a href="<?=site_url('pendidikan/tidakaktif/'.
                                        trim($value['kode_wilayah']).'/'.($level+1))?>"><?php
                                        if ($level==0 && $value['nama']!="Luar Negeri")
                                        {
                                            echo substr($value['nama'],5);
                                        }
                                        else if ($level==2 && substr($kode,0,2)!='35')
                                        {
                                            echo substr($value['nama'],4);
                                        }
                                        else
                                        {
                                            echo $value['nama'];
                                        }?></a>
                                        <?php } else 
                                    {
                                        if ($level==0 && $value['nama']!="Luar Negeri")
                                        {
                                            echo substr($value['nama'],5);
                                        }
                                        else if ($level==2 && substr($kode,0,2)!='35')
                                        {
                                            echo substr($value['nama'],4);
                                        }
                                        else
                                        {
                                            echo $value['nama'];
                                        }
                                    }?>
                                    </td>
                                    <td><?=$value['t_1']?></td>
                                    <td><?=$value['t_2']?></td>
                                    <td><?=$value['t_3']?></td>
                                    <td><?=$value['t_4']?></td>
                                    <td><?=$value['t_5']?></td>
                                    <td><?=$value['total']?></td>
                                </tr>

                                <?php endforeach;?>
                            </tbody>

                            <tfoot align="right">
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>

                        </table>

                        <table class="table table-striped" id='table2' display='none'>
                            <thead>
                                <tr>
                                    <th width="10px">No</th>
                                    <th><?=$judulnama?></th>
                                    <th>Tidak Aktif &lt; <?=date('Y')-3 ?>< /th>
                                    <th>Tidak Aktif Th. <?=date('Y')-3 ?></th>
                                    <th>Tidak Aktif Th. <?=date('Y')-2 ?></th>
                                    <th>Tidak Aktif Th. <?=date('Y')-1 ?></th>
                                    <th>Tidak Aktif Th. <?=date('Y') ?></th>
                                    <th>Total</th>
                                </tr>
                            </thead>

                            <tbody align="right">
                                <?php foreach ($datanas as $key => $value) :?>
                                <tr>
                                    <td><?=$key + 1?></td>
                                    <td align="left" class="link1">
                                        <?php if($level<=2) {?>
                                        <a href="<?=site_url('pendidikan/tidakaktif/'.
                                        trim($value['kode_wilayah']).'/'.($level+1))?>"><?php
                                        if ($level==0 && $value['nama']!="Luar Negeri")
                                        {
                                            echo substr($value['nama'],5);
                                        }
                                        else if ($level==2 && substr($kode,0,2)!='35')
                                        {
                                            echo substr($value['nama'],4);
                                        }
                                        else
                                        {
                                            echo $value['nama'];
                                        }?></a>
                                        <?php } else 
                                    {
                                        if ($level==0 && $value['nama']!="Luar Negeri")
                                        {
                                            echo substr($value['nama'],5);
                                        }
                                        else if ($level==2 && substr($kode,0,2)!='35')
                                        {
                                            echo substr($value['nama'],4);
                                        }
                                        else
                                        {
                                            echo $value['nama'];
                                        }
                                    }?>
                                    </td>
                                    <td><?=$value['t_1']?></td>
                                    <td><?=$value['t_2']?></td>
                                    <td><?=$value['t_3']?></td>
                                    <td><?=$value['t_4']?></td>
                                    <td><?=$value['t_5']?></td>
                                    <td><?=$value['total']?></td>
                                </tr>

                                <?php endforeach;?>
                            </tbody>

                            <tfoot align="right">
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>

                        </table>
                        <!-- <span style="color:darkgrey;padding-bottom:25px;"><i>*) smst = semester</i></span><br><br> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scriptdata') ?>
<script>
$(document).ready(function() {
    if (detectMob() == "desktop") {
        var alamat = $('#table1');
    } else {
        var alamat = $('#table2');
    }

    alamat.DataTable({
        responsive: true,
        columnDefs: [{
                responsivePriority: 1,
                targets: -1
            },
            {
                targets: 2,
                render: $.fn.dataTable.render.number('.', ',', 0, '')
            },
            {
                targets: 3,
                render: $.fn.dataTable.render.number('.', ',', 0, '')
            },
            {
                targets: 4,
                render: $.fn.dataTable.render.number('.', ',', 0, '')
            },
            {
                targets: 5,
                render: $.fn.dataTable.render.number('.', ',', 0, '')
            },
            {
                targets: 6,
                render: $.fn.dataTable.render.number('.', ',', 0, '')
            },
            {
                targets: 7,
                render: $.fn.dataTable.render.number('.', ',', 0, '')
            },
            {
                className: 'text-right',
                targets: [2]
            },
        ],
        "footerCallback": function(row, data, start, end, display) {
            var api = this.api(),
                data;

            // converting to interger to find total
            var intVal = function(i) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                    i : 0;
            };

            var total1 = api
                .column(2)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            var total2 = api
                .column(3)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            var total3 = api
                .column(4)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            var total4 = api
                .column(5)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            var total5 = api
                .column(6)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            var total6 = api
                .column(7)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer by showing the total with the reference of the column index 
            var numFormat = $.fn.dataTable.render.number('.', ',', 0, '').display;

            $(api.column(0).footer()).html('');
            $(api.column(1).footer()).html('TOTAL SEMUA');
            $(api.column(2).footer()).html(numFormat(total1));
            $(api.column(2).footer()).css({
                'text-align': 'right',
                'padding-right': '15px'
            });
            $(api.column(3).footer()).html(numFormat(total2));
            $(api.column(3).footer()).css({
                'text-align': 'right',
                'padding-right': '15px'
            });
            $(api.column(4).footer()).html(numFormat(total3));
            $(api.column(4).footer()).css({
                'text-align': 'right',
                'padding-right': '15px'
            });
            $(api.column(5).footer()).html(numFormat(total4));
            $(api.column(5).footer()).css({
                'text-align': 'right',
                'padding-right': '15px'
            });
            $(api.column(6).footer()).html(numFormat(total5));
            $(api.column(6).footer()).css({
                'text-align': 'right',
                'padding-right': '15px'
            });
            $(api.column(7).footer()).html(numFormat(total6));
            $(api.column(7).footer()).css({
                'text-align': 'right',
                'padding-right': '15px'
            });
        },
        "processing": true,
    });

});

function detectMob() {
    if (window.innerWidth <= window.innerHeight) {
        $('#table1').hide();
        $('#table2').show();
        return "mobile";
    } else {
        $('#table2').hide();
        $('#table1').show();
        return "desktop";
    }

}
</script>
<?= $this->endSection() ?>