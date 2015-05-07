<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Restoran</title>
</head>
<body>
<pre>
	<form action="<?php echo base_url()?>restoran/update" method="POST">
	<input type="hidden" name="id_restoran" value="<?php echo $list->id_restoran;?>">
	Nama Restoran		: <input type="text" name="nama_restoran" value="<?php echo $list->nama_restoran;?>">
	Alamat Restoran		: <input type="text" name="alamat_restoran" value="<?php echo $list->alamat_restoran;?>">
	Telepon Restoran	: <input type="text" name="telp_restoran" value="<?php echo $list->telp_restoran;?>">
	Foto Restoran		: <input type="text" name="foto_restoran" value="<?php echo $list->foto_restoran;?>">
	Jenis Masakan		: <input type="text" name="jenis_masakan" value="<?php echo $list->jenis_masakan;?>">
	Latitude		: <input type="text" name="latitude" value="<?php echo $list->latitude;?>">
	Longitude		: <input type="text" name="longitude" value="<?php echo $list->longitude;?>">
	Rating			: <input type="text" name="rating" value="<?php echo $list->rating;?>">
				<input type="submit" value="Ubah">
	</form>
</pre>
</body>
</html>