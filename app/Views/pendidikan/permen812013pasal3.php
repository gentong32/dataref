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
            <center>Pasal 3</center><br>
            (1) Satuan PNF, terdiri atas:
            <ol type="a">
                <li>LKP;</li>
                <li>Kelompok Belajar;</li>
                <li>PKBM;</li>
                <li>Majelis Taklim; dan</li>
                <li>Satuan PNF sejenis.</li>
            </ol>
            <div style="margin-left:22px;text-indent: -22px;">
                (2) Satuan PNF sejenis sebagaimana dimaksud dalam ayat (1) huruf e terdiri atas
                rumah pintar, balai belajar bersama, lembaga bimbingan belajar, serta
                bentuk lain yang berkembang di masyarakat dan ditetapkan oleh Direktur
                Jenderal Pendidikan Anak Usia Dini, Nonformal dan Informal.
            </div>
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