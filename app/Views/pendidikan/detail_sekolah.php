<?= $this->extend('layout/default2') ?>

<?= $this->section('titel') ?>
<title>Data Pendidikan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="containers">
    <center><h4><?=$datasekolah->nama?></h4></center>
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
                <td><?=preg_replace('/\r|\n|"|\\\\/i', '', $datasekolah->nama)?></td>
            </tr>
            <!-- edit 20200602 -->
            <tr>
                <td>&nbsp;</td>
                <td>NPSN</td>
                <td>:</td>
                <td>
                    <a class="link1" target="_blank" href="https://sekolah.data.kemdikbud.go.id/index.php/Chome/profil/<?=$datasekolah->sekolah_id?>"><?=$datasekolah->npsn?></a>
                </td>
                
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Alamat</td>
                <td>:</td>
                <td><?=preg_replace('/\r|\n|"|\\\\/i', '', $datasekolah->alamat_jalan)?></td>
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
                <td><?=$datasekolah->status_sekolah?></td>
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
                <td>Kementerian Pembina</td>
                <td>:</td>
                <td><?=$datasekolah->kementerian_pembina?></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>Naungan</td>
                <td>:</td>
                <td><?php
                if ($datasekolah->status_kepemilikan=="Yayasan")
                {
                    if ($datasekolah->nama_yayasan!=null)
                    {
                        if (substr(strtolower($datasekolah->nama_yayasan),0,7)=="yayasan")
                            echo $datasekolah->nama_yayasan;
                        else
                            echo "Yayasan ".$datasekolah->nama_yayasan;
                    }
                } else
                {
                    echo $datasekolah->status_kepemilikan;
                }?></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>NPYP</td>
                <td>:</td>
                <td><?php
                if ($datasekolah->npyp!="-")
                {?>
                    <a class="link1" target="_blank" href="https://vervalyayasan.data.kemdikbud.go.id/index.php/Chome/profil?yayasan_id=<?=$datasekolah->yayasan_id?>"><?=$datasekolah->npyp?></a>
                <?php }
                else
                {
                    echo "-";
                }
                ?></td>
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
                <td>Nomor SK Operasional</td>
                <td>:</td>
                <td><?=$datasekolah->sk_izin_operasional?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Tanggal SK Operasional</td>
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
                <td>File SK Operasional</td>
                <td>:</td>
                <td><?php
                if ($datask)
                {
                    if (substr($datask->pathfile,-4,4)==".pdf") {?>
                        <a class="link1" target="_blank" href="https://vervalsp.data.kemdikbud.go.id/verval/dokumen/skoperasional/<?=$datask->pathfile?>">Lihat SK Operasional</a>
                    <?php } else {?>
                        <a class="link2" target="_blank" href="https://vervalsp.data.kemdikbud.go.id">Silakan Upload SK (link file tidak valid)</a> => [<?=$datask->pathfile?>]
                    <?php }
                }
                else
                {?>
                    <a class="link2" target="_blank" href="https://vervalsp.data.kemdikbud.go.id">Silakan Upload SK</a>
                <?php }
                ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Tanggal Upload SK Op.</td>
                <td>:</td>
                <td><?php
                if ($datask)
                {?>
                    <?=$datask->tgl_path?>
                <?php }
                else
                {
                    echo "-";
                }
                ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Akreditasi</td>
                <td>:</td>
                <td><?php 
                if ($dataakreditasi)
                echo $dataakreditasi->akreditasi;
                else
                echo "-";?></td>
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
                <td>1. <?php
                if ($datasekolah2)
                if ($datasekolah2->akses_internet!=null)
                {
                    if (strtolower($datasekolah2->akses_internet)=="tidak ada")
                    {
                        echo "-";
                    }
                    else
                    {
                        echo $datasekolah2->akses_internet;
                    }
                }?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>:</td>
                <td>2. <?php
                if ($datasekolah2)
                if ($datasekolah2->akses_internet_2!=null)
                {
                    if (strtolower($datasekolah2->akses_internet_2)=="tidak ada")
                    {
                        echo "-";
                    }
                    else
                    {
                        echo $datasekolah2->akses_internet_2;
                    }
                }?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Sumber Listrik</td>
                <td>:</td>
                <td><?php 
                if ($datasekolah2)
                {
                    if ($datasekolah2->sumber_listrik!=null)
                        echo $datasekolah2->sumber_listrik;
                    else
                        echo "-";
                }
                ?></td>
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
                <td><?php 
                if ($datasekolah2)
                {
                    if ($datasekolah2->nomor_fax!=null)
                        echo $datasekolah2->nomor_fax;
                    else
                        echo "-";
                }
                ?></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>Telepon</td>
                <td>:</td>
                <td><?php
                if ($datasekolah2)
                if ($datasekolah2->nomor_telepon<>null)
                {
                    if(substr($datasekolah2->nomor_telepon,0,2)=='08' || (session('id_user')))
                    {
                        echo "";
                    }
                    else
                    {
                        echo $datasekolah2->nomor_telepon;
                    }
                }?></td>
            </tr>
            <!-- edit 20200602 -->
            <tr>
                <td>&nbsp;</td>
                <td>Email</td>
                <td>:</td>
                <td><?php
                if ($datasekolah2)
                if ($datasekolah2->email!=null)
                    {
                        echo $datasekolah2->email;
                    // if (substr($datasekolah->email, -6)=="sch.id" || (session('id_user')))
                    // {
                    //     echo $datasekolah->email;
                    // }
                    // else
                    // {
                    //     echo "";
                    // }
                }?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Website</td>
                <td>:</td>
                <td><?php
                if ($datasekolah2)
                if ($datasekolah2->website!=null)
                {
                    if ($datasekolah2->website=="http://")
                        {
                            echo "";
                        }
                    else if (substr($datasekolah2->website,0,4)!="http")
                    {
                        echo "<a class='link1' target='_blank' href='http://".$datasekolah2->website."'>".
                        $datasekolah2->website."</a>";
                    }
                    else
                    {
                        echo "<a class='link1' target='_blank' href='".$datasekolah2->website."'>".
                        $datasekolah2->website."</a>";
                    }
                }?></td>
            </tr>
            <?php if (session('id_user')) :?>
            <tr>
                <td>&nbsp;</td>
                <td>Operator</td>
                <td>:</td>
                <td><?=$dataoperator->nama?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td>(<?=$dataoperator->telepon?>)</td>
            </tr>
            <?php endif ?>
        </table>      </div>
    </div>

    <div class="tabby-tab">
      <input type="radio" id="tab-5" name="tabby-tabs">
      <label for="tab-5">Peta</label>
      <div class="tabby-content">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div id="maps">

                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                Lintang: <?=$datasekolah->lintang?><br>
                Bujur: <?=$datasekolah->bujur?><br>
            </div>
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
    L.marker({lat:<?=$datasekolah->lintang?>, lon:<?=$datasekolah->bujur?>}).bindPopup('<?=$datasekolah->nama?>').addTo(map);
    
</script>
<?= $this->endSection() ?>