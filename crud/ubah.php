<?php include "koneksi.php"; ?>
<?php

	$id = $_GET['id'];
	$sql = $koneksi -> query("select * from produk where id='$id'");
	$tampil = $sql->fetch_assoc();
?>
<!DOCTYPE html>
<head>
	<title>Ubah</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
	<form method="POST">

	<div class="form-group">
      <label>Nama Produk :</label>
      <input name="nama" type="text" value="<?php echo $tampil['nama_produk']; ?>" class="form-control">
    </div>

	<div class="form-group">
      <label>Keterangan :</label>
      <input name="keterangan" type="number" value="<?php echo $tampil['keterangan']; ?>" class="form-control">
    </div>

	<div class="form-group">
      <label>Harga :</label>
      <input name="harga" type="number" value="<?php echo $tampil['harga']; ?>"class="form-control">
    </div> 

	<button type="submit" value="simpan" name="simpan" class="btn btn-primary"> Ubah </button>

	</form>
</div>

<?php 
if (isset($_POST ["simpan"])) {

$nama = $_POST['nama'];
$keterangan = $_POST['keterangan'];
$harga = $_POST['harga'];

$ubah = $koneksi->query("update produk set nama_produk = '$nama', keterangan = '$keterangan', harga = '$harga' where id='$id' ");

if ($ubah) {
?>
<script type="text/javascript">
	alert("Ubah Data Berhasil");
	window.location.href="index.php"
</script>

<?php

}
}

?>

</body>