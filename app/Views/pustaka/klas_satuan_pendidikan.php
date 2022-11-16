<?= $this->extend('layout/defaultpustaka') ?>

<?= $this->section('titel') ?>
<title>Data Kebudayaan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="judulatas">SATUAN PENDIDIKAN</div>
    <div class="card-body p-0">
      <div class="menupustaka">
        <button onclick="pustaka0('<?=base_url();?>');" class="buttonBack"><<</button>
        <button onclick="pustaka1('<?=base_url();?>');" class="buttonUtama2">Definisi</button>
        <button onclick="pustaka2('<?=base_url();?>');" class="buttonUtama2 buttonAktif">Klasifikasi</button>
      </div>
        
        <div class="isipustaka">
        Penyajian data Satuan Pendidikan berdasarkan jenjang:
        <ul>
          <li>
          Pendidikan Anak Usia Dini (PAUD)
          </li>
          <li>
          Pendidikan Dasar (Dikdas)
          </li>
          <li>
          Pendidikan Menengah (Dikmen)
          </li>
          <li>
          Pendidikan Tinggi (Dikti)
          </li>
          <li>
          Pendidikan Masyarakat (Dikmas)
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
          window.open(base_url+"/pustaka/satuan_pendidikan/definisi","_self");
      }
        
      function pustaka2(base_url) {
          window.open(base_url+"/pustaka/satuan_pendidikan/klasifikasi","_self");
      }
  </script>
<?= $this->endSection() ?>