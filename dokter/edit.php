<?php 
require_once "../_config/config.php";
//cek apakah ada id yang di kirimkan
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql_obat = mysqli_query($con, "SELECT * FROM tb_dokter WHERE id_dokter = '$id'") or die (mysqli_error($con));

    //cek apakah ada data didatabase berdasarkan id yang dikirim
    if(mysqli_num_rows($sql_obat) > 0) {
        $data = mysqli_fetch_array($sql_obat);
    } else {
        echo "<script>window.location='data.php';</script>";
    }
} else {
    echo "<script>window.location='data.php';</script>";
}

include_once('../_header.php'); ?>

    <div class="box">
    <h3>Dokter</h3>
        <h4>
            <small>Edit Data Dokter</small>
            <!-- Mulai Tombol kembali -->
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"> <i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            <!-- Akhir Tombol kembali -->
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
            <!-- Mulai Form -->
                <form method="post" action="proses.php" >
                    <input type="hidden" name="id" value="<?= $data['id_dokter']?>">
                    <div class="form-group">
                        <label for="nama">Nama Dokter</label>
                        <input type="text" value="<?= $data['nama_dokter']?>" name="nama" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="spesialis">Spesialis</label>
                        <input type="text" value="<?= $data['spesialis']?>" name="spesialis"  id="spesialis" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" required><?= $data['alamat']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="telp">No. Telepon</label>
                        <input type="number" name="telp"  id="telp" value="<?= $data['no_telp']?>" class="form-control" required>
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

