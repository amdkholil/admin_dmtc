<?php
if (isset($_POST['go']))
{	$bulan=$_POST['bulan'];	$tahun=$_POST['tahun']; }
else
{	$bulan=date("n");	$tahun=date("Y"); }

$report=new report("problem_die");
$report->set_bulan($bulan);
$report->set_tahun($tahun);
include 'graph_monthly.php';
$c=$report->get_problem();
if (!is_object($c)){ ?>
<script>$(function(){ 
	$(".cust").css({"overflow":"hidden","text-indent":"100%","white-space":"nowrap","height":"0px"}) });
</script>
<?php } ?>
<div class="container-fluid">
	<div class="row submenu">
		<form method="post" action="">
			<div class="col-sm-6">
				<span class="h-title">Report History Problem Dies Bulan <?php echo bulan($bulan)." ".$tahun; ?></span>
			</div>
			<div class="col-sm-2">
				<select name="bulan" class="form-control input-sm">
					<?php
					for ($i=1; $i <= 12; $i++) { 
					 	echo "<option value=\"".$i."\" ".cek($i,$bulan,"selected").">".bulan($i)."</option>";
					 }
					?>
				</select>
			</div>
			<div class="col-sm-2">
				<select name="tahun" class="form-control input-sm">
					<?php
					$q=$mysqli->query("select year(date) as tahun from repair_die group by tahun");
					while ($d=$q->fetch_assoc()) {
						echo "<option value=\"".$d['tahun']."\" ".cek($d['tahun'],$tahun,"selected").">".$d['tahun']."</option>";
					}
					?>
				</select>
			</div>
			<div class="col-sm-2">
				<input type="submit" name="go" value="Tampilkan" class="btn btn-primary btn-sm">
			</div>
		</form>
	</div>

	<!-- Table problem -->
	<div class="row fieldset">
		<div class="col-sm-8">
			<table class="table table-condensed table-bordered table-hover" style="background: #fff"
				data-graph-container-before="1" data-graph-type="column">
				<thead>
					<tr class="info">
						<th style="text-align: center;">Masalah</th>
						<th style="text-align: center;">Mg-1</th>
						<th style="text-align: center;">Mg-2</th>
						<th style="text-align: center;">Mg-3</th>
						<th style="text-align: center;">Mg-4</th>
						<th style="text-align: center;">Total</th>
						<th style="text-align: center;">%</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if ($report->tot_jam_bulan() ==0) {$tot=0.001;} else { $tot=$report->tot_jam_bulan();}
					$q=$report->get_problem();
					if(is_object($q)){
					while ($d=$q->fetch_assoc()) { ?>
					<tr>
						<td><?php echo $d['problem']; $report->set_masalah($d['id_problem']); ?></td>
						<td align="right"><?php echo number_format($report->get_jam_minggu(1),2); ?></td>
						<td align="right"><?php echo number_format($report->get_jam_minggu(2),2); ?></td>
						<td align="right"><?php echo number_format($report->get_jam_minggu(3),2); ?></td>
						<td align="right"><?php echo number_format($report->get_jam_minggu(4),2); ?></td>
						<td align="right"><?php echo number_format($report->get_jam_problem(),2);  ?></td>
						<td align="right"><?php echo number_format($report->get_jam_problem()/$tot*100,2); ?></td>
					</tr>
					<?php }} ?>
				</tbody>
				<tfoot>
					<tr class="active">
						<td>Total</td>
						<td  align="right"><?php echo number_format($report->get_jam_bulan_minggu(1),2); ?></td>
						<td  align="right"><?php echo number_format($report->get_jam_bulan_minggu(2),2); ?></td>
						<td  align="right"><?php echo number_format($report->get_jam_bulan_minggu(3),2); ?></td>
						<td  align="right"><?php echo number_format($report->get_jam_bulan_minggu(4),2); ?></td>
						<td  align="right"><?php echo number_format($tot,2); ?></td>
						<td  align="right"><?php echo number_format($report->tot_jam_bulan()/$tot*100,2); ?></td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
	<div class="row cust">
		<div class="col-sm-4">
			<div id="pie_graph" class="chart"></div>
		</div>
		<div class="col-sm-8">
			<div id="column" class="chart"></div>
		</div>
	</div>
</div>