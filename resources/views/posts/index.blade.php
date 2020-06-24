@extends('layouts.app')

@section('content')
<div class="card-body">
    <div class="container">
        <div class="row">
            <h5 class="card-title">検索フォーム</h5>
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <form action="{{ route('posts.search') }}" method="POST">
                        @csrf
                        <input type="text" class="  search-query form-control" placeholder="Search" name="search">
                        <span class="input-group-btn" style="position: relative; top: -37px; right: -173px;">
                            <button class="btn btn-danger" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
              <h1>新着勉強なかま募集</h1>
              <a href="{{ route('posts.create') }}" class="btn btn-primary">新規投稿</a>
              <div class="card text-center">
                  <div class="card-header">
                    Blogs
                  </div>
                  @foreach($posts as $post)
                  <div class="card-body">
                    <h5 class="card-title">タイトル:{{ $post->title }}</h5>
                    <p class="card-text">内容:{{ $post->body }}<p>
                    <p class="card-text">投稿者:{{ $post->user->name }}</p>
                    <a href="{{route('posts.show', $post->id) }}" class="btn btn-primary">詳細へ</a>
                    <div class="row justify-content-center">
                        @if($post->users()->where('user_id', Auth::id())->exists())
                        <div class="col-md-3">
                            <form action="{{ route('unfavorites', $post) }}" method="POST">
                            @csrf
                                <input type="submit" value="&#xf164;いいね取り消す" class="fas btn btn-danger">
                            </form>
                        </div>
                        @else
                        <div class="col-md-3">
                            <form action="{{ route('favorites', $post) }}" method="POST">
                            @csrf
                                <input type="submit" value="&#xf164;いいね" class="fas btn btn-success">
                            </form>
                        </div>
                        @endif
                    </div>
                    <div class="row justify-content-center">
                        <p>いいね数：{{ $post->users()->count() }}</p>
                    </div>
                  </div>
                  <div class="card-footer text-muted">
                    投稿日:{{ $post->created_at }}
                  </div>
                  @endforeach
                </div>
        </div>
    </div>
</div>
@endsection
