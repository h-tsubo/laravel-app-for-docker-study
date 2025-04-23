<aside style="width: 220px; background-color: #262636; padding: 20px; min-height: 100vh;">
    <h2 style="color: #e3342f; font-size: 20px; margin-bottom: 20px;">英単語帳</h2>
    <ul style="list-style: none; padding: 0;">
        <li style="margin-bottom: 10px;">
            <a href="{{ route('wordbook.test', ['book' => 'system-eitango']) }}" style="color: #f0f0f0; text-decoration: none;">システム英単語</a>
        </li>
        <li style="margin-bottom: 10px;">
            <a href="{{ route('wordbook.test', ['book' => 'system-eitango-basic']) }}" style="color: #f0f0f0; text-decoration: none;">システム英単語Basic</a>
        </li>
        <li style="margin-bottom: 10px;">
            <a href="{{ route('wordbook.test', ['book' => 'target1900']) }}" style="color: #f0f0f0; text-decoration: none;">Target1900</a>
        </li>
        <li style="margin-bottom: 10px;">
            <a href="{{ route('wordbook.test', ['book' => 'sokutan-jokyu']) }}" style="color: #f0f0f0; text-decoration: none;">速読英単語上級編</a>
        </li>
        <li style="margin-bottom: 10px;">
            <a href="{{ route('wordbook.test-history') }}" style="color: #f0f0f0; text-decoration: none;">テスト履歴</a>
        </li>
    </ul>
</aside>