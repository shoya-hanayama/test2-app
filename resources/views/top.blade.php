@extends('layouts.app')

@section('body_class', 'full-screen')
{{-- フッターは表示させるため、hide_footerは定義しません --}}

{{-- 【修正点】アニメーション固有のスタイルを _intro_animation.blade.php に移動しました --}}
@push('styles')
<style>
    /* アニメーション前のコンテンツの状態をクラスで管理 */
    .content-hidden-on-load {
        opacity: 0;
        visibility: hidden;
    }
</style>
@endpush

@section('content')
    {{-- イントロアニメーションのHTMLを読み込みます --}}
    @include('partials._intro_animation')

    {{-- ウェブサイトの全セクションを囲むラッパー --}}
    <div id="page-content-wrapper" class="content-hidden-on-load">
        @include('partials._hero')
        @include('partials._features')
        @include('partials._slider')
        @include('partials._cultivation')
    </div>
@endsection

{{-- アニメーションのJavaScript --}}
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script>
    window.onload = () => {
        const introScreen = document.querySelector('#intro-screen');
        const mainContentWrapper = document.querySelector('#page-content-wrapper');
        
        if (!introScreen || !mainContentWrapper) {
            if (mainContentWrapper) {
                mainContentWrapper.classList.remove('content-hidden-on-load');
            }
            return;
        }

        const fallbackTimeout = setTimeout(() => {
            introScreen.remove();
            mainContentWrapper.classList.remove('content-hidden-on-load');
            mainContentWrapper.style.opacity = 1;
            document.body.style.overflow = '';
        }, 7000);

        document.body.style.overflow = 'hidden';

        const tl = gsap.timeline({
            onComplete: () => {
                document.body.style.overflow = '';
                clearTimeout(fallbackTimeout);
            }
        });

        tl.to(introScreen, { backgroundColor: 'white', duration: 3, ease: 'power2.inOut' })
          .to('#path7182', { fill: '#fac400', duration: 3, ease: 'power2.inOut' }, '<')
          .to('#path19571', { fill: '#ffdb01', duration: 3, ease: 'power2.inOut' }, '<');

        tl.to('#banana-container', { y: 80, opacity: 0, duration: 1, ease: 'power2.in', delay: 0.3 });

        tl.to(introScreen, {
            opacity: 0,
            duration: 1,
            ease: 'power1.inOut',
            onComplete: () => {
                introScreen.remove();
            }
        }, "-=1");

        tl.to(mainContentWrapper, {
            opacity: 1,
            visibility: 'visible',
            duration: 1.5,
            ease: 'power2.out',
            onStart: () => {
                mainContentWrapper.classList.remove('content-hidden-on-load');
            }
        }, '-=0.5');
    };
</script>
@endpush