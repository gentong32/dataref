<?= $this->extend('layout/defaultpustaka') ?>

<?= $this->section('titel') ?>
<title>Data Kebudayaan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="judulatas">PENDIDIKAN MASYARAKAT (DIKMAS)</div>
    <div class="card-body p-0">
      <div class="menupustaka">
        <button onclick="pustaka0('<?=base_url();?>');" class="buttonBack"><<</button>
        <button onclick="pustaka1('<?=base_url();?>');" class="buttonUtama2 buttonAktif">Definisi</button>
        <button onclick="pustaka2('<?=base_url();?>');" class="buttonUtama2">Klasifikasi</button>
      </div>
        
        <div class="isipustaka">
        Satuan Pendidikan pada jenjang <b>Pendidikan Masyakarat (Dikmas)</b>/jenjang pendidikan nonformal merupakan satuan-satuan pendidikan yang menyelenggarakan jalur pendidikan di luar pendidikan formal yang dapat dilaksanakan secara terstruktur dan berjenjang. <br>
        Program Pendidikan Masyarakat/Pendidikan Nonformal diselenggarakan untuk memberdayakan masyarakat melalui pendidikan kecakapan hidup, pendidikan anak usia dini, pendidikan kepemudaan, pendidikan pemberdayaan perempuan, pendidikan keaksaraan, pendidikan keterampilan dan pelatihan kerja, pendidikan kesetaraan, serta pendidikan lain yang ditujukan untuk mengembangkan kemampuan peserta didik.
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
          window.open(base_url+"/pustaka/dikmas/definisi","_self");
      }
        
      function pustaka2(base_url) {
          window.open(base_url+"/pustaka/dikmas/klasifikasi","_self");
      }
  </script>
<?= $this->endSection() ?>