<div class="row">
    <?php foreach ($list_standar as $value) {
    ?>
        <div class="card-deck col-md-6 text-center" id="carddata">
            <div class="card mb-4 shadow-sm border-info card-kelas">
                <div class="card-header bg-info">
                    <h2 class="my-0 font-weight-normal text-white">STANDAR</h2>
                </div>
                <div class="card-body">
                    <h4 class="card-title pricing-card-title"><?= $value['standar'] ?></h4>
                    <a href="<?= base_url('standar/index/' . $value['id_standar'] . '/2'); ?>" class="btn btn-lg btn-block btn-info">Buka</a>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="card-deck col-md-6 text-center" id="carddata">
        <div class="card mb-4 shadow-sm border-success card-kelas">
            <div class="card-header bg-success">
                <h2 class="my-0 font-weight-normal text-white">STANDAR</h2>
            </div>
            <div class="card-body">
                <h4 class="card-title pricing-card-title">SEMUA STANDAR</h4>
                <a href="<?= base_url('standar/all'); ?>" class="btn btn-lg btn-block btn-success">Buka</a>
            </div>
        </div>
    </div>
</div>