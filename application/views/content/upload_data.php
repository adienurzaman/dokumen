<style type="text/css">
    .iframe-responsive {
        overflow: hidden;
        padding-bottom: 10%;
        position: relative;
        height: 600px;
        width: 100%;
    }
</style>
<h2 align="center" style="margin: 60px 10px 10px 10px;">Upload Page</h2>
<hr>
<a href="<?= base_url('dashboard'); ?>" class="btn btn-warning float-left">
    Kembali
</a>
<div class="flashdata" data-pesan="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="card w-50 mx-auto">
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
    <iframe src="https://drive.google.com/embeddedfolderview?id=1N0cKQ7rnANbCTIBiOQL9Y0pEznrOd43C#<?= $view_embed; ?>" class="iframe-responsive" frameborder="0"></iframe>
</div>

<script>
    $(function() {
        const flashdata = $('.flashdata').data('pesan');
        if (flashdata) {
            alert(flashdata);
        }
    });
</script>