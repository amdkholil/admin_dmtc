<script type="text/javascript" language="javascript" src="ui/jquery-3.2.1.js"></script>
<script type="text/javascript" language="javascript" src="ui/highcharts/highcharts.js"></script>
<script src="ui/highcharts/modules/exporting.js"></script>
<?php
include 'lib/config.php';
include 'lib/lib.php';
$q=$mysqli->query("select sum(minutes) as time from repair_die natural join problem group by problem");
while ($d = $q->fetch_assoc()) {
   $data[]=$d['time'];
}
?>
<script type="text/javascript">
var chart = new Highcharts.Chart({
      chart: {
         renderTo: 'container'
      },
      series: [{
         data: [<?php echo json_encode($data) ?>]
      }]
});
</script>
<div id="container" style="width:100%; height:400px;"></div>