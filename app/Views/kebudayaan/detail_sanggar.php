<?= $this->extend('layout/default2') ?>

<?= $this->section('titel') ?>
<title>Data Kebudayaan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="containers">
    <center><h4><?=$databudaya->nama_lembaga?></h4></center>
    <div class="tabs">
    <div class="tabby-tab">
      <input type="radio" id="tab-1" name="tabby-tabs" checked>
      <label for="tab-1">Identitas Sanggar</label>
      <div class="tabby-content">
        <table>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>Nama</td>
                <td>:</td>
                <td><?=preg_replace('/\r|\n|"|\\\\/i', '', $databudaya->nama_lembaga)?></td>
            </tr>
            <!-- edit 20200602 -->
            <tr>
                <td>&nbsp;</td>
                <td>Fokus Bidang</td>
                <td>:</td>
                <td><?=$databudaya->fokus_bidang==null ? "-" : $databudaya->fokus_bidang;?></td>
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
      <label for="tab-2">Dokumen</label>
      <div class="tabby-content">
        <table>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>Sumber Data</td>
                <td>:</td>
                <td><?php 
                echo ($databudaya->sumber_data == "NULL") ? '-' : $databudaya->sumber_data;?></td>
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
                <td>Email</td>
                <td>:</td>
                <td><?=($databudaya->email=='NULL') ? '-' : $databudaya->email;?></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>Instagram</td>
                <td>:</td>
                <td><?=($databudaya->instagram=='NULL') ? '-' : $databudaya->instagram;?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Website</td>
                <td>:</td>
                <td><?php
                if ($databudaya->website!=null && $databudaya->website!='NULL')
                {
                    if ($databudaya->website=="http://")
                        {
                            echo "";
                        }
                    else if (substr($databudaya->website,0,4)!="http")
                    {
                        echo "<a class='link1' target='_blank' href='http://".$databudaya->website."'>".
                        $databudaya->website."</a>";
                    }
                    else
                    {
                        echo "<a class='link1' target='_blank' href='".$databudaya->website."'>".
                        $databudaya->website."</a>";
                    }
                } else {
                    echo "-";
                }?></td>
            </tr>
        </table>
        </div>
    </div>

</div>
<?= $this->endSection() ?>
