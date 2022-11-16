<?= $this->extend('layout/defaultpustaka') ?>

<?= $this->section('titel') ?>
<title>Data Kebudayaan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="judulatas">PENDIDIKAN TINGGI (DIKTI)</div>
    <div class="card-body p-0">
      <div class="menupustaka">
        <button onclick="pustaka0('<?=base_url();?>');" class="buttonBack"><<</button>
        <button onclick="pustaka1('<?=base_url();?>');" class="buttonUtama2 buttonAktif">Definisi</button>
        <button onclick="pustaka2('<?=base_url();?>');" class="buttonUtama2">Klasifikasi</button>
      </div>
        
        <div class="isipustaka">
        Satuan Pendidikan pada jenjang <b>Pendidikan Tinggi</b> merupakan satuan-satuan pendidikan yang menyelenggarakan jenjang pendidikan setelah pendidikan menengah yang mencakup program pendidikan diploma, sarjana, magister, spesialis, dan doktor yang diselenggarakan oleh perguruan tinggi.<br> 
        Perguruan tinggi dapat berbentuk akademi, politeknik, sekolah tinggi, institut, atau universitas.

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
          window.open(base_url+"/pustaka/dikti/definisi","_self");
      }
        
      function pustaka2(base_url) {
          window.open(base_url+"/pustaka/dikti/klasifikasi","_self");
      }
  </script>
<?= $this->endSection() ?>