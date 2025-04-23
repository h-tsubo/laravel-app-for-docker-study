@extends('layouts.base')

@section('sectiontitle', 'テスト履歴 (' . $bookName . ')')

@section('content')
    <div class="container">
        <h2>{{ $bookName }} テスト履歴</h2>
        <div class="text-center mb-4">
            <img src="{{ $bookImagePath }}" alt="{{ $bookName }}" style="width: 150px; height: 210px; object-fit: cover;">
        </div>

        @if ($test)
            <div class="alert alert-info p-3 mb-3">
                <ul class="mb-0">
                    <li>範囲: {{ $test->start_id }} 〜 {{ $test->end_id }}</li>
                    <li>単語数: {{ $test->count }}</li>
                    <li>作成日: {{ \Carbon\Carbon::parse($test->created_at)->format('Y/m/d H:i') }}</li>
                </ul>
            </div>

            <div class="text-center mt-4">
                <button id="showAnswerButton" class="btn btn-warning">答えを表示する</button>
            </div>
            {{ $olderId }}
            <div class="d-flex justify-content-between align-items-center mb-4">
                @if ($newerId)
                    <a href="{{ route('wordbook.test-history', [$newerId]) }}" class="btn btn-outline-primary">◀︎ 次のテスト</a>
                @else
                    <span></span>
                @endif

                @if ($olderId)
                    <a href="{{ route('wordbook.test-history', [$olderId]) }}" class="btn btn-outline-primary">前のテスト ▶︎</a>
                @endif
            </div>

            <div class="row">
                <!-- 左側：問題 -->
                <div class="col-md-6">
                    <h4>問題</h4>
                    <ul id="wordList" style="list-style: none; padding-left: 1.5em;">
                        @foreach ($words as $index => $word)
                            <li>
                                ({{ $index + 1 }}) {{ $word->word }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- 右側：答え（最初は隠す） -->
                <div class="col-md-6" id="answerSection" style="display: none;">
                    <h4>答え</h4>
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">単語</th>
                                <th scope="col">意味</th>
                                <th scope="col">ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($words as $index => $word)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $word->word }}</td>
                                    <td>{{ $word->meaning }}</td>
                                    <td>{{ $word->id }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>  
        @else
            <div class="alert alert-warning">
                テストデータが見つかりませんでした。
            </div>
        @endif
    </div>
    <script>
    document.getElementById('showAnswerButton').addEventListener('click', function () {
        const answerSection = document.getElementById('answerSection');
        if (answerSection.style.display === 'none' || answerSection.style.display === '') {
            if (confirm('本当に答えを表示させますか？')) {
                answerSection.style.display = 'block';
                this.textContent = '答えを隠す';
                this.classList.remove('btn-warning');
                this.classList.add('btn-secondary');
            }
        } else {
            answerSection.style.display = 'none';
            this.textContent = '答えを表示する';
            this.classList.remove('btn-secondary');
            this.classList.add('btn-warning');
        }
    });
    </script>  
@endsection
