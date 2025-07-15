@extends('layouts.app')

@section('content')
    @include('partials._hero')
    @include('partials._features')

    {{-- ▼▼▼ ここからが変更箇所 ▼▼▼ --}}

    {{-- スティッキースクロールのためのラッパー要素 --}}
    <div id="sticky-wrapper">
        {{-- sliderを先に読み込む --}}
        @include('partials._slider')
        {{-- cultivationを次に読み込む --}}
        @include('partials._cultivation')
    </div>

    {{-- ▲▲▲ ここまでが変更箇所 ▲▲▲ --}}

    @include('partials._company_profile')
    @include('partials._contact')
    {{-- sliderの呼び出しはラッパー内に移動したので、元の場所からは削除 --}}
@endsection