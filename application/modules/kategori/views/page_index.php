<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
		  <div class="panel-heading" ><button class="btn btn-info wew" title="Tambah Data Kategori" data-toggle="modal" data-target="#myModal" id="btn-add"><i class="glyphicon glyphicon-plus"></i> Tambah Kategori</button>  </div>
		  <div class="panel-body">
		    <table class="table table-responsive table-hover table-striped dt_table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Kategori</th>
						<th>Jumlah Mesin</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=0;foreach($value as $v){?>
					<tr>
						<td><?php echo ++$no;?></td>
						<td><?php echo $v->nama_mesin_kategori;?></td>
						<td><?php echo $v->jumlah_mesin;?></td>
						<td>
							<button onclick="hapus('<?php echo $v->id_mesin_kategori;?>')" class="btn btn-xs btn-danger wew pull-right" data-toggle="modal" data-target="#delete" title="Hapus Kategori"><i class="glyphicon glyphicon-trash"></i></button>
							<button type="button" onclick="edit('<?php echo $v->id_mesin_kategori;?>',
																'<?php echo $v->nama_mesin_kategori;?>')" class="btn btn-xs btn-warning pull-right wew ubah" data-toggle="modal" data-target="#myModal" title="Ubah Kategori"><i class='glyphicon glyphicon-pencil'></i></button>
						</td>
					</tr>
					<?php }?>
				</tbody>
			</table><br><br>

			
		  </div>
		</div>
		
		
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form id="frm" action="<?php echo base_url()?>kategori/add" method="POST">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Kategori</h4>
      </div>
      <div class="modal-body">
     	  <div class="form-group">
		    <label>Nama Kategori</label>
		    <input type="hidden" name="id" id="id">
		    <input type="text" name="nama" id="nama" class="form-control">
		  </div>		  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan Kategori</button>
      </div>
    </div>
  </div>
  </form>
</div>

<div class="modal fade " id="delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <form action="<?php echo base_url()?>kategori/hapus" method="POST">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Hapus Data Kategori</h4>
      </div>
      <div class="modal-body">
      <input type="hidden" name="id" id="id_hapus">
        Apakah anda yakin akan menghapus data kategori tersebut ?
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
function edit(id,nm){
	$('#frm').attr('action',"<?php echo base_url()?>kategori/edit");
	$('#myModalLabel').html("Edit Kategori");
	$('#nama').val(nm);
	$('#id').val(id);
}
function hapus(id){
	$('#id_hapus').val(id);
}
$('#btn-add').click(function(){
	$('#frm').attr('action',"<?php echo base_url()?>kategori/add");
	$('#myModalLabel').html("Tambah Kategori");
	$('#nama').val('');
});
</script>