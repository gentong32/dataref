<?= $this->extend('layout/defaultpustaka') ?>

<?= $this->section('titel') ?>
<title>Data Kebudayaan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="judulatas">PENDIDIKAN DASAR (DIKDAS)</div>
    <div class="card-body p-0">
      <div class="menupustaka">
        <button onclick="pustaka0('<?=base_url();?>');" class="buttonBack"><<</button>
        <button onclick="pustaka1('<?=base_url();?>');" class="buttonUtama2">Definisi</button>
        <button onclick="pustaka2('<?=base_url();?>');" class="buttonUtama2 buttonAktif">Klasifikasi</button>
      </div>
        
        <div class="isipustaka">
        Satuan Pendidikan pada jenjang Pendidikan Dasar (Dikdas) terdiri dari: 
        
        <ul>
          <li>
            Sekolah Dasar (SD)
          </li>
          <li>
            Sekolah Menengah Pertama (SMP)
          </li>
          <li>
            Madrasah Ibtidaiyah (MI)
          </li>
          <li>
            Madrasah Tsanawiyah (MTS)
          </li>
          <li>
            Sekolah Dasar Teologi Kristen (SDTK)
          </li>
          <li>
            Sekolah Menengah Pertama Teologi Kristen (SMPTK)
          </li>
          <li>
            Satuan Pendidikan Kerjasama SD (SPK SD)
          </li>
          <li>
            Satuan Pendidikan Kerjasama SMP (SPK SMP)
          </li>
          <li>
            Adi Widya Pasraman (Adi WP)
          </li>
          <li>
            Madyama Widya Pasraman (Madyama WP)
          </li>
          <li>
            Mula Dhammasekha
          </li>
          <li>
            Muda Dhammasekha
          </li>
        </ul>
        
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
          window.open(base_url+"/pustaka/dikdas/definisi","_self");
      }
        
      function pustaka2(base_url) {
          window.open(base_url+"/pustaka/dikdas/klasifikasi","_self");
      }
  </script>
<?= $this->endSection() ?>