<div class="col-sm-2 sidebar">
	<!--<div class="icon" style="font-size: 16pt; "><input type="button" id="ftoogle" value="#"></div>-->
	<div class="row" id="sidebar">
		<table class="inf">
			<tr>
				<td rowspan="2"><img src="img/user.png"/></td>
				<td style="color: #fff">
					<b><?php echo strtoupper($_SESSION['username'])." </b>/ ".$_SESSION['level']; ?>
					<div style="font-size: 9pt;"><?php echo date('d-m-Y h:i') ?></div>
				</td>
			</tr>
		</table>
		<ul>
			<?php if ($_SESSION['level']=="admin") { ?>
			<li>
				<a href="index.php?m=history-repair" class="<?php echo cek($_GET['m'],"history-repair","active"); ?>">History Repair Dies</a>
			</li>
			<li>
				<a href="index.php?m=history-problem" class="<?php echo cek($_GET['m'],"history-problem","active"); ?>">History Problem Dies</a>
			</li>
			<?php } ?>
			<li><a href="index.php?m=report" class="<?php echo cek($_GET['m'],"report","active"); ?>">Report</a></li>
			<li><a href="index.php?m=setting" class="<?php echo cek($_GET['m'],"setting","active"); ?>">Setting</a></li>
			<li><a href="proses/log.php?act=out" onclick="return logout()">Logout</a></li>
		</ul>
	</div>
</div>
<script type="text/javascript" language="JavaScript">
 function logout()
 {
 tanya = confirm("Anda yakin akan keluar??");
 if (tanya == true) 
 	return true;
 else 
 	return false;
 }

$(function(){
	$("#ftoogle").click(function(){
		$("#sidebar").toggle("slow");
	});
});

</script>