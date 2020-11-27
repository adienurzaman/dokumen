<h2 align="center" style="margin: 60px 10px 10px 10px;">Contoh TreeView Data Standar</h2>
<hr>
<?php
$marginleft = 48;
foreach ($list_standar as $value) {
    echo '
    <div class="media border p-3 mb-2">
        <div class="media-body">
            <div class="row">
                <div class="col-sm-10">
                    <h4><b>Standar : ' . $value['standar'] . '</b></h4>
                </div>
            </div>
        </div>
    </div>';
    foreach ($value['sub_standar'] as $data) {
        echo '
        <div class="media border p-3 mb-2" style="margin-left:' . $marginleft . 'px">
            <div class="media-body">
                <div class="row">
                    <div class="col-sm-10">
                        <p> Nama Standar : ' . $data->nama_standar . '</p>
                    </div>
                </div>
            </div>
        </div>';
    }
}
?>