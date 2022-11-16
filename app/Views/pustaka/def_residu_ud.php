<?= $this->extend('layout/defaultpustaka') ?>

<?= $this->section('titel') ?>
<title>Data Kebudayaan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="judulatas">RESIDU UPDATE DATE</div>
    <div class="card-body p-0">
      <div class="menupustaka">
        <button onclick="pustaka0('<?=base_url();?>');" class="buttonBack"><<</button>
        <button onclick="pustaka1('<?=base_url();?>');" class="buttonUtama2 buttonAktif">Definisi</button>
        <button onclick="pustaka2('<?=base_url();?>');" class="buttonUtama2">Klasifikasi</button>
      </div>
        
        <div class="isipustaka">
        <b>Residu Update Data</b> menampilkan rekapitulasi dan informasi tentang satuan-satuan pendidikan yang tidak aktif melakukan pendataan atau tidak melakukan pemutakhiran data (Dapodik/Emis/PD-Dikti).<br> 
Informasi update data diperoleh dari aktivitas satuan pendidikan dalam memutakhirkan data ke kementerian melalui proses sinkronisasi data pada aplikasi Pendataan. Pemutakhiran data dapat berupa pengiriman data baru atau pembaruan data lama, dimana setiap satuan pendidikan wajib memutakhirkan data 1 (satu) kali tiap 1 (satu) semester.<br>
Satuan pendidikan yang tidak memutakhirkan data, atau tidak melakukan sinkronisasi data sama sekali dikategorikan sebagai residu. Residu Update Data perlu ditindaklanjuti oleh instansi pembina satuan pendidikan dalam rangka memastikan aktivitas penyelenggaraan proses belajar mengajar di satuan pendidikan.

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