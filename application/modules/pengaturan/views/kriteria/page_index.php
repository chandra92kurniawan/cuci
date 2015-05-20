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
<!-- Modal -->
<div class="modal fade" id="small" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <img id="loading" src="<?php echo base_url()?>uploads/loading.gif">
        <div id="berhasil">Berhasil disimpan</div>
        <div id="gagal">Gagal disimpan</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">tutup</button>
      </div>
    </div>
  </div>
</div>
<!-- Small modal 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#small">Small modal</button>-->


<div class="col-lg-12">
  <div class="form-panel">
    <?php if($parameter->num_rows()>$ceked){?>
    <div class="alert alert-warning alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      <strong>Data bobot kriteria tidak lengkap, mohon lengkapi data ini !</strong>
    </div>
    <?php }else{?>
    <a href="<?php echo base_url()?>pengaturan/kriteria/setAll" class="btn btn-success">Set semua data mesin cuci</a><br><br>
    <?php }?>
    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
       <ul id="myTab" class="nav nav-tabs" role="tablist">
        <?php $no=1;foreach($parameter->result() as $param){?>
        <li role="presentation" class="<?php if($no==1){echo 'active';}?>"><a href="#tab_<?php echo $param->id_parameter;?>" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false"><?php echo $param->nama_parameter;?></a></li>
        <?php $no++;}?>
        <!--<li role="presentation" class="active"><a href="#harga" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">Harga</a></li>
        <li role="presentation" class=""><a href="#Kapasitas" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">Kapasitas</a></li>
        <li role="presentation" class=""><a href="#Kecepatan" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">Kecepatan</a></li>
        <li role="presentation" class=""><a href="#Daya" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">Daya</a></li>
        <li role="presentation" class=""><a href="#Berat" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">Berat</a></li>
        <li role="presentation" class=""><a href="#Panjang" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">Panjang</a></li>
        <li role="presentation" class=""><a href="#Tinggi" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">Tinggi</a></li>
        -->
       </ul>
      <div id="myTabContent" class="tab-content">
        <?php $no=1;foreach($parameter->result() as $param){
          $data=$this->m_kriteria->dataDtl($param->id_parameter);
          $vv=$this->m_kriteria->cekValue($param->id_parameter);?>
          

        <div role="tabpanel" class="tab-pane fade <?php if($no==1){?> active in<?php } ?>" id="tab_<?php echo $param->id_parameter;?>" aria-labelledby="home-tab">
          <br><br>
          <?php if($vv->cek==0){?>
          <div class="alert alert-warning alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <strong>Harap inputkan nilai dari variable</strong>
          </div>
          <?php }else{
            if($vv->hasil>0){?>
            <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
              <strong>Maaf silahkan tekan kembali tombol simpan</strong> karena masih ada <?php echo $vv->hasil;?> mesin cuci yang belum terdata
            </div>
            <?php }
          }
          ?>
          <form id="form_<?php echo $param->id_parameter;?>" method="POST" action="<?php echo base_url()?>pengaturan/kriteria/simpan">
          <input type="hidden" name="id" value="<?php echo $param->id_parameter;?>">
          <table class="table table-bordered table-striped table-hover">
            <thead>
              <tr class="ass">
                <th>Kriteria</th>
                <th>Kecil</th>
                <th>Sedang</th>
                <th>Tinggi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Kecil</td>
                <td><input type="text" name="kecil_a" class="form-control" value="<?php echo $data->kecil_1;?>"></td>
                <td></td>
                <td><input type="text" name="kecil_b" class="form-control" value="<?php echo $data->kecil_2;?>"></td>
              </tr>
              <tr>
                <td>Sedang</td>
                <td><input type="text" name="sedang_a" class="form-control" value="<?php echo $data->sedang_1;?>"></td>
                <td><input type="text" name="sedang_b" class="form-control" value="<?php echo $data->sedang_2;?>"></td>
                <td><input type="text" name="sedang_c" class="form-control" value="<?php echo $data->sedang_3;?>"></td>
              </tr>
              <tr>
                <td>Tinggi</td>
                <td><input type="text" name="tinggi_a" class="form-control" value="<?php echo $data->besar_1;?>"></td>
                <td></td>
                <td><input type="text" name="tinggi_b" class="form-control" value="<?php echo $data->besar_2;?>"></td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="4"><center>
                  <input type="reset" class="btn btn-danger" value="Reset"> 
                  <button type="button" onclick="simpan('<?php echo $param->id_parameter;?>')" class="btn btn-success">Simpan</button>
                </center></td>
              </tr>
            </tfoot>
          </table>
          </form>
        </div>
        <?php $no++;}?>
        </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function simpan(id){
    var form=$('#form_'+id).serialize();
    $('#small').modal('show');
    $('#loading').show();
    $('#berhasil').hide();
    $('#gagal').hide();
    $.post("<?php echo base_url()?>pengaturan/kriteria/simpan",form,function(data){
      $('#berhasil').show();
      $('#loading').hide();
      $('#gagal').hide();
      //alert("success");
    })
      .fail(function(){
        $('#berhasil').hide();
        $('#loading').hide();
        $('#gagal').show();
      })
    ;
  }
</script>
