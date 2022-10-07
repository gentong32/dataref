<?= $this->extend('layout/default') ?>

<?= $this->section('titel') ?>
<title>Data Kebudayaan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="judulatas">HASIL PENCARIAN DENGAN KUNCI : <?=$kode?></div>
    <div class="card-body p-0">
        <div style="margin:30px">
            <div class="">
                <table class="table table-striped" id='table1'>
                <thead><tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Objek Budaya</th>
                    <th>Jenis</th>
                    <th>Alamat</th>
                </tr>
                </thead>
              </table>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scriptdata') ?>
<script>
$(document).ready( function () {
    var data = [];
    <?php 
    $siap=false;
    foreach ($databudaya as $key => $value) :?>
        <?php if ($siap) {?>
      data.push([<?=$key + 1?>, "<a class='link1' href=\"<?=site_url('kebudayaan/kode/'.trim($value->kode_pengelolaan))?>\" target=\"_blank\"><?=$value->kode_pengelolaan?></a>", "<?=preg_replace('/\r|\n|"|\\\\/i', '', $value->nama)?>", "<?=preg_replace('/\r|\n|"|\\\\/i', '', $value->jenis)?>","<?=$value->alamat?>"]);
      <?php } ?>
      data.push([<?=$key + 1?>, "<?=$value->kode_pengelolaan?>", "<?=preg_replace('/\r|\n|"|\\\\/i', '', $value->nama)?>", "<?=preg_replace('/\r|\n|"|\\\\/i', '', $value->jenis)?>","<?=$value->alamat?>"]);
      <?php endforeach;?>
// removeAttr('width').
      $('#table1').DataTable({
			data: data,
			deferRender: true,
			scrollCollapse: true,
			scroller: true,
            // scrollY:        "500px",
            // scrollX:        true,
			'responsive': true,
			'columnDefs': [
				{
					render: function (data, type, full, meta) {
						return "<div class='text-wrap width-50'>" + data + "</div>";
					},
					targets: [2]
				},
				{responsivePriority: 1, targets: 0},
				{responsivePriority: 2, targets: 1},
				{responsivePriority: 10001, targets: 2},
                // { width: 50, targets: [2,3,4,5] },
                // { width: 50, targets: 1 },
				{ width: 25, targets: 0}
			],
            // fixedColumns: {left: 2},
			"order": [[0, "asc"]]
		});
} );
</script>
<?= $this->endSection() ?>