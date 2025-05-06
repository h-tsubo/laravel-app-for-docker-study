@extends('layouts.base')

@section('sectiontitle', $bookName . 'テスト')

@section('content')
    <div class="container">
        <h2>{{ $bookName }} テスト</h2>
        <div class="text-center mb-4">
            <img src="{{ $bookImagePath }}" alt="{{ $bookName }}" style="width: 150px; height: 210px; object-fit: cover;">
        </div>
        <div class="alert alert-info p-3 mb-3">
            <strong>入力ルール:</strong>
            <ul class="mb-0">
                <li>Start IDは1以上</li>
                <li>End IDはStart IDより大きい必要があります</li>
                <li>Countは(Start ID～End ID)の範囲内で指定してください</li>
            </ul>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="d-flex align-items-center flex-wrap gap-3 mb-4">
            <button id="showAnswerButton" class="btn btn-warning">答えを表示する</button>

            <form action="{{ route('wordbook.generate-test', ['book' => $book]) }}" method="GET" class="d-flex align-items-center flex-wrap gap-2">
                <div class="d-flex align-items-center">
                    <label for="start" class="me-1 mb-0">範囲：</label>
                    <input type="number" name="start" id="start" value="{{ request('start', 1) }}" class="form-control form-control-sm" placeholder="Start ID" style="width: 100px;">
                    <span class="mx-2">〜</span>
                    <input type="number" name="end" id="end" value="{{ request('end', 300) }}" class="form-control form-control-sm" placeholder="End ID" style="width: 100px;">
                </div>

                <div class="d-flex align-items-center">
                    <label for="count" class="me-1 mb-0">単語数：</label>
                    <input type="number" name="count" id="count" value="{{ request('count', 50) }}" class="form-control form-control-sm" placeholder="Count" style="width: 80px;">
                </div>

                <button type="submit" class="btn btn-primary btn-sm">テスト生成</button>
            </form>
        </div>
        <div class="row">
            @if ($words)
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
            @else
                <div class="alert alert-warning">
                    テストを出力してください！
                </div>
            @endif
        </div>
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
