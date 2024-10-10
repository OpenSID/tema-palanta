<div style="padding: 15px;">
    <div style="display: flex; flex-wrap: wrap; justify-content: space-between;">
        <div id="chart_0_5" style="width: 30%;"></div>
        <div id="chart_6_11" style="width: 30%;"></div>
        <div id="chart_12_23" style="width: 30%;"></div>
    </div>
</div>



<script>
    $(document).ready(function() {
        <?php foreach ($chartStuntingUmurData as $item): ?>
            Highcharts.chart('<?= $item['id'] ?>', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: '<?= $item['title'] ?>'
                },
                tooltip: {
                    valueSuffix: '%'
                },
                plotOptions: {
                    series: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        colors: ['blue', 'red'],
                        showInLegend: true,
                    },
                    pie: {
                        dataLabels: {
                            enabled: true,
                            distance: -50,
                            format: '{point.y:,.1f} %'
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'percentage',
                    colorByPoint: true,
                    data: <?= json_encode($item['data']) ?>
                }]

            })

        <?php endforeach; ?>
    })
</script>