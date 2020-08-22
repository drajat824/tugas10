<?php 
include 'koneksi.php';

$id = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM produk WHERE id = '$id' ");
 
if($hapus) {
	?>
    <script type="text/javascript">
        alert("Data Berhasil Dihapus");
        window.location.href = "index.php";
    </script>
    <?php		
}

?>