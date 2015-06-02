<?php echo $this->session->flashdata('msg').""; ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form id="form-add" class="form-horizontal" action="<?php echo base_url()?>pengaturan/user/add" method="POST">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
      </div>
      <div class="modal-body">
         <div class="form-group">
		    <label class="col-sm-2 control-label">Username</label>
		    <div class="col-sm-10">
		      <input type="text" name="username" id="username" class="form-control">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label">Nama Lengkap</label>
		    <div class="col-sm-10">
		      <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label">Password</label>
		    <div class="col-sm-10">
		      <input type="password" name="password1" id="password1" class="form-control">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label">Ulangi Password</label>
		    <div class="col-sm-10">
		      <input type="password" name="password2" id="password2" class="form-control">
		    </div>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
    </div>
  </div>
  </form>
</div>
<script type="text/javascript">
	$('#form-add').submit(function(){
		var user=$('#username').val();
		var pass1=$('#password1').val();
		var pass2=$('#password2').val();
		var status=0;
		$.post('<?php echo base_url()?>pengaturan/user/cekUsername/'+user,function(data){
			status=data;
			
		});
		console.log(status);
		if(status==0){
			if(pass1==pass2){
				return true;
			}else{
				alert('password tidak sama, cek kembali password');
				return false;
			}
		}else{
			alert('Username sudah ada, harap ganti dengan user yang lain');
			return false;
		}
	});
	function ale(status)
	{
		var str;
		if(status==1){
			str="Apakah anda akan menonaktifkan user ini?";
		}else{
			str="Apakah anda akan mengaktifkan user ini?";
		}
		var r = confirm(str);
		if (r == true) {
	        return true;
	    } else {
	       return false;
	    }
	}
</script>
<div class="row" id="depan">
	<div class="col-md-12">
		<div class="panel panel-default">
		  <div class="panel-heading" ><button  data-placement="bottom" class="btn btn-info wew" title="Tambah Data Kategori" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> Tambah User</button>  </div>
		  <div class="panel-body">
		    <table class="table table-responsive table-hover table-striped dt_table">
				<thead>
					<tr>
						<th>No</th>
						<th>Username</th>
						<th>Nama Lengkap</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=0;foreach($value as $v){?>
					<tr>
						<td><?php echo ++$no;?></td>
						<td><?php echo $v->username;?></td>
						<td><?php echo $v->nama_lengkap;?></td>
						<td><?php if($v->status==1){?>
						<a href="<?php echo base_url()?>pengaturan/user/setStatus/<?php echo $v->status;?>/<?php echo $v->username;?>" onclick="ale('<?php echo $v->status;?>')" class="btn btn-xs btn-info">Aktif</a>
						<?php }else{?>
						<a href="<?php echo base_url()?>pengaturan/user/setStatus/<?php echo $v->status;?>/<?php echo $v->username;?>" onclick="ale('<?php echo $v->status;?>')" class="btn btn-xs btn-warning">tidak aktif</a>
						<?php }?>	</td>
					</tr>
					<?php }?>
				</tbody>
			</table><br><br>

			
		  </div>
		</div>
		
		
	</div>
</div>