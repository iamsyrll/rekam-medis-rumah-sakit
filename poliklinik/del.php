<?php 
require_once "../_config/config.php";
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
   foreach ($chk as $id) {
       $sql = mysqli_query($con, "DELETE FROM tb_poli WHERE id_poli = '$id'") or die(mysqli_error($con));
   }
   if ($sql) {
    echo "
    <script>
        alert('".count($chk)." data berhasil dihapus');
        window.location='data.php';
    </script>";
    }else {
        echo "
        <script>
            alert('".count($chk)." data gagal dihapus');
            window.location='data.php';
        </script>";
    }
}
?>