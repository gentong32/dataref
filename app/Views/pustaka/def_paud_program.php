<?= $this->extend('layout/defaultpustaka') ?>

<?= $this->section('titel') ?>
<title>Data Kebudayaan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="judulatas">PROGRAM / LAYANAN PAUD</div>
    <div class="card-body p-0">
      <div class="menupustaka">
        <button onclick="pustaka0('<?=base_url();?>');" class="buttonBack"><<</button>
        <button onclick="pustaka1('<?=base_url();?>');" class="buttonUtama2 buttonAktif">Definisi</button>
        <button onclick="pustaka2('<?=base_url();?>');" class="buttonUtama2">Klasifikasi</button>
      </div>
        
        <div class="isipustaka">
        Program/Layanan <b>Pendidikan Anak Usia Dini (PAUD)</b> merupakan program pendidikan yang ditujukan kepada anak sejak lahir sampai dengan usia enam tahun yang dilakukan melalui pemberian rangsangan pendidikan untuk membantu pertumbuhan dan perkembangan jasmani dan rohani agar anak memiliki kesiapan memasuki pendidikan lebih lanjut.
Penyajian data PAUD sebagai Program/Layanan, berbeda dengan PAUD sebagai bentuk Satuan Pendidikan.
<ul>
  <li>
  <b>PAUD sebagai Program/Layanan</b> menyajikan program/layanan PAUD yang diselenggarakan oleh satuan-satuan pendidikan pada jenjang pendidikan nonformal/Pendidikan Masyarakat (Dikmas), seperti: 
PKBM yang menyelenggarakan Program/Layanan KB, atau 
SKB yang menyelenggarakan Program/Layanan TPA; sedangkan
  </li>
  <li>
  <b>PAUD sebagai Satuan Pendidikan</b> menyajikan rekapitulasi satuan pendidikan PAUD, dimana bentuk satuan pendidikan identik dengan program/layanan yang diselenggarakan oleh satuan pendidikan dimaksud, seperti: 
satuan pendidikan KB yang menyelenggarakan program/layanan pendidikan KB, atau 
satuan pendidikan TPA yang menyelenggarakan program/layanan pendidikan TPA.
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