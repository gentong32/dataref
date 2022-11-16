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
                    <button id="bt1" onclick="permen(1);" style="margin-top:7px;" class="buttonUtama2 buttonAktif">Permendikbud No. 81 Tahun 2013</button>
                    <br><button id="bt2" onclick="permen(2);" style="margin-top:7px;" class="buttonUtama2">Permendikbud No. 31 Tahun 2014</button>
                    <br><button id="bt3" onclick="permen(3);" style="margin-top:7px;" class="buttonUtama2">Permendikbud No. 36 Tahun 2014</button>
                    <br><button id="bt4" onclick="permen(4);" style="margin-top:7px;" class="buttonUtama2">Permendikbud No. 84 Tahun 2014</button>
                    <br><button id="bt5" onclick="permen(5);" style="margin-top:7px;" class="buttonUtama2">PMA No. 7 Tahun 2012</button>
                    <br><button id="bt6" onclick="permen(6);" style="margin-top:7px;" class="buttonUtama2">PMA No. 14 Tahun 2014</button>
                    <br><button id="bt7" onclick="permen(7);" style="margin-top:7px;" class="buttonUtama2">PMA No. 39 Tahun 2014</button>
                    <br><button id="bt8" onclick="permen(8);" style="margin-top:7px;" class="buttonUtama2">PMA No. 54 Tahun 2014</button>
                    <br><button id="bt9" onclick="permen(9);" style="margin-top:7px;" class="buttonUtama2">PMA No. 66 Tahun 2016</button>
                    <br><button id="bt10" onclick="permen(10);" style="margin-top:7px;" class="buttonUtama2">PMA No. 32 Tahun 2019</button>
                    <br><button id="bt11" onclick="permen(11);" style="margin-top:7px;" class="buttonUtama2">PMA No. 10 Tahun 2020</button>
                    <br><button id="bt12" onclick="permen(12);" style="margin-top:7px;" class="buttonUtama2">PMA No. 30 Tahun 2020</button>
                </div>
            </div>
        
            <div class="col-lg-8 col-md-8" style="padding-top:30px;">
                <div style="border:1px solid #dfdfdf; padding:10px">
                    <center>
                    <div id="judulteks" class="judulpdf">
                        Pendirian Satuan Pendidikan Nonformal
                    </div>
                    </center>

                    <div style="text-align:center;margin:auto;">
                        <embed id="embedpdf" type="application/pdf" src="<?=base_url()?>/permen/permendikbud812013.pdf" width="100%" height="550"></embed>
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
        $('#bt1, #bt2, #bt3, #bt4, #bt5, #bt6, #bt7, #bt8, #bt9, #bt10, #bt11, #bt12').removeClass('buttonAktif');
        if(indeks==1)
        {
            source = "<?=base_url()?>/permen/permendikbud812013.pdf";
            $("#bt1").addClass('buttonAktif');
            $("#judulteks").html("Pendirian Satuan Pendidikan Nonformal");
        }
        else if(indeks==2)
        {
            source = "<?=base_url()?>/permen/permendikbud312014.pdf";
            $("#bt2").addClass('buttonAktif');
            $("#judulteks").html("Kerja Sama Penyelenggaraan dan Pengelolaan Pendidikan <br> Oleh Lembaga Pendidikan Asing <br> dengan Lembaga Pendidikan di Indonesia");
        }
        else if(indeks==3)
        {
            source = "<?=base_url()?>/permen/permendikbud362014.pdf";
            $("#bt3").addClass('buttonAktif');
            $("#judulteks").html("Pedoman Pendirian, Perubahan, dan <br>Penutupan Satuan Pendidikan Dasar dan Menengah");
        }
        else if(indeks==4)
        {
            source = "<?=base_url()?>/permen/permendikbud842014.pdf";
            $("#bt4").addClass('buttonAktif');
            $("#judulteks").html("Pendirian Satuan Pendidikan Anak Usia Dini");
        }
        else if(indeks==5)
        {
            source = "<?=base_url()?>/permen/pma72012.pdf";
            $("#bt5").addClass('buttonAktif');
            $("#judulteks").html("Pendidikan Keagamaan Kristen");
        }
        else if(indeks==6)
        {
            source = "<?=base_url()?>/permen/pma142014.pdf";
            $("#bt6").addClass('buttonAktif');
            $("#judulteks").html("Pendirian Madrasah yang Diselenggarakan oleh Pemerintah <br> dan Penegerian Madrasah yang Diselenggarakan oleh Masyarakat");
        }
        else if(indeks==7)
        {
            source = "<?=base_url()?>/permen/pma392014.pdf";
            $("#bt7").addClass('buttonAktif');
            $("#judulteks").html("Pendidikan Keagamaan Buddha");
        }
        else if(indeks==8)
        {
            source = "<?=base_url()?>/permen/pma542014.pdf";
            $("#bt8").addClass('buttonAktif');
            $("#judulteks").html("Perubahan Atas Peraturan Menteri Agama Nomor 1 Tahun 2013 <br>tentang Sekolah Menengah Agama Katolik");
        }
        else if(indeks==9)
        {
            source = "<?=base_url()?>/permen/pma662016.pdf";
            $("#bt9").addClass('buttonAktif');
            $("#judulteks").html("Penyelenggaraan Pendidikan Madrasah");
        }
        else if(indeks==10)
        {
            source = "<?=base_url()?>/permen/pma322019.pdf";
            $("#bt10").addClass('buttonAktif');
            $("#judulteks").html("Pendirian dan Penegerian Satuan Pendidikan Keagamaan Kristen");
        }
        else if(indeks==11)
        {
            source = "<?=base_url()?>/permen/pma102020.pdf";
            $("#bt11").addClass('buttonAktif');
            $("#judulteks").html("Perubahan Atas Peraturan Menteri Agama Nomor 56 Tahun 2014 <br>tentang Pendidikan Keagamaan Hindu");
        }
        else if(indeks==12)
        {
            source = "<?=base_url()?>/permen/pma302020.pdf";
            $("#bt12").addClass('buttonAktif');
            $("#judulteks").html("Pendirian dan Penyelengaraan Pesantren");
        }
        

        var embedpdf=document.getElementById("embedpdf");
        var clone=embedpdf.cloneNode(true);
        clone.setAttribute('src',source);
        embedpdf.parentNode.replaceChild(clone,embedpdf)
    }

</script>
<?= $this->endSection() ?>




