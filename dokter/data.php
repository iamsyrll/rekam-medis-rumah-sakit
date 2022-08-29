<?php include_once('../_header.php'); ?>
    <!-- Mulai Box -->
    <div class="box">
        <h3>Dokter</h3>
        <h4>
            <small>Data Dokter</small>
            <!-- Mulai Tombol refresh dan tambah data -->
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="add.php" class="btn btn-success btn-xs"> <i class="glyphicon glyphicon-plus"></i> Tambah Dokter</a>
            </div>
            <!-- Akhir Tombol refresh dan tambah data -->
        </h4>
        <form name="proses" method="post">
            <div class="table-responsive">
                <!-- Mulai Table -->
                <table id="dataDokter" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>        
                            <th>
                            <center>
                                <input type="checkbox" name="select_all" id="select_all" value="">
                            </center>
                            </th>
                            <th>No.</th>
                            <th>Nama Dokter</th>
                            <th>Spesialis</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th><i class="glyphicon glyphicon-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1; 
                        $sql_poli = mysqli_query($con, "SELECT * FROM tb_dokter" ) or die(mysqli_error($con));
                            while($data = mysqli_fetch_array($sql_poli)) {?>

                                <tr>
                                    <td align="center">
                                        <input type="checkbox" name="checked[]" class="check" value="<?= $data['id_dokter']; ?>">
                                    </td>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['nama_dokter']; ?></td>
                                    <td><?= $data['spesialis'];?></td>
                                    <td><?= $data['alamat'];?></td>
                                    <td><?= $data['no_telp'];?></td>
                                    <td class="text-center">
                                        <a href="edit.php?id=<?=$data['id_dokter']; ?>" class="btn btn-warning btn-xs" ><i class="glyphicon glyphicon-edit"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            <!-- Akhir Table -->
            </div>
        </form>
        <!-- Mulai box untuk button-->
        <div class="box pull-right">
            <button class="btn btn-danger btn-sm" onclick="hapus()"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
        </div>
        <!-- Akhir box untuk button-->
    </div>
    <!-- Akhir Box -->
    
    <script>
        $(document).ready(function() {
            //DataTables
            $('#dataDokter').DataTable({
                columnDefs : [
                    {
                        "searchable":false,
                        "orderable" : false,
                        "targets"  : [0, 6]
                    }
                ],
                "order" : [1, "asc"]
            });
            //Akhir datatables

            //ambil checkbox dengan id= select_all, berikan event click
            $('#select_all').on('click', function() {
                //jika select_all di klik, maka jalankan if
                if(this.checked) {
                    //ambil semua checkbox yang memiliki class check
                    $('.check').each(function() {
                        // looping tiap tiap element, menggunakan foreach, lalu setiap element nya di checked
                        //NOTE : this berisi tiap tiap element dengan class check
                        this.checked = true;
                    });
                } else {
                    //jika select_all tidak di klik, maka jalankan else
                    $('.check').each(function() {
                        this.checked = false;
                    });
                }
            });

            //jika element dengan class check di klik, jalankan fungsi berikut
            $('.check').on('click', function() {
                // cek jika jumlah element yang di centang sama dengan jumlah semua element dengan kelas check, maka nyalakan checkbox select_all
                if($('.check:checked').length == $('.check').length) {
                    $('#select_all').prop('checked', true);
                } else {
                    $('#select_all').prop('checked', false);
                }
            });
        });

        function hapus() {
            // konfirmasi sebelum di hapus
            let = conf = confirm('Yakin akan menghapus data ?');
            //jika conf bernilai true maka jalankan hapus
            if(conf) {
                //menambahkan action ke form proses
                document.proses.action = 'del.php';
                //mengirim data ke edit.php
                document.proses.submit();
            }
        }

    </script>
<?php include_once('../_footer.php') ?>