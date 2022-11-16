<?= $this->extend('layout/defaultpustaka') ?>

<?= $this->section('titel') ?>
<title>Data Kebudayaan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="judulatas">PROGRAM / LAYANAN KETERAMPILAN KERJA</div>
    <div class="card-body p-0">
      <div class="menupustaka">
        <button onclick="pustaka0('<?=base_url();?>');" class="buttonBack"><<</button>
        <button onclick="pustaka1('<?=base_url();?>');" class="buttonUtama2 buttonAktif">Definisi</button>
        <button onclick="pustaka2('<?=base_url();?>');" class="buttonUtama2">Penyetaraan Jenjang</button>
      </div>
        
        <div class="isipustaka">
        Program/Layanan Keterampilan Kerja adalah program pendidikan nonformal yang diselenggarakan bagi masyarakat yang memerlukan bekal pengetahuan, keterampilan, kecakapan hidup, dan sikap untuk mengembangkan diri, mengembangkan profesi, bekerja, dan/atau usaha mandiri, untuk meningkatkan kemampuan peserta didik dengan penekanan pada penguasaan keterampilan fungsional yang sesuai dengan kebutuhan dunia kerja.
        Keterampilan Kerja disajikan berdasarkan tingkatan jenjang Kerangka Kualifikasi Nasional Indonesia (KKNI). 
        <br>
        KKNI (Kerangka Kualifikasi Nasional Indonesia) adalah kerangka penjenjangan 
        kualifikasi kompetensi yang dapat menyandingkan, 
        menyetarakan, dan mengintegrasikan antara bidang pendidikan dan 
        bidang pelatihan kerja serta pengalaman kerja dalam rangka pemberian 
        pengakuan kompetensi kerja sesuai dengan struktur pekerjaan di berbagai sektor. (Perpres Nomor 8 Tahun 2012)
        <br>
        KKNI terdiri atas 9 (sembilan) jenjang kualifikasi. Deskripsi kualifikasi pada setiap jenjang KKNI secara komprehensif mempertimbangkan sebuah capaian pembelajaran yang utuh, yang dapat dihasilkan oleh suatu proses pendidikan, baik formal, non-formal, informal, maupun pengalaman mandiri untuk dapat melakukan kerja secara berkualitas. 
        Pengelompokkan 9 jenjang kualifikasi KKNI terdiri atas:
          <ul>
            <li>
              Jenjang 1 - 3 dikelompokkan dalam jabatan operator;
            </li>
            <li>
              Jenjang 4 - 6 dikelompokkan dalam jabatan teknisi atau analis;
            </li>
            <li>
              Jenjang 7 - 9 dikelompokkan dalam jabatan ahli.
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
          window.open(base_url+"/pustaka/keterampilankerja/definisi","_self");
      }
        
      function pustaka2(base_url) {
          window.open(base_url+"/pustaka/keterampilankerja/penyetaraan","_self");
      }
  </script>
<?= $this->endSection() ?>