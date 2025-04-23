<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Services\WordbookService;

class WordbookTestHistoryController extends Controller
{

    private WordbookService $service;

    public function __construct(WordbookService $service)
    {
        $this->service = $service;
    }

    public function show(?int $id = null)
    {
        $query = DB::table('wordbook_test_histories')->orderByDesc('created_at');

        $test = $id ? $query->where('id', $id)->firstOrFail() : $query->first();

        $newerId = null;
        $olderId = null;
        $bookName = null;
        $bookImagePath = null;
        $words = null;

        if ($test) {
            $newerId = DB::table('wordbook_test_histories')
                ->where('id', '>', $test->id)
                ->orderBy('id')
                ->first()
                ->id ?? null;

            $olderId = DB::table('wordbook_test_histories')
                ->where('id', '<', $test->id)
                ->orderByDEsc('id')
                ->first()
                ->id ?? null;

            $bookName = $this->service->getBookName($test->book);
            $bookImagePath = $this->service->getBookImagePath($test->book);
            $words = json_decode($test->test_data);
        }

        return view('wordbook.test-history', compact('bookName', 'bookImagePath', 'test', 'words', 'newerId', 'olderId'));
    }
}
