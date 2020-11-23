<footer class="main-footer">
    <strong>Copyright &copy; <?= date('Y'); ?> <a href="<?= base_url('admin/dashboard') ?>">Preneur Academy</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url(); ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Showing Sweet Alert -->
<script src="<?= base_url(); ?>assets/dist/js/myscript.js"></script>
<!-- Drop Image -->
<script src="<?= base_url(); ?>assets/dist/js/app.js"></script>
<!-- Select2 -->
<script src="<?= base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- <script src="<?= base_url(); ?>assets/plugins/bootstrap-select/js/bootstrap-select.min.js"></script> -->
<!-- <script src="<?= base_url(); ?>assets/dist/js/jquery-3.4.1.min.js"></script> -->


<!-- Sweet Alert Hapus data Master-->
<script>
    $(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 5000
        });

        const flashData = $('.flash-data').data('flashdata');
        if (flashData == 'draft') {
            Toast.fire({
                icon: 'info',
                title: 'Data telah didraftkan!',
            });
        } else if (flashData == 'publish') {
            Toast.fire({
                icon: 'info',
                title: 'Data telah dipublish!',
            });
        } else if (flashData == 'save') {
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil disimpan',
            });
        } else if (flashData == 'formempty') {
            Toast.fire({
                icon: 'error',
                title: 'Kesalahan saat menyimpan data, mohon inputkan data yang sesuai!',
            });
        } else if (flashData == 'edit') {
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil diubah!',
            });
        } else if (flashData == 'hapus') {
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil dihapus!',
            });
        } else if (flashData == 'aktif') {
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil diaktifkan!',
            });
        } else if (flashData == 'nonaktif') {
            Toast.fire({
                icon: 'info',
                title: 'Data dinonaktifkan!',
            });
        }
    });
</script>

<!-- Get Data Kategori Kelas -->
<script>
    ambilData();

    function ambilData() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('admin/kelas/get_ktgkls'); ?>',
            dataType: 'json',
            success: function(data) {
                var ktgklss = '';
                ktgklss += '<option value="" selected>--Kategori kelas--</option>'
                for (var i = 0; i < data.length; i++) {
                    ktgklss += '<option value=' + data[i].ID_KTGKLS + '>' + data[i].KTGKLS + '</option>'
                }
                $(".slct-ktg").html(ktgklss);
            }
        });
    }
</script>

<!-- Get Data Diskon -->
<script>
    ambilDiskon();

    function ambilDiskon() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('admin/kelas/get_diskon'); ?>',
            dataType: 'json',
            success: function(data) {
                var diskon = '';
                diskon += '<option value="0" selected>--Pilih diskon--</option>'
                for (var i = 0; i < data.length; i++) {
                    diskon += '<option value=' + data[i].ID_DISKON + '>' + data[i].NM_DISKON + ' (' + data[i].DISKON * 100 + '%)</option>'
                }
                $(".slct-diskon").html(diskon);
            }
        });
    }
</script>

<!-- Add Multiple Form Kelas-->
<script>
    $(document).ready(function() {
        $(".btn-plusfrm").click(function(e) {
            e.preventDefault();
            ambilData();
            ambilDiskon();
            $(".add-form").append(`
            <tr class="text-center">
                <td>
                <input type="text" class="form-control" name="nama[]" required>
                </td>
                <td>
                <input type="text" class="form-control" name="link[]" required>
                </td>
                <td>
                    <select name="ktg[]" id="ktg" class="custom-select slct-ktg">
                    
                    </select>
                </td>
                <td>
                <input type="text" class="form-control" name="hrg[]" required>
                </td>
                <td>
                    <select name="disc[]" id="disc" class="custom-select slct-diskon">

                    </select>
                </td>
                <td>
                <textarea class="form-control" name="deskripsi[]" required></textarea>
                </td>
                <td>
                <button type="button" class="btn btn-danger btn-sm btn-dellfrm text-bold"><i class="fas fa-trash"></i> Form</button>
                </td>
            </tr>
            `);
        });
    });

    /** to delete form */
    $(document).on('click', '.btn-dellfrm', function(e) {
        e.preventDefault();

        $(this).parents('tr').remove();
    });
