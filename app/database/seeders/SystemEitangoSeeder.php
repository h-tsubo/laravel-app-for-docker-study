<?php

namespace Database\Seeders;

use App\Models\SystemEitango;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class SystemEitangoSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('seeders/data/system_eitangos.csv');
        $csv = array_map('str_getcsv', file($path));
        foreach ($csv as $index => $row) {
            if ($index === 0) continue; // ヘッダーをスキップ

            SystemEitango::create([
                'word' => $row[1],
                'meaning' => $row[2],
            ]);
        }
    }
}
