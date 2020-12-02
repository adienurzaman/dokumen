<a class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">Tambah Sesi</a>
<a class="btn btn-warning" onclick="javascript:return window.history.back();">Kembali</a>

<!-- Response tabel dari ajax/xhr request -->
<div id="areaTabelSesi" class="mb-3 mt-2"></div>

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
                            <input name="id_sesi" id="id_sesi" class="form-control" type="hidden">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pilih_prodi"><strong>Program Studi</strong></label>
                        <select class="form-control" name="kode_prodi" id="kode_prodi" required>
                            <option value="">Pilih Program Studi</option>
                            <option value="1">Administrasi Publik</option>
                            <option value="3">Pendidikan Bahasa Indonesia</option>
                            <option value="4">Pendidikan Jasmani</option>
                            <option value="5">Manajemen</option>
                            <option value="6">Akuntansi</option>
                            <option value="7">Agroteknologi</option>
                            <option value="8">Agribisnis</option>
                            <option value="9">Peternakan</option>
                            <option value="10">Pendidikan Agama Islam</option>
                            <option value="11">Ekonomi Syari'ah</option>
                            <option value="12">Pendidikan Islam Anak Usia Dini</option>
                            <option value="14">Informatika</option>
                            <option value="15">Teknik Sipil</option>
                            <option value="16">Teknik Mesin</option>
                            <option value="17">Teknik Industri</option>
                            <option value="18">Ilmu Komunikasi</option>
                            <option value="19">Hubungan Internasional</option>
                            <option value="20">Pendidikan Bahasa Inggris</option>
                            <option value="21">Ilmu Hukum</option>
                            <option value="22">Pendidikan Guru Sekolah Dasar</option>
                            <option value="23">Pendidikan Matematika</option>
                            <option value="24">Pendidikan Biologi</option>
                            <option value="25">Ilmu Administrasi</option>
                            <option value="26">Manajemen Pendidikan Islam</option>
                            <option value="0">None</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pilih_tahun"><strong>Tahun Akreditasi</strong></label>
                        <select class="form-control" name="tahun_akreditasi" id="tahun_akreditasi" required>
                            <option value="">Pilih Tahun Akreditasi</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                        </select>
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
                            <input name="id_sesi" id="id_sesi" class="form-control" type="hidden">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pilih_prodi"><strong>Program Studi</strong></label>
                        <select class="form-control" name="kode_prodi" id="kode_prodi" required>
                            <option value="">Pilih Program Studi</option>
                            <option value="1">Administrasi Publik</option>
                            <option value="3">Pendidikan Bahasa Indonesia</option>
                            <option value="4">Pendidikan Jasmani</option>
                            <option value="5">Manajemen</option>
                            <option value="6">Akuntansi</option>
                            <option value="7">Agroteknologi</option>
                            <option value="8">Agribisnis</option>
                            <option value="9">Peternakan</option>
                            <option value="10">Pendidikan Agama Islam</option>
                            <option value="11">Ekonomi Syari'ah</option>
                            <option value="12">Pendidikan Islam Anak Usia Dini</option>
                            <option value="14">Informatika</option>
                            <option value="15">Teknik Sipil</option>
                            <option value="16">Teknik Mesin</option>
                            <option value="17">Teknik Industri</option>
                            <option value="18">Ilmu Komunikasi</option>
                            <option value="19">Hubungan Internasional</option>
                            <option value="20">Pendidikan Bahasa Inggris</option>
                            <option value="21">Ilmu Hukum</option>
                            <option value="22">Pendidikan Guru Sekolah Dasar</option>
                            <option value="23">Pendidikan Matematika</option>
                            <option value="24">Pendidikan Biologi</option>
                            <option value="25">Ilmu Administrasi</option>
                            <option value="26">Manajemen Pendidikan Islam</option>
                            <option value="0">None</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pilih_tahun"><strong>Tahun Akreditasi</strong></label>
                        <select class="form-control" name="tahun_akreditasi" id="tahun_akreditasi" required>
                            <option value="">Pilih Tahun Akreditasi</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                        </select>
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
    $(function() {
        //tampilkan tabel
        get_dt_sesi();

        form_tambah = $("#form-tambah");
        form_edit = $("#form-edit");
        modal_tambah = $("#modalAdd");
        modal_edit = $("#modalEdit");

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
                url: "<?= base_url('sesi/ajax_save_dt_sesi'); ?>",
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
                        get_dt_sesi();
                    } else {
                        toastr.warning(response.pesan + '. ', 'Informasi', {
                            "showMethod": "slideDown",
                            "hideMethod": "slideUp",
                            timeOut: 2000
                        });
                        get_dt_sesi();
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
                url: "<?= base_url('sesi/ajax_edit_dt_sesi'); ?>",
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
                        get_dt_sesi();
                    } else {
                        toastr.warning(response.pesan + '. ', 'Informasi', {
                            "showMethod": "slideDown",
                            "hideMethod": "slideUp",
                            timeOut: 2000
                        });
                        get_dt_sesi();
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
    });

    function get_dt_sesi() {
        $.ajax({
            url: "<?= base_url('sesi/ajax_get_dt_sesi') ?>",
            type: "GET",
            cache: false,
            success: function(response) {
                $("#modalAdd").modal('hide');
                $("#modalEdit").modal('hide');
                $("#areaTabelSesi").html(response);
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

    function ubah(id_sesi) {
        $.ajax({
            url: "<?= base_url('sesi/ajax_get_dt_sesi_by_id/'); ?>" + id_sesi,
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
                    form_edit.find("[name='id_sesi']").val(response.data_sesi.id_sesi);
                    form_edit.find("[name='kode_prodi']").val(response.data_sesi.kode_prodi);
                    form_edit.find("[name='tahun_akreditasi']").val(response.data_sesi.tahun_akreditasi);
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

    function hapus(id_sesi) {
        let konfirmasi = confirm('Apakah anda yakin akan menghapus data ini ?');
        if (konfirmasi) {
            $.ajax({
                url: "<?= base_url('sesi/ajax_hapus_dt_sesi/'); ?>" + id_sesi,
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
                        get_dt_sesi();
                    } else {
                        toastr.warning(response.pesan + '. ', 'Informasi', {
                            "showMethod": "slideDown",
                            "hideMethod": "slideUp",
                            timeOut: 2000
                        });
                        get_dt_sesi();
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