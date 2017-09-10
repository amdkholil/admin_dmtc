<?php
if (isset($_POST['go']))
{	$tahun=$_POST['tahun']; }
else
{	$tahun=date("Y"); }
$tbl="problem_die";
$report=new report($tbl);
$report->set_tahun($tahun);
include 'graph_annual.php';
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
				<span class="h-title">Report History Problem Dies Tahun <?php echo $tahun; ?></span>
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
		<div class="col-sm-12">
			<table class="table table-condensed table-bordered table-hover" style="background: #fff"
				data-graph-container-before="1" data-graph-type="column">
				<thead>
					<tr class="info">
						<th style="text-align: center;">Masalah</th>
						<th style="text-align: center;">Jan</th>
						<th style="text-align: center;">Feb</th>
						<th style="text-align: center;">Mar</th>
						<th style="text-align: center;">Apr</th>
						<th style="text-align: center;">Mei</th>
						<th style="text-align: center;">Jun</th>
						<th style="text-align: center;">Jul</th>
						<th style="text-align: center;">Ags</th>
						<th style="text-align: center;">Sep</th>
						<th style="text-align: center;">Okt</th>
						<th style="text-align: center;">Nov</th>
						<th style="text-align: center;">Des</th>
						<th style="text-align: center;">Tot.</th>
						<th style="text-align: center;">%</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$q=$report->get_problem();
					if (is_object($q)) {
					while ($d=$q->fetch_assoc()) {
					?>
					<tr>
						<td><?php echo $d['problem']; $report->set_masalah($d['id_problem']); ?></td>
						<?php for ($i=1; $i<=12; $i++) {  ?>
						<td align="right">
							<?php echo number_format($report->get_jam_bulan($i),2); ?>
						</td> <?php }?>
						<td align="right">
							<?php echo number_format($report->get_jam_problem(),2); ?>
						</td>
						<td align="right">
							<?php echo number_format($report->get_jam_problem()/$report->tot_jam_tahun()*100,2);  ?>
						</td>
					</tr>
					<?php }}  ?>
				</tbody>
				<tfoot>
					<tr  classil="active">
						<td>Total</td>
						<?php for ($i=1; $i<=12; $i++) { $report->set_bulan($i); ?>
						<td align="right">
							<?php echo number_format($report->tot_jam_bulan(),2); ?>
						</td>
						<?php } ?>
						<td align="right">
							<?php echo number_format($report->tot_jam_tahun(),2); ?>
						</td>
						<td align="right">
							<?php echo number_format($report->tot_jam_tahun()/$report->tot_jam_tahun()*100,2); ?>
						</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
	<div class="row cust">
		<div class="col-sm-4">
			<div id="pie_chart" class="chart"></div>
		</div>
		<div class="col-sm-8">
			<div id="column_chart" class="chart"></div>
		</div>
	</div>
</div>