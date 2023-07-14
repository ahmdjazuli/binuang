<footer class="main-footer">
    <strong>Copyright &copy; 2020 PT. Binuang Mitra Bersama.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      Make with <b>Love</b>
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Data Tables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>

<?php
  if ($_GET['m'] == "sama") {?>
    <script type="text/javascript">
      $(function() {
        const Toast = Swal.mixin({
          toast: true, position: 'top-end', showConfirmButton: false, timer: 3000
        });
          Toast.fire({
            icon: 'error', title: 'Username Sudah Digunakan'
          })
      });
    </script>
  <?php } 

  if ($_GET['m'] == "gagal") {?>
    <script type="text/javascript">
      $(function() {
        const Toast = Swal.mixin({
          toast: true, position: 'top-end', showConfirmButton: false, timer: 3000
        });
          Toast.fire({
            icon: 'error', title: 'Data Gagal Disimpan'
          })
      });
    </script>
  <?php } 

  if ($_GET['m'] == "simpan") {?>
    <script type="text/javascript">
      $(function() {
        const Toast = Swal.mixin({
          toast: true, position: 'top-end', showConfirmButton: false, timer: 3000
        });
          Toast.fire({
            icon: 'success', title: 'Data Berhasil Disimpan'
          })
      });
    </script>
  <?php }

  if ($_GET['m'] == "ubah") {?>
    <script type="text/javascript">
      $(function() {
        const Toast = Swal.mixin({
          toast: true, position: 'top-end', showConfirmButton: false, timer: 3000
        });
          Toast.fire({
            icon: 'info', title: 'Data Berhasil Diubah'
          })
      });
    </script>
  <?php }

  if ($_GET['m'] == "salin") {?>
    <script type="text/javascript">
      $(function() {
        const Toast = Swal.mixin({
          toast: true, position: 'top-end', showConfirmButton: false, timer: 3000
        });
          Toast.fire({
            icon: 'info', title: 'Data Berhasil Disalin'
          })
      });
    </script>
  <?php } 

  if ($_GET['m'] == "mana") {?>
    <script type="text/javascript">
      $(function() {
        const Toast = Swal.mixin({
          toast: true, position: 'top-end', showConfirmButton: false, timer: 3000
        });
          Toast.fire({
            icon: 'error', title: 'Tidak Ada Yang Diseleksi'
          })
      });
    </script>
  <?php }

  if ($_GET['m'] == "info") {?>
    <script type="text/javascript">
      $(function() {
        const Toast = Swal.mixin({
          toast: true, position: 'top-end', showConfirmButton: false, timer: 3000
        });
          Toast.fire({
            icon: 'info', title: 'Foto tidak diubah!'
          })
      });
    </script>
  <?php }

  if ($_GET['m'] == "hapus") {?>
    <script type="text/javascript">
      $(function() {
        const Toast = Swal.mixin({
          toast: true, position: 'top-end', showConfirmButton: false, timer: 3000
        });
          Toast.fire({
            icon: 'success', title: 'Data Berhasil Dihapus'
          })
      });
    </script>
  <?php } 
?>


<script>
  ratath = document.querySelectorAll('th');
  ratath.forEach(function(e){ e.style.verticalAlign = 'middle'; });

  ratatd = document.querySelectorAll('td');
  ratatd.forEach(function(e){ e.style.verticalAlign = 'middle'; });

  $(function () {
    $("#julikoding").DataTable({
      "responsive": true,
      "autoWidth": false,
      columnDefs:[{
        orderable:false,
        targets:'juli-imut'
      }],
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
      "language": {
        "decimal": ",",
        "thousands": ".",
        "lengthMenu": "_MENU_ aja",
        searchPlaceholder: "@eyeardesign",
        "paginate":{
          "first" : "&laquo;",
          "previous" : "&lsaquo;",
          "next" : "&rsaquo;",
          "last" : "&raquo;"
        },
      },

      initComplete: function(){
          this.api().columns().every( function() {
            var column = this;
            var select = $('<select class="form-control"><option value=""></option></select>')
              .appendTo( $(column.footer()).empty() )
              .on('change', function(){
                var val = $.fn.dataTable.util.escapeRegex(
                  $(this).val()
                );

                column
                  .search( val ? '^'+val+'$' : '', true, false)
                  .draw();
              });

            column.data().unique().sort().each( function(d, j){
              select.append('<option value="'+d+'">'+d+'</option>')
            });
          });
        }
    });
  });
</script>
</body>
</html>
