<?php
require_once "../_config/config.php";
//cek apakah ada id yang di kirimkan
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql_obat = mysqli_query($con, "SELECT * FROM tb_obat WHERE id_obat = '$id'") or die (mysqli_error($con));

    //cek apakah ada data didatabase berdasarkan id yang dikirim
    if(mysqli_num_rows($sql_obat) > 0) {
        $data = mysqli_fetch_array($sql_obat);
    } else {
        echo "<script>window.location='data.php';</script>";
    }
} else {
    echo "<script>window.location='data.php';</script>";
}

include_once('../_header.php'); 
?>

    <div class="box">
    <h3>Obat</h3>
        <h4>
            <small>Edit Data Obat</small>
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
                        <input type="hidden" name="id" value="<?=$data['id_obat'];?>">
                        <label for="nama">Nama Obat</label>
                        <input type="text" name="nama" class="form-control" required autofocus value="<?= $data['nama_obat'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="ket">Keterangan Obat</label>
                        <textarea name="ket" id="ket" class="form-control" required><?= $data['ket_obat'] ?></textarea>
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

