<div class="row" id="depan">
	<div class="col-md-12">
		<div class="panel panel-default">
		  <div class="panel-heading" ><button  data-placement="bottom" class="btn btn-info wew" title="Tambah Data Kategori" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> Tambah Kategori</button>  </div>
		  <div class="panel-body">
		    <table class="table table-responsive table-hover table-striped dt_table">
				<thead>
					<tr>
						<th>No</th>
						<th>No</th>
						<th>No</th>
						<th>No</th>
						<th>No</th>
						<th>No</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php for($a=1;$a<=30;$a++){?>
					<tr>
						<td><?php echo $a;?></td>
						<td>aasdcasdcasdc</td>
						<td>aasdcasdcasdc</td>
						<td>aasdcasdcasdc</td>
						<td>aasdcasdcasdc</td>
						<td><img width="50px" src="<?php echo base_url()?>uploads/mesin/laundry7.jpg"> </td>
						<td><button class="btn btn-xs btn-danger wew pull-right" data-toggle="modal" data-target="#bs-example-modal-sm" title="Hapus Kategori"><i class="glyphicon glyphicon-trash"></i></button><button class="btn btn-xs btn-warning pull-right wew ubah" title="Ubah Kategori"><i class='glyphicon glyphicon-pencil'></i></button> <button id="detail" class="btn btn-xs btn-success pull-right wew" title="Detail Kategori"><i class="glyphicon glyphicon-zoom-in"></i></button></td>
					</tr>
				<?php }?>	
				</tbody>
			</table><br><br>

			
		  </div>
		</div>
		
		
	</div>
</div>

<div class="row" id="form-detail" style="display:none">
	<div class="col-md-12">
		<div class="panel panel-default">
		  <div class="panel-heading" ><button class="btn btn-danger back" > <i class="glyphicon glyphicon-menu-left"></i> Detail Mesin Cuci</button>  </div>
		  <div class="panel-body">
		  	<table class="table table-striped">
		  		<tr>
		  			<th style="width:200px" rowspan="9">
		  				<center>
		  					<img width="150px" src="<?php echo base_url()?>uploads/mesin/laundry7.jpg"><br><br>
		  					<button class="btn btn-warning col-md-12 ubah">Edit Data</button><br><br><br>
		  					<button class="btn btn-warning col-md-12" data-toggle="modal" data-target=".bs-example-modal-lg">Nilai Derajat Keanggotaan</button>
		  				</center>
		  			</th>
		  			<th colspan="2">Data Spesifikasi Mesin Cuci</th>
		  		</tr>
		  		<tr>
		  			<td>Nama</td>
		  			<td>: Samsung Kc230</td>
		  		</tr>
		  		<tr>
		  			<td>Harga</td>
		  			<td>: Rp 1.200.000</td>
		  		</tr>
		  		<tr>
		  			<td>Kapasitas</td>
		  			<td>: 20 Kg</td>
		  		</tr>
		  		<tr>
		  			<td>Kecepatan</td>
		  			<td>: 80 RPM</td>
		  		</tr>
		  		<tr>
		  			<td>Daya</td>
		  			<td>: 120 Watt</td>
		  		</tr>
		  		<tr>
		  			<td>Berat</td>
		  			<td>: 30 Kg</td>
		  		</tr>
		  		<tr>
		  			<td>Ukuran</td>
		  			<td>: 50 x 50 x 120</td>
		  		</tr>
		  		<tr>
		  			<td style="width:100px">Fitur Lainnya</td>
		  			<td>: Bisa cuci dosa</td>
		  		</tr>
		  		<tr>
		  			<td></td>
		  			<td colspan="2"><button class="btn btn-danger back">Kembali</button> </td>
		  		</tr>
		  	</table>		
		  </div>
		</div>		
	</div>
</div>

