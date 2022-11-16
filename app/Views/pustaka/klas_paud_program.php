<?= $this->extend('layout/defaultpustaka') ?>

<?= $this->section('titel') ?>
<title>Data Kebudayaan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="judulatas">PROGRAM / LAYANAN PAUD</div>
    <div class="card-body p-0">
      <div class="menupustaka">
        <button onclick="pustaka0('<?=base_url();?>');" class="buttonBack"><<</button>
        <button onclick="pustaka1('<?=base_url();?>');" class="buttonUtama2">Definisi</button>
        <button onclick="pustaka2('<?=base_url();?>');" class="buttonUtama2 buttonAktif">Klasifikasi</button>
      </div>
        
        <div class="isipustaka">
        Jenis Program/Layanan PAUD meliputi:
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
          window.open(base_url+"/pustaka/paud_program/definisi","_self");
      }
        
      function pustaka2(base_url) {
          window.open(base_url+"/pustaka/paud_program/klasifikasi","_self");
      }
  </script>
<?= $this->endSection() ?>