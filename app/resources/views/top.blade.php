@extends('layouts.base')

@section('sectiontitle', '英単語テスト Generator ! TOP')

@section('content')
    <style>
        .wordbook-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .wordbook-link {
            text-decoration: none;
        }

        .wordbook-card {
            width: 180px;
            height: 260px;
            border: 2px solid #ccc;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            background-color: #f8f9fa;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }

        .wordbook-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .wordbook-image {
            width: 100px;
            height: 140px;
            object-fit: cover;
            margin-bottom: 10px;
            border-radius: 8px;
        }

        .wordbook-card h4 {
            min-height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
            word-break: break-word;
            font-size: 1rem;
            line-height: 1.2;
        }
    </style>

    <div class="container my-4">
        <div class="wordbook-container">
            <a href="/eitango" class="wordbook-link">
                <div class="wordbook-card">
                    <h4 class="text-dark">システム英単語</h4>
                    <img src="/images/system-eitango.jpg" alt="システム英単語" class="wordbook-image">
                </div>
            </a>
            <a href="/eitango-basic" class="wordbook-link">
                <div class="wordbook-card">
                    <h4 class="text-dark">システム英単語Basic</h4>
                    <img src="/images/system-eitango-basic.jpg" alt="システム英単語Basic" class="wordbook-image">
                </div>
            </a>
            <a href="/target1900" class="wordbook-link">
                <div class="wordbook-card">
                    <h4 class="text-dark">Target1900</h4>
                    <img src="/images/target1900.jpg" alt="Target1900" class="wordbook-image">
                </div>
            </a>
            <a href="/sokudoku-advanced" class="wordbook-link">
                <div class="wordbook-card">
                    <h4 class="text-dark">速読英単語上級編</h4>
                    <img src="/images/sokutan-jokyu.jpg" alt="速読英単語上級編" class="wordbook-image">
                </div>
            </a>
        </div>
    </div>
@endsection


