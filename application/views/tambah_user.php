<!DOCTYPE html>
<html>
<head>
	<title>Tambah User</title>
</head>
<body>
<pre>
<form action="<?php echo base_url()?>latihan1/add" method="POST">
	Username	: <input type="text" name="username">
	Password	: <input type="text" name="password">
	Nama Lengkap: <input type="text" name="nama">
					<input type="submit" value="Simpan">
</form>
</pre>
</body>
</html>