<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel Web App</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap" rel="stylesheet">

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  {{-- 作成した専用CSSファイルを読み込みます --}}
  <link href="{{ asset('css/top.css') }}" rel="stylesheet">

  <style>
    /* 【追加】ページ内リンクをスムーズにスクロールさせます */
    html {
      scroll-behavior: smooth;
    }

    body:not(.full-screen) {
      padding-top: 80px;
      padding-bottom: 150px;
    }

    body {
      font-family: 'Zen Maru Gothic', sans-serif !important;
      position: relative;
      min-height: 100vh;
    }

    main {
      flex-grow: 1;
    }
  </style>
</head>

<body class="font-sans antialiased @yield('body_class')">

  {{-- ヘッダー --}}
  <header class="fixed top-0 left-0 w-full z-50">
    <nav class="bg-white/30 backdrop-blur-md shadow-md mx-auto">
      <div class="container mx-auto flex justify-between items-center px-4 sm:px-6 py-3 h-16">
        <!-- Desktop Menu -->
        <div class="hidden md:flex justify-evenly items-center w-full">
          <a href="#feature-section" class="text-gray-700 font-bold hover:text-blue-600 transition-colors duration-300">こだわり</a>
          <a href="#" class="text-gray-700 font-bold hover:text-blue-600 transition-colors duration-300">バナナ</a>

          <a href="/">
            <img src="{{ asset('images/logo.png') }}" onerror="this.src='https://placehold.co/120x40/000000/FFFFFF?text=LOGO';" alt="ロゴ" class="h-10">
          </a>
          {{-- 【修正点】「バナナ」を「こだわり」に変更し、リンク先を指定 --}}
          <a href="#company-profile-section" class="text-gray-700 font-bold hover:text-blue-600 transition-colors duration-300">会社について</a>
          <a href="#contact-section" class="text-gray-700 font-bold hover:text-blue-600 transition-colors duration-300">お問い合わせ</a>
        </div>
        <!-- Mobile Header -->
        <div class="md:hidden flex justify-between items-center w-full">
          <div class="w-6"></div>
          <a href="/">
            <img src="{{ asset('images/logo.png') }}" onerror="this.src='https://placehold.co/120x40/000000/FFFFFF?text=LOGO';" alt="ロゴ" class="h-10">
          </a>
          <button id="mobile-menu-button" class="text-gray-700 focus:outline-none w-6 h-6">
            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
          </button>
        </div>
      </div>
    </nav>
    <!-- Mobile Menu Container -->
    <div id="mobile-menu-container" class="fixed inset-0 z-50 hidden">
      <div id="mobile-menu-overlay" class="fixed inset-0 bg-black bg-opacity-0 transition-opacity duration-300 ease-in-out"></div>
      <div id="mobile-menu-panel" class="fixed top-0 right-0 h-full bg-white w-2/5 max-w-xs shadow-xl transform translate-x-full transition-transform duration-300 ease-in-out z-50">
        <div class="flex flex-col p-6 space-y-6">
          <div class="flex justify-end">
            <button id="mobile-menu-close-button" class="text-gray-600 hover:text-gray-900">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>
          </div>
          <nav class="flex flex-col space-y-4">
            <a href="#feature-section" class="text-gray-800 text-lg hover:text-blue-600">こだわり</a>
            <a href="#" class="text-gray-800 text-lg hover:text-blue-600">バナナ</a>
            {{-- 【修正点】「バナナ」を「こだわり」に変更し、リンク先を指定 --}}
            <a href="#company-profile-section" class="text-gray-800 text-lg hover:text-blue-600">会社について</a>
            <a href="#contact-section" class="text-gray-800 text-lg hover:text-blue-600">お問い合わせ</a>
          </nav>
        </div>
      </div>
    </div>
  </header>

  <main>
    @yield('content')
  </main>

  {{-- フッター --}}
  @unless (View::hasSection('hide_footer'))
  <footer class="w-full">
    <div class="bg-yellow-50 text-center py-8">
      <div class="flex flex-col items-center justify-center space-y-4">
        <img src="{{ asset('images/logo.png') }}" alt="フッターロゴ" class="h-12">
        <p class="text-sm text-gray-500">&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
      </div>
    </div>
  </footer>
  @endunless

  {{-- ハンバーガーメニューのスクリプトを復元しました --}}
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const menuContainer = document.getElementById('mobile-menu-container');
      const menuButton = document.getElementById('mobile-menu-button');
      const closeButton = document.getElementById('mobile-menu-close-button');
      const overlay = document.getElementById('mobile-menu-overlay');
      const panel = document.getElementById('mobile-menu-panel');

      if (menuButton) {
        const openMenu = () => {
          menuContainer.classList.remove('hidden');
          document.body.style.overflow = 'hidden';
          requestAnimationFrame(() => {
            overlay.classList.add('bg-opacity-50');
            panel.classList.remove('translate-x-full');
          });
        };

        const closeMenu = () => {
          document.body.style.overflow = '';
          overlay.classList.remove('bg-opacity-50');
          panel.classList.add('translate-x-full');
          setTimeout(() => {
            menuContainer.classList.add('hidden');
          }, 300);
        };

        menuButton.addEventListener('click', openMenu);
        closeButton.addEventListener('click', closeMenu);
        overlay.addEventListener('click', closeMenu);
      }
    });
  </script>
  {{-- 各ページ固有のスクリプト --}}
  @stack('scripts')
  </body>

</html>