</script>

<!-- Add Multiple Form Diskon-->
<script>
    $(document).ready(function() {
        $(".plus-diskon").click(function(e) {
            e.preventDefault();
            $(".form-diskon").append(`
            <tr class="text-center">
            <td>
                <input type="number" class="form-control" name="diskon[]" required>
            </td>
            <td>
                <input type="text" class="form-control" name="nama[]" required>
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm dell-diskon text-bold"><i class="fas fa-trash"></i> Form</button>
            </td>
            </tr>
            `);
        });
    });

    /** to delete form */
    $(document).on('click', '.dell-diskon', function(e) {
        e.preventDefault();

        $(this).parents('tr').remove();
    });
</script>

<!-- Add multiple form kategori kelas -->
<script>
    $(document).ready(function() {
        $(".plus-ktgkelas").click(function(e) {
            e.preventDefault();
            $(".form-ktgkelas").append(`
            <tr class="text-center">
            <td>
                <input type="text" class="form-control" name="nama[]" required>
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm dell-ktgkelas text-bold"><i class="fas fa-trash"></i> Form</button>
            </td>
            </tr>
            `);
        });
    });

    /** to delete form */
    $(document).on('click', '.dell-ktgkelas', function(e) {
        e.preventDefault();

        $(this).parents('tr').remove();
    });
</script>

<!-- Enable/Disabled Form Edit profile -->
<script>
    $(document).ready(function() {
        $("#btn-edit").click(function() {
            $(".tittle").html("Edit Profil");
            $("#btn-edit").prop('hidden', true);
            $("#btn-save").prop('hidden', false);
            $("#btn-cancel").prop('hidden', false);
            $("#nm").prop('disabled', false);
            $("#hp").prop('disabled', false);
            $("#almt").prop('disabled', false);
            $("#imgedit").prop('hidden', false);
            $("#img").prop('hidden', true);
        });

        $("#btn-cancel").click(function() {
            $(".tittle").html("Profil");
            $("#btn-edit").prop('hidden', false);
            $("#btn-save").prop('hidden', true);
            $("#btn-cancel").prop('hidden', true);
            $("#nm").prop('disabled', true);
            $("#hp").prop('disabled', true);
            $("#almt").prop('disabled', true);
            $("#imgedit").prop('hidden', true);
            $("#img").prop('hidden', false);
        });
    });
</script>

<!-- Enable Disable form edit kelas -->
<script>
    $(document).ready(function() {
        $("button#edit-kls").click(function() {
            $("h4.tittlekls").html("Edit Data Kelas");
            $("div.row-idkls").prop('hidden', true);
            $("div.row-ktgkls").prop('hidden', false);
            $("button#save-kls").prop('hidden', false);
            $("button#edit-kls").prop('hidden', true);
            $("input#inkls").prop('disabled', false);
            $("textarea#inkls").prop('disabled', false);
            $("select#inkls").prop('disabled', false);
            $("div.edit-gbrkls").prop('hidden', false);
            $("div.row-diskon").prop('hidden', false);
            $("div.row-hrgdiskon").prop('hidden', true);
        });

        $("button#cancel-kls").click(function() {
            $("h4.tittlekls").html("Detail Data Kelas");
            $("div.row-idkls").prop('hidden', false);
            $("div.row-ktgkls").prop('hidden', true);
            $("button#save-kls").prop('hidden', true);
            $("button#edit-kls").prop('hidden', false);
            $("input#inkls").prop('disabled', true);
            $("textarea#inkls").prop('disabled', true);
            $("select#inkls").prop('disabled', true);
            $("div.edit-gbrkls").prop('hidden', true);
            $("div.row-diskon").prop('hidden', true);
            $("div.row-hrgdiskon").prop('hidden', false);
        });

        $("button.close").click(function() {
            $("h4.tittlekls").html("Detail Data Kelas");
            $("div.row-idkls").prop('hidden', false);
            $("div.row-ktgkls").prop('hidden', true);
            $("button#save-kls").prop('hidden', true);
            $("button#edit-kls").prop('hidden', false);
            $("input#inkls").prop('disabled', true);
            $("textarea#inkls").prop('disabled', true);
            $("select#inkls").prop('disabled', true);
            $("div.edit-gbrkls").prop('hidden', true);
            $("div.row-diskon").prop('hidden', true);
            $("div.row-hrgdiskon").prop('hidden', false);
        });
    });
