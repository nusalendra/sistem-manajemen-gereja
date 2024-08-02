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

  public function build(): \ArielMejiaDev\LarapexCharts\BarChart
  {
    // Mengelompokkan umur jemaat ke dalam rentang tertentu dengan deskripsi
    $umurRanges = [
      'Anak-anak (7-15)' => [7, 15],
      'Remaja (16-22)' => [16, 22],
      'Dewasa (23-40)' => [23, 40],
      'Lanjut Usia (> 41)' => [41, 100], // Ubah rentang yang benar untuk 41-lanjut
    ];

    $jumlahJemaat = [];
    foreach ($umurRanges as $range => $values) {
      $count = Jemaat::whereBetween('umur', $values)->count();
      $jumlahJemaat[$range] = $count;
    }

    $labels = array_keys($jumlahJemaat);
    $data = array_values($jumlahJemaat);

    return $this->chart
      ->barChart()
      ->setTitle('Jumlah Jemaat berdasarkan Umur')
      ->setSubtitle('Statistik Umur Jemaat')
      ->addData('Jumlah Jemaat', $data)
      ->setColors(['#FF6384', '#FFCD56'])
      ->setXAxis($labels);
  }
}
