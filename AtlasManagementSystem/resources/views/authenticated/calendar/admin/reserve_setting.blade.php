@extends('layouts.sidebar')
@section('content')
<di class="w-100 pt-5 d-flex" style="align-items:center; justify-content:center;">
  <div class="w-75 m-auto pt-5 border" style="background:#FFF;border-radius:10px; box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);">
    <p class="text-center">{{ $calendar->getTitle() }}</p>
    {!! $calendar->render() !!}
    <div class="adjust-table-btn m-auto text-right">
      <input type="submit" class="btn btn-primary mt-4" value="登録" form="reserveSetting" onclick="return confirm('登録してよろしいですか？')">
    </div>
  </div>
</div>
@endsection
