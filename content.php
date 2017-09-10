<div class="col-sm-10">
	<div class="content">
	<div class="container-fluid">
		<?php
		if (isset($_GET['m'])) //menu
		{
			if ($_SESSION['level']=='admin'){
				switch ($_GET['m']) {
					case 'history-repair':
						include 'tampil/history_repair.php';
						break;
					case 'history-problem':
						include 'tampil/history_problem.php';
						break;
				}
			}
			switch ($_GET['m']) {
				case 'report':
					include 'tampil/report.php';
					break;
				case 'setting':
					include 'tampil/setting.php';
					break;
			}
		}
		if (isset($_GET['sb'])) //submenu
		{
			if ($_SESSION['level']=='admin'){
				switch ($_GET['sb']) {
					case 'dies':
						include 'tampil/dies.php';
						break;
					case 'machine':
						include 'tampil/machine.php';
						break;
					case 'member':
						include 'tampil/member.php';
						break;
					case 'action':
						include 'tampil/action.php';
						break;
					case 'problem':
						include 'tampil/problem.php';
						break;
				}
			}
			switch ($_GET['sb']) {
				case 'user':
					include 'tampil/user.php';
					break;
				case 'h-repair':
					if (isset($_GET['r'])){
						switch ($_GET['r']){
							case 'monthly':
								include 'tampil/report/h_repair_monthly.php';
								break;
							case 'annual':
								include 'tampil/report/h_repair_annual.php';
								break;
							}
					}
					break;
				case 'h-problem':
					if (isset($_GET['r'])){
						switch ($_GET['r']){
							case 'monthly':
								include 'tampil/report/h_problem_monthly.php';
								break;
							case 'annual':
								include 'tampil/report/h_problem_annual.php';
								break;
							}
					}
					break;
				case 'export':
					include 'tampil/report/export.php';
					break;
			}
		}

		if (isset($_GET['f'])) //form
		{
			if ($_SESSION['level']=='admin'){
				switch ($_GET['f']) {
					case 'new-history-repair':
						include 'tampil/new_history_repair.php';
						break;
					case 'edit-history-repair':
						include 'tampil/edit_history_repair.php';
						break;
					case 'new-history-problem':
						include 'tampil/new_history_problem.php';
						break;
					case 'edit-history-problem':
						include 'tampil/edit_history_problem.php';
						break;
					case 'new-user':
						include 'tampil/new_user.php';
						break;
					case 'new-die':
						include 'tampil/new_die.php';
						break;
					case 'edit-die':
						include 'tampil/edit_die.php';
						break;
					case 'new-machine':
						include 'tampil/new_machine.php';
						break;
					case 'edit-machine':
						include 'tampil/edit_machine.php';
						break;
					case 'new-member':
						include 'tampil/new_member.php';
						break;
					case 'edit-member':
						include 'tampil/edit_member.php';
						break;
					case 'new-problem':
						include 'tampil/new_problem.php';
						break;
					case 'edit-problem':
						include 'tampil/edit_problem.php';
						break;
					case 'new-action':
						include 'tampil/new_action.php';
						break;
					case 'edit-action':
						include 'tampil/edit_action.php';
						break;
				}
			}
			switch ($_GET['f']) {
				case 'edit-user':
					include 'tampil/edit_user.php';
					break;
			}
		}
		if(!isset($_GET['m']) and !isset($_GET['sb']) and !isset($_GET['f']))
		{
			echo "<marquee behavior='alternate'>Selamat datang di sistem administrasi Die Maintenance PT. TD Automotive Compressor Indonesia</marquee>";
		}
		?>
	</div>
</div>
</div>