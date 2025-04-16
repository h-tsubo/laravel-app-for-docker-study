<?php

namespace Database\Seeders;

use App\Models\SokutanJokyu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class SokutanJokyuSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('seeders/data/sokutan_jokyus.csv');
        $csv = array_map('str_getcsv', file($path));
        foreach ($csv as $index => $row) {
            if ($index === 0) continue; // ヘッダーをスキップ

            SokutanJokyu::create([
                'word' => $row[1],
                'meaning' => $row[2],
            ]);
        }
    }
}
