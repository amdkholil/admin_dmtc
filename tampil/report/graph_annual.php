<script type="text/javascript">
<?php
$report2=new report($tbl);
$report2->set_tahun($tahun);
?>
//--- pie chart 
$(function () { 
    var myChart = Highcharts.chart('pie_chart', {
        chart: { type: 'pie' },
        title: { text: ' ' },
        xAxis: { categories: ['Minggu 1'] },
        yAxis: { title: { text: 'Jam' }},
        series: [{
        			name:'problem',
        			data:[
            	<?php
							$q=$report2->get_problem(); $i=1;
                            if (is_object($q)) {
    							while ($d=$q->fetch_assoc()) {
    								$report2->set_masalah($d['id_problem']);
    													echo "{ name:'".$d['problem']."', ";
    								echo "y: ".number_format($report2->get_jam_problem(),2)." }, ";
    								$i++;
    							}
                            }
            	?>
            	],
            	tooltip: {
        				pointFormat: '<b>{point.percentage:.1f}%</b>'
    					},
        }],
        plotOptions: {
            pie: {
                allowPointSelect: true,
                stacking: 'normal',
                cursor: 'on columns',
                dataLabels: {
                    enabled: false
                }
            }
        },
    });
});

//----- column stack chart bulanan
$(function () {
    Highcharts.chart('column_chart', {
        chart: {
            type: 'column'
        },
        title: {
            text: ' '
        },
        xAxis: {
            categories: [ <?php for($i=1;$i<=12;$i++) { echo "'".bulan($i)."',"; } ?> ]
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Hours'
            },
            stackLabels: {
                enabled: true
            }
        },
        legend: {
            enabled:false
        },
        tooltip: {
            headerFormat: '<b>{point.x}</b><br/>',
            pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true,
                }
            }
        },
        series:
        [
            <?php
            $q=$report2->get_problem();
            if (is_object($q)) {
                while ($d=$q->fetch_assoc()) {
                    $report2->set_masalah($d['id_problem']);
                    echo "{name: '".$d['problem']."', data : [";
                    for ($i=1; $i<=12;$i++)
                    {
                    	$report2->set_bulan($i);
                        echo number_format($report2->get_jam_problem(),2).", ";
                    }
                    echo "]}, ";
                }
            }
            ?>
        ]
    });
});
</script>