<style>
    /* all levels */
    .sitemap a {
        color: #000;
        text-decoration: none;
    }

    /* first level */
    .sitemap {
        margin: 2em 0;
        list-style-type: none;
        background: url('https://dokumen.unma.ac.id/assets/btn/dots1.png') repeat-y 0 0;
        padding: 0;
    }

    .sitemap li {
        display: inline;
    }

    .sitemap li a {
        display: block;
        padding: 0 0 0 15px;
        margin: 0;
        line-height: 24px;
        background: url('https://dokumen.unma.ac.id/assets/btn/bullet1.png') no-repeat 0 0;
    }

    .sitemap li a.open {
        background: url('https://dokumen.unma.ac.id/assets/btn/bullet1-open.png') no-repeat 0 0;
    }

    /* second level */
    .sitemap ul {
        margin: 0;
        padding: 0;
        background: url('https://dokumen.unma.ac.id/assets/btn/dots2.png') repeat-y 30px 0;
    }

    .sitemap li li a {
        padding: 0 0 0 45px;
        background: url('https://dokumen.unma.ac.id/assets/btn/bullet2.png') no-repeat 30px 0;
    }

    .sitemap li li a.open {
        background: url('https://dokumen.unma.ac.id/assets/btn/bullet2-open.png') no-repeat 30px 0;
    }

    /* third level */
    .sitemap ul ul {
        padding: 0;
        background: url('https://dokumen.unma.ac.id/assets/btn/dots3.png') repeat-y 60px 0;
    }

    .sitemap li li li a {
        padding: 0 0 0 75px;
        background: url('https://dokumen.unma.ac.id/assets/btn/bullet3.png') no-repeat 60px 0;
    }

    .sitemap li li li a.open {
        background: url('https://dokumen.unma.ac.id/assets/btn/bullet3-open.png') no-repeat 60px 0;
    }

    /* fourth level */
    .sitemap ul ul ul {
        padding: 0;
        background: url('https://dokumen.unma.ac.id/assets/btn/dots4.png') repeat-y 90px 0;
    }

    .sitemap li li li li a {
        padding: 0 0 0 105px;
        background: url('https://dokumen.unma.ac.id/assets/btn/bullet4.png') no-repeat 90px 0;
    }

    .sitemap li li li li a.open {
        background: url('https://dokumen.unma.ac.id/assets/btn/bullet4-open.png') no-repeat 90px 0;
    }
</style>
<h2 align="center" style="margin: 60px 10px 10px 10px;">View Data Standar</h2>
<hr>
<a href="<?= base_url('dashboard'); ?>" class="btn btn-warning float-left">
    Kembali
</a>
<br>
<?php
echo '<ul class="sitemap">';
#standar
foreach ($list_standar as $standar) {
    if (!empty($standar['sub_standar'])) {
        echo '<li><a href="" class="open font-weight-bold">' . $standar['standar'] . '</a>';
    } else {
        echo '<li><a href="" class="font-weight-bold">' . $standar['standar'] . '</a>';
    }
    #sub_standar
    if (isset($standar['sub_standar'])) {
        echo '<ul>';
        foreach ($standar['sub_standar'] as $data_sub_standar) {
            $get_lv_3 = $controller->data_sub_sub_standar($data_sub_standar->id_standar);
            if (!empty($get_lv_3)) {
                echo '<li><a href="" class="open">' . $data_sub_standar->nama_standar . '</a>';
            } else {
                echo '<li><a href="" class="">' . $data_sub_standar->nama_standar . '</a>';
            }
            #sub_sub_standar
            if (isset($get_lv_3)) {
                echo '<ul>';
                foreach ($get_lv_3 as $dt_sub_sub_standar) {
                    echo '
                    <li>
                        <a href="">' . $dt_sub_sub_standar->nama_standar . '</a>
                    </li>';
                }
                echo '</ul>';
            }
            echo '</li>';
        }
        echo '</ul>';
    }
    echo '</li>';
}
echo '</ul>';
?>