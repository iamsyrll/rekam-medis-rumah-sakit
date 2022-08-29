<?php include_once('../_header.php'); ?>

    <div class="box">
    <h3>Pasien</h3>
        <h4>
            <small>Import Data Pasien</small>
            <!-- Mulai Tombol kembali -->
            <div class="pull-right">
                <a href="../_file/format/pasien.xlsx" class="btn btn-default btn-xs"> <i class="glyphicon glyphicon-download-alt"></i> Download Format Excel</a>
                <a href="data.php" class="btn btn-warning btn-xs"> <i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            <!-- Akhir Tombol kembali -->
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
            <!-- Mulai Form -->
                <form method="post" action="proses.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="file">File Excel</label>
                        <input type="file" id="file" name="file" class="form-control" required>
                    </div>
                    
                    <div class="form-group pull-right">
                        <input type="submit" name="import" value="Import" class="btn btn-success ">
                    </div>
                </form>
            <!-- Akhir Form -->
            </div>
        </div>
    </div>

<?php include_once('../_footer.php'); ?>

