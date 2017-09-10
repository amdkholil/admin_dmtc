<?php
include 'lib/lib_report.php';
if (isset($_GET['sb'])) { $sb=$_GET['sb']; } else { $sb=""; }
?>
<script type="text/javascript" src="ui/bootstrap.js"></script>
<script type="text/javascript" language="javascript" src="ui/highcharts/highcharts.js"></script>
<script src="ui/highcharts/modules/exporting.js"></script>
<script src="ui/highcharts/modules/offline-exporting.js"></script>
<div class="row">
	<nav class="navbar navbar-default">
		<div class="">
			<ul class="nav navbar-nav">
				<li <?php echo cek($sb,"h-repair","class='active'"); ?>>
					<a class="dropdown-toggle" data-toggle="dropdown" href=""> History Repair Dies 
						<span class="caret"></span></a>
				        <ul class="dropdown-menu">
				          <li><a href="?m=report&sb=h-repair&r=monthly">Monthly</a></li>
				          <li><a href="?m=report&sb=h-repair&r=annual">Annual</a></li>
				        </ul>
				</li>
				<li <?php echo cek($sb,"h-problem","class='active'"); ?>>
					<a class="dropdown-toggle" data-toggle="dropdown" href=""> History Problem Dies 
						<span class="caret"></span></a>
				        <ul class="dropdown-menu">
				          <li><a href="?m=report&sb=h-problem&r=monthly">Monthly</a></li>
				          <li><a href="?m=report&sb=h-problem&r=annual">Annual</a></li>
				        </ul>
				</li>
				<li <?php echo cek($sb,"export","class='active'"); ?>>
					<a class="dropdown-toggle" data-toggle="dropdown" href="">Export
						<span class="caret"></span></a>
						<ul class="dropdown-menu">
				          <li><a href="?m=report&sb=export&r=hrepair">History Repair</a></li>
				          <li><a href="?m=report&sb=export&r=hproblem">History Problem</a></li>
				        </ul>
				</li>
			</ul>	
		</div>
	</nav>
</div>