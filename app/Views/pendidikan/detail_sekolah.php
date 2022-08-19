<?= $this->extend('layout/default2') ?>

<?= $this->section('titel') ?>
<title>Data Pendidikan &mdash; Data Sekolah</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="containers">
    <center><h4><?=$datasekolah->nama_sekolah?></h4></center>
    <div class="tabs">
    <div class="tabby-tab">
      <input type="radio" id="tab-1" name="tabby-tabs" checked>
      <label for="tab-1">Identitas Satuan Pendidikan</label>
      <div class="tabby-content">
        <table>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>Nama</td>
                <td>:</td>
                <td><?=$datasekolah->nama_sekolah?></td>
            </tr>
            <!-- edit 20200602 -->
            <tr>
                <td>&nbsp;</td>
                <td>NPSN</td>
                <td>:</td>
                <td><?=$datasekolah->npsn?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Alamat</td>
                <td>:</td>
                <td><?=$datasekolah->alamat_jalan?></td>
            </tr>
            <tr><td></td></tr>
            <tr>
                <td>&nbsp;</td>
                <td>Desa/Kelurahan</td>
                <td>:</td>
                <td><?=$datasekolah->desa_kelurahan?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Kecamatan/Kota (LN)</td>
                <td>:</td>
                <td><?=strtoupper($datawilayah->kecamatan)?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Kab.-Kota/Negara (LN)</td>
                <td>:</td>
                <td><?=strtoupper($datawilayah->kota)?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Propinsi/Luar Negeri (LN)</td>
                <td>:</td>
                <td><?=strtoupper($datawilayah->propinsi)?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Status Sekolah</td>
                <td>:</td>
                <td><?=$datasekolah->status_skl?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Bentuk Pendidikan</td>
                <td>:</td>
                <td><?=$datasekolah->bentuk_pendidikan?></td>
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
                <td>Naungan</td>
                <td>:</td>
                <td><?=$datasekolah->naungan?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>No. SK. Pendirian</td>
                <td>:</td>
                <td><?=$datasekolah->sk_pendirian_sekolah?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Tanggal SK. Pendirian</td>
                <td>:</td>
                <td><?php
                $date1 =$datasekolah->tanggal_sk_pendirian;
                if ($date1==null)
                {
                    echo "-";
                }
                else
                {
                    $date1 = str_replace('/', '-', $date1);
                    echo date('d-m-Y', strtotime($date1));
                }
                ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>No. SK. Operasional</td>
                <td>:</td>
                <td><?=$datasekolah->sk_izin_operasional?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Tanggal. SK. Operasional</td>
                <td>:</td>
                <td><?php
                $date2 = $datasekolah->tanggal_sk_izin_operasional;
                if ($date2==null)
                {
                    echo "-";
                }
                else
                {
                    $date2 = str_replace('/', '-', $date2);
                    echo date('d-m-Y', strtotime($date2));
                }
                
                ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Akreditasi</td>
                <td>:</td>
                <td class="nodata">[Data belum tersedia]</td>
            </tr>
        </table>
      </div>
    </div>

    <div class="tabby-tab">
      <input type="radio" id="tab-3" name="tabby-tabs">
      <label for="tab-3">Sarana dan Prasarana</label>
      <div class="tabby-content">
        <table>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>Luas Tanah</td>
                <td>:</td>
                <td><?php
                if ($datasekolah->luas_tanah_milik>0)
                {
                    echo number_format($datasekolah->luas_tanah_milik,0,",",".");
                }
                else
                {
                    echo number_format($datasekolah->luas_tanah_bukan_milik,0,",",".");
                }
                echo " m<sup>2</sup>";?></td>
            </tr>
            <!-- edit 20200602 -->
            <tr>
                <td>&nbsp;</td>
                <td>Akses Internet</td>
                <td>:</td>
                <td class="nodata">[Data belum tersedia]</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Sumber Listrik</td>
                <td>:</td>
                <td class="nodata">[Data belum tersedia]</td>
            </tr>
        </table>
      </div>
    </div>

    <div class="tabby-tab">
      <input type="radio" id="tab-4" name="tabby-tabs">
      <label for="tab-4">Kontak</label>
      <div class="tabby-content">
      <table>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>Fax</td>
                <td>:</td>
                <td class="nodata">[Data belum tersedia]</td>
            </tr>
            <!-- edit 20200602 -->
            <tr>
                <td>&nbsp;</td>
                <td>Email</td>
                <td>:</td>
                <td class="nodata">[Data belum tersedia]</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Website</td>
                <td>:</td>
                <td class="nodata">[Data belum tersedia]</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Operator</td>
                <td>:</td>
                <td class="nodata">[Data belum tersedia]</td>
            </tr>
        </table>      </div>
    </div>

    <div class="tabby-tab">
      <input type="radio" id="tab-5" name="tabby-tabs">
      <label for="tab-5">Peta</label>
      <div class="tabby-content">
        <div id="maps">

        </div>
      </div>
    </div>

</div>
<?= $this->endSection() ?>

<?= $this->section('scriptpeta') ?>
<script>
    var map = L.map('maps').setView({lat:<?=$datasekolah->lintang?>, lon:<?=$datasekolah->bujur?>}, 8);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'}).addTo(map);
    L.marker({lat:<?=$datasekolah->lintang?>, lon:<?=$datasekolah->bujur?>}).bindPopup('<?=$datasekolah->nama_sekolah?>').addTo(map);
</script>
<?= $this->endSection() ?>