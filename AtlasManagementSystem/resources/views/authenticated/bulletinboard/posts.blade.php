@extends('layouts.sidebar')

@section('content')
<div class="board_area w-100 m-auto d-flex">
  <div class="post_view w-75 mt-5">
    @foreach($posts as $post)
    <div class="post_area border w-75 m-auto p-3">
      <p style="color: #999; font-weight: bold; font-size:15px;"><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
      <p ><a href="{{ route('post.detail', ['id' => $post->id]) }}" style="color: #000; font-weight:bold;">{{ $post->post_title }}</a></p>
      <div class="post_bottom_area d-flex">
        <div class="d-flex post_status w-100 justify-content-between">
          <div class="d-flex">
            <div class="mr-auto">
              @foreach($post->subCategories as $subCategory)
              <span class="category_btn">{{ $subCategory->sub_category }}</span>
              @endforeach
            </div>
          </div>
          <div class="ml-auto">
              <i class="fa fa-comment"></i><span class="ml-2">{{ $post->commentCounts($post->id)->count() }}</span>
          </div>
          <div class="d-flex ml-5">
            @if(Auth::user()->is_Like($post->id))
            <p class="m-0"><i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }} ml-2">{{ $post->likes()->count() }}</span></p>
            @else
            <p class="m-0"><i class="fas fa-heart like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }} ml-2">{{ $post->likes()->count() }}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="other_area w-25 mt-4">
    <div class="m-4">
      <div class="post_create_btn"><a href="{{ route('post.input') }} ">投稿</a></div>
      <div class="keyword_form_container">
        <input type="text" placeholder="キーワードを検索" name="keyword" form="postSearchRequest">
        <input type="submit" value="検索" form="postSearchRequest">
      </div>
      <div class="filter_btn">
        <input type="submit" name="like_posts" class="category_btn mr-1" value="いいねした投稿" form="postSearchRequest" style="background-color:#FF82B2">
        <input type="submit" name="my_posts" class="category_btn" value="自分の投稿" form="postSearchRequest" style="background-color:#FFCC66">
      </div>
      <div class="category_search_area">
        <p>カテゴリー検索</p>
        <dl>
          @foreach($categories as $category)
          <dt class="main_categories_name js_accordion_category" category_id="{{ $category->id }}"><span>{{ $category->main_category }}<span></dt>
            @foreach($category->subCategories as $sub_category)
            <dd class="categories_accordion">
            <form action="{{ route('post.show', ['sub_category_id' => $sub_category->id]) }}" method="get" id="postSearchRequest_{{ $sub_category->id }}">
              {{ csrf_field() }}
              <input type="hidden" name="sub_category_id" value="{{ $sub_category->id }}">
              <input type="submit" name="sub_category_posts" class="sub_categories_name" value="{{ $sub_category->sub_category }}">
            </form>
            </dd>
            @endforeach
          @endforeach
        </dl>
      </div>
    </div>
  </div>
  <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
</div>
@endsection
