<?PHP error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>
<!DOCTYPE html>
<?php 
include "koneksi.php"; 
?>
<head>
	<title>CRUD</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
<div class="container">
<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover">
	<thead>
	<tr>
		<th>Nama Produk</th>
		<th>Keterangan</th>
		<th>Harga</th>	
		<th>Jumlah</th>
		<th>Aksi</th>				
	</tr>
	</thead>
	<tbody>

	<?php
	$sql = $koneksi -> query("select * from produk");
	while ($data = $sql -> fetch_assoc()) {
	?>

	<?php
	$harga = $data['harga'];
	$jumlah = $data['keterangan'] * $harga
	?>

	<tr>
		<td><?php echo $data['nama_produk']; ?></td>
		<td><?php echo $data ['keterangan']; ?></td>
		<td><?php echo "Rp." .number_format($harga ).",-";?></td>
		<td><?php echo "Rp." .number_format($jumlah ).",-";?></td>
		<td>
            <a href="ubah.php?id=<?php echo $data['id']; ?>" class="btn btn-success"> Ubah</a>
            <a href="hapus.php?id=<?php echo $data['id']; ?>" class="btn btn-danger"> Hapus</a>
        </td>

	<?php
	$total = $total+$jumlah;
	}
	?>

	</tr>
	</tbody>
		<tr>
         <th colspan="3" style="font-size: 20px; text-align: center;">Total Kas Masuk</th>
        <th align="right" style="font-size: 17px; text-align: right;"> <?php echo"Rp." .number_format($total ).",-";?></th>
    	</tr>

	</table>
</div>
<a href="tambah.php" class="btn btn-primary"> Tambah </a>
</div>
</body>
