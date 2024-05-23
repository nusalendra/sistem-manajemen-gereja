<?php

namespace App\Charts;

use App\Models\Jemaat;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class UmurJemaatChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $umurJemaat = Jemaat::select('umur')
                            ->groupBy('umur')
                            ->orderBy('umur')
                            ->get()
                            ->pluck('umur');

        $jumlahJemaat = [];
        foreach ($umurJemaat as $umur) {
            $count = Jemaat::where('umur', $umur)->count();
            $jumlahJemaat[] = $count;
        }

        $labels = $umurJemaat->map(function ($umur) {
            return $umur . ' Tahun';
        })->toArray();
        $data = $jumlahJemaat;

        return $this->chart->lineChart()
            ->setTitle('Jumlah Jemaat berdasarkan Umur')
            ->setSubtitle('Statistik Umur Jemaat')
            ->addData('Jumlah Jemaat', $data)
            ->setXAxis($labels);
    }

}
