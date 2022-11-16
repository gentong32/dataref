<?= $this->extend('layout/defaultpustaka') ?>

<?= $this->section('titel') ?>
<title>Data Kebudayaan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="judulatas">YAYASAN PENDIDIKAN</div>
    <div class="card-body p-0">
      <div class="menupustaka">
        <button onclick="pustaka0('<?=base_url();?>');" class="buttonBack"><<</button>
        <button onclick="pustaka1('<?=base_url();?>');" class="buttonUtama2 buttonAktif">Definisi</button>
      </div>
        
        <div class="isipustaka">
        <b>Yayasan Pendidikan</b> adalah yayasan yang menyelenggarakan pendidikan baik formal maupun nonformal. Penyajian data Yayasan Pendidikan berdasarkan pada NPYP sebagai kode referensi bagi Yayasan Pendidikan.
<br>Dasar hukum Pendirian Satuan Pendidikan (Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi): 
Permendikbud No. 81 Tahun 2013 Pasal 2, Permendikbud No. 36 Tahun 2014 Pasal 2, Permendikbud No. 84 Tahun 2014 Pasal 2, Permendikbud No. 7 Tahun 2020 Pasal 1.
<br>Dasar hukum Pendirian Satuan Pendidikan (Kementerian Agama): 
PMA No. 14 Tahun 2014 Pasal, PMA No. 66 Tahun 2016 Pasal 9, PMA No. 30 Tahun 2020 Pasal 3, PMA No. 54 Tahun 2014 Pasal 4, PMA No. 27 Tahun 2016 Pasal 6,PMA No. 10 Tahun 2020 Pasal 6,PMA No. 39 Tahun 2014 Pasal 6.
<br>
Verifikasi dan Validasi Yayasan Pendidikan diakses melalui tautan:<br>
<span class="link1"><a target="_blank" href="https://vervalyayasan.data.kemdikbud.go.id">https://vervalyayasan.data.kemdikbud.go.id</a></span>
 
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scriptdata') ?>
<script>
      function pustaka0(base_url, opsi) {
      if (opsi=="link")
        history.back();
      else
        window.open(base_url+"/pustaka/daftar","_self");
      }

      function pustaka1(base_url) {
          window.open(base_url+"/pustaka/yayasan/definisi","_self");
      }
        
  </script>
<?= $this->endSection() ?>