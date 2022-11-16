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
                <td>Domain</td>
                <td>:</td>
                <td><?=$databudaya->jenis_wbtb?></td>
            </tr>
          
            <tr>
                <td>&nbsp;</td>
                <td>Propinsi</td>
                <td>:</td>
                <td><?=strtoupper($databudaya->propinsi)?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>MAESTRO</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> - Nama</td>
                <td>:</td>
                <td><?php
                if($datamaestro)
                echo $datamaestro->nama_maestro;
                else
                echo "-";?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td> - Alamat</td>
                <td>:</td>
                <td><?php 
                if($datamaestro)
                echo $datamaestro->alamat;
                else
                echo "-";?></td>
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
                <td>&nbsp;</td>
                <td>Nomor SK</td>
                <td>:</td>
                <td><?=$databudaya->sk_penetapan;?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Tanggal SK</td>
                <td>:</td>
                <td><?=$databudaya->tgl_penetapan;?></td>
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

</div>
<?= $this->endSection() ?>