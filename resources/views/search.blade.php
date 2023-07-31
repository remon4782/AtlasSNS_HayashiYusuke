@extends('layouts.login')

@section('content')
<form method="GET" action="{{ route('users.index') }}">
    <input type="search" placeholder="ユーザー名" name="search" value="@if (isset($search)) {{ $search }} @endif">
    <div>
        <button type="submit">検索</button>
        <button>
            <a href="{{ route('users.index') }}" class="text-white">
                クリア
            </a>
        </button>
    </div>
</form>


@endsection
