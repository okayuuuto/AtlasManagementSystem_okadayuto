@extends('layouts.sidebar')

@section('content')
<div class="pt-5 pb-1" style="background:#ECF1F6;">
  <div class="w-75 border m-auto pt-5 pb-5" style="border-radius:10px; background:#FFF; box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);">
    <div class="m-auto" style="border-radius:5px;">

      <p class="text-center">{{ $calendar->getTitle() }}</p>
      <div class="m-auto" style="width:90%;">
        {!! $calendar->render() !!}
      </div>
    </div>
    <div class="adjust-table-btn text-right m-auto">
      <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts">
    </div>
  </div>
</div>
<!-- モーダル部分 -->
<div class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__content">
      <div class="w-100">
        <div class="w-50 m-auto">
        <p>予約日：<span class="modal-reserve-date"></span></p>
        <p>時間：<span class="modal-reserve-part"></span></p>
        <p>上記の予約をキャンセルしてもよろしいですか？</p>
        </div>
        <div class="w-50 m-auto edit-modal-btn d-flex">
          <a class="js-modal-close btn btn-primary d-inline-block" href="">閉じる</a>
          <input type="submit" class="btn btn-danger d-block" value="キャンセル" form="deleteParts">
          </form>
        </div>
      </div>
  </div>
</div>
@endsection
