<style type="text/css">
    .iframe-responsive {
        overflow: hidden;
        padding-bottom: 10%;
        position: relative;
        height: 600px;
        width: 100%;
    }
</style>
<a onclick="javascript:return window.history.back();" class="btn btn-warning">
    Kembali
</a>
<br>
<br>
<div class="flashdata" data-pesan="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="card mx-auto">
    <div class="card-header bg-info">
        <h4 class="text-light"><strong>UPLOAD DATA</strong></h4>
    </div>
    <div class="card-body">
        <form action="<?= base_url('upload/proses'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label><strong>Pilih file yang akan diupload</strong></label>
                <input type="file" class="form-control" name="file_upload" required>
            </div>
            <button type="submit" class="btn btn-primary">
                Upload
            </button>
        </form>
    </div>
</div>
<br>
<a href="<?= base_url('upload/?v=grid'); ?>" class="btn btn-info">
    Grid View
</a>
<a href="<?= base_url('upload/?v=list'); ?>" class="btn btn-success">
    List View
</a>
<hr>
<div>
    <p> List data yang terupload, data diambil menggunakan api gdrive. </p>
    <table class="table table-responsive table-bordered table-striped">
        <thead>
            <tr>
                <td>
                    ID
                </td>
                <td>
                    Nama File
                </td>
                <td>
                    Lihat File
                </td>
                <td>
                    Unduh File
                </td>
                <td>
                    Hapus File
                </td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($this->google->getAllFiles() as $file) {
                # yang diambil hanya file saja, folder tidak ditampilkan
                if ($file->getName() != 'upload_doc') {
            ?>
                    <tr>
                        <td>
                            <?= $file->getId(); ?>
                        </td>
                        <td>
                            <?= $file->getName(); ?>
                        </td>
                        <td>
                            <a href="https://drive.google.com/file/d/<?= $file->getId(); ?>/view" target="_blank"><?= $file->getId(); ?></a>
                        </td>
                        <td>
                            <a href="https://drive.google.com/uc?id=<?= $file->getId(); ?>&export=download" target="_blank"><?= $file->getId(); ?></a>
                        </td>
                        <td>
                            <a onclick="javascript:return confirm('Apakah anda yakin akan menghapus data ini ?')" href="<?= base_url(); ?>upload/delete_file/<?= $file->getId(); ?>"><?= $file->getId(); ?></a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>
<div>
    <hr>
    <p> List data yang terupload, data diambil menggunakan fitur embed folder gdrive. </p>
    <iframe src=" https://drive.google.com/embeddedfolderview?id=1N0cKQ7rnANbCTIBiOQL9Y0pEznrOd43C#<?= $view_embed; ?>" class="iframe-responsive" frameborder="0"></iframe>
</div>

<script>
    $(function() {
        const flashdata = $('.flashdata').data('pesan');
        if (flashdata) {
            alert(flashdata);
        }
    });
</script>