//$(function () {
//alert('hello world')
//});


$(function () {//アコーディオンメニュー
  $('.menu-btn').click(function () {
    $(this).toggleClass('is-open');
    $(this).next('.menu').toggleClass('is-open');
  });
});

//投稿機能編集機能
$(function () {
  //編集ボタンが押されたら開始
  $('.js-modal-open').on('click', function () {
    //$(this).toggleClass('is-open');テスト
    //モーダルの中身の表示
    $('.js-modal').fadeIn();//コンテンツの表示
    //押されたボタンから投稿内容を取得し変数へ格納
    var post = $(this).attr('post');
    //押されたボタンから投稿のIDを取得し変数へ格納
    var post_id = $(this).attr('post_id');
    //取得した投稿内容をモーダルの中身へ渡す
    $('.modal_post').text(post);
    //取得した投稿のIDをモーダルの中身へ渡す
    $('.modal_id').val(post_id);
    return false;
  });
  //背景部分のや閉じるぼたが押されたら開始
  $('.js-modal-close').on('click', function () {
    //モーダルの中身を非表示
    $('.js-modal').fadeOut();
    return false;
  });
});
