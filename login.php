<?php
session_start();
if(isset($_SESSION['username']))
{
	header("Location: index.php");
}
include 'lib/lib.php';
include 'header.php';
?>
<div class="row login">
	<div class="col-sm-4"></div>
	<div class="col-sm-4">
		<div class="login-box panel panel-primary">
			<div class="panel-heading" align="center">Form Login</div>
			<form method="post" action="proses/log.php" class="panel-body">
				<div class="form-group">
					<input type="text" name="username" class="form-control" placeholder="Username" required>
				</div>
				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="********" required>
				</div>
				<div class="form-group" align="center">
					<input type="submit" name="login" class="btn btn-sm btn-primary" value="Login">
				</div>
			</form>
		</div>
	</div>
	<div class="col-sm-4"></div>
</div>
<?php
notif();
include 'footer.php';
?>