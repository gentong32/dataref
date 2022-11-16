<?= $this->extend('layout/defaultpustaka') ?>

<?= $this->section('titel') ?>
<title>Data Kebudayaan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="judulatas">PENDIDIKAN MENENGAH (DIKMEN)</div>
    <div class="card-body p-0">
      <div class="menupustaka">
        <button onclick="pustaka0('<?=base_url();?>');" class="buttonBack"><<</button>
        <button onclick="pustaka1('<?=base_url();?>');" class="buttonUtama2 buttonAktif">Definisi</button>
        <button onclick="pustaka2('<?=base_url();?>');" class="buttonUtama2">Klasifikasi</button>
      </div>
        
        <div class="isipustaka">
        Satuan Pendidikan pada jenjang <b>Pendidikan Menengah (Dikmen)</b> merupakan jenjang pendidikan sebagai lanjutan jenjang pendidikan dasar. Pendidikan Menengah terdiri atas pendidikan menengah umum dan pendidikan menengah kejuruan.<br>
        Satuan Pendidikan Menengah berbentuk Sekolah Menengah Atas (SMA), Madrasah Aliyah (MA), Sekolah Menengah Kejuruan (SMK), dan Madrasah Aliyah Kejuruan (MAK), atau bentuk lain yang sederajat.
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
          window.open(base_url+"/pustaka/dikmen/definisi","_self");
      }
        
      function pustaka2(base_url) {
          window.open(base_url+"/pustaka/dikmen/klasifikasi","_self");
      }
  </script>
<?= $this->endSection() ?>