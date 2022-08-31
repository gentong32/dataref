<?= $this->extend('layout/default') ?>

<?= $this->section('titel') ?>
<title>Data Pendidikan &mdash; Data Nasional</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="judulatas">HASIL PENCARIAN DENGAN KUNCI : <?=$kode?></div>
    <div class="card-body p-0">
        <div style="margin:30px;">
            <div class="">
                <table class="table table-striped" id='table1'>
                <thead><tr>
                    <th>#</th>
                    <th>NPSN</th>
                    <th>Nama Satuan Pendidikan</th>
                    <th>Alamat</th>
                    <th>Kelurahan</th>
                    <th>Status</th>
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
    <?php foreach ($datanas as $key => $value) :?>
       
      data.push([<?=$key + 1?>, "<a class='link1' href=\"<?=site_url('pendidikan/npsn/'.trim($value->npsn))?>\" target=\"_blank\"><?=$value->npsn?></a>", "<?=preg_replace('/\r|\n|"|\\\\/i', '', $value->nama)?>", "<?=preg_replace('/\r|\n|"|\\\\/i', '', $value->alamat_jalan)?>","<?=$value->desa_kelurahan?>","<?=$value->status_skl?>"]);
      
      <?php endforeach;?>

      $('#table1').DataTable({
			data: data,
			deferRender: true,
			scrollCollapse: true,
			scroller: true,
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
				// {responsivePriority: 3, targets: -2},
				{
					width: 25,
					targets: 0
				}
			],
			"order": [[0, "asc"]]
		});
} );
</script>
<?= $this->endSection() ?>