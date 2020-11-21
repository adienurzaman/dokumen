<h2 align="center" style="margin: 60px 10px 10px 10px;">Contoh TreeView Data Standar</h2>
<hr>
<?php
$marginleft = 48;

foreach ($group_list as $value) {
    echo '
    <div class="media border p-3 mb-2">
        <div class="media-body">
            <div class="row">
                <div class="col-sm-10">
                    <h4><b> Parent Standar : ' . $value->parent_standar . '</b></h4>
                </div>
            </div>
        </div>
    </div>';
    $list_standar = $controller->get_data_standar($value->parent_standar);
    foreach ($list_standar as $data) {
        echo '
        <div class="media border p-3 mb-2" style="margin-left:' . $marginleft . 'px">
            <div class="media-body">
                <div class="row">
                    <div class="col-sm-10">
                        <br> <small> Level Standar <i>' . $data->level_standar . '</i></small></h4>
                        <p> Standar : ' . $data->nama_standar . '</p>
                    </div>
                </div>
            </div>
        </div>';
    }
}
?>