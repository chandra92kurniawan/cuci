<style type="text/css">
	.ass{
		background-color: #FFD777;
	}
	th{
		text-align: center;
	}
	.cen{
		text-align: center;
	}
</style>
<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" action="<?php echo base_url()?>rekomendasi/rekomended" method="POST">
			 <div class="form-group">
			    <label class="col-sm-2 control-label">Nama lengkap</label>
			    <div class="col-sm-3">
			      <input type="text" name="nama_lengkap" required class="form-control" placeholder="Nama Lengkap">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Alamat</label>
			    <div class="col-sm-3">
			      <textarea name="alamat" class="form-control" placeholder="Alamat" required></textarea>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Usia</label>
			    <div class="col-sm-3">
			      <input type="text" name="usia" placeholder="Usia" required class="form-control">
			    </div>
			  </div>
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr class="ass">
					<th rowspan="2"><center><h3>Variable</h3></center> </th>
					<th colspan="3"><center> <h3>Kriteria</h3></center></th>
				</tr>
				<tr class="ass">
					<th>Kecil</th>
					<th>Sedang</th>
					<th>Tinggi</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($parameter as $param){?>
				<tr>
					<td><?php echo $param->nama_parameter;?></td>
					<td><center><input type="radio" value="1" name="option_<?php echo $param->id_parameter;?>"></center></td>
					<td><center><input type="radio" value="2" name="option_<?php echo $param->id_parameter;?>"></center></td>
					<td><center><input type="radio" value="3" name="option_<?php echo $param->id_parameter;?>"></center></td>
				</tr>
			<?php }?>
			
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" class="cen">
						<input type="submit" value="Lihat" class="btn btn-success"> <input type="reset" value="Reset" class="btn btn-default">
					</td>
				</tr>
			</tfoot>
		</table>
		</form>
	</div>
</div>
