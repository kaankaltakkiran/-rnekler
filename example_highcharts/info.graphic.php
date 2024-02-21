<?php
$schoolName = "Example School";
$totalTeachers = 10;
$totalStudents = 100;
?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
    This chart gives us a visual representation of the number of teachers and students in the <?php echo $schoolName; ?>.
    </p>
</figure>
<script>
    var schoolName = '<?php echo $schoolName; ?>';
    var totalTeachers = <?php echo $totalTeachers; ?>;
    var totalStudents = <?php echo $totalStudents; ?>;
  Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Number of Teachers and Students in '+schoolName,
        align: 'left'
    },
    subtitle: {
        text:
            'School Name: <p><?php echo $schoolName ?> </p>',
        align: 'left'
    },
    xAxis: {
        categories: [schoolName],
        crosshair: true,
        accessibility: {
            description: 'Countries'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total number of persons'
        }
    },
    tooltip: {
        valueSuffix: ' (Person)'
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        {
            name: 'Total Teachers',
                data: [totalTeachers]
        },
        {
            name: 'Total Students',
            data: [totalStudents]
        }
    ]
});
</script>
