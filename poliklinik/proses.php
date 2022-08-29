<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
// use Ramsey\UUid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    //menangkap jumlah data
    $total = $_POST['total'];
    // melakukan looping sebanyak data yang di kirimkan dan melakukan insert ke dalam database
    for ($i=1; $i <= $total; $i++) { 
        // membuat id dengan library uuid
        $uuid = Uuid::uuid4()->toString();
        
        $nama = trim(mysqli_real_escape_string($con, $_POST['nama-'.$i]));
        $gedung = trim(mysqli_real_escape_string($con, $_POST['gedung-'.$i]));

        $sql = mysqli_query($con, "INSERT INTO tb_poli (id_poli, nama_poli, gedung) VALUES ('$uuid', '$nama', '$gedung')") or die (mysqli_error($con));
    }

    if ($sql) {
        echo "
        <script>
            alert('".$total." data berhasil di tambahkan');
            window.location='data.php';
        </script>";
    }else {
        echo "
        <script>
            alert('".$total." data gagal di tambahkan');
            window.location='generate.php';
        </script>";
    }

    // echo "<script>window.location='data.php';</script>";

} else if (isset($_POST['edit'])) {
    //looping data 
    for ($i=0; $i < count($_POST['id']); $i++) { 
        $id = $_POST['id'][$i];
        $nama = trim(mysqli_real_escape_string($con, $_POST['nama'][$i]));
        $gedung = trim(mysqli_real_escape_string($con, $_POST['gedung'][$i]));

        $sql = mysqli_query($con, "UPDATE tb_poli SET nama_poli = '$nama', gedung = '$gedung' WHERE id_poli = '$id' ") or die (mysqli_error($con));
    }
    if ($sql) {
        echo "
        <script>
            alert('".$total." data berhasil diupdate');
            window.location='data.php';
        </script>";
    }else {
        echo "
        <script>
            alert('".$total." data gagal diupdate');
            window.location='data.php';
        </script>";
    }
}

?>