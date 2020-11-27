<h2 align="center" style="margin: 60px 10px 10px 10px;">Contoh TreeView Data Standar</h2>
<hr>
<?php
$marginleft = 48;
$marginleft_2 = $marginleft + 48;
// var_dump($list_standar);
// die;
#standar
foreach ($list_standar as $standar) {
    echo '
    <div class="media border p-3 mb-2 btn-primary">
        <div class="media-body">
            <div class="row">
                <div class="col-sm-10">
                    <h4><b>Standar : ' . $standar['standar'] . '</b></h4>
                </div>
            </div>
        </div>
    </div>';
    #sub_standar
    foreach ($standar['sub_standar'] as $data_sub_standar) {
        echo '
        <div class="media border p-3 mb-2 btn-light" style="margin-left:' . $marginleft . 'px">
            <div class="media-body">
                <div class="row">
                    <div class="col-sm-10">
                        <p> Nama Standar : ' . $data_sub_standar->nama_standar . '</p>
                    </div>
                </div>
            </div>
        </div>';
        #sub_sub_standar
        $get_lv_3 = $controller->data_sub_sub_standar($data_sub_standar->id_standar);
        foreach ($get_lv_3 as $dt_sub_sub_standar) {
            echo '
                <div class="media border p-3 mb-2 btn-dark" style="margin-left:' . $marginleft_2 . 'px">
                    <div class="media-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <p> Nama Standar : ' . $dt_sub_sub_standar->nama_standar . '</p>
                            </div>
                        </div>
                    </div>
                </div>';
        }
    }
}
?>