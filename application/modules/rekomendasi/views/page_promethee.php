<style type="text/css">
  .azz{
    background-color: #FFD777;
  }
</style>
<!--<pre>
<?php print_r($this->session->all_userdata());?>
</pre>-->
<div class="row" id="pertanyaan">
	<div class="col-md-12">
		<div class="panel panel-default">
		  <div class="panel-heading" ><a href="<?php echo base_url()?>rekomendasi/hasil" class="btn btn-danger">Kembali</a> <a href="#" id="toRekomended" class="btn btn-info wew" title="Print hasil rekomendasi">ke Rekomendasi Fuzzy</a></div>
		  <div class="panel-body">	    
		  	<table class="table table-responsive table-hover table-striped dt_table">
				<thead>
					<tr>
						<th>Rekomendasi</th>
						<th>Kategori</th>
						<th>Nama Mesin Cuci</th>
						<th>Harga</th>
						<th></th>
						<th>Net Flow</th>
					</tr>
				</thead>
				<tbody>
				<?php $no=0;foreach($promethee as $pro){?>
					<tr>
						<td><?php echo ++$no;?></td>
						<td><?php echo $pro->nama_mesin_kategori;?></td>
						<td><?php echo $pro->nama_mesin;?></td>
						<td><?php echo "Rp ".number_format($pro->value,"0",'','.');?></td>
						<td><img width="50px" src="<?php echo base_url()?>uploads/mesin/<?php echo $pro->gambar;?>"></td>
						<td><?php echo $pro->net;?></td>
					</tr>
				<?php }?>
				</tbody>
			</table>
		  </div>
		</div>	
	</div>
</div>
<div class="row" style="display:none" id="depan">
	<div class="col-md-12">
		<div class="panel panel-default">
		  <div class="panel-heading" ><a href="<?php echo base_url()?>rekomendasi/view_pdf" class="btn btn-info wew" title="Print hasil rekomendasi"><i class="glyphicon glyphicon-print"></i> Print hasil rekomendasi</a>  <a href="#" id="dash-kembali" class="btn btn-danger">Kembali</a> </div>
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
						<td><?php echo round($data->nilai_rekomendasi,2);?></td>
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
	$('#dash-kembali').click(function(){
		$('#depan').hide();
		$('#pertanyaan').show('slow');
	});
	$('#toRekomended').click(function(){
		$('#pertanyaan').hide();
		$('#depan').show('slow');
	});
	function detail(id)
	{
		$('#depan').hide();
		$('#form-detail').show('slow');
		$.post("<?php echo base_url()?>rekomendasi/form_detail/"+id,function(data){
			$('#form-detail').html(data);
		});
	}
</script>