@extends('layouts.login')

@section('content')

{!! Form::open(['url'=>'/search','class'=>'post-form'])!!}
{{Form::input('text','searchword',null,['required','class'=>'search','placeholder'=>'ユーザー名'])}}
<button type="submit"><img src="images/search.png" width="100" height="100"></button>
@if(!empty($searchword))
<div class="search-word">
    検索ワード:{{$searchword}}
</div>
@endif
{!!Form::close()!!}

<!--保存されているユーザーの一覧-->
<div>
    <tr>
        <td>
            <img src="storage//{{$user ->images}}" alt="icon" class="icon-space">
        </td>

        <td>{{$user -> username}}</td>
        <td>
            @if(Auth::user()->isFollowing($user->id))
            <form action="{{route('unfollow',['id'=>$user->id])}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">ファロー解除</button>
            </form>
            @else
            <form action="{{ route('follow',['id'=>$user->id])}}" method="POST">
                <button type="submit" class="btn btn-prinary">フォロー</button>
            </form>
            @endif
        </td>
    </tr>
</div>

<!--検索ワードを表示-->
@if(!empty($keyword))
<p>検索ワード:{{$keyword}}</p>
@endif
@foreach($users as $user)

<!--保存されているレコードを一覧表示-->
<div class="container-list">
    <table class='table table-hover'>
        @foreach ($users as $users)
        <!--自分以外のユーザーを表示-->
@if(!($user->username==$user->username))
<tr>
    <td>(($user->username))</td>
    <td><img src="{{$user->images}}" alt="ユーザーアイコン"></td>
</tr>
@endif
@endforeach
    </table>

</div>


@endsection
