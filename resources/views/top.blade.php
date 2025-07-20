@extends('layouts.app')

@section('body_class', 'full-screen')

@section('content')
    @include('partials._hero')
    @include('partials._features')

    {{-- ▼▼▼ ここからが変更箇所 ▼▼▼ --}}

    <div class="relative">
        @include('partials._slider')
        @include('partials._cultivation')
        @include('partials._company_profile')
    </div>

    {{-- ▲▲▲ ここまでが変更箇所 ▲▲▲ --}}

    @include('partials._contact')
    {{-- sliderの呼び出しはラッパー内に移動したので、元の場所からは削除 --}}
@endsection