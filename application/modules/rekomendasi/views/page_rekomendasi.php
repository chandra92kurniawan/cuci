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
		  <div class="panel-heading" ><a href="#" id="toRekomended" class="btn btn-info wew" title="Print hasil rekomendasi">ke Rekomendasi Fuzzy</a></div>
		  <div class="panel-body">	    
<!-- pertanyaan -->
			<div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
			    <ul id="myTabs" class="nav nav-tabs" role="tablist">
			      <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Rumah Tangga</a></li>
			      <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Bisnis</a></li>
			      
			    </ul>
			    <div id="myTabContent" class="tab-content">
			      <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
			        <form action="<?php echo base_url()?>rekomendasi/prometheeRT" method="POST"><br>
			        	<table class="table">
			        		<tr>
			        			<td rowspan="2">1</td>
			        			<td>Dari beberapa merk dibawah ini, merk mana yang anda lebih percayai untuk urusan mencuci dirumah tangga anda?</td>
			        		</tr>
			        		<tr>
			        			<td>
			        				<?php $no=1;foreach($mesin as $m){?>
			        				<input type="checkbox" name="merk[]" value="<?php echo $m->id_mesin_kategori;?>"> <?php echo $m->nama_mesin_kategori;?>
			        				&nbsp;&nbsp;&nbsp;
			        				<?php if($no==5){echo "<br>";$no==1;}$no++;}?>
			        			</td>
			        		</tr>
			        		<tr>
			        			<td rowspan="2">2</td>
			        			<td>Bagaimanakah keadaan sumber air dirumah anda?</td>
			        		</tr>
			        		<tr>
			        			<td>
			        				<input type="radio" name="air" value="1"> Melimpah&nbsp;&nbsp;&nbsp; <input type="radio" name="air" value="0"> Tidak Melimpah
			        			</td>
			        		</tr>
			        		<tr>
			        			<td rowspan="2">3</td>
			        			<td>Berapa lama garansi yang lebih anda pilih untuk mesin cuci anda?</td>
			        		</tr>
			        		<tr>
			        			<td>
			        				<input type="checkbox" name="garansi[]" value="1"> 1 Tahun&nbsp;&nbsp;&nbsp;
			        				<input type="checkbox" name="garansi[]" value="2"> 2 Tahun&nbsp;&nbsp;&nbsp;
			        				<input type="checkbox" name="garansi[]" value="3"> 3 Tahun
			        			</td>
			        		</tr>
			        		<tr>
			        			<td rowspan="2">4 </td>
			        			<td>Berapa lama garansi yang lebih anda pilih untuk mesin cuci anda?</td>
			        		</tr>
			        		<tr>
			        			<td>
			        				<input type="radio" name="orang" value="2"> 2 orang &nbsp;&nbsp;&nbsp;
			        				<input type="radio" name="orang" value="3"> 3 orang&nbsp;&nbsp;&nbsp;
			        				<input type="radio" name="orang" value="4"> 4 orang&nbsp;&nbsp;&nbsp;
			        				<input type="radio" name="orang" value="5"> 5 orang&nbsp;&nbsp;&nbsp;
			        				<input type="radio" name="orang" value="6"> 6 orang <br>
			        				<input type="radio" name="orang" value="7"> 7 orang&nbsp;&nbsp;&nbsp;
			        				<input type="radio" name="orang" value="8"> 8 orang&nbsp;&nbsp;&nbsp;
			        				<input type="radio" name="orang" value="9"> 9 orang&nbsp;&nbsp;&nbsp;
			        				<input type="radio" name="orang" value="10"> 10 orang&nbsp;&nbsp;&nbsp;
			        				<input type="radio" name="orang" value="11"> Lebih dari 10 orang&nbsp;&nbsp;&nbsp;
			        			</td>
			        		</tr>
			        		<tr>
			        			<td rowspan="2">5</td>
			        			<td>Bagaimana kondisi kesibukan anda sehari-hari atau waktu yang anda luangkan untuk mencuci?</td>
			        		</tr>
			        		<tr>
			        			<td>
			        				<input type="radio" name="waktu" value="s"> Sedikit waktu luang untuk mencuci &nbsp;&nbsp;&nbsp;
			        				<input type="radio" name="waktu" value="b"> Banyak waktu luang untuk mencuci
			        			</td>
			        		</tr>
			        		<tr>
			        			<td rowspan="2">6</td>
			        			<td>Dari kelima pertanyaan diatas silahkan urutkan prioritas jawabannya menurut anda?</td>
			        		</tr>
			        		<tr>
			        			<td>
			        				Prioritas pertama adalah jawaban pada soal no <select onchange="gg('1','pr')" name="pr[]" id="pr_1"><option value="0">- Pilih Prioritas -</option> <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>
			        				<br>Prioritas kedua adalah jawaban pada soal no <select onchange="gg('2','pr')" name="pr[]" id="pr_2"><option value="0">- Pilih Prioritas -</option> <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>
			        				<br>Prioritas ketiga adalah jawaban pada soal no <select onchange="gg('3','pr')" name="pr[]" id="pr_3"><option value="0">- Pilih Prioritas -</option> <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>
			        				<br>Prioritas keempat adalah jawaban pada soal no <select onchange="gg('4','pr')" name="pr[]" id="pr_4"><option value="0">- Pilih Prioritas -</option> <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>
			        				<br>Prioritas kelima adalah jawaban pada soal no <select onchange="gg('5','pr')" name="pr[]" id="pr_5"><option value="0">- Pilih Prioritas -</option> <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>
			        			</td>
			        		</tr>
			        		<tr>
			        			<td colspan="2"><center><button type="submit" class="btn btn-success">Proses</button> <input type="reset" class="btn btn-danger" value="Reset"></center> </td>
			        		</tr>
			        	</table>
			        </form>
			      </div>
			      <script type="text/javascript">
			      function gg(id,par){
			      	console.log("-----------");
			      	var array = [1,2,3,4,5];
					var str;
					//console.log(id);
					for(var zz=id;zz>=1;zz-- ){	
						//console.log("-----------");
						var dd=$('#'+par+'_'+zz).val();					
						var index = array.indexOf(dd);
						var kurang=parseInt(dd)-1;
						if (index == -1) {
					    	array.splice(kurang, 1);
								console.log(kurang);
						}
						//console.log(dd);
					}
					console.log(kurang+" - "+index+" - "+id);
					var tambah=parseInt(id)+1;
					for(var asd=tambah;asd<=5;asd++){
						str="";
						str+="<select name='"+par+"[]' onchange=gg('"+asd+"') id='"+par+"_"+asd+"'>";
						str+="<option value='0'>- Pilih Prioritas -</option>";
						array.forEach(function(entry) {
							    str+="<option value='"+entry+"'>"+entry+"</option>";
							    //console.log(entry);
						});
						str+="</select>";
						$('#'+par+'_'+asd).html(str);
					}
					
			      }
			      </script>
			      <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
			      	<form action="<?php echo base_url()?>rekomendasi/prometheeBS" method="POST">
			      	<br>
			      		<table class="table">
			      			<tr>
			        			<td rowspan="2">1</td>
			        			<td>Dari beberapa merk dibawah ini, merk mana yang anda lebih percayai untuk urusan mencuci dirumah tangga anda?</td>
			        		</tr>
			        		<tr>
			        			<td>
			        				<?php $no=1;foreach($mesin as $m){?>
			        				<input type="checkbox" name="merk[]" value="<?php echo $m->id_mesin_kategori;?>"> <?php echo $m->nama_mesin_kategori;?>
			        				&nbsp;&nbsp;&nbsp;
			        				<?php if($no==5){echo "<br>";$no==1;}$no++;}?>
			        			</td>
			        		</tr>
			        		<tr>
			        			<td rowspan="2">2</td>
			        			<td>Berapa lama garansi yang lebih anda pilih untuk mesin cuci anda?</td>
			        		</tr>
			        		<tr>
			        			<td>
			        				<input type="checkbox" name="garansi[]" value="1"> 1 Tahun&nbsp;&nbsp;&nbsp;
			        				<input type="checkbox" name="garansi[]" value="2"> 2 Tahun&nbsp;&nbsp;&nbsp;
			        				<input type="checkbox" name="garansi[]" value="3"> 3 Tahun
			        			</td>
			        		</tr>
			        		<tr>
			        			<td>3</td>
			        			<td>Untuk keperluan bisnis laundry, tipe mesin cuci dengan jumlah satu tabung sangat direkomendasikan</td>
			        		</tr>
			        		<tr>
			        			<td>4</td>
			        			<td>Untuk keperluan bisnis laundry, mesin cuci berkapasitas lebih dari 11 kg sangat direkomendasikan.</td>
			        		</tr>
			        		<tr>
			        			<td>5</td>
			        			<td>Untuk keperluan bisnis laundry, tipe mesin cuci dengan jenis bukaan depan sangat direkomendasikan.</td>
			        		</tr>
			        		<tr>
			        			<td rowspan="2">6</td>
			        			<td>Dari kelima pertanyaan diatas silahkan urutkan prioritas jawabannya menurut anda?</td>
			        		</tr>
			        		<tr>
			        			<td>
			        				Prioritas pertama adalah jawaban pada soal no <select onchange="gg('1','bi')" name="bi[]" id="bi_1"><option value="0">- Pilih Prioritas -</option> <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>
			        				<br>Prioritas kedua adalah jawaban pada soal no <select onchange="gg('2','bi')" name="bi[]" id="bi_2"><option value="0">- Pilih Prioritas -</option> <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>
			        				<br>Prioritas ketiga adalah jawaban pada soal no <select onchange="gg('3','bi')" name="bi[]" id="bi_3"><option value="0">- Pilih Prioritas -</option> <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>
			        				<br>Prioritas keempat adalah jawaban pada soal no <select onchange="gg('4','bi')" name="bi[]" id="bi_4"><option value="0">- Pilih Prioritas -</option> <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>
			        				<br>Prioritas kelima adalah jawaban pada soal no <select onchange="gg('5','bi')" name="bi[]" id="bi_5"><option value="0">- Pilih Prioritas -</option> <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>
			        			</td>
			        		</tr>
			        		<tr>
			        			<td colspan="2"><center><button type="submit" class="btn btn-success">Proses</button> <input type="reset" class="btn btn-danger" value="Reset"></center> </td>
			        		</tr>
			      		</table>
			      	</form>
			      </div>
			    </div>
			  </div>
<!-- akhir Pertanyaan -->
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