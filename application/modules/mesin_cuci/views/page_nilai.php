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
        		<td colspan="3">: <?php echo $value->nama_mesin." (".$value->nama_mesin_kategori.")";?></td>
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
        	<?php foreach($nilai as $nil){?>
        	<tr>
        		<td><?php echo $nil->nama;?></td>
        		<td><?php echo $nil->kecil;?></td>
        		<td><?php echo $nil->sedang;?></td>
        		<td><?php echo $nil->tinggi;?></td>
        	</tr>
        	<?php }?>
        	
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
       
      </div>
    </div>
  </div>
  </form>