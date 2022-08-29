<?php include_once('../_header.php'); ?>

    <div class="box">
        <h3>Obat</h3>
        <h4>
            <small>Data Obat</small>
            <!-- Mulai Tombol refresh dan tambah data -->
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"> <i class="glyphicon glyphicon-refresh"></i></a>
                <a href="add.php" class="btn btn-success btn-xs"> <i class="glyphicon glyphicon-plus"></i> Tambah Obat</a>
            </div>
            <!-- Akhir Tombol refresh dan tambah data -->
        </h4>

        <!-- Mulai Pencarian -->
        <div style="margin-bottom: 20px;">
            <form action="" method="post" class="form-inline">
                <div class="form-group">
                    <input type="text" name="pencarian" class="form-control" placeholder="Pencarian Data..." autofocus>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </div>
            </form>
        </div>
        <!-- Akhir Pencarian -->

        <div class="table-responsive">
            <!-- Mulai Table -->
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Obat</th>
                        <th>Keterangan</th>
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Mulai PHP (Ambil data) -->

                    <?php 
                    // inisialisasi batas
                    $batas = 5;
                    //mengambil nilai halaman dari tombol pagination menggunakan method get
                    isset($_GET['hal']) ? $hal = $_GET['hal'] : null;
                    

                    //cek isi variabel hal, dimana isi variabel halaman adalah null, jika variabel hal berisi null, maka hal di isi 1 dan posisi di isi 0
                    if(empty($hal)) {
                        $posisi = 0;
                        $hal = 1;
                    } else {
                        // jika tombol pagination di klik, maka nilai hal akan berubah sesuai dengan nomor pagination, posisi data yang akan di tampilkan di halaman kedua akan di ubah (jika batas data yang di tampilkan 5 di setiap hal, maka data pada hal kedua posisinya akan di mulai dari index ke 5 (data ke 6 dalam array) )
                        $posisi = ($hal - 1) * $batas;
                    }
                    
                    $no = 1;

                    //cek jika ada request dengan method post
                    if($_SERVER['REQUEST_METHOD'] == "POST") {
                        //tangkap nilai dari post dari inputan name pencarian
                        $pencarian = trim(mysqli_real_escape_string($con, $_POST['pencarian']));

                        //jika isi pencarian tidak kosong, maka data hasil pencarian akan di ambil
                        if ($pencarian != '') {
                            $sql = "SELECT * FROM tb_obat WHERE nama_obat LIKE '%$pencarian'";
                            $query = $sql;
                            $queryJml = $sql;
                        } else {
                            // jika tidak ada pencarian yang di lakukan, maka tampilkan semua data dengan batas jumlah yang telah di tentukan
                            $query = "SELECT * FROM tb_obat LIMIT $posisi, $batas";
                            $queryJml = "SELECT * FROM tb_obat";
                            $no = $posisi + 1;
                        }
                    } else {
                        // jika tidak ada pencarian yang di lakukan, maka tampilkan semua data dengan batas jumlah yang telah di tentukan
                        $query = "SELECT * FROM tb_obat LIMIT $posisi, $batas";
                        $queryJml = "SELECT * FROM tb_obat";
                        $no = $posisi + 1;
                    }

                    //menjalankan query
                    $sql_obat = mysqli_query($con, $query) or die (mysqli_error($con));
                    // cek jika hasil num rows dari query yang di simpan di variabel sql_obat
                    if( mysqli_num_rows($sql_obat) > 0)  {
                        // jika hasil num_rows dari sql_obet lebih dari 0, maka data tersedia di dalam database
                        //fungsi while di bawah digunakan untuk looping kemudian fungsi fetch digunakan untuk mengekstrak data dan menyimpan ke variabel "data" untuk di tampilkan
                        while($data = mysqli_fetch_array($sql_obat)) { ?>
                            
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['nama_obat']; ?></td>
                                <td><?= $data['ket_obat']; ?></td>
                                <td class="text-center">
                                    <a href="edit.php?id=<?= $data['id_obat'];?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="del.php?id=<?= $data['id_obat'];?>" class="btn btn-danger btn-xs"><i onclick="return confirm('Yakin akan menghapus data ?')" class="glyphicon glyphicon-trash"></i></a>
                                </td>
                            </tr>

                        <?php
                        }

                    } else { // jika hasil num rows kurang atau sama dengan 0 maka data tidak ada di dalam database?>

                        <tr><td colspan="4" align="center">Data tidak ditemukan</td></tr>
                        <?php

                    }
                    ?>

                    <!-- Akhir PHP (Ambil data) -->
                </tbody>
            </table>
            <!-- Akhir Table -->
        </div>
        <?php 
        // jika tidak ada pencarian yang di lakukan maka ambil dan hitung jumlah data yang ada di dalam database
        if (empty($_POST['pencarian'])) { ?>
            <div style="float:left;">
                <?php
                $jml = mysqli_num_rows(mysqli_query($con, $queryJml));
                echo "Jumlah Data : <b>$jml</b>";
                ?>
            </div>
            <div style="float:right;">
                <ul class="pagination pagination-sm" style="margin:0;">
                    <?php 
                        // tampilkan jumlah halaman berdasarkan semua data yang ada di dalam database
                        $jml_hal = ceil($jml / $batas);
                        for ($i=1; $i <= $jml_hal; $i++) { 
                            if ($i != $hal) {
                                echo "<li><a href=\"?hal=$i\">$i</a></li>";
                            } else {
                                echo "<li class=\"active\"><a>$i</a></li>";
                            }
                        }
                    ?>
                </ul>
            </div>
            <?php
        } else {  // jika ada pencarian yang di lakukan, tampikan jumlah data dari hasil pencarian
            echo "<div style=\"float:left;\">";
            $jml = mysqli_num_rows(mysqli_query($con, $queryJml));
            echo "Data Hasil Pencarian : <b>$jml</b>";
            echo "</div>";
        }
        ?>
    </div>
<?php include_once('../_footer.php') ?>