<?= $this->extend('layout/defaultpustaka') ?>

<?= $this->section('titel') ?>
<title>Data Kebudayaan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
  table.dataTable thead {
  background-color:blue !important;
}
</style>
    <div class="judulatas">PROGRAM / LAYANAN KETERAMPILAN KERJA</div>
    <div class="card-body p-0">
      <div class="menupustaka">
      <button onclick="pustaka0('<?=base_url();?>','<?=$opsi?>');" class="buttonBack"><<</button>
        <?php if ($opsi!="link") {?>
          <button onclick="pustaka1('<?=base_url();?>');" class="buttonUtama2">Definisi</button>
          <button onclick="pustaka2('<?=base_url();?>');" class="buttonUtama2 buttonAktif">Penyetaraan Jenjang</button>
        <?php } ?>
        
        
      </div>
        
        <div class="isipustaka">
        
          <table id="table1" style="width: 100%" class = "table-striped2 table-bordered">
          <thead>
            <tr>
              <th class="bgcoklat">Level KKNI</th>
              <th class="no-sort bgcoklat">Keterangan</th>
              <th class="no-sort bgcoklat">Permendikbud No. 73 Tahun 2013</th>
              <th class="no-sort bgcoklat">Perpres No. 8 Tahun 2012</th>
              <th class="no-sort bgcoklat">Perpres No. 8 Tahun 2012</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Lulusan pendidikan dasar setara</td>
              <td>-</td>
              <td>Lulusan pendidikan dasar setara</td>
              <td style="vertical-align : middle;text-align:center;background-color:rgb(250, 249, 245);" rowspan="3">Jabatan Operator</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Lulusan pendidikan menengah paling rendah</td>
              <td>-</td>
              <td>Lulusan pendidikan menengah paling rendah</td>
            </tr>
            <tr>
              <td>3</td>
              <td>Setara dengan lulusan diploma 1</td>
              <td>Setara dengan lulusan diploma 1</td>
              <td>Lulusan Diploma 1 paling rendah setara dengan jenjang 3</td>
            </tr>
            <tr>
              <td>4</td>
              <td>Setara dengan lulusan diploma 2</td>
              <td>Setara dengan lulusan diploma 2</td>
              <td>Lulusan Diploma 2 paling rendah setara dengan jenjang 4</td>
              <td style="vertical-align : middle;text-align:center;background-color:white;background-color:rgb(250, 249, 245);" rowspan="3">Jabatan Teknisi atau Analis</td>
            </tr>
            <tr>
              <td>5</td>
              <td>Setara dengan lulusan diploma 3 </td>
              <td>Setara dengan lulusan diploma 3 </td>
              <td>Lulusan Diploma 3 paling rendah setara dengan jenjang 5</td>
            </tr>
            <tr>
              <td>6</td>
              <td>Setara dengan lulusan diploma 4 atau sarjana terapan, atau sarjana</td>
              <td>Setara dengan lulusan diploma 4 atau sarjana terapan, atau sarjana</td>
              <td>Lulusan Diploma 4 atau Sarjana Terapan dan Sarjana paling rendah setara dengan jenjang 6</td>
            </tr>
            <tr>
              <td>7</td>
              <td>Setara dengan lulusan pendidikan profesi</td>
              <td>Setara dengan lulusan pendidikan profesi</td>
              <td>Lulusan pendidikan profesi setara dengan jenjang 7 atau 8</td>
              <td style="vertical-align : middle;text-align:center;background-color:white;background-color:rgb(250, 249, 245);" rowspan="3">Jabatan Ahli</td>
            </tr>
            <tr>
              <td>8</td>
              <td>Setara dengan lulusan magister terapan, magister atau spesialis satu</td>
              <td>Setara dengan lulusan magister terapan, magister atau spesialis satu</td>
              <td>Lulusan Magister Terapan dan Magister paling rendah setara dengan jenjang 8</td>
            </tr>
            <tr>
              <td>9</td>
              <td>Setara dengan lulusan pendidikan doktor terapan, doktor, atau spesialis dua</td>
              <td>Setara dengan lulusan pendidikan doktor terapan, doktor, atau spesialis dua</td>
              <td>Lulusan pendidikan spesialis setara dengan jenjang 8 atau 9<br>
              Lulusan doktor terapan dan doktor setara dengan jenjang 9<br>
              </td>
            </tr>
          </tbody>
          </table>

          <table id="table2" style="display:none;width: 100%" class = "table-striped2 table-bordered">
          <thead>
            <tr>
              <th class="bgcoklat">Level KKNI</th>
              <th class="no-sort bgcoklat">Keterangan</th>
              <th class="no-sort bgcoklat">Permendikbud No. 73 Tahun 2013</th>
              <th class="no-sort bgcoklat">Perpres No. 8 Tahun 2012</th>
              <th class="no-sort bgcoklat">Perpres No. 8 Tahun 2012</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Lulusan pendidikan dasar setara</td>
              <td>-</td>
              <td>Lulusan pendidikan dasar setara</td>
              <td>Jabatan Operator</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Lulusan pendidikan menengah paling rendah</td>
              <td>-</td>
              <td>Lulusan pendidikan menengah paling rendah</td>
              <td>Jabatan Operator</td>
            </tr>
            <tr>
              <td>3</td>
              <td>Setara dengan lulusan diploma 1</td>
              <td>Setara dengan lulusan diploma 1</td>
              <td>Lulusan Diploma 1 paling rendah setara dengan jenjang 3</td>
              <td>Jabatan Operator</td>
            </tr>
            <tr>
              <td>4</td>
              <td>Setara dengan lulusan diploma 2</td>
              <td>Setara dengan lulusan diploma 2</td>
              <td>Lulusan Diploma 2 paling rendah setara dengan jenjang 4</td>
              <td>Jabatan Teknisi atau Analis</td>
            </tr>
            <tr>
              <td>5</td>
              <td>Setara dengan lulusan diploma 3 </td>
              <td>Setara dengan lulusan diploma 3 </td>
              <td>Lulusan Diploma 3 paling rendah setara dengan jenjang 5</td>
              <td>Jabatan Teknisi atau Analis</td>
            </tr>
            <tr>
              <td>6</td>
              <td>Setara dengan lulusan diploma 4 atau sarjana terapan, atau sarjana</td>
              <td>Setara dengan lulusan diploma 4 atau sarjana terapan, atau sarjana</td>
              <td>Lulusan Diploma 4 atau Sarjana Terapan dan Sarjana paling rendah setara dengan jenjang 6</td>
              <td>Jabatan Teknisi atau Analis</td>
            </tr>
            <tr>
              <td>7</td>
              <td>Setara dengan lulusan pendidikan profesi</td>
              <td>Setara dengan lulusan pendidikan profesi</td>
              <td>Lulusan pendidikan profesi setara dengan jenjang 7 atau 8</td>
              <td>Jabatan Ahli</td>
            </tr>
            <tr>
              <td>8</td>
              <td>Setara dengan lulusan magister terapan, magister atau spesialis satu</td>
              <td>Setara dengan lulusan magister terapan, magister atau spesialis satu</td>
              <td>Lulusan Magister Terapan dan Magister paling rendah setara dengan jenjang 8</td>
              <td>Jabatan Ahli</td>
            </tr>
            <tr>
              <td>9</td>
              <td>Setara dengan lulusan pendidikan doktor terapan, doktor, atau spesialis dua</td>
              <td>Setara dengan lulusan pendidikan doktor terapan, doktor, atau spesialis dua</td>
              <td>Lulusan pendidikan spesialis setara dengan jenjang 8 atau 9<br>
              Lulusan doktor terapan dan doktor setara dengan jenjang 9<br>
              </td>
              <td>Jabatan Ahli</td>
            </tr>
          </tbody>
          </table>

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

  $(document).ready( function () {
    if (detectMob()=="desktop")
    {
      $('#table1').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 1 },
            { orderable: false, targets: [0,1] }
        ],
        "order": [1,"asc"],
        "data-sortable": false,
        responsive: true,
        ordering: false,
        "targets": 'no-sort',
        "bSort": false,
        bInfo: false,
        bFilter: false,
        "bPaginate": false,
        "showNEntries" : false,
          
      });
    }
    else
    {
      $('#table2').DataTable({
        columnDefs: [
            { responsivePriority: 1, targets: 1 },
            { orderable: false, targets: [0,1] }
        ],
        "order": [1,"asc"],
        "data-sortable": false,
        responsive: true,
        ordering: false,
        "targets": 'no-sort',
        "bSort": false,
        bInfo: false,
        bFilter: false,
        "bPaginate": false,
        "showNEntries" : false,
          
      });
    }

  });

  function detectMob() {
    if (window.innerWidth <= window.innerHeight)
    {
        $('#table1').hide();
        $('#table2').show();
        return "mobile";
    }
    else
    {
        $('#table2').hide();
        $('#table1').show();
        return "desktop";
    }
  }
</script>
<?= $this->endSection() ?>