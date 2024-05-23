<?php

namespace App\Charts;

use App\Models\Jemaat;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class JemaatChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
{

    $jemaatPria = Jemaat::where('jenis_kelamin', 'Pria')->count();
    $jemaatWanita = Jemaat::where('jenis_kelamin', 'Wanita')->count();

    return $this->chart->barChart()
        ->setTitle('Total Jemaat Pria & Wanita')
        ->addData('Pria', [$jemaatPria])
        ->addData('Wanita', [$jemaatWanita])
        ->setXAxis(['Jemaat'])
        ->setColors(['#FF6347', '#FFA500']);
}
}
