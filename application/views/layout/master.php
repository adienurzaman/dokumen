<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('layout/head'); ?>

<body>
    <nav class="navbar navbar-dark bg-info fixed-top">
        <a class="navbar-brand" href="<?= base_url('dashboard'); ?>" style="color: #fff;">
            Dokumen Unma
        </a>
    </nav>
    <div class="container mb-3">
        <?php $this->load->view('content/' . $view); ?>
    </div>
</body>
<?php $this->load->view('layout/js'); ?>

</html>