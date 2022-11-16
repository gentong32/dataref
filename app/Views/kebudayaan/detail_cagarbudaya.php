<?= $this->extend('layout/default2') ?>

<?= $this->section('titel') ?>
<title>Data Kebudayaan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="containers">
    <center><h4><?=$databudaya->nama?></h4></center>
    <div class="tabs">
    <div class="tabby-tab">
      <input type="radio" id="tab-1" name="tabby-tabs" checked>
      <label for="tab-1">Identitas Cagar Budaya</label>
      <div class="tabby-content">
        <table>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>Nama</td>
                <td>:</td>
                <td><?=preg_replace('/\r|\n|"|\\\\/i', '', $databudaya->nama)?></td>
            </tr>
            <!-- edit 20200602 -->
            <tr>
                <td>&nbsp;</td>
                <td>Kode Pengelolaan</td>
                <td>:</td>
                <td><?=$databudaya->kode_pengelolaan?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Jenis</td>
                <td>:</td>
                <td><?=$databudaya->Jenis?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Alamat</td>
                <td>:</td>
                <td><?=preg_replace('/\r|\n|"|\\\\/i', '', $databudaya->alamat)?></td>
            </tr>
            <tr><td></td></tr>
            <tr>
                <td>&nbsp;</td>
                <td>Kecamatan</td>
                <td>:</td>
                <td><?=strtoupper($datawilayah->kecamatan)?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Kabupaten/Kota</td>
                <td>:</td>
                <td><?=strtoupper($datawilayah->kota)?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Propinsi</td>
                <td>:</td>
                <td><?=strtoupper($datawilayah->propinsi)?></td>
            </tr>
        </table>
      </div>
    </div>

    <div class="tabby-tab">
      <input type="radio" id="tab-2" name="tabby-tabs">
      <label for="tab-2">Dokumen dan Perijinan</label>
      <div class="tabby-content">
        <table>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>Status Kepemilikan</td>
                <td>:</td>
                <td><?php
                if ($datapemilik)
                echo ($datapemilik->sts_kepemilikan == "NULL") ? '-' : $datapemilik->sts_kepemilikan;?></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>Nama Pemilik</td>
                <td>:</td>
                <td><?=($datapemilik->nama_pemilik == "NULL") ? '-' : $datapemilik->nama_pemilik;?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Level Cagar Budaya</td>
                <td>:</td>
                <td><?=$datask->nama_level;?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Nomor SK</td>
                <td>:</td>
                <td><?=$datask->no_sk_cb;?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Tanggal SK</td>
                <td>:</td>
                <td><?=$datask->tanggal;?></td>
            </tr>            
        </table>
      </div>
    </div>

    <!-- <div class="tabby-tab">
      <input type="radio" id="tab-3" name="tabby-tabs">
      <label for="tab-3">Kontak</label>
      <div class="tabby-content">
      <table>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>Telepon</td>
                <td>:</td>
                <td></td>
            </tr>
            
            <tr>
                <td>&nbsp;</td>
                <td>Website</td>
                <td>:</td>
                <td></td>
            </tr>
        </table>      </div>
    </div> -->

    <div class="tabby-tab">
      <input type="radio" id="tab-4" name="tabby-tabs">
      <label for="tab-4">Peta</label>
      <div class="tabby-content">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div id="maps">

                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                Lintang: <?=($databudaya->lintang=='.0000000' ? '-' : $databudaya->lintang)?><br>
                Bujur: <?=($databudaya->bujur=='.0000000' ? '-' : $databudaya->bujur)?><br><br>
                Batas Barat: <?=($databudaya->batas_barat=="NULL") ? '-' : $databudaya->batas_barat ?><br>
                Batas Utara: <?=($databudaya->batas_utara=="NULL") ? '-' : $databudaya->batas_utara?><br>
                Batas Timur: <?=($databudaya->batas_timur=="NULL") ? '-' : $databudaya->batas_timur?><br>
                Batas Selatan: <?=($databudaya->batas_selatan=="NULL") ? '-' : $databudaya->batas_selatan?><br>
            </div>
        </div>
      </div>
    </div>

</div>
<?= $this->endSection() ?>

<?= $this->section('scriptpeta') ?>
<script>
    var map = L.map('maps').setView({lat:<?=$databudaya->lintang?>, lon:<?=$databudaya->bujur?>}, 8);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'}).addTo(map);
    L.marker({lat:<?=$databudaya->lintang?>, lon:<?=$databudaya->bujur?>}).bindPopup('<?=$databudaya->nama?>').addTo(map);
</script>
<?= $this->endSection() ?>