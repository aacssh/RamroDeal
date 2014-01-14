<?php 

$month=['january','february','march','april','may','june','july','august','september','october','november','december'];
$production=[12,13,14,15,323,533,323,3233,3232,6565,87,678];
$consumption=[5343,6565,434,3443,565,23,656,44,5,55,67,44];




?>





<!DOCTYPE html>
<html>
<head>
	<title>First highcharts chart</title>
	<script type="text/javascript" src="jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="highcharts.js"></script>
	<script type="text/javascript">

		var month= <?php echo json_encode($month) ?>;
		var production= <?php echo json_encode($production) ?>;
		var consumption= <?php echo json_encode($consumption) ?>;

		alert(typeof(month));
		alert(month);


	$(function () { 
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'production vs Consumption'
        },
         yAxis: {
            title: {
                text: 'no.'
            }
        },
        xAxis: {
            categories: month
        },
       
        series: [{
            name: 'production',
            data: production
        }, {
            name: 'consumption',
            data: consumption
        }]
    });
});

	</script>
</head>
<body>
<div id="container" style="width:100%; height:600px;"></div>


</body>
</html>