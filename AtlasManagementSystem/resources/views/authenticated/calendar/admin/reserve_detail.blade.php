@extends('layouts.sidebar')

@section('content')
<div class="vh-100 d-flex" style="align-items:center; justify-content:center;">
  <div class="w-75 m-auto h-75">
    <p><span>{{ date('Y年m月d日', strtotime($date)) }}</span><span class="ml-3">{{ $part }}部</span></p>
    <div class="h-75 border p-2" style="border-radius:10px; background:#FFF; box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);">
      <table class="reserve_detail_table w-100">
        <tr class="text-center" style="background:#03AAD2; color:#FFF;">
          <th class="w-25">ID</th>
          <th class="w-25">名前</th>
          <th class="w-50">場所</th>
        </tr>
        @foreach($reservePersons as $reservePerson)
        @foreach($reservePerson->users as $user)
        <tr class="text-center">
          <td class="w-25 p-2">{{ $user->id }}</td>
          <td class="w-25 p-2">{{ $user->over_name . $user->under_name }}</td>
          <td class="w-25 p-2">リモート</td>
        </tr>
        @endforeach
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection
