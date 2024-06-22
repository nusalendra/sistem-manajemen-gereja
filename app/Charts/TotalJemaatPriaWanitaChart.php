<?php

namespace App\Charts;

use App\Models\Jemaat;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TotalJemaatPriaWanitaChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $jemaatPria = Jemaat::where('jenis_kelamin', 'Pria')->count();
        $jemaatWanita = Jemaat::where('jenis_kelamin', 'Wanita')->count();

        return $this->chart->pieChart()
            ->setTitle('Total Jemaat Pria & Wanita')
            ->addData([$jemaatPria, $jemaatWanita])
            ->setLabels(['Pria', 'Wanita'])
            ->setColors(['#FF6347', '#FFA500']);
    }
}
