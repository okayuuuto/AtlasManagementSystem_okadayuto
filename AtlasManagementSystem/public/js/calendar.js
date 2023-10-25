$(function () {
  $('.cancel-modal-open').on('click', function () {
    $('.js-modal').fadeIn();
    var reserveDate = $(this).attr('value');
    var reservePart = $(this).text();
    var settingReserve = $(this).attr('value');
    var settingPart = $(this).next().val();
    $('.modal-reserve-date').text(reserveDate);
    $('.modal-reserve-part').text(reservePart);

    $('#deleteParts').append('<input type="hidden" name="getPart[]" value="' + settingPart + '">');
    $('#deleteParts').append('<input type="hidden" name="getData[]" value="' + reserveDate + '">');

    return false;
  });
  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });

});
