<?php

namespace App\Charts;

use App\Models\Jemaat;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class StatusJemaatChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $jemaatHidup = Jemaat::where('status_jemaat', 'Hidup')->count();
        $jemaatMeninggal = Jemaat::where('status_jemaat', 'Meninggal')->count();

        return $this->chart->pieChart()
            ->setTitle('Chart Status Jemaat')
            ->addData([$jemaatHidup, $jemaatMeninggal])
            ->setLabels(['Hidup', 'Meninggal'])
            ->setColors(['#1E90FF', '#FF69B4']);
    }
}
