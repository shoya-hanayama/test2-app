@extends('layouts.app')

@section('body_class', 'full-screen')
{{-- フッターは表示させるため、hide_footerは定義しません --}}

{{-- 【修正点】アニメーション固有のスタイルを _intro_animation.blade.php に移動しました --}}
@section('content')
    {{-- ウェブサイトの全セクションを囲むラッパー --}}
    <div id="page-content-wrapper">
        @include('partials._hero')
        @include('partials._features')
        @include('partials._slider')
        @include('partials._cultivation')
    </div>
@endsection