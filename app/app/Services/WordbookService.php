<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpKernel\Exception\HttpException;

class WordbookService
{
    private array $names = [
        'system-eitango' => 'システム英単語',
        'system-eitango-basic' => 'システム英単語Basic',
        'target1900' => 'Target1900',
        'sokutan-jokyu' => '速読英単語上級編',
    ];

    private array $bookImages = [
        'system-eitango' => 'system-eitango.jpg',
        'system-eitango-basic' => 'system-eitango-basic.jpg',
        'target1900' => 'target1900.jpg',
        'sokutan-jokyu' => 'sokudoku-advanced.jpg',
    ];

    /**
     * ランダムに英単語データを取得
     */
    public function fetchWords(string $book, int $startId = 1, int $endId = 300, int $count = 50)
    {
        $table = match ($book) {
            'system-eitango' => 'system_eitangos',
            'system-eitango-basic' => 'system_eitango_basics',
            'target1900' => 'target1900s',
            'sokutan-jokyu' => 'sokudoku_advanced_words',
            default => throw new HttpException(404, '対称の英単語帳が存在しません。'),
        };

        $maxId = DB::table($table)->max('id');

        if ($endId > $maxId) {
            throw new \InvalidArgumentException('終了IDが最大IDを超えています。');
        }

        return DB::table($table)
            ->whereBetween('id', [$startId, $endId])
            ->inRandomOrder()
            ->limit($count)
            ->get();
    }

    /**
     * 英単語帳の日本語名を取得
     */
    public function getBookName(string $book): string
    {
        if (!array_key_exists($book, $this->names)) {
            throw new HttpException(404, '対称の英単語帳が存在しません。');
        }

        return $this->names[$book];
    }

    /**
     * 英単語帳の画像パスを取得
     */
    public function getBookImagePath(string $book): string
    {
            $fileName = $this->bookImages[$book] ?? 'default.jpg';
            return asset('images/' . $fileName);
    }
}
