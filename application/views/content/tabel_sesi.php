<table width="100%" class="table table-responsive table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Prodi</th>
            <th>Tahun Akreditasi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <!-- php foreach() -->
        <?php
        if (!empty($data_sesi)) {
            $no = 1;
            foreach ($data_sesi as $value) {
        ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value->kode_prodi; ?></td>
                    <td><?= $value->tahun_akreditasi; ?></td>
                    <td>
                        <a class="btn btn-success" onclick="ubah(<?= $value->id_sesi; ?>)">Edit</a>
                        <a class="btn btn-danger" onclick="hapus(<?= $value->id_sesi; ?>)">Hapus</a>
                    </td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <th colspan="4">Data belum ada</th>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>