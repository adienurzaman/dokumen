<a class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">Tambah Standar</a>
<a class="btn btn-warning" onclick="javascript:return window.history.back();">Kembali</a>

<!-- Response tabel dari ajax/xhr request -->
<div id="areaTabelStandar" class="mb-3 mt-2"></div>

<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Standar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-tambah">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-xs-8">
                            <input name="id_standar" id="id_standar" class="form-control" type="hidden">
                            <input name="parent_standar" id="parent_standar" class="form-control" type="hidden" value="<?= $parent; ?>">
                            <input name="level_standar" id="level_standar" class="form-control" type="hidden" value="<?= $level; ?>">
                        </div>
                        <div class="col-xs-8">
                            <input name="nama_standar" id="nama_standar" class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Standar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-xs-8">
                            <input name="id_standar" id="id_standar" class="form-control" type="hidden">
                            <input name="parent_standar" id="parent_standar" class="form-control" type="hidden">
                            <input name="level_standar" id="level_standar" class="form-control" type="hidden">
                        </div>
                        <div class="col-xs-8">
                            <input name="nama_standar" id="nama_standar" class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan data terbaru</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let form_tambah;
    let form_edit;
    let modal_tambah;
    let modal_edit;
    let parent = "<?= $parent; ?>";
    let level = "<?= $level; ?>";
    $(function() {
        //tampilkan tabel
        form_tambah = $("#form-tambah");
        form_edit = $("#form-edit");
        modal_tambah = $("#modalAdd");
        modal_edit = $("#modalEdit");

        tampil_tabel_standar(parent, level);
        //reset data modal ketika modal hide
        $(".modal").on('hide.bs.modal', function() {
            form_tambah[0].reset();
            form_edit[0].reset();
        });
        //submit tambah data
        form_tambah.on('submit', function(e) {
            e.preventDefault();
            let data_post = $(this).serialize();
            $.ajax({
                url: "<?= base_url('standar/ajax_simpan_standar'); ?>",
                type: "POST",
                dataType: "JSON",
                data: data_post,
                cache: false,
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.pesan + '. ', 'Informasi', {
                            "showMethod": "slideDown",
                            "hideMethod": "slideUp",
                            timeOut: 2000
                        });
                        location.reload();
                    } else {
                        toastr.warning(response.pesan + '. ', 'Informasi', {
                            "showMethod": "slideDown",
                            "hideMethod": "slideUp",
                            timeOut: 2000
                        });
                        location.reload();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    toastr.error(errorThrown + '. ' + textStatus + ' ' + jqXHR.status + '. ', 'Informasi', {
                        "showMethod": "slideDown",
                        "hideMethod": "slideUp",
                        timeOut: 2000
                    });
                }
            });
        });

        form_edit.on('submit', function(e) {
            e.preventDefault();
            let data_post = $(this).serialize();
            $.ajax({
                url: "<?= base_url('standar/ajax_update_standar'); ?>",
                type: "POST",
                dataType: "JSON",
                data: data_post,
                cache: false,
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.pesan + '. ', 'Informasi', {
                            "showMethod": "slideDown",
                            "hideMethod": "slideUp",
                            timeOut: 2000
                        });
                        tampil_tabel_standar();
                    } else {
                        toastr.warning(response.pesan + '. ', 'Informasi', {
                            "showMethod": "slideDown",
                            "hideMethod": "slideUp",
                            timeOut: 2000
                        });
                        tampil_tabel_standar();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    toastr.error(errorThrown + '. ' + textStatus + ' ' + jqXHR.status + '. ', 'Informasi', {
                        "showMethod": "slideDown",
                        "hideMethod": "slideUp",
                        timeOut: 2000
                    });
                }
            });
        });

        //akhir tag jQuery;
    });

    function tampil_tabel_standar(parent, level) {
        $.ajax({
            url: "<?= base_url('standar/ajax_get_standar/'); ?>" + parent + "/" + level,
            type: "GET",
            cache: false,
            success: function(response) {
                $("#areaTabelStandar").html(response);
                modal_tambah.modal('hide');
                modal_edit.modal('hide');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                toastr.error(errorThrown + '. ' + textStatus + ' ' + jqXHR.status + '. ', 'Informasi', {
                    "showMethod": "slideDown",
                    "hideMethod": "slideUp",
                    timeOut: 2000
                });
            }
        });
    }

    function ubah(id_standar) {
        $.ajax({
            url: "<?= base_url('standar/ajax_get_standar_by_id/'); ?>" + id_standar,
            type: "GET",
            dataType: "JSON",
            cache: false,
            success: function(response) {
                if (response.status) {
                    toastr.success(response.pesan + '. ', 'Informasi', {
                        "showMethod": "slideDown",
                        "hideMethod": "slideUp",
                        timeOut: 2000
                    });
                    form_edit.find("[name='id_standar']").val(response.data.id_standar);
                    form_edit.find("[name='parent_standar']").val(response.data.parent_standar);
                    form_edit.find("[name='level_standar']").val(response.data.level_standar);
                    form_edit.find("[name='nama_standar']").val(response.data.nama_standar);
                    modal_edit.modal('show');
                } else {
                    toastr.warning(response.pesan + '. ', 'Informasi', {
                        "showMethod": "slideDown",
                        "hideMethod": "slideUp",
                        timeOut: 2000
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                toastr.error(errorThrown + '. ' + textStatus + ' ' + jqXHR.status + '. ', 'Informasi', {
                    "showMethod": "slideDown",
                    "hideMethod": "slideUp",
                    timeOut: 2000
                });
            }
        })
    }

    function hapus(id_standar) {
        let konfirmasi = confirm('Apakah anda yakin akan menghapus data ini ?');
        if (konfirmasi) {
            $.ajax({
                url: "<?= base_url('standar/ajax_hapus_standar/'); ?>" + id_standar,
                type: "GET",
                dataType: "JSON",
                cache: false,
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.pesan + '. ', 'Informasi', {
                            "showMethod": "slideDown",
                            "hideMethod": "slideUp",
                            timeOut: 2000
                        });
                        tampil_tabel_standar();
                    } else {
                        toastr.warning(response.pesan + '. ', 'Informasi', {
                            "showMethod": "slideDown",
                            "hideMethod": "slideUp",
                            timeOut: 2000
                        });
                        tampil_tabel_standar();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    toastr.error(errorThrown + '. ' + textStatus + ' ' + jqXHR.status + '. ', 'Informasi', {
                        "showMethod": "slideDown",
                        "hideMethod": "slideUp",
                        timeOut: 2000
                    });
                }
            })
        } else {
            toastr.warning('Hapus data tidak jadi.', 'Informasi', {
                "showMethod": "slideDown",
                "hideMethod": "slideUp",
                timeOut: 2000
            });
        }
    }
</script>