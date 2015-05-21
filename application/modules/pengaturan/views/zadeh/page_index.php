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
<div class="row">
	<div class="col-md-12"><form class="form-horizontal" action="<?php echo base_url()?>pengaturan/zadeh/add" method="POST">
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr class="ass">
					<th><h3>Variable</h3></th>
					<th><h3>Operator</h3></th>
				</tr>
			</thead>
			<tbody>
				<?php $z=1;$aa="";$bb="";$total=$parameter->num_rows();foreach($parameter->result() as $param){
					if($z!=1){
						$bb=$param->id_parameter;
						$operator=$this->m_zadeh->getOperator($aa,$bb);
						if($operator){$operator=$operator->operator;}else{$operator='1';}
						if($total>=$z){?>
					<tr>
						<td></td>
						<td><?php $a['1']="AND";$a['2']="OR";echo form_dropdown('operator_'.$aa, $a, $operator,"class='form-control'");?> </td>
					</tr>
				<?php }
					}
					?>
				<tr>
					<td><?php echo $param->nama_parameter;?></td>
					<td></td>
				</tr>
				<?php $aa=$param->id_parameter; $z++;}?>
				
			</tbody>
			<tfoot>
				<tr>
					<td colspan="2">
						<center>
							<input type="submit" class="btn btn-success" value="Submit"> <button type="button" class="btn btn-default">Reset</button>
						</center>
					</td>
				</tr>
			</tfoot>
		</table>
		</form>
	</div>
</div>
					
						        