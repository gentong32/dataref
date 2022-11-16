<?= $this->extend('layout/default') ?>

<?= $this->section('titel') ?>
<title>Data Referensi Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="tophome">
        <div class="container">
            <div class="row">
                <div style="margin:10px;">
                    <div class="block standar">
                        <h4>DATA REFERENSI PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</h4>
                        
                        <p class="mb-4 pr-5" style="color:black";>Selamat datang, untuk terintegrasinya Data Pendidikan, Kebudayaan, Riset, dan Teknologi di lingkungan KEMENDIKBUDRISTEK, maka perlu dilakukan pengelolaan Data Referensi sebagai acuan sinkronisasi Data Pendidikan, Kebudayaan, Riset, dan Teknologi.
                        Terima kasih atas dukungan semua pihak, kami berharap Data Referensi ini dapat memberikan manfaat dan kemajuan bersama bagi pengelolaan Data Pendidikan, Kebudayaan, Riset, dan Teknologi di Indonesia.
                        <br><br>
                        Salam Kami,<br>
                        PUSDATIN KEMENDIKBUDRISTEK</p>
                    </div>
                    <div class="row" style="padding-bottom:30px;">
                        <div class="col-lg-4 col-md-4">
                            <div class="kartuinfo">
                                <div class="text-center"><b>Satuan Pendidikan</b></div><br>
                                Satuan Pendidikan adalah kelompok layanan pendidikan yang menyelenggarakan pendidikan pada jalur formal, nonformal, dan informal pada setiap jenjang dan jenis pendidikan.
                                <br><button onclick="permen1();" style="margin-top:7px;" class="buttonUtama">Lihat Permen</button>
                            </div>
                        </div>
                            <div class="col-lg-4 col-md-4">
                            <div class="kartuinfo">
                                <div class="text-center"><b>Yayasan Pendidikan</b></div><br>
                                Yayasan pendidikan adalah yayasan yang menyelenggarakan pendidikan baik formal maupun nonformal.
                                <br><button onclick="permen2();" style="margin-top:7px;" class="buttonUtama">Lihat Permen</button>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="kartuinfo">
                                <div class="text-center"><b>Program / Layanan</b></div><br>
                                Program / Layanan Pendidikan diberikan oleh satuan pendidikan nonformal untuk dapat dimanfaatkan oleh siswa.  
                                <br><button onclick="permen3();" style="margin-top:7px;" class="buttonUtama">Lihat Permen</button>
                            </div>
                        </div>
                    </div>
                    <!-- <div id="pengunjung">
                        <i class='fa fa-user'></i> <?php //echo $pengunjunghariini ?>
                        <i class='fas fa-user-friends'></i> <?php //echo $totalpengunjung ?>
                        <i class='fa fa-eye'></i> <?php //echo $pengunjungonline ?>
                    </div> -->
                    <div class="kontakkami">
                        <h5>Hubungi Kami</h5>
                        Layanan Terpadu Kemendikbudristek<br>
                        Gedung C Lantai 1 Kompleks Kemendikbudristek<br>
                        Senayan Jakarta, 10270<br>
                        Contact Center : 177<br>
                        Live Chat via : ult.kemdikbud.go.id
                        <i class='fa fa-email'></i>pengaduan@kemdikbud.go.id
                    </div>
                    <div id="pengunjung">
                        <!-- <i class='fa fa-user'></i> -->
                        <a class="link1" target="_blank" href="<?=site_url('home/chart_pengunjung')?>">Pengunjung</a> : Hari Ini (<?=number_format($pengunjunghariini,0,",","."); ?>), 
                        Total (<?=number_format($totalpengunjung,0,",","."); ?>), 
                        Online (<?=number_format($pengunjungonline,0,",","."); ?>)
                    </div>
                </div>
            </div>
        </div>
    
</div>
<?= $this->endSection() ?>

<?= $this->section('scriptdata') ?>
<script>
    function permen1() {
        window.open('<?=site_url()."pendidikan/permen_satuanpendidikan";?>','_blank');
    }

    function permen2() {
        window.open('<?=site_url()."pendidikan/permen_satuanpendidikan";?>','_blank');
    }

    function permen3() {
        window.open('<?=site_url()."pendidikan/permen_layananpendidikan";?>','_blank');
    }
</script>
<?= $this->endSection() ?>