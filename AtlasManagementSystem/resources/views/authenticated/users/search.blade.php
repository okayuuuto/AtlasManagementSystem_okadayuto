@extends('layouts.sidebar')

@section('content')
<!-- <p>ユーザー検索</p> -->
<div class="search_content w-100 d-flex">
  <div class="reserve_users_area">
    @foreach($users as $user)
    <div class="border one_person">
      <div>
        <span>ID : </span><span>{{ $user->id }}</span>
      </div>
      <div><span>名前 : </span>
        <a href="{{ route('user.profile', ['id' => $user->id]) }}">
          <span>{{ $user->over_name }}</span>
          <span>{{ $user->under_name }}</span>
        </a>
      </div>
      <div>
        <span>カナ : </span>
        <span>({{ $user->over_name_kana }}</span>
        <span>{{ $user->under_name_kana }})</span>
      </div>
      <div>
        @if($user->sex == 1)
        <span>性別 : </span><span>男</span>
        @else
        <span>性別 : </span><span>女</span>
        @endif
      </div>
      <div>
        <span>生年月日 : </span><span>{{ $user->birth_day }}</span>
      </div>
      <div>
        @if($user->role == 1)
        <span>役職 : </span><span>教師(国語)</span>
        @elseif($user->role == 2)
        <span>役職 : </span><span>教師(数学)</span>
        @elseif($user->role == 3)
        <span>役職 : </span><span>講師(英語)</span>
        @else
        <span>役職 : </span><span>生徒</span>
        @endif
      </div>
      <div>
        @if($user->role == 4)
        <span>選択科目 :</span>
        @foreach($user->subjects as $subject)
        <span>{{ $subject->subject }}</span>
        @endforeach
        @endif
      </div>
    </div>
    @endforeach
  </div>
  <div class="search_area w-25 mt-5">
    <div class="">
      <h5>検索</h5>
      <div>
        <input type="text" class="free_word" name="keyword" placeholder="キーワードを検索" form="userSearchRequest">
      </div>
      <div class="search_select_box">
        <label>カテゴリ</label>
        <select form="userSearchRequest" name="category">
          <option value="name">名前</option>
          <option value="id">社員ID</option>
        </select>
      </div>
      <div class="search_select_box">
        <label>並び替え</label>
        <select name="updown" form="userSearchRequest">
          <option value="ASC">昇順</option>
          <option value="DESC">降順</option>
        </select>
      </div>
      <div class="add_search_area">
        <p class="mt-4 search_conditions">検索条件の追加</p>
        <div class="search_conditions_inner">
          <div>
            <label>性別</label>
            <div class="mb-2">
            <span>男</span><input type="radio" name="sex" value="1" form="userSearchRequest" class="mr-2">
            <span>女</span><input type="radio" name="sex" value="2" form="userSearchRequest">
            </div>
          </div>
          <div>
            <label>権限</label>
            <div class="mb-2 role_select_box">
            <select name="role" form="userSearchRequest" class="engineer">
              <option selected disabled>----</option>
              <option value="1">教師(国語)</option>
              <option value="2">教師(数学)</option>
              <option value="3">教師(英語)</option>
              <option value="4" class="">生徒</option>
            </select>
            </div>
          </div>
          <div class="selected_engineer">
            <label>選択科目</label>
            <div>
            <span>国語<input type="checkbox" name="subject[]" value="1" form="userSearchRequest" class="mr-2"></span>
            <span>数学<input type="checkbox" name="subject[]" value="2" form="userSearchRequest" class="mr-2"></span>
            <span>英語<input type="checkbox" name="subject[]" value="3" form="userSearchRequest"></span>
            </div>
          </div>
        </div>
      </div>
      <div>
        <input type="submit" name="search_btn" value="検索" form="userSearchRequest" class="user_search_btn">
      </div>
      <div class="reset_area">
        <input type="reset" value="リセット" form="userSearchRequest" class="search_reset_btn">
      </div>
    </div>
    <form action="{{ route('user.show') }}" method="get" id="userSearchRequest"></form>
  </div>
</div>
@endsection
