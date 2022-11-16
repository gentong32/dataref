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
                        
                        <p class="mb-4 pr-5" style="color:black";>Selamat datang. Untuk terintegrasinya Data Pendidikan, Kebudayaan, Riset, dan Teknologi di lingkungan KEMENDIKBUDRISTEK, maka perlu dilakukan pengelolaan Data Referensi sebagai acuan sinkronisasi Data Pendidikan, Kebudayaan, Riset, dan Teknologi.
                        Terima kasih atas dukungan semua pihak, kami berharap Data Referensi ini dapat memberikan manfaat dan kemajuan bersama bagi pengelolaan Data Pendidikan, Kebudayaan, Riset, dan Teknologi di Indonesia.
                        <br><br>
                        Salam Kami,<br>
                        PUSDATIN KEMENDIKBUDRISTEK</p>
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
    <div class="boxlink linkterkait">
        Link terkait:<br>
        <ul>
            <li>
           <a class="link1" href="https://referensi.data.kemdikbud.go.id/snpmb"> Dashboard Verifikasi-Validasi Satuan Pendidikan dan Peserta Didik (Data Dukung Seleksi Nasional Penerimaan Mahasiswa Baru - SNPMB PTN)</a>
            </li>
        </ul>
    </div>
<?= $this->endSection() ?>