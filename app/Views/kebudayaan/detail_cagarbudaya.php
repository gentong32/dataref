<?= $this->extend('layout/default2') ?>

<?= $this->section('titel') ?>
<title>Data Kebudayaan &mdash; Cagar Budaya</title>
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
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>No. SK Menteri</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Tanggal SK Menteri</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>No. SK Provinsi</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Tanggal SK Provinsi</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>No. SK. Kab-Kota</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Tanggal SK KabKota</td>
                <td>:</td>
                <td></td>
            </tr>
            
        </table>
      </div>
    </div>

    <div class="tabby-tab">
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
    </div>

    <div class="tabby-tab">
      <input type="radio" id="tab-4" name="tabby-tabs">
      <label for="tab-4">Peta</label>
      <div class="tabby-content">
        <div id="maps">

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