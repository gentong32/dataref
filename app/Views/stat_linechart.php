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
                        <div id="dpilihanbulan" style="margin-top:10px;">
                        Pilih bulan 
                            <select class="ibulan" id="bulanstat" name="bulanstat">
                                <?php
                                $dafbulan = ["Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember"];
                                for ($a=0;$a<12;$a++)
                                {
                                    if ($a==($bulan-1))
                                        echo "<option selected value='".($a+1)."'>".$dafbulan[($a)]."</option>";
                                    else
                                        echo "<option value='".($a+1)."'>".$dafbulan[($a)]."</option>";
                                }
                                ?>
                                
                            </select>
                            <select class="itahun" id="tahunstat" name="tahunstat">
                                <option value="2022">2022</option>
                            </select>
                        </div>
                    </center>
                        <div style="margin-top:15px;" id="graph"></div>
                        
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div style="border:1px solid black;margin:20px;">
                            <center><h5>
                                <div id="ijudul2" style="padding:25px;">Prosentase Device Pengguna Bulan <?=$namabulan." ".$tahun;?>
                            </div></h5>
                            <div style="width:40%;height:250px;margin-top:15px;">
                            <canvas id="myChart"></canvas>
                            </div>
                            
                            </center>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div style="border:1px solid black;margin:20px;">
                            <center><h5>
                                <div id="ijudul3" style="padding:25px;">Total Device Pengguna Bulan <?=$namabulan." ".$tahun;?>
                            </div></h5>
                            <div style="width:60%;height:250px;margin-top:15px;" id="graph2"></div>
                            </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?php 
$jumlah_mobile = $datamobilebulanini->total_mobile;
$jumlah_komputer = $datamobilebulanini->total_komputer;

if ($bulan==10 && $tahun==2022)
{
    $jumlah_takterhitung = $datapengunjungbulanini->pengunjung - ($jumlah_mobile + $jumlah_komputer);
    $jumlah_mobile = $jumlah_mobile+intval($jumlah_takterhitung / 2);
    $jumlah_komputer = $datapengunjungbulanini->pengunjung - $jumlah_mobile;

}

$persenmobile=intval($jumlah_mobile*100/($jumlah_komputer+$jumlah_mobile));
$persendesktop = 100 - $persenmobile;
?>


<?= $this->section('scriptdata') ?>
<link rel="stylesheet" href="<?=base_url()?>/morris/morris.css">


<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?=base_url()?>/morris/morris.js"></script>
<script src="<?=base_url()?>/charty/chart.js"></script>


<script>

$(document).on('change', '#bulanstat', function () {
        gantibulan();
    });

function gantibulan()
{
    var bulane = $('#bulanstat').val();
    var tahune = $('#tahunstat').val();

    window.open("<?=site_url('home/chart_pengunjung/')?>"+bulane+"/"+tahune,"_self");
}

var day_data1 = [
    <?php 
    foreach ($datapengunjungharian as $datarow)
    {
        $tanggal = intval(substr($datarow->date,8));
        echo "{x: '".$tanggal."', 'pengunjung': ".$datarow->pengunjung."},";
    }
    if ($bulan == date("n") && $tahun==date("Y"))
    echo "{x: '".intval(substr($datapengunjunghariini->date,8))."', 'pengunjung': ".$datapengunjunghariini->pengunjung."},"; 
    ?>
];

var day_data2 = [
    <?php 
    foreach ($datapengunjungbulanan as $datarow)
    {
        $bulan = $datarow->bulan;
        echo "{x: '".$bulan."', 'pengunjung': ".$datarow->pengunjung."},";
    }
    echo "{x: '".$datapengunjungbulanini->bulan."', 'pengunjung': ".$datapengunjungbulanini->pengunjung."},"; 
    ?>
];

var day_device = [
    <?php 
        echo "{x: 'mobile', 'total': ".$jumlah_mobile."},";
        echo "{x: 'desktop', 'total': ".$jumlah_komputer."},"; 
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
        hideHover: 'auto',
        parseTime: false
        });

Morris.Bar({
        element: 'graph2',
        data: day_device,
        xkey: 'x',
        ykeys: ['total'],
        labels: ['perangkat'],
        barColors: function (row, series, type) {
            if(row.label == "mobile") return "#77d579";
            else if(row.label == "desktop") return "#4094ac";
            },
        smooth: true,
        xLabelMargin: 24,
        hideHover: 'auto',
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
            $("#dpilihanbulan").show();
        }
    else if(indeks==2)
        {
            datanya = day_data2;
            $("#ijudul").html("Grafik Pengunjung Bulanan untuk Tahun <?=$tahun;?>");
            $("#bt2").addClass('buttonAktif');
            $("#dpilihanbulan").hide();
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
        hideHover: 'auto',
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
<script>
const ctx = document.getElementById('myChart');
const alwaysshowtooltip = {
    id: 'alwaysshowtooltip',
    afterDraw(chart,args,options) {
        const {ctx} = chart;
        ctx.save();

        chart.data.datasets.forEach((dataset, i)=>{
            chart.getDatasetMeta(i).data.forEach((datapoint, index)=> {
                const {x, y} = datapoint.tooltipPosition();
                const text = chart.data.labels[index];
                const text2 = chart.data.datasets[i].data[index]+"%";
                // const textWidth = ctx.measureText(text).width;
                // ctx.fillStyle = 'rgba(0,0,0,0.2)';
                // ctx.fillRect(x-((textWidth+10)/2),y-25,textWidth+10,20);
                // ctx.beginPath();
                // ctx.moveTo(x, y);
                // ctx.lineTo(x - 5, y-5);
                // ctx.lineTo(x + 5, y+5);
                // ctx.fill();
                // ctx.restore();

                ctx.font = '15px Arial';
                ctx.fillStyle = 'Black';
                ctx.fillText(text, x-30, y);
                ctx.fillText(text2, x-20, y+15);
                ctx.restore();
            })
        })
    }
}

const myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Desktop', 'Mobile'],
        datasets: [{
            label: '',
            data: [<?php echo $persendesktop;?>, <?php echo $persenmobile;?>],
            backgroundColor: [
                'rgba(86, 197, 220, 0.2)',
                'rgba(55, 210, 83, 0.2)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(40, 220, 70, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        plugins: {
            tooltip: {
                enabled: false
            },
            legend: {
                display: false
            }
        },
        scales: {
            // y: {
            //     beginAtZero: true
            // }
        },
    }, 
    plugins: [alwaysshowtooltip]
});
</script>
<?= $this->endSection() ?>