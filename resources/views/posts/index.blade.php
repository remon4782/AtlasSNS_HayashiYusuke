@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>
<div class= "container">
  <img class="user-icon" src="images/icon1.png">
  {!! Form::open(['url' => 'post/create'])!!}
  {{Form::token()}}
  <div class="form-group">
    <form action="create.php" method="post" onsubmit="return check()" id="content">
    {!! Form::input('text','newPost',null,['required','class'=> 'form-control','placeholder' => '投稿内容を入力してください。']) !!}
  </div>
  <button type = "submit" class = "btn-success pull-right"><img src="images/post.png"></button>
  {!! Form::close()!!}
  <table class="table table-hover"><!--テーブルにマウスを乗せた後に背景変更するもの-->

  @foreach($list as $list)
  <tr><!--投稿表示-->
    <td>{{$list->user->username}}</td>
    <td>{{$list->post}}</td>
    <td>{{$list->created_at}}</td>
    <!--更新-->
    <td><a class ="js-modal-open" href="" post="{{$list->post}}" post_id="{{$list->id}}"><img class="Update" src="./images/edit.png" alt="編集"></a> </td>
    <!--削除-->
    <td><a class ="btn btn-primary" href="/post/{{$list->id}}/delete" onclick="return confirm('この投稿を削除してもよろしいでしょうか？')"><img class="Trash" src="./images/trash.png" alt="削除"></a></td>
  </tr>
  </form>
  @endforeach
  </table>

<!--モーダルの中身-->
<div class="modal js-modal">
  <div class="modal_bg js-modal-close"></div>
  <div class="modal_content">
    <form action="/post/update" method="post">
      <textarea name="upPost" class="modal_post"></textarea>
      <input type="hidden" name="post_id" class="modal_id" value="">
      <input type="submit" value="更新">
      {{csrf_field()}}
    </form>
    <a class="js-modal-close" href="">閉じる</a>
  </div>
</div>
</div>


@endsection
