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
<style type="text/css">
  .azz{
    background-color: #FFD777;
  }
</style>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  
</div>
<div id="depan">
<div class="row">
	<!--<div class="col-md-12">
					<div class="row mtbox">
                  		<div class="col-md-4 box0">
                  			<div class="box1">
					  			<span class="glyphicon glyphicon-th-large"></span>
					  			<h3>Mesin Cuci</h3>
                  			</div>
					  			<p>Data Mesin Cuci</p>
                  		</div>
                  		<div class="col-md-4 box0">
                  			<div class="box1">
					  			<span class="glyphicon glyphicon-list-alt"></span>
					  			<h3>Rekomendasi</h3>
                  			</div>
					  			<p>Data Rekomendasi Mesin Cuci</p>
                  		</div>
                  		<div class="col-md-4 box0">
                  			<div class="box1">
					  			<span class="glyphicon glyphicon-transfer"></span>
					  			<h3>Pengaturan</h3>
                  			</div>
					  			<p>Pengaturan Aplikasi</p>
                  		</div>

                  	
                  	</div><!-- /row mt ---
	</div>-->
      <div class="col-md-12" class="pagination"><center>
            <nav>
              <?php echo $halaman;?>
                <!--<ul ><li>
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li></ul>-->
              
            </nav></center>
      </div>      
</div><br><br>
<div class="row">
<?php foreach($query->result() as $q){?>
  <a href="#" onclick="detail('<?php echo $q->id_mesin;?>')">
  <div class="col-md-4 col-sm-4 mb">
    <div class="white-panel pn">
          <div class="white-header">
                <h5><?php echo $q->nama_mesin_kategori." - ".$q->nama_mesin;?></h5>
          </div>
          <div class="row">
                <div class="col-sm-6 col-xs-6 goleft">
                      <p>Rp <?php echo number_format($q->value,"0","",".");?></p>
                </div>
                <div class="col-sm-6 col-xs-6"></div>
          </div>
          <div class="centered">
                <img src="<?php echo base_url()?>uploads/mesin/<?php echo $q->gambar;?>" width="120">
          </div>
    </div>
  </div><!-- /col-md-4 -->        
  </a>
<?php
} ?>
</div>
</div>
<div class="row" id="form-detail" style="display:none">
  
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
<script type="text/javascript" src="<?php echo base_url()?>assets/js/highchart/highchart.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/highchart/exporting.js"></script>