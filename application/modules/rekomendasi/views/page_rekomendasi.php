<style type="text/css">
  .azz{
    background-color: #FFD777;
  }
</style>
<div class="row" id="depan">
	<div class="col-md-12">
		<div class="panel panel-default">
		  <div class="panel-heading" ><button  data-placement="bottom" class="btn btn-info wew" title="Print hasil rekomendasi" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-print"></i> Print hasil rekomendasi</button>  </div>
		  <div class="panel-body">
		    <table class="table table-responsive table-hover table-striped dt_table">
				<thead>
					<tr>
						<th>No</th>
						<th>Kategori</th>
						<th>Nama Mesin Cuci</th>
						<th>Jenis Tabung</th>
						<th>Harga</th>
						<th></th>
						<th>Nilai Rekomendasi</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php $no=0;foreach($rekomen as $data){?>
					<tr>
						<td><?php echo ++$no;?></td>
						<td><?php echo $data->nama_mesin_kategori;?></td>
						<td><?php echo $data->nama_mesin;?></td>
						<td><?php echo $data->jenis_tabung." tabung";?></td>
						<td><?php echo "Rp ".number_format($data->value,"0",'','.');?></td>
						<td><img width="50px" src="<?php echo base_url()?>uploads/mesin/<?php echo $data->gambar;?>"></td>
						<td><?php echo $data->nilai_rekomendasi;?></td>
						<td><button id="detail" onclick="detail('<?php echo $data->id_mesin;?>')" class="btn btn-xs btn-success pull-right wew" title="Detail Kategori"><i class="glyphicon glyphicon-zoom-in"></i> Detail</button></td>
					</tr>
				<?php } ?>
					
				</tbody>
			</table><br><br>

			
		  </div>
		</div>
		
		
	</div>
</div>
<div class="row" id="form-detail" style="display:none">
	
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  
</div>
<script>
	function detail(id)
	{
		$('#depan').hide();
		$('#form-detail').show('slow');
		$.post("<?php echo base_url()?>rekomendasi/form_detail/"+id,function(data){
			$('#form-detail').html(data);
		});
	}
</script>