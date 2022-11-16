<?= $this->extend('layout/defaultpustaka') ?>

<?= $this->section('titel') ?>
<title>Data Kebudayaan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="judulatas">SATUAN PENDIDIKAN</div>
    <div class="card-body p-0">
      <div class="menupustaka">
        <button onclick="pustaka0('<?=base_url();?>');" class="buttonBack"><<</button>
        <button onclick="pustaka1('<?=base_url();?>');" class="buttonUtama2 buttonAktif">Definisi</button>
        <button onclick="pustaka2('<?=base_url();?>');" class="buttonUtama2">Klasifikasi</button>
      </div>

        <div class="isipustaka">
        <b>Satuan Pendidikan</b> merupakan representasi dari sekolah, lembaga, madrasah, kampus, atau istilah umum untuk kelompok layanan pendidikan yang menyelenggarakan pendidikan pada jalur formal, nonformal, dan/atau informal pada setiap jenjang dan jenis pendidikan. 
Penyajian data Satuan Pendidikan berdasarkan pada NPSN sebagai kode referensi bagi Satuan Pendidikan.
Satuan Pendidikan yang tidak aktif melakukan pemutakhiran data (Dapodik/Emis/PD-Dikti) dan NPSN satuan pendidikan yang sudah dinonaktifkan dikategorikan sebagai Residu. Residu Satuan Pendidikan meliputi:<br> 
<ul>
  <li>
  Residu Update Data
  </li>
  <li>
  Residu Satuan Pendidikan
  </li>
</ul>
Verifikasi dan Validasi Satuan Pendidikan diakses melalui tautan:<br>
<span class="link1"><a target="_blank" href="https://vervalsp.data.kemdikbud.go.id">https://vervalsp.data.kemdikbud.go.id</a></span>
 
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
          window.open(base_url+"/pustaka/satuan_pendidikan/definisi","_self");
      }

      function pustaka2(base_url) {
          window.open(base_url+"/pustaka/satuan_pendidikan/klasifikasi","_self");
      }
        
  </script>
<?= $this->endSection() ?>