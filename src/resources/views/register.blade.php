@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="content">
    <form class="form" action="/products" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" value="{{ $productId }}">
        <div class="content__title">商品登録</div>
        <div class="content__name">
            <div class="content__mini-title">商品名<span class="required">必須</span></div>
            <input class="content__input" type="text" name="name" placeholder="商品名を入力">
            <div class="form__error">
                @error('name')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="content__price">
            <div class="content__mini-title">値段<span class="required">必須</span></div>
            <input class="content__input" type="text" name="price" placeholder="値段を入力">
            <div class="form__error">
                @error('price')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="content__img">
            <div class="content__mini-title">商品画像<span class="required">必須</span></div>
            <input class="content__input--file" type="file" name="image">
            <div class="form__error">
                @error('image')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="content__season">
            <div class="content__mini-title">季節
                <span class="required">必須</span>
                <span class="remark">複数選択可</span>
            </div>
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
        <div class="content__description">
            <div class="content__mini-title">商品説明<span class="required">必須</span></div>
            <textarea class="content__description--textarea" name="description" cols="30" rows="10" placeholder="商品の説明を入力"></textarea>
            <div class="form__error">
                @error('description')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="content__button">
            <a class="content__button--back" href="/products">戻る</a>
            <button class="content__button--submit" type="submit">登録</button>
        </div>
    </form>
</div>
@endsection