@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="content__header">
        @if(\Request::is('products'))
        <span class="header-title">商品一覧</span>
        @else
        <span class="header-title">"{{ $keyword }}"の商品一覧</span>
        @endif
        <a class="header-register_button" href="/products/register">+ 商品を追加</a>
    </div>
    <div class="content__main">
        <div class="content__main--side">
            <form class="form" action="/products/search" method="get">
                @csrf
                <div class="form__search">
                    <input class="form__search-input" type="text" name="keyword" value="{{ old('keyword') }}" placeholder="商品名で検索">
                </div>
                <button class="form__button-submit" type="submit">検索</button>
            </form>
            <div class="sort">
                <div class="sort-title">価格順で表示</div>
                <select class="sort-select" name="sort">
                    <option value="" selected disabled hidden >価格で並び替え</option>
                    <option class="sort-select_menu" value="高い順で表示">高い順で表示</option>
                    <option class="sort-select_menu" value="低い順で表示">低い順で表示</option>
                </select>
            </div>
        </div>
        <div class="content__main--center">
            @foreach ($products as $product)
            <a href="{{ '/products/'.$product->id }}" class="card">
                <div class="card__img">
                    <img src="{{ asset('storage/' . $product['image']) }}" width="374px" height="281px" alt="" />
                </div>
                <div class="card__content">
                    <div class="card__content-tag">
                        <p class="card__content-tag-item">{{ $product['name'] }}</p>
                        <p class="card__content-tag-item card__content-tag-item--last">
                            ¥{{ $product['price'] }}
                        </p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <div class="content__list">
        {{ $products->appends(request()->query())->links() }}
    </div>
</div>
@endsection

