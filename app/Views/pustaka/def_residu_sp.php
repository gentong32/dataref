<?= $this->extend('layout/defaultpustaka') ?>

<?= $this->section('titel') ?>
<title>Data Kebudayaan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="judulatas">RESIDU TIDAK AKTIF</div>
    <div class="card-body p-0">
      <div class="menupustaka">
        <button onclick="pustaka0('<?=base_url();?>');" class="buttonBack"><<</button>
        <button onclick="pustaka1('<?=base_url();?>');" class="buttonUtama2 buttonAktif">Definisi</button>
        <button onclick="pustaka2('<?=base_url();?>');" class="buttonUtama2">Klasifikasi</button>
      </div>
        
        <div class="isipustaka">
        <b>Residu Tidak Aktif</b> menampilkan rekapitulasi dan informasi tentang NPSN satuan-satuan pendidikan yang berstatus tidak aktif. <br>
          NPSN tidak aktif dapat disebabkan:
            <ul>
              <li>
              Penutupan satuan pendidikan;
              </li>
              <li>
              Merger satuan pendidikan; atau
              </li>
              <li>
              Terindikasi NPSN ganda.
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