<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class printerseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            \App\Models\Printer::create([
                'entrydate' => now(),
                'condition' => 'RECEIVING',
                'location' => null,
                'BOL' => 'BOL' . str_pad($i, 5, '0', STR_PAD_LEFT),
                'serial' => 'PRN' . str_pad($i, 5, '0', STR_PAD_LEFT),
                'slp' => 'SLP' . str_pad($i, 5, '0', STR_PAD_LEFT),
                'sku' => 'SKU' . str_pad($i, 5, '0', STR_PAD_LEFT),
            ]);
        }
    }
}
