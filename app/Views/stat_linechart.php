<?= $this->extend('layout/default_chart') ?>

<?= $this->section('titel') ?>
<title>Home &mdash; Data Pendidikan dan Kebudayaan</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="tophome">
        <div class="container">
            <div class="row">
                <div style="margin-left:10px;margin-right:10px;width:100%;">
                        <center><h4><div id="ijudul">Grafik Pengunjung Harian untuk Bulan <?=$namabulan." ".$tahun;?></div></h4>
                        <button id="bt1" onclick="diklik(1)" class="buttonUtama buttonAktif">HARIAN</button>
                        <button id="bt2" onclick="diklik(2)" class="buttonUtama">BULANAN</button>
                        <!-- <button onclick="diklik(2)" class="buttonUtama">TAHUNAN</button> -->
                        </center>
                        <div style="margin-top:15px;" id="graph"></div>
                        
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scriptdata') ?>
<link rel="stylesheet" href="<?=base_url()?>/morris/morris.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?=base_url()?>/morris/morris.js"></script>

<script>

var day_data1 = [
    <?php 
    foreach ($datapengunjungharian as $datarow)
    {
        $tanggal = intval(substr($datarow->date,8));
        echo "{x: '".$tanggal."', 'pengunjung': ".$datarow->pengunjung."},";
    }
    ?>
];

var day_data2 = [
    <?php 
    foreach ($datapengunjungbulanan as $datarow)
    {
        $bulan = $datarow->bulan;
        echo "{x: '".$bulan."', 'pengunjung': ".$datarow->pengunjung."},";
    }
    ?>
];

Morris.Line({
        element: 'graph',
        data: day_data1,
        xkey: 'x',
        ykeys: ['pengunjung'],
        labels: ['pengunjung'],
        lineColors: ['#0b62a4'],
        lineWidth: 3,
        smooth: true,
        xLabels: 'x',
        parseTime: false
        });

function diklik(indeks)
{
    $('#bt1, #bt2').removeClass('buttonAktif');
    if(indeks==1)
        {
            datanya = day_data1;
            $("#ijudul").html("Grafik Pengunjung Harian untuk Bulan <?=$namabulan." ".$tahun;?>");
            $("#bt1").addClass('buttonAktif');
        }
    else if(indeks==2)
        {
            datanya = day_data2;
            $("#ijudul").html("Grafik Pengunjung Bulanan untuk Tahun <?=$tahun;?>");
            $("#bt2").addClass('buttonAktif');
        }

    $("#graph").empty();
    Morris.Line({
        element: 'graph',
        data: datanya,
        xkey: 'x',
        ykeys: ['pengunjung'],
        labels: ['pengunjung'],
        lineColors: ['#0b62a4'],
        lineWidth: 3,
        smooth: true,
        xLabels: 'x',
        parseTime: false
        });
}

    
    // Morris.Line({
    //     element: 'graph',
    //     data: [
    //         {x: '2011 Q1', y: 3, z: 3},
    //         {x: '2011 Q2', y: 2, z: 0},
    //         {x: '2011 Q3', y: 2, z: 5},
    //         {x: '2011 Q4', y: 4, z: 4}
    //     ],
    //     xkey: 'x',
    //     ykeys: ['y', 'z'],
    //     labels: ['Y', 'Z'],
    //     lineWidth: 3,
    //     pointSize: 4,
    //     lineColors: ['#0b62a4', '#7A92A3', '#4da74d', '#afd8f8', '#edc240', '#cb4b4b', '#9440ed'],
    //     pointStrokeWidths: [1],
    //     pointStrokeColors: ['#ffffff'],
    //     pointFillColors: [],
    //     smooth: true,
    //     shown: true,
    //     xLabels: 'auto',
    //     xLabelFormat: null,
    //     xLabelMargin: 24,
    //     hideHover: false,
    //     trendLine: false,
    //     trendLineWidth: 2,
    //     trendLineColors: ['#689bc3', '#a2b3bf', '#64b764']
    //     }).on('click', function(i, row){
    //     console.log(i, row);
    //     });

</script>
<?= $this->endSection() ?>