<?php

namespace Database\Seeders;

use App\Models\SystemEitangoBasic;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class SystemEitangoBasicSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('seeders/data/system_eitango_basics.csv');
        $csv = array_map('str_getcsv', file($path));
        foreach ($csv as $index => $row) {
            if ($index === 0) continue; // ヘッダーをスキップ

            SystemEitangoBasic::create([
                'word' => $row[1],
                'meaning' => $row[2],
            ]);
        }
    }
}
