@extends('layouts.login')

@section('content')
<div>
  <div>{{$user->username}}</div>
  <button>フォローする</button>
</div>
@endsection
