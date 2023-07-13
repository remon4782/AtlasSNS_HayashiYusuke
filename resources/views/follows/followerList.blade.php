@extends('layouts.login')

@section('content')
<div>
  @foreach ($timelines as $timelines)
  {{ $timelines->user_id }}
  {{ $timelines->post }}
  <div>{{$user->username}}</div>
  <button>フォローする</button>
</div>

@endsection
