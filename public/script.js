$(function () {//アコーディオンメニュー
  $('.menu-btn').click(function () {
    $(this).toggleClass('is-open');
    $(this).next('.menu').toggleClass('is-open');
  })
})
