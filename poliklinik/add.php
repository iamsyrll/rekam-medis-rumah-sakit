<?php 
// cek apakah ada data count_add yang dikirimkan 
if (isset($_POST['count_add']) && $_POST['count_add']  != 0) {
    $total = $_POST['count_add'];
} else {
    echo "<script>window.location='generate.php';</script>";
}
include_once('../_header.php');
?>

    <div class="box">
        <h3>Poliklinik</h3>
        <h4>
            <small>Tambah Data Poliklinik</small>
            <!-- Mulai Tombol refresh dan tambah data -->
            <div class="pull-right">
                <a href="data.php" class="btn btn-info btn-xs"> Data</a>
                <a href="generate.php" class="btn btn-info btn-xs"> Tambah Data Lagi</a>
            </div>
            <!-- Akhir Tombol refresh dan tambah data -->
        </h4>

        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <form action="proses.php" method="post">
                    <input type="hidden" name="total" value="<?= $total; ?>">

                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Nama Poliklinik</th>
                            <th>Gedung</th>
                        </tr>
                        <?php 
                        $total = $_POST['count_add'] ? $_POST['count_add'] : null;
                        for ($i=1; $i <= $total ; $i++) { ?>
                            <tr>
                                <td><?= $i;?></td>
                                <td>
                                    <input type="text" name="nama-<?=$i;?>" id="nama-<?=$i;?>" class="form-control" required>
                                </td>
                                <td>
                                    <input type="text" name="gedung-<?=$i;?>" id="gedung-<?=$i;?>" class="form-control" required>
                                </td>
                            </tr>
                        <?php    
                        }
                        ?>
                    </table>
                    <div class="from-group pull-right">
                        <input type="submit" name="add" value="Simpan Semua" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include_once('../_footer.php'); ?>