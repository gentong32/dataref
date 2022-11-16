<?= $this->extend('layout/defaultpustaka') ?>

<?= $this->section('titel') ?>
<title>Data Kebudayaan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="judulatas">RESIDU UPDATE DATA</div>
    <div class="card-body p-0">
      <div class="menupustaka">
        <button onclick="pustaka0('<?=base_url();?>');" class="buttonBack"><<</button>
        <button onclick="pustaka1('<?=base_url();?>');" class="buttonUtama2">Definisi</button>
        <button onclick="pustaka2('<?=base_url();?>');" class="buttonUtama2 buttonAktif">Klasifikasi</button>
      </div>
        
        <div class="isipustaka">
        Residu Update Data disajikan berdasarkan jumlah semester ketika satuan pendidikan tidak melakukan pemutakhiran data melalui aplikasi pendataan (Dapodik/Emis/PD-Dikti), meliputi:
        
        <ul>
          <li>
          1 semester
          </li>
          <li>
          2 semester
          </li>
          <li>
          3 semester
          </li>
          <li>
          4 semester
          </li>
          <li>
          5 semester
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
          window.open(base_url+"/pustaka/residu_ud/definisi","_self");
      }
        
      function pustaka2(base_url) {
          window.open(base_url+"/pustaka/residu_ud/klasifikasi","_self");
      }
  </script>
<?= $this->endSection() ?>