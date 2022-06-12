<?php

use dosamigos\chartjs\ChartJs;
$this->title = "Recap Terapia";

?>

<div class="class">

<div class="row">

<div class="col-6">

<?= ChartJs::widget([
    'type' => 'pie',
    'options' => [
        'height' => 200,
        'width' => 400
    ],
    'data' => [
        'labels' => [
            'Red',
            'Blue',
            'Yellow'
          ],
        'datasets' => [
            [
                'labels' => "My Second Dataset",
                'backgroundColor' => [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                  ],
                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                'data' => [28, 48, 40, 19, 96, 27, 100]
            ]
        ]
    ]
]);
?>

</div>

<div class="col-6">

<?= ChartJs::widget([
    'type' => 'pie',
    'options' => [
        'height' => 200,
        'width' => 400
    ],
    'data' => [
        'labels' => [
            'Red',
            'Blue',
            'Yellow'
          ],
        'datasets' => [
            [
                'label' => "My Second dataset",
                'backgroundColor' => [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                  ],
                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                'data' => [28, 48, 40, 19, 96, 27, 100]
            ]
        ]
    ]
]);
?>

</div>

</div>

</div>