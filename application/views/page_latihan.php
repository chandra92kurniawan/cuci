
<!DOCTYPE html>
<html>
<head>
	<title>Latihan CRUD</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>bootstrap/css/bootstrap.min.css">
</head>
<body>
	<?php echo $this->session->flashdata('msg');?>
	<div class="row" id="list">
		<div class="col-md-12">
			<a href="#" id="add">Tambah Data</a>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th colspan="3"><center>Data user</center></th>
					</tr>
					<tr>
						<th>Username</th>
						<th>Nama lengkap</th>
						<th style="width:150px">Aksi</th>
					</tr>
				</thead>
				<?php foreach ($tampil as $tmp){?>
					<tr>
						<td><?php echo $tmp->username;?></td>
						<td><?php echo $tmp->nama_lengkap;?></td>
						<td>
							<a href="#" class="btn btn-xs btn-warning" onclick="edit('<?php echo $tmp->username;?>',
																			  '<?php echo $tmp->password;?>',
																			  '<?php echo $tmp->nama_lengkap;?>')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
							<a href="<?php echo base_url()?>latihan1/hapus/<?php echo $tmp->username;?>" onclick="if ( !confirm('Apakah anda akan menghapus user <?php echo $tmp->username ?> ini ?')) return false;" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
						</td>
					</tr>
				<?php } ?>	
			</table>		
		</div>
	</div>	
	<div class="row" id="form" style="display:none">
		<div class="col-md-6"><br><br>
			<form id="frm" class="form-horizontal" action="<?php echo base_url()?>latihan1/add" method="POST">
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
				    <div class="col-sm-10">
				      <input type="text" id="username" name="username" class="form-control" placeholder="Username">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
				    <div class="col-sm-10">
				      <input type="password" id="password" name="password" class="form-control" placeholder="Password">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Nama Lengkap</label>
				    <div class="col-sm-10">
				      <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Lengkap">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label"></label>
				    <div class="col-sm-10">
				      <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button> <button type="button" id="back" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Batal</button>
				    </div>
				  </div>
			</form>
		</div>
	</div>
</body>
<script type="text/javascript" src="<?php echo base_url()?>bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$('#add').click(function(){
		$('#list').hide();
		$('#form').fadeIn('slow');
		$('#username').val('');
		$('#password').val('');
		$('#nama').val('');
		$('#username').removeAttr("readonly");
		$('#frm').attr('action','<?php echo base_url()?>latihan1/add');
	});
	function edit(user,pass,nama)
	{
		$('#username').val(user);
		$('#password').val(pass);
		$('#nama').val(nama);
		$('#list').hide();
		$('#form').fadeIn('slow');
		$('#username').attr('readonly','');
		$('#frm').attr('action','<?php echo base_url()?>latihan1/edit');
	}
	$('#back').click(function(){
		$('#form').hide();
		$('#list').fadeIn('slow');

	});
</script>
</html>