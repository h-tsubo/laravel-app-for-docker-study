<?php

namespace Database\Seeders;

use App\Models\Target1900;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class Target1900Seeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('seeders/data/target1900s.csv');
        $csv = array_map('str_getcsv', file($path));
        foreach ($csv as $index => $row) {
            if ($index === 0) continue; // ヘッダーをスキップ

            Target1900::create([
                'word' => $row[1],
                'meaning' => $row[2],
            ]);
        }
    }
}
