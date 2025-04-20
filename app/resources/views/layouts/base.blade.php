<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'ページタイトル' }}</title>
    @vite('resources/js/app.js')
</head>
<body style="margin: 0; display: flex; flex-direction: column; min-height: 100vh; background-color: #1e1e2f; color: #f0f0f0;">

    @include('components.head')

    <div style="display: flex; flex-grow: 1;">
        @include('components.sidemenu')

        <main style="flex-grow: 1; padding: 20px;">
            @yield('content')
        </main>
    </div>

</body>
</html>
