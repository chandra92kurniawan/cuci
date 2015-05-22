<?php echo $this->session->flashdata('msg');?>
<div class="row" id="depan">
	<div class="col-md-12">
		<div class="panel panel-default">
		  <div class="panel-heading" ><button  data-placement="bottom" class="btn btn-info wew" title="Tambah Data Kategori" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> Tambah Mesin Cuci</button>  </div>
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
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php $no=0;foreach($value as $data){?>
					<tr>
						<td><?php echo ++$no;?></td>
						<td><?php echo $data->nama_mesin_kategori;?></td>
						<td><?php echo $data->nama_mesin;?></td>
						<td><?php echo $data->jenis_tabung." tabung";?></td>
						<td><?php echo "Rp ".number_format($data->value,"0",'','.');?></td>
						<td><img width="50px" src="<?php echo base_url()?>uploads/mesin/<?php echo $data->gambar;?>"></td>
						<td><button onclick="hapus('<?php echo $data->id_mesin;?>')" class="btn btn-xs btn-danger wew pull-right" data-toggle="modal" data-target="#bs-example-modal-sm" title="Hapus Data Mesin"><i class="glyphicon glyphicon-trash"></i></button><button onclick="edit('<?php echo $data->id_mesin;?>')" class="btn btn-xs btn-warning pull-right wew ubah" data-toggle="modal" data-target="#myModalEdit" title="Ubah Data Mesin Cuci"><i class='glyphicon glyphicon-pencil'></i></button> <button id="detail" onclick="detail('<?php echo $data->id_mesin;?>')" class="btn btn-xs btn-success pull-right wew" title="Detail Mesin Cuci"><i class="glyphicon glyphicon-zoom-in"></i></button></td>
					</tr>
				<?php } ?>
					<!--<tr>
						<td><?php echo $a;?></td>
						<td>aasdcasdcasdc</td>
						<td>aasdcasdcasdc</td>
						<td>aasdcasdcasdc</td>
						<td>aasdcasdcasdc</td>
						<td><img width="50px" src="<?php echo base_url()?>uploads/mesin/laundry7.jpg"> </td>
						<td><button class="btn btn-xs btn-danger wew pull-right" data-toggle="modal" data-target="#bs-example-modal-sm" title="Hapus Kategori"><i class="glyphicon glyphicon-trash"></i></button><button class="btn btn-xs btn-warning pull-right wew ubah" title="Ubah Kategori"><i class='glyphicon glyphicon-pencil'></i></button> <button id="detail" class="btn btn-xs btn-success pull-right wew" title="Detail Kategori"><i class="glyphicon glyphicon-zoom-in"></i></button></td>
					</tr>-->
				</tbody>
			</table><br><br>

			
		  </div>
		</div>
		
		
	</div>
</div>
<script type="text/javascript">
	function hapus(id)
	{
		$('#id_mesin').val(id);
	}
	function detail(id)
	{
		$.post("<?php echo base_url()?>mesin_cuci/form_detail/"+id,function(data){
			$('#form-detail').html(data);
		});
	}
</script>
<div class="row" id="form-detail" style="display:none">
	
</div>

<!-- add mesin -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <?php echo form_open_multipart('mesin_cuci/add');?>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
      </div>
      <div class="modal-body">
     	  <div class="form-group">
		    <label>Kategori</label>
		  	<?php echo form_dropdown('kategori', $kategori, '',"class='form-control' id='kategori'");?>
		  </div>
     	  <div class="form-group">
		    <label>Nama Mesin Cuci</label>
		    <input type="text" name="nama" id="nama" class="form-control">
		  </div>
		  <div class="form-group">
		    <label>Jenis Tabung</label>
		  	<?php $j['']="- Pilih Jenis Tabung -";$j['1']="Satu Tabung";$j['2']="Dua Tabung";
		  	echo form_dropdown('jenis_tabung', $j, '',"class='form-control' id='jenis_tabung'");?>
		  </div>
		  <!--<div class="form-group">
		    <label>Harga</label>
		    <input type="text" name="harga" id="harga" class="form-control">
		  </div>-->
		  <div class="form-group">
		    <label>Gambar</label>
		    <input type="file" id="gambar" name="gambar" class="form-control">
		  </div>
		  <div class="form-group">
		    <label>Fitur Lainya</label>
		    <textarea class="form-control" id="fitur" name="fitur"></textarea>
		  </div>
		  <hr>
		  <?php foreach($parameter as $param){?>
		  <div class="form-group">
		    <label><?php echo $param->nama_parameter." (".$param->satuan.")";?></label>
		    <input type="text" name="param_<?php echo $param->id_parameter;?>" id="param_<?php echo $param->id_parameter;?>" class="form-control">
		  </div>
		  <?php } ?>		    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- end mesin_add -->
<script type="text/javascript">
	function edit(id){
		$.post('<?php echo base_url()?>mesin_cuci/form_edit/'+id,function(data){
			$('#body-edit').html(data);
		});
	}
</script>
<!-- Modal  mesin edit-->
<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <?php echo form_open_multipart('mesin_cuci/edit');?>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
      </div>
      <div class="modal-body" id="body-edit">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- edit mesin -->
<style type="text/css">
	.azz{
		background-color: #FFD777;
	}
</style>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  
</div>

<div class="modal fade " id="bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <form action="<?php echo base_url()?>mesin_cuci/hapus" method="POST">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
      </div>
      <div class="modal-body">
      	<input type="hidden" name="id" id="id_mesin">
        Apakah anda yakin akan menghapus data mesin tersebut ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
      </div>
    </div>
  </div>
  </form>
</div>
<script>
	$('#detail').click(function(){
		$('#depan').hide();
		$('#form-detail').show('slow');
	});
	
	/*$('.ubah').click(function(){
		$('#depan').hide();
		$('#form-detail').hide();
		$('#form-edit').show('slow');		
	});*/
</script>