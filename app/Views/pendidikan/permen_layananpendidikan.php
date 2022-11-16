<?= $this->extend('layout/default2') ?>

<?= $this->section('titel') ?>
<title>Data Pendidikan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div style="margin:auto;padding:20px;">

        <div class="judulatas">PERATURAN MENTERI<br>REPUBLIK INDONESIA
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4" style="padding-top:30px;">
                <div style="border:1px solid #dfdfdf; padding:10px">
                    <button id="bt1" onclick="permen(1);" style="margin-top:7px;" class="buttonUtama2 buttonAktif">Permendikbud No. 81 Tahun 2013 Pasal 3</button>
                    <button id="bt2" onclick="permen(2);" style="margin-top:7px;" class="buttonUtama2">Permendikbud No. 81 Tahun 2013 Pasal 4</button>
                    <br><button id="bt3" onclick="downloadpdf();" style="margin-top:7px;" class="buttonUtama2">Download Permendikbud No. 81 Tahun 2013</button>
                </div>
            </div>
            <div class="col-lg-8 col-md-8" style="padding-top:30px;">
                <div style="border:1px solid #dfdfdf; padding:10px">
                                  
                    <div id="pasal3">
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

                    <div id="pasal4" style="display:none">
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
                                <li>pendidikan keterampilan kerja;</li>
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
                </div>
            </div>
        </div>
    </div>
    
<?= $this->endSection() ?>

<?= $this->section('scriptpeta') ?>
<script>
    function permen(indeks)
    {
        var source;
        $('#bt1, #bt2').removeClass('buttonAktif');
        if(indeks==1)
        {
            $("#bt1").addClass('buttonAktif');
            $("#pasal3").show();
            $("#pasal4").hide();
        }
        else if(indeks==2)
        {
            $("#bt2").addClass('buttonAktif');
            $("#pasal4").show();
            $("#pasal3").hide();
        }
    }

    function downloadpdf()
        {
            window.open('<?=site_url("pendidikan/downloadpdf");?>');
        }

</script>
<?= $this->endSection() ?>




