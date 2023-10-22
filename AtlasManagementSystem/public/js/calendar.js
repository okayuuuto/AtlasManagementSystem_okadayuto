$(function () {
  $('.cancel-modal-open').on('click', function () {
    $('.js-modal').fadeIn();
    var reserveDate = $(this).attr('value');
    var reservePart = $(this).text();
    $('.modal-reserve-date').text(reserveDate);
    $('.modal-reserve-part').text(reservePart);
    return false;
  });
  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });

});
