<?php
if (!isset($_GET['f']))
{
	if(isset($_GET['sb'])) { $sb=$_GET['sb']; } else { $sb="";}
	?>
<div class="row">
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<ul class="nav navbar-nav">
	<li <?php echo cek($sb,"user","class=\"active\""); ?>><a href="?m=setting&sb=user">Pengguna</a></li>
	<?php if ($_SESSION['level']=='admin') { ?>
	<li <?php echo cek($sb,"dies","class=\"active\""); ?>><a href="?m=setting&sb=dies">Dies</a></li>
	<li <?php echo cek($sb,"machine","class=\"active\""); ?>><a href="?m=setting&sb=machine">Mesin</a></li>
	<li <?php echo cek($sb,"member","class=\"active\""); ?>><a href="?m=setting&sb=member">Member</a></li>
	<li <?php echo cek($sb,"problem","class=\"active\""); ?>><a href="?m=setting&sb=problem">Masalah</a></li>
	<li <?php echo cek($sb,"action","class=\"active\""); ?>><a href="?m=setting&sb=action">Penanganan</a></li>
	<?php } ?>
		</ul>
  </div>
</nav>
</div>
<?php
}
?>