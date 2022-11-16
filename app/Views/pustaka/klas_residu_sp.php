<?= $this->extend('layout/defaultpustaka') ?>

<?= $this->section('titel') ?>
<title>Data Kebudayaan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content');
$tahun0=date("Y");
$tahun1=$tahun0-1;
$tahun2=$tahun0-2;
$tahun3=$tahun0-3;
$tahun4="<".($tahun0-3);
?>
    <div class="judulatas">RESIDU TIDAK AKTIF</div>
    <div class="card-body p-0">
      <div class="menupustaka">
        <button onclick="pustaka0('<?=base_url();?>');" class="buttonBack"><<</button>
        <button onclick="pustaka1('<?=base_url();?>');" class="buttonUtama2">Definisi</button>
        <button onclick="pustaka2('<?=base_url();?>');" class="buttonUtama2 buttonAktif">Klasifikasi</button>
      </div>
        
        <div class="isipustaka">
        Residu Tidak Aktif disajikan berdasarkan tahun penonaktifan NPSN:

        <ul>
          <li>
          <?=$tahun4?>
          </li>
          <li>
          <?=$tahun3?>
          </li>
          <li>
          <?=$tahun2?>
          </li>
          <li>
          <?=$tahun1?>
          </li>
          <li>
          <?=$tahun0?>
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
          window.open(base_url+"/pustaka/residu_sp/definisi","_self");
      }
        
      function pustaka2(base_url) {
          window.open(base_url+"/pustaka/residu_sp/klasifikasi","_self");
      }
  </script>
<?= $this->endSection() ?>