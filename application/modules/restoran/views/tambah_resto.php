<html>
<head>
<title>Form Tambah Data Restoran</title>
<base href="<?php echo base_url(); ?>" />
</head>
<body>
<h3>Tambah Data Restoran</h3>


<?php echo form_open_multipart('restoran/tambah_data');?>
<table>
<tr>
    <td> Nama Restoran </td>
    <td> <?php echo form_input('nama_restoran'); //input nama ?> </td>
</tr>
<tr>
    <td> Alamat Restoran </td>
    <td> <?php echo form_input('alamat_restoran'); //input harga ?> </td>
</tr>
<tr>
    <td> Telepon Restoran </td>
    <td> <?php echo form_input('telp_restoran'); //input jumlah ?> </td>
</tr>
<tr>
    <td> Foto Restoran </td>
    <td><input type="file" name="foto_restoran" size="20" />
	</td>
</tr>
<tr>
    <td> Jenis Masakan </td>
    <td> <?php echo form_input('jenis_masakan'); //input jumlah ?> </td>
</tr>
<tr>
    <td> Latitude </td>
    <td> <?php echo form_input('latitude'); //input jumlah ?> </td>
</tr>
<tr>
    <td> Longitude </td>
    <td> <?php echo form_input('longitude'); //input jumlah ?> </td>
</tr>
<tr>
    <td> Rating </td>
    <td> <?php echo form_input('rating'); //input jumlah ?> </td>
</tr>
<tr>
    <td> </td>
    <td> <input type="submit" value="upload" /> </td>
</tr>
</table>

</form>
</body>
</html>
