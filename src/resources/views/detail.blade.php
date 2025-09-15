@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<div class="content">
    <form class="form" action="/products/{productId}/update" enctype="multipart/form-data" method="post">
        @method('PATCH')
        @csrf
        <div class="content__main">
            <input type="hidden" name="id" value="{{ $products['id'] }}">
            <div class="content__main--left">
                <div class="content-road">
                    <a class="content-road_link" href="/products">商品一覧</a><span class="content-road_current"> > {{ optional($products)->name }}</span>
                </div>
                <div class="content__main--img">
                    <img src="{{ asset('storage/' . optional($products)['image']) }}" width="374px" height="281px" alt="" />
                    <div class="content__main--img_input"><input type="file" name="image" ></div>
                    <div class="form__error">
                        @error('image')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="content__main--right">
                <div class="content__item--name">
                    <div class="content__item--title">商品名</div>
                    <input class="content__item--text" type="text" name="name" value="{{ optional($products)['name'] }}">
                    <div class="form__error">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="content__item--price">
                    <div class="content__item--title">値段</div>
                    <input class="content__item--text" type="text" name="price" value="{{ optional($products)['price'] }}">
                    <div class="form__error">
                        @error('price')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="content__item--season">
                    <div class="content__item--title">季節</div>
                    <input class="content__item--select" type="checkbox" id="spring" name="season_ids[]" value="1">
                    <label for="spring">春</label>
                    <input class="content__item--select" type="checkbox" id="summer" name="season_ids[]" value="2">
                    <label for="summer">夏</label>
                    <input class="content__item--select" type="checkbox" id="autumn" name="season_ids[]" value="3">
                    <label for="autumn">秋</label>
                    <input class="content__item--select" type="checkbox" id="winter" name="season_ids[]" value="4">
                    <label for="winter">冬</label>
                    <div class="form__error">
                        @error('season_id')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="content__description">
            <div class="content__description--title">商品説明</div>
            <textarea class="content__description--textarea" name="description" cols="30" rows="10">{{ optional($products)['description'] }}</textarea>
            <div class="form__error">
                @error('description')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="content__button">
            <a class="content__button--back" href="/products">戻る</a>
            <button class="content__button--submit" type="submit">変更を保存</button>
    </form>
            <form class="content__delete" action="/products/{productId}/delete" method="post">
                @method('DELETE')
                @csrf
                <button class="content__delete--button">
                    <input type="hidden" name="id" value="{{ $products['id'] }}">
                    <img class="content__delete--img" src="{{ asset('storage/kkrn_icon_gomibako_2.png') }}" alt="ゴミ箱">
                </button>
            </form>
        </div>
</div>
@endsection