<?= $this->extend('layout/defaultpustaka') ?>

<?= $this->section('titel') ?>
<title>Data Kebudayaan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="judulatas">PENDIDIKAN MENENGAH (DIKMEN)</div>
    <div class="card-body p-0">
      <div class="menupustaka">
        <button onclick="pustaka0('<?=base_url();?>');" class="buttonBack"><<</button>
        <button onclick="pustaka1('<?=base_url();?>');" class="buttonUtama2">Definisi</button>
        <button onclick="pustaka2('<?=base_url();?>');" class="buttonUtama2 buttonAktif">Klasifikasi</button>
      </div>
        
        <div class="isipustaka">
        Satuan Pendidikan pada jenjang Pendidikan Menengah (Dikmen) terdiri dari: 
        <ul>
          <li>
          Sekolah Dasar Luar Biasa (SDLB)
          </li>
          <li>
          Sekolah Menengah Pertama Luar Biasa (SMPLB)
          </li>
          <li>
          Sekolah Menengah Atas (SMA)
          </li>
          <li>
          Sekolah Menengah Luar Biasa (SMLB)
          </li>
          <li>
          Sekolah Menengah Kejuruan (SMK)
          </li>
          <li>
          Madrasah Aliyah (MA)
          </li>
          <li>
          Madrasah Aliyah Kejuruan (MAK)
          </li>
          <li>
          Sekolah Luar Biasa (SLB)
          </li>
          <li>
            Adi Widya Pasraman (Adi WP)
          </li>
          <li>
          Sekolah Menengah Teologi Kristen (SMTK)
          </li>
          <li>
          Sekolah Menengah Agama Katolik (SMAg.K)
          </li>
          <li>
          Taman Kanak-Kanak Luar Biasa (TKLB)
          </li>
          <li>
          Sekolah Menengah Agama Kristen (SMAK)
          </li>
          <li>
          Satuan Pendidikan Kerjasama SMA (SPK SMA)
          </li>
          <li>
          Utama Widya Pasraman (Utama WP)
          </li>
          <li>
          Uttama Dhammasekha
          </li>
          <li>
          Uttama Dhammasekha Kejuruan
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
          window.open(base_url+"/pustaka/dikmen/definisi","_self");
      }
        
      function pustaka2(base_url) {
          window.open(base_url+"/pustaka/dikmen/klasifikasi","_self");
      }
  </script>
<?= $this->endSection() ?>