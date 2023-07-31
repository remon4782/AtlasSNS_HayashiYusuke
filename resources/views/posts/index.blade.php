@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>
<div class= "container">
  {!! Form::open(['url' => 'post/create'])!!}
  {{Form::token()}}
  <div class="form-group">
    {!! Form::input('text','newPost',null,['required','class'=> 'form-control','placeholder' => '投稿内容を入力してください。']) !!}
  </div>
  <button type = "submit" class =  "btn-success pull-right">投稿</button>
  {!! Form::close()!!}
</div>

@endsection
