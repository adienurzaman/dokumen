<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('layout/head'); ?>

<body>
    <nav class="navbar navbar-dark bg-info fixed-top">
        <a class="navbar-brand" href="<?= base_url('dashboard'); ?>" style="color: #fff;">
            Dokumen Unma
        </a>
        <a class="float-right" style="color: #fff;"><?= (isset($session['nama']))?$session['nama']:""; ?></a>
    </nav>
    <div class="container mb-5">
        <div style="margin: 100px 10px 10px 10px;"></div>
        <?php $this->load->view('content/' . $view); ?>
    </div>
</body>
<?php $this->load->view('layout/js'); ?>

</html>