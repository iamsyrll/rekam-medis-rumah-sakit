<?php include_once('../_header.php'); 
    //cek apakah ada id yang di kirimkan
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql_pasien = mysqli_query($con, "SELECT * FROM tb_pasien WHERE id_pasien = '$id'") or die (mysqli_error($con));

        //cek apakah ada data didatabase berdasarkan id yang dikirim
        if(mysqli_num_rows($sql_pasien) > 0) {
            $data = mysqli_fetch_array($sql_pasien);
        } else {
            echo "<script>window.location='data.php';</script>";
        }
    } else {
        echo "<script>window.location='data.php';</script>";
    }
?>
    <div class="box">
    <h3>Pasien</h3>
        <h4>
            <small>Edit Data Pasien</small>
            <!-- Mulai Tombol kembali -->
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"> <i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            <!-- Akhir Tombol kembali -->
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
            <!-- Mulai Form -->
                <form method="post" action="proses.php" >
                    <input type="hidden" name="id" id="id" value="<?= $data['id_pasien']?>">
                    <div class="form-group">
                        <label for="identitas">Nomor Identitas</label>
                        <input type="number" id="identitas" name="identitas" class="form-control" required autofocus value="<?= $data['nomor_identitas']?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Pasien</label>
                        <input type="text" id="nama" name="nama" class="form-control" required value="<?= $data['nama_pasien']?>">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <div>
                            <label for="" class="radio-inline">
                                <input type="radio" name="jk" id="jk" value="L" required <?= $data['jenis_kelamin'] == "L" ? "checked" : null; ?>> Laki - Laki
                            </label>
                            <label for="" class="radio-inline">
                                <input type="radio" name="jk" id="jk" value="P" required <?= $data['jenis_kelamin'] == "P" ? "checked" : null; ?>> Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" required><?= $data['alamat']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="telp">No. Telepon</label>
                        <input type="number" name="telp"  id="telp" class="form-control" required value="<?= $data['no_telp']?>" >
                    </div>
                    <div class="form-group">
                        <input type="submit" name="edit" value="Simpan" class="btn btn-success pull-right">
                    </div>
                </form>
            <!-- Akhir Form -->
            </div>
        </div>
    </div>

<?php include_once('../_footer.php'); ?>

