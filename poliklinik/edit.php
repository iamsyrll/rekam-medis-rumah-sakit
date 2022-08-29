<?php 
// membuat variabel untuk check
$chk = isset($_POST['checked']) ? $_POST['checked'] : null;
//check apakah ada data yang di kirimkan ke halaman ini
if (!isset($chk)) {
    echo "
    <script>
    alert('Tidak ada data yang dipilih');
    window.location='data.php'
    </script>";
} else {
include_once('../_header.php');
?>

    <div class="box">
        <h3>Poliklinik</h3>
        <h4>
            <small>Edit Data Poliklinik</small>
            <!-- Mulai Tombol refresh dan tambah data -->
            <div class="pull-right">
            <a href="data.php" class="btn btn-warning btn-xs"> <i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
            <!-- Akhir Tombol refresh dan tambah data -->
        </h4>

        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <form action="proses.php" method="post">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Nama Poliklinik</th>
                            <th>Gedung</th>
                        </tr>
                        <?php 
                        $no = 1;
                        foreach ($chk as $id) {
                            $sql_poli = mysqli_query($con, "SELECT * FROM tb_poli WHERE id_poli = '$id'") or die(mysqli_error($con));
                            
                            $data = mysqli_fetch_array($sql_poli);
                            ?>
                            <tr>
                                <td><?= $no++;?></td>
                                <td>
                                    <!-- guna [] pada name adalah untuk menyipan sebagai array ketika di kirim menggunkan post -->
                                    <input type="hidden" name="id[]" value="<?= $data['id_poli']; ?>">
                                    <input type="text" name="nama[]" value="<?= $data['nama_poli'];?>" class="form-control" required>
                                </td>
                                <td>
                                    <input type="text" name="gedung[]" value="<?= $data['gedung'];?>" class="form-control" required>
                                </td>
                            </tr>
                        <?php 
                        } ?>
                    </table>
                    <div class="from-group pull-right">
                        <input type="submit" name="edit" value="Simpan Semua" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php 
include_once('../_footer.php'); 
} ?>