</script>

<!-- Enable disable edit kategori kelas -->
<script>
    $(document).ready(function() {
        $("button#edit-ktg").click(function() {
            $("h4.tittlektg").html("Edit Kategori Kelas");
            $("button#save-ktg").prop('hidden', false);
            $("button#edit-ktg").prop('hidden', true);
            $("input#inktg").prop('disabled', false);
        });

        $("button#cancel-ktg").click(function() {
            $("h4.tittlektg").html("Detail Kategori Kelas");
            $("button#save-ktg").prop('hidden', true);
            $("button#edit-ktg").prop('hidden', false);
            $("input#inktg").prop('disabled', true);
        });

        $("button.close").click(function() {
            $("h4.tittlektg").html("Detail Kategori Kelas");
            $("button#save-ktg").prop('hidden', true);
            $("button#edit-ktg").prop('hidden', false);
            $("input#inktg").prop('disabled', true);
        });
    });
</script>

<!-- Enable/disable form edit diskon -->
<script>
    $(document).ready(function() {
        $("button#edit-dis").click(function() {
            $("h4.tittledis").html("Edit Data Diskon");
            $("button#save-dis").prop('hidden', false);
            $("button#edit-dis").prop('hidden', true);
            $("input#indis").prop('disabled', false);
        });

        $("button#cancel-dis").click(function() {
            $("h4.tittledis").html("Detail Data Diskon");
            $("button#save-dis").prop('hidden', true);
            $("button#edit-dis").prop('hidden', false);
            $("input#indis").prop('disabled', true);
        });

        $("button.close").click(function() {
            $("h4.tittledis").html("Detail Data Diskon");
            $("button#save-dis").prop('hidden', true);
            $("button#edit-dis").prop('hidden', false);
            $("input#indis").prop('disabled', true);
        });
    });
</script>

<!-- UNknown -->
<script>
    $(document).ready(function() {
        $("#btn-edit").click(function() {
            $(".tittle").html("Edit Profil");
            $("#btn-edit").prop('hidden', true);
            $("#btn-save").prop('hidden', false);
            $("#btn-cancel").prop('hidden', false);
            $("#nm").prop('disabled', false);
            $("#hp").prop('disabled', false);
            $("#almt").prop('disabled', false);
            $("#imgedit").prop('hidden', false);
            $("#img").prop('hidden', true);
        });

        $("#btn-cancel").click(function() {
            $(".tittle").html("Profil");
            $("#btn-edit").prop('hidden', false);
            $("#btn-save").prop('hidden', true);
            $("#btn-cancel").prop('hidden', true);
            $("#nm").prop('disabled', true);
            $("#hp").prop('disabled', true);
            $("#almt").prop('disabled', true);
            $("#imgedit").prop('hidden', true);
            $("#img").prop('hidden', false);
        });
    });
</script>

<!-- Upload gambar -->
<script>
    function triggerClick(b) {
        document.querySelector('#profileImage').click();
    }

    function displayImage(b) {
        if (b.files[0]) {
            var reader = new FileReader();
            reader.onload = function(b) {
                document.querySelector('#profileDisplay').setAttribute('src', b.target.result);
            }
            reader.readAsDataURL(b.files[0]);
        }
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {

        $("#key-click").click(function() {
            $("#icon").toggleClass('fa-eye-slash');

            var input = $("#key1");

            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }

        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        $("#key-click1").click(function() {
            $("#icon1").toggleClass('fa-eye-slash');

            var input = $("#key2");

            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }

        });

    });
</script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>


<script>
	$(function () {
		//Initialize Select2 Elements
		$('.select2').select2()

		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})
	})

</script>


</body>

</html>