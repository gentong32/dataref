<?= $this->extend('layout/default') ?>

<?= $this->section('titel') ?>
<title>Home &mdash; Data Pendidikan dan Kebudayaan</title>
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
                    <!-- <div id="pengunjung">
                        <i class='fa fa-user'></i> <?php //echo $pengunjunghariini ?>
                        <i class='fas fa-user-friends'></i> <?php //echo $totalpengunjung ?>
                        <i class='fa fa-eye'></i> <?php //echo $pengunjungonline ?>
                    </div> -->
                    <div id="pengunjung">
                        <table>
                        <tr> 
                        <td>Pengunjung Hari ini</td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                        <td><?php echo $pengunjunghariini ?> orang</td>
                        </tr>
                        <tr>
                        <td>Total Pengunjung</td> 
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                        <td><?php echo $totalpengunjung ?> orang</td>
                        </tr>
                        <tr>
                        <td>Pengunjung Online</td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                        <td><?php echo $pengunjungonline ?> orang</td>
                        </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
<?= $this->endSection() ?>