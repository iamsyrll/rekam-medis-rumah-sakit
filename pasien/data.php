<?php include_once('../_header.php'); ?>
    <!-- Mulai Box -->
    <div class="box">
        <h3>Pasien</h3>
        <h4>
            <small>Data Pasien</small>
            <!-- Mulai Tombol refresh dan tambah data -->
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="add.php" class="btn btn-success btn-xs"> <i class="glyphicon glyphicon-plus"></i> Tambah Pasien</a>
                <a href="import.php" class="btn btn-info btn-xs"> <i class="glyphicon glyphicon-import"></i> Import Pasien</a>
            </div>
            <!-- Akhir Tombol refresh dan tambah data -->
        </h4>
            <div class="table-responsive">
                <!-- Mulai Table -->
                <table id="dataPasien" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nomor Identitas</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th><i class="glyphicon glyphicon-cog"></i></th>
                        </tr>
                    </thead>
                </table>
            <!-- Akhir Table -->
            </div>
    </div>
    <!-- Akhir Box -->

    <script>
        $(document).ready(function() {
            $('#dataPasien').DataTable({
                "processing" : true,
                "serverSide" : true,
                "ajax"       : "pasien_data.php",
                scrollY      : '250px',
                dom          : 'Bfrtip',
                buttons      : [
                    {
                        extend     : 'pdf',
                        orientation : 'potrait',
                        pageSize    : 'Legal',
                        title       : 'Data Pasien',
                        download    : 'open'
                    },
                    'csv', 'excel', 'print', 'copy'
                ],
                "columnDefs" : [
                    {
                        "searchable" : false,
                        "orderable"  : false,
                        "targets"    : 5,
                        "render"     : function(data, type, row) {
                            let btn = "<center><a href=\"edit.php?id="+data+"\" class=\"btn btn-warning btn-xs\"><i class=\"glyphicon glyphicon-edit\"></i></a> <a href=\"del.php?id="+data+"\" onclick=\"return confirm('Yakin ingin menghapus data ?')\"; class=\"btn btn-danger btn-xs\"><i class=\"glyphicon glyphicon-trash\"></i></a></center>";

                            return btn;
                        }
                    }
                ]
            });
        });

    </script>
<?php include_once('../_footer.php') ?>