<div class="container">
    <h5 class="mt-5">Selamat datang admin marketplace</h5>
    <p class="lead">
        Melaluli panel ini anda dapat mengelola kategori produk dan transaksi yang terjadi di marketplace
    </p>


    <div id="grafik-member-distrik"></div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    Highcharts.chart('grafik-member-distrik', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'jumlah member bedasarkan distrik'
    },
    tooltip: {
        valueSuffix: 'orang'
    },

    plotOptions: {
        series: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: [{
                enabled: true,
                distance: 20
            }, {
                enabled: true,
                distance: -40,
                format: '{point.percentage:.1f}%',
                style: {
                    fontSize: '1.2em',
                    textOutline: 'none',
                    opacity: 0.7
                },
                filter: {
                    operator: '>',
                    property: 'percentage',
                    value: 10
                }
            }]
        }
    },
    series: [
        {
            name: 'jumlah',
            colorByPoint: true,
            data: [
                <?php  foreach ($jumlah_member_distrik as $key => $value): ?>
                {
                    name: '<?php echo $value['nama_distrik_member']?>',
                    y: <?php echo $value['jumlah'] ?>
                },
               <?php endforeach ?>
            ]
        }
    ]
});

</script>