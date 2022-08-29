<?php include_once('../_header.php'); ?>

    <div class="box">
    <h3>Pasien</h3>
        <h4>
            <small>Tambah Data Pasien</small>
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
                        <label for="identitas">Nomor Identitas</label>
                        <input type="number" id="identitas" name="identitas" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Pasien</label>
                        <input type="text" id="nama" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <div>
                            <label for="" class="radio-inline">
                                <input type="radio" name="jk" id="jk" value="L" required> Laki - Laki
                            </label>
                            <label for="" class="radio-inline">
                                <input type="radio" name="jk" id="jk" value="P" required> Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="telp">No. Telepon</label>
                        <input type="number" name="telp"  id="telp" class="form-control" required >
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

