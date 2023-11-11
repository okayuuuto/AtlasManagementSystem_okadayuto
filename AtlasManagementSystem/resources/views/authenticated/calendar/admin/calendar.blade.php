@extends('layouts.sidebar')

@section('content')
<div class="w-100 m-auto pt-5 pb-3">
  <div class="w-75 border m-auto pt-5" style="border-radius:10px; background:#FFF; box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);">
    <p class="text-center">{{ $calendar->getTitle() }}</p>
    <div class="m-auto" style="width:90%;">
    <p>{!! $calendar->render() !!}</p>
    </div>
  </div>
</div>
@endsection
