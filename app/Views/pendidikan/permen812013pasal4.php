<?= $this->extend('layout/default2') ?>

<?= $this->section('titel') ?>
<title>Data Pendidikan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div style="margin:auto;padding:20px;">

        <div style="text-align:center;">
            <img onclick="kliklogo();" 
            style="max-width:100px" src="<?=base_url()?>/template/images/logo-garuda-hd-34025.png" alt="logo">
        </div>
        <div class="judulatas">PERATURAN MENTERI PENDIDIKAN DAN KEBUDAYAAN
            <br>REPUBLIK INDONESIA
        </div>

        <div style="text-align:center;margin:auto;padding:20px;">
            <h5>NOMOR 81 TAHUN 2013
                <br>TENTANG
                <br>PENDIRIAN SATUAN PENDIDIKAN NONFORMAL
            </h5>
        </div>

        <div style="max-width:600px;margin:auto;">
            <center>Pasal 4</center><br>
            <div style="margin-left:22px;text-indent: -22px;">
            (1) LKP yang didirikan dapat menyelenggarakan program:
            </div>
            <ol type="a">
                <li>pendidikan kecakapan hidup;</li>
                <li>pelatihankepemudaan;</li>
                <li>pendidikan pemberdayaan perempuan;</li>
                <li>pendidikan keterampilan kerja;</li>
                <li>bimbingan belajar; dan/atau</li>
                <li>pendidikan nonformal lain yang diperlukan masyarakat.</li>
            </ol>
            <div style="margin-left:22px;text-indent: -22px;">
            (2) Kelompok belajar yang didirikan dapat menyelenggarakan program:
            </div>
            <ol type="a">
                <li>pendidikan keaksaraan;</li>
                <li>pendidikan kecakapan hidup;</li>
                <li>pendidikan pemberdayaan perempuan;</li>
                <li>pengembangan budaya baca; dan/atau</li>
                <li>pendidikan nonformal lain yang diperlukan masyarakat.</li>
            </ol>
            <div style="margin-left:22px;text-indent: -22px;">
            (3) PKBM yang didirikan dapat menyelenggarakan program:
            </div>
            <ol type="a">
                <li>pendidikan anak usia dini;</li>
                <li>pendidikan keaksaraan;</li>
                <li>pendidikan kesetaraan;</li>
                <li>pendidikan pemberdayaan perempuan;</li>
                <li>pendidikan kecakapan hidup;</li>
                <li>pendidikan kepemudaan;</li>
                <li>pendidikan ketrampilan kerja;</li>
                <li>pengembangan budaya baca; dan</li>
                <li>pendidikan nonformal lain yang diperlukan masyarakat.</li>
            </ol>
            <div style="margin-left:22px;text-indent: -22px;">
            (4) Majelis taklim yang didirikan dapat menyelenggarakan program:
            </div>
            <ol type="a">
                <li>pendidikan keagamaan Islam;</li>
                <li>pendidikan anak usia dini;</li>
                <li>pendidikan keaksaraan;</li>
                <li>pendidikan kesetaraan;</li>
                <li>pendidikan kecakapan hidup;</li>
                <li>pendidikan pemberdayaan perempuan;</li>
                <li>pendidikan kepemudaan; dan/atau</li>
                <li>pendidikan nonformal lain yang diperlukan masyarakat.</li>
            </ol>
        </div>

    </div>
    
<?= $this->endSection() ?>

<?= $this->section('scriptdata') ?>
<script>
    function kliklogo()
    {
        window.open("https://www.freepnglogos.com/pics/logo-garuda-hd", "_blank");
    }
</script>
<?= $this->endSection() ?>




