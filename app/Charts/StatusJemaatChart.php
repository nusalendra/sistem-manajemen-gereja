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

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        
    $jemaatHidup = Jemaat::where('status_jemaat', 'Hidup')->count();
    $jemaatMeninggal = Jemaat::where('status_jemaat', 'Meninggal')->count();

    return $this->chart->barChart()
        ->setTitle('Chart Status Jemaat')
        ->addData('Hidup', [$jemaatHidup])
        ->addData('Meninggal', [$jemaatMeninggal])
        ->setXAxis(['Jemaat'])
        ->setColors(['#32CD32', '#800080']);
    }
}
