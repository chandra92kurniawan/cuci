
	<div class="col-md-12">
		<div class="panel panel-default">
		  <div class="panel-heading" ><button class="btn btn-danger back" > <i class="glyphicon glyphicon-menu-left"></i> Detail Mesin Cuci</button>  </div>
		  <div class="panel-body">
		  	<table class="table table-striped">
		  		<tr>
		  			<th style="width:200px" rowspan="13">
		  				<center>
		  					<img width="150px" src="<?php echo base_url()?>uploads/mesin/<?php echo $value->gambar;?>"><br><br>
		  					<button onclick="edit('<?php echo $id_mesin;?>')" data-toggle="modal" data-target="#myModalEdit" class="btn btn-warning col-md-12 ubah">Edit Data</button><br><br><br>
		  					<button onclick="nilai('<?php echo $id_mesin;?>')" class="btn btn-warning col-md-12" data-toggle="modal" data-target=".bs-example-modal-lg">Nilai Derajat Keanggotaan</button>
		  				</center>
		  			</th>
		  			<th colspan="2">Data Spesifikasi Mesin Cuci</th>
		  		</tr>
		  		<tr>
		  			<td>Kategori</td>
		  			<td>: <?php echo $value->nama_mesin_kategori;?></td>
		  		</tr>
		  		<tr>
		  			<td>Nama</td>
		  			<td>: <?php echo $value->nama_mesin;?></td>
		  		</tr>
		  		<tr>
		  			<td>Jenis Tabung</td>
		  			<td>: <?php echo $value->jenis_tabung." tabung";?></td>
		  		</tr>
		  		<tr>
		  			<td>Fitur Lainya</td>
		  			<td>: <?php echo $value->fitur_lainya;?></td>
		  		</tr>
		  		<?php foreach($parameter as $param){?>
		  		<tr>
		  			<td><?php echo $param->nama_parameter." (".$param->satuan.")";?></td>
		  			<td>: <?php echo $param->value;?></td>
		  		</tr>
		  		<?php }?>		  		
		  		<tr>
		  			<td></td>
		  			<td colspan="2"><button class="btn btn-danger back">Kembali</button> </td>
		  		</tr>
		  	</table>		
		  </div>
		</div>		
	</div>
<script>
$('.back').click(function(){
		$('#form-detail').hide();
		$('#form-edit').hide();
		$('#depan').show('slow');
	});
	function nilai(id)
	{
		$.post("<?php echo base_url()?>mesin_cuci/form_nilai/"+id,function(data){
			$('.bs-example-modal-lg').html(data);
		});
	}
</script>