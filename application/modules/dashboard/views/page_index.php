<div class="row">
	<div class="col-md-12">
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

                  	
                  	</div><!-- /row mt -->
	</div>
      <div class="col-md-12"><center>
            <nav>
              <ul class="pagination">
                <li>
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
                </li>
              </ul>
            </nav></center>
      </div>      
</div>
<div class="row">
<?php for($a=1;$a<=12;$a++){?>
                  <div class="col-md-4 col-sm-4 mb">
                        <div class="white-panel pn">
                              <div class="white-header">
                                    <h5>Samsung AXDF</h5>
                              </div>
                              <div class="row">
                                    <div class="col-sm-6 col-xs-6 goleft">
                                          <p><i class="fa fa-heart"></i> 122</p>
                                    </div>
                                    <div class="col-sm-6 col-xs-6"></div>
                              </div>
                              <div class="centered">
                                    <img src="<?php echo base_url()?>uploads/mesin/laundry7.jpg" width="120">
                              </div>
                        </div>
                  </div><!-- /col-md-4 -->
<?php } ?>               
</div>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/highchart/highchart.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/highchart/exporting.js"></script>