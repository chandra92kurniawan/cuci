	
     	  <div class="form-group">
		    <label>Kategori</label><input type="hidden" id="id" name="id" value="<?php echo $id_mesin;?>">
		  	<?php echo form_dropdown('kategori', $kategori, $value->id_mesin_kategori,"class='form-control' id='kategori'");?>
		  </div>
     	  <div class="form-group">
		    <label>Nama Mesin Cuci</label>
		    <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $value->nama_mesin;?>">
		  </div>
		  <div class="form-group">
		    <label>Jenis Tabung</label>
		  	<?php $j['']="- Pilih Jenis Tabung -";$j['1']="Satu Tabung";$j['2']="Dua Tabung";
		  	echo form_dropdown('jenis_tabung', $j, $value->jenis_tabung,"class='form-control' id='jenis_tabung'");?>
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
		    <textarea class="form-control" id="fitur" name="fitur"><?php echo $value->fitur_lainya;?></textarea>
		  </div>
		  <hr>
		  <?php foreach($parameter as $param){?>
		  <div class="form-group">
		    <label><?php echo $param->nama_parameter." (".$param->satuan.")";?></label>
		    <input type="text" name="param_<?php echo $param->id_parameter;?>" id="param_<?php echo $param->id_parameter;?>" class="form-control" value="<?php echo $param->value;?>">
		  </div>
		  <?php } ?>	