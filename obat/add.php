<?php include_once('../_header.php'); ?>

    <div class="box">
    <h3>Obat</h3>
        <h4>
            <small>Tambah Data Obat</small>
            <!-- Mulai Tombol kembali -->
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"> <i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            <!-- Akhir Tombol kembali -->
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
            <!-- Mulai Form -->
                <form method="post" action="proses.php" >
                    <div class="form-group">
                        <label for="nama">Nama Obat</label>
                        <input type="text" name="nama" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="ket">Keterangan Obat</label>
                        <textarea name="ket" id="ket" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="add" value="Simpan" class="btn btn-success pull-right">
                    </div>
                </form>
            <!-- Akhir Form -->
            </div>
        </div>
    </div>

<?php include_once('../_footer.php'); ?>