<div class="row" id="form-edit" style="display:none">
	<div class="col-md-12">
		<div class="panel panel-default">
		  <div class="panel-heading" ><button class="btn btn-danger back" > <i class="glyphicon glyphicon-menu-left"></i> Detail Mesin Cuci</button>  </div>
		  <div class="panel-body">
		  	<form action="#" class="form-horizontal">
		  		  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" value="Samsung HIJKL">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Gambar</label>
				    <div class="col-sm-10">
				      <input type="file" class="form-control">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Harga (Rp)</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" value="1200000">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Kapasitas (Kg)</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" value="8">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Kecepatan (RPM)</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" value="120">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Daya (Watt)</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" value="120">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Berat (Kg)</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" value="10">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Panjang (cm)</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" value="50">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Lebar (cm)</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" value="50">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Tinggi (cm)</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" value="120">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Fitur Lainya</label>
				    <div class="col-sm-10">
				      <select class="form-control"><option>Satu Tabung</option><option>Dua Tabung</option> </select>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label"></label>
				    <div class="col-sm-10">
				      <button class="btn btn-success" type="button">Ubah</button>
				      <button class="btn btn-danger back">Kembali</button>
				    </div>
				  </div>				  
		  	</form>	
		  </div>
		</div>		
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
      </div>
      <div class="modal-body">
     	  <div class="form-group">
		    <label>Email address</label>
		    <input type="text" class="form-control">
		  </div>
		  <div class="form-group">
		    <label>Email address</label>
		    <input type="text" class="form-control">
		  </div>
		  <div class="form-group">
		    <label>Email address</label>
		    <input type="text" class="form-control">
		  </div>
		  <div class="form-group">
		    <label>Email address</label>
		    <input type="text" class="form-control">
		  </div>
		  <div class="form-group">
		    <label>Email address</label>
		    <input type="text" class="form-control">
		  </div>
		  <div class="form-group">
		    <label>Email address</label>
		    <input type="text" class="form-control">
		  </div>   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
  </form>
</div>
<style type="text/css">
	.azz{
		background-color: #FFD777;
	}
</style>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <form class="form-horizontal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Data Derajat Keanggotaan Mesin Cuci</h4>
      </div>
      <div class="modal-body">
        <table class="table ">
        	<tr>
        		<td>Nama</td>
        		<td colspan="3">: Samsung JKLM</td>
        	</tr>
        	<tr >
        		<td colspan="4"></td>
        	</tr>
        	<tr class="azz">
        		<td class="azz"  rowspan="2"><center> Variable</center></td>
        		<td colspan="3"><center>Kriteria</center></td>
        	</tr>
        	<tr class="azz">
        		<td>Kecil</td>
        		<td>Sedang</td>
        		<td>Besar</td>
        	</tr>
        	<tr>
        		<td>Harga</td>
        		<td>0.2</td>
        		<td>0.4</td>
        		<td>0.1</td>
        	</tr>
        	<tr>
        		<td>Kapasitas</td>
        		<td>0.2</td>
        		<td>0.4</td>
        		<td>0.1</td>
        	</tr>
        	<tr>
        		<td>Kecepatan</td>
        		<td>0.2</td>
        		<td>0.4</td>
        		<td>0.1</td>
        	</tr>
        	<tr>
        		<td>Daya</td>
        		<td>0.2</td>
        		<td>0.4</td>
        		<td>0.1</td>
        	</tr>
        	<tr>
        		<td>Berat</td>
        		<td>0.2</td>
        		<td>0.4</td>
        		<td>0.1</td>
        	</tr>
        	<tr>
        		<td>Panjang</td>
        		<td>0.2</td>
        		<td>0.4</td>
        		<td>0.1</td>
        	</tr>
        	<tr>
        		<td>Lebar</td>
        		<td>0.2</td>
        		<td>0.4</td>
        		<td>0.1</td>
        	</tr>
        	<tr>
        		<td>Tinggi</td>
        		<td>0.2</td>
        		<td>0.4</td>
        		<td>0.1</td>
        	</tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
       
      </div>
    </div>
  </div>
  </form>
</div>

<div class="modal fade " id="bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
      </div>
      <div class="modal-body">
        Apakah anda yakin akan menghapus data tersebut ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger">Hapus</button>
      </div>
    </div>
  </div>
</div>
<script>
	$('#detail').click(function(){
		$('#depan').hide();
		$('#form-detail').show('slow');
	});
	$('.back').click(function(){
		$('#form-detail').hide();
		$('#form-edit').hide();
		$('#depan').show('slow');
	});
	$('.ubah').click(function(){
		$('#depan').hide();
		$('#form-detail').hide();
		$('#form-edit').show('slow');		
	});
</script>