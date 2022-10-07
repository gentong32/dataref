<?= $this->extend('layout/default') ?>

<?= $this->section('titel') ?>
<title>Data Pendidikan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="card-body p-0">
        <div class="combo-center">
            <select class="combobox1" id="jalur_pendidikan" name="jalur_pendidikan">
                <option value="000000">Semua Jalur</option>
                <option value="1">- Jalur Formal -</option>
                <option value="2">- Jalur Informal -</option>
            </select>
            <select class="combobox1" id="jalur_pendidikan" name="jalur_pendidikan">
                <option value="000000">Semua Jalur</option>
                <option value="1">- Jalur Formal -</option>
                <option value="2">- Jalur Informal -</option>
            </select>
            <select class="combobox1" id="jalur_pendidikan" name="jalur_pendidikan">
                <option value="000000">Semua Status</option>
                <option value="1">- Negeri -</option>
                <option value="2">- Swasta -</option>
            </select>
            <button class="tb_utama" type="button">
                Terapkan
            </button>
        </div>
        <div style="margin:30px;">
            <div class="">
                <table class="table table-striped" id='table1'>
                <thead><tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>SD</th>
                    <th>SMP</th>
                    <th>SMA</th>
                    <th>SMK</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($datanas as $key => $value) :?>
                
                <tr>
                    <td><?=$key + 1?></td>
                    <td class="link1"><a href="<?=site_url('pendidikan/kode/'.trim($value->kode_wilayah).'/'.$level)?>"><?=$value->nama?></a></td>
                    <td><?=$value->sd?></td>
                    <td><?=$value->smp?></td>
                    <td><?=$value->sma?></td>
                    <td><?=$value->smk?></td>
                    <td><?=$value->total?></td>
                </tr>
                
                <?php endforeach;?>
                </tbody></table>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scriptdata') ?>
<script>
$(document).ready( function () {
    $('#table1').DataTable({
        responsive: true,
        columnDefs: [
            { responsivePriority: 1, targets: -1 }
        ]
    });
} );
</script>
<?= $this->endSection() ?>