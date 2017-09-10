<script type="text/javascript">

//--- pie chart bulanan
$(function () { 
    var myChart = Highcharts.chart('pie_graph', {
        chart: { type: 'pie' },
        title: { text: ' ' },
        xAxis: { categories: ['Minggu 1'] },
        yAxis: { title: { text: 'Jam' }},
        series: [{
        			name:'problem',
        			data:[
            	<?php
							$q=$report->get_problem(); $i=1;
                            if (is_object($q)) {
    							while ($d=$q->fetch_assoc()) {
    								$report->set_masalah($d['id_problem']);
    													echo "{ name:'".$d['problem']."', ";
    								echo "y: ".$report->get_jam_problem()." }, ";
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
    Highcharts.chart('column', {
        chart: {
            type: 'column'
        },
        title: {
            text: ' '
        },
        xAxis: {
            categories: ['Minggu 1', 'Minggu 2', 'Minggu 3','Minggu 4']
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
            $q=$report->get_problem();
            if (is_object($q)) {
                while ($d=$q->fetch_assoc()) {
                    $report->set_masalah($d['id_problem']);
                    echo "{name: '".$d['problem']."', data : [";
                    for ($i=1; $i<=4;$i++)
                    {
                        echo number_format($report->get_jam_minggu($i),2).", ";
                    }
                    echo "]}, ";
                }
            }
            ?>
        ]
    });
});
</script>