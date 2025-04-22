<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WordbookService;
use App\Http\Requests\Wordbook\WordbookTestRequest;

class WordbookTestController extends Controller
{

    private WordbookService $service;

    public function __construct(WordbookService $service)
    {
        $this->service = $service;
    }

    public function show(WordbookTestRequest $request, $book)
    {
        try {
            $startId = (int) $request->input('start', 1);
            $endId = (int) $request->input('end', 300);
            $count = (int) $request->input('count', 50);

            $words = $this->service->fetchWords($book, $startId, $endId, $count);
            $bookName = $this->service->getBookName($book);
            $bookImagePath = $this->service->getBookImagePath($book);

            return view('wordbook.test', compact('words', 'book', 'bookName', 'bookImagePath'));
        } catch (\InvalidArgumentException $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
