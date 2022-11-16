<?= $this->extend('layout/defaultpustaka') ?>

<?= $this->section('titel') ?>
<title>Data Kebudayaan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="judulatas">PENDIDIKAN ANAK USIA DINI (PAUD)</div>
    <div class="card-body p-0">
      <div class="menupustaka">
        <button onclick="pustaka0('<?=base_url();?>');" class="buttonBack"><<</button>
        <button onclick="pustaka1('<?=base_url();?>');" class="buttonUtama2 buttonAktif">Definisi</button>
        <button onclick="pustaka2('<?=base_url();?>');" class="buttonUtama2">Klasifikasi</button>
      </div>
        
        <div class="isipustaka">
        Satuan Pendidikan pada jenjang <b>Pendidikan Anak Usia Dini (PAUD)</b> merupakan satuan-satuan pendidikan yang menyelenggarakan upaya pembinaan yang ditujukan kepada anak sejak lahir sampai dengan usia 6 (enam) tahun yang dilakukan melalui pemberian rangsangan pendidikan untuk membantu pertumbuhan dan perkembangan jasmani dan rohani agar anak memiliki kesiapan dalam memasuki pendidikan lebih lanjut.
Penyajian data PAUD sebagai bentuk Satuan Pendidikan, berbeda dengan PAUD sebagai Program/Layanan pendidikan.
<ul>
  <li>
  <b>PAUD sebagai Satuan Pendidikan</b> menyajikan rekapitulasi satuan pendidikan PAUD, dimana bentuk satuan pendidikan identik dengan program/layanan yang diselenggarakan oleh satuan pendidikan dimaksud, seperti:<br>
  <ul type="-">
  <li>satuan pendidikan KB yang menyelenggarakan program/layanan pendidikan KB, atau </li>
  </ul> 
  <ul type="-">
  <li>satuan pendidikan TPA yang menyelenggarakan program/layanan pendidikan TPA.</li>
  </ul>
  </li>
  <li>
  <b>PAUD sebagai Program/Layanan</b> menyajikan program/layanan PAUD yang diselenggarakan oleh satuan-satuan pendidikan pada jenjang pendidikan nonformal/Pendidikan Masyarakat (Dikmas), seperti: <br>
  <ul type="-">
    <li>PKBM yang menyelenggarakan Program/Layanan KB, atau </li>
    <li>SKB yang menyelenggarakan Program/Layanan TPA; sedangkan </li>
  </ul>
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