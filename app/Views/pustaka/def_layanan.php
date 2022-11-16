<?= $this->extend('layout/defaultpustaka') ?>

<?= $this->section('titel') ?>
<title>Data Kebudayaan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="judulatas">PROGRAM / LAYANAN</div>
    <div class="card-body p-0">
      <div class="menupustaka">
        <button onclick="pustaka0('<?=base_url();?>');" class="buttonBack"><<</button>
        <button onclick="pustaka1('<?=base_url();?>');" class="buttonUtama2 buttonAktif">Definisi</button>
        <button onclick="pustaka2('<?=base_url();?>');" class="buttonUtama2">Klasifikasi</button>
      </div>
        
        <div class="isipustaka">
        Program/Layanan menyajikan data program-program pendidikan atau layanan-layanan pendidikan yang diselenggarakan oleh satuan-satuan pendidikan pada jenjang pendidikan nonformal/Pendidikan Masyakarat (Dikmas), seperti: Lembaga Kursus dan Pelatihan (LKP), Pusat Kegiatan Belajar Masyarakat (PKBM), Sanggar Kegiatan Belajar (SKB), Pondok Pesantren, atau lainnya.
        <br>Program/layanan pendidikan diselenggarakan dalam rangka memberdayakan masyarakat melalui pendidikan nonformal dan bertujuan untuk mengembangkan kemampuan peserta didik berdasarkan kebutuhan masyarakat. 
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
          window.open(base_url+"/pustaka/layanan/definisi","_self");
      }
        
      function pustaka2(base_url) {
          window.open(base_url+"/pustaka/layanan/klasifikasi","_self");
      }
  </script>
<?= $this->endSection() ?>