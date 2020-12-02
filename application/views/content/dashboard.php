<div class="card-deck mt-1 mb-3 text-center" id="carddata">
    <div class="card mb-4 shadow-sm card-kelas">
        <div class="card-header bg-info">
            <h2 class="my-0 font-weight-normal text-white">PENGATURAN</h2>
        </div>
        <div class="card-body">
            <h4 class="card-title pricing-card-title">Lihat Direktori Standar</h4>
            <a href="<?= base_url('standar'); ?>" class="btn btn-lg btn-block btn-info">Pilih</a>
        </div>
    </div>
    <div class="card mb-4 shadow-sm card-kelas">
        <div class="card-header bg-info">
            <h2 class="my-0 font-weight-normal text-white">PENGATURAN</h2>
        </div>
        <div class="card-body">
            <h4 class="card-title pricing-card-title">Upload Data</h4>
            <a href="<?= base_url('upload'); ?>" class="btn btn-lg btn-block btn-info">Pilih</a>
        </div>
    </div>
    <div class="card mb-4 shadow-sm card-kelas">
        <div class="card-header bg-info">
            <h2 class="my-0 font-weight-normal text-white">PENGATURAN</h2>
        </div>
        <div class="card-body">
            <h4 class="card-title pricing-card-title">Sesi</h4>
            <a href="<?= base_url('sesi'); ?>" class="btn btn-lg btn-block btn-info">Pilih</a>
        </div>
    </div>
    <div class="card mb-4 shadow-sm card-kelas">
        <div class="card-header bg-warning">
            <h2 class="my-0 font-weight-normal text-white">PENGATURAN</h2>
        </div>
        <div class="card-body">
            <h4 class="card-title pricing-card-title">Logout sistem</h4>
            <a href="<?= base_url('auth/hapus_sesi'); ?>" class="btn btn-lg btn-block btn-warning">Pilih</a>
        </div>
    </div>
</div>