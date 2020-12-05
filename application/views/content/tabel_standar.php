<div class="table-responsive">
    <table width="100%" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Standar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($standar as $value) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value->nama_standar; ?></td>
                    <td>
                        <a class="btn btn-info" href="<?= base_url('standar/index/' . $value->id_standar . '/' . ($value->level_standar + 1)); ?>">Detail</a>
                        <a class="btn btn-success" onclick="ubah(<?= $value->id_standar; ?>)">Edit</a>
                        <a class="btn btn-danger" onclick="hapus(<?= $value->id_standar; ?>)">Hapus</a>
                    </td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>
</div>