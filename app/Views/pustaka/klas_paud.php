<?= $this->extend('layout/defaultpustaka') ?>

<?= $this->section('titel') ?>
<title>Data Kebudayaan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="judulatas">PENDIDIKAN ANAK USIA DINI (PAUD)</div>
    <div class="card-body p-0">
      <div class="menupustaka">
        <button onclick="pustaka0('<?=base_url();?>');" class="buttonBack"><<</button>
        <button onclick="pustaka1('<?=base_url();?>');" class="buttonUtama2">Definisi</button>
        <button onclick="pustaka2('<?=base_url();?>');" class="buttonUtama2 buttonAktif">Klasifikasi</button>
      </div>
        
        <div class="isipustaka">
        Satuan Pendidikan pada jenjang Pendidikan Anak Usia Dini (Paud) terdiri dari: 

        <ul>
          <li>
          Taman Kanak-Kanak (TK)
          </li>
          <li>
          Kelompok Bermain (KB)
          </li>
          <li>
          Taman Penitipan Anak (TPA)
          </li>
          <li>
          Satuan PAUD Sejenis (SPS)
          </li>
          <li>
          Satuan Pendidikan Kerjasama TK (SPK TK)
          </li>
          <li>
          Satuan Pendidikan Kerjasama KB (SPK KB)
          </li>
          <li>
          Raudhatul Athfal (RA)
          </li>
          <li>
          Taman Seminari
          </li>
          <li>
          PAUDQ
          </li>
          <li>
          Pratama Widya Pasraman (Pratama WP)
          </li>
          <li>
          Nava Dhammasekha
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
          window.open(base_url+"/pustaka/paud/definisi","_self");
      }
        
      function pustaka2(base_url) {
          window.open(base_url+"/pustaka/paud/klasifikasi","_self");
      }
  </script>
<?= $this->endSection() ?>