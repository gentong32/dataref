<?= $this->extend('layout/defaultpustaka') ?>

<?= $this->section('titel') ?>
<title>Data Kebudayaan Kemendikbudristek</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="judulatas">DAFTAR ISI PUSTAKA</div>

<div class="card-body p-0">
    <center>
        <div style="margin:30px;display:inline-block;vertical-align:top;">
            <table
                class="tbpustaka"
                style="table-layout: fixed; width: 258px; border: 1px solid black">
                <colgroup>
                    <col style="width: 280px">
                </colgroup>
                <thead>
                    <tr>
                        <th>DATA PENDIDIKAN</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <span>
                                <a class="link1" href="<?=site_url('pustaka/satuan_pendidikan')?>">SATUAN PENDIDIKAN</a>
                            </span>
                            <ul style="margin-bottom:0px;">
                                <li>
                                    <span>
                                        <a class="link1" href="<?=site_url('pustaka/paud')?>">Pendidikan Anak Usia Dini (PAUD)</a>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <a class="link1" href="<?=site_url('pustaka/dikdas')?>">Pendidikan Dasar (Dikdas)</a>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <a class="link1" href="<?=site_url('pustaka/dikmen')?>">Pendidikan Menengah (Dikmen)</a>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <a class="link1" href="<?=site_url('pustaka/dikti')?>">Pendidikan Tinggi (Dikti)</a>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <a class="link1" href="<?=site_url('pustaka/dikmas')?>">Pendidikan Masyarakat (Dikmas)</a>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <a class="link1" href="<?=site_url('pustaka/residu_ud')?>">Residu Update Data</a>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <a class="link1" href="<?=site_url('pustaka/residu_sp')?>">Residu Tidak Aktif</a>
                                    </span>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>
                                <a class="link1" href="<?=site_url('pustaka/yayasan')?>">YAYASAN PENDIDIKAN</a>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>
                                <a class="link1" href="<?=site_url('pustaka/layanan')?>">PROGRAM LAYANAN</a>
                            </span>
                            <ul>
                                <li>
                                    <span>
                                        <a class="link1" href="<?=site_url('pustaka/paud_program')?>">PAUD</a>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <a class="link1" href="<?=site_url('pustaka/kesetaraan')?>">Kesetaraan</a>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <a class="link1" href="<?=site_url('pustaka/keterampilankerja')?>">Keterampilan Kerja</a>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        Sekolah Luar Biasa
                                    </span>
                                </li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="margin:30px;display:inline-block;vertical-align:top;">
            <table
                class="tbpustaka"
                style="table-layout: fixed; width: 258px; border: 1px solid black">
                <colgroup>
                    <col style="width: 280px">
                </colgroup>
                <thead>
                    <tr>
                        <th>DATA KEBUDAYAAN DAN KEBAHASAAN</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <span>
                                CAGAR BUDAYA
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>
                                MUSEUM
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>
                                WARISAN BUDAYA TAK BENDA
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>
                                SANGGAR
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </center>
</div>

<?= $this->endSection() ?>