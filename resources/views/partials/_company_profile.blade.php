@push('styles')
<style>
  /* セクション全体の背景と余白 */
  #company-profile-section {
    background-color: #f8f9fa;
    /* やわらかなオフホワイト */
    overflow: hidden;
    /* はみ出した要素を隠す */
  }

  /* アニメーション対象のスタイル */
  .profile-item {
    opacity: 0;
    transform: translateX(-20px);
    transition: opacity 0.6s ease-out, transform 0.6s ease-out;
  }

  /* アニメーション実行時のスタイル */
  .profile-item.is-visible {
    opacity: 1;
    transform: translateX(0);
  }

  /* ホバー時のインタラクション */
  .profile-item:hover {
    background-color: #ffffff;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    border-left-color: #f59e0b;
    /* アクセントカラー */
  }
</style>
@endpush

<section id="company-profile-section" class="w-full h-screen sticky top-0 z-20 py-20" style="background-image: url('{{ asset('images/section2_2.png') }}'); background-attachment: fixed; background-position: center; background-repeat: no-repeat; background-size: cover;">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">

    {{-- タイトルエリア --}}
    <div class="text-center mb-16 profile-item">
      <h2 class="text-base text-amber-500 font-semibold tracking-wider uppercase">Company Profile</h2>
      <p class="mt-2 text-4xl md:text-5xl font-extrabold text-gray-800 tracking-tight">
        会社概要
      </p>
    </div>

    {{-- 会社概要リスト --}}
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
      <div id="profile-list">
        {{-- 各項目をdivで定義 --}}
        <div class="profile-item flex justify-between items-center px-8 py-5 border-b border-l-4 border-transparent transition duration-300">
          <span class="font-bold text-gray-700">会社名</span>
          <span class="text-gray-600 text-right">株式会社SUN'S GRACE</span>
        </div>
        <div class="profile-item flex justify-between items-center px-8 py-5 border-b border-l-4 border-transparent transition duration-300">
          <span class="font-bold text-gray-700">設立</span>
          <span class="text-gray-600 text-right">2023年5月</span>
        </div>
        <div class="profile-item flex justify-between items-center px-8 py-5 border-b border-l-4 border-transparent transition duration-300">
          <span class="font-bold text-gray-700">代表者</span>
          <span class="text-gray-600 text-right">代表取締役 松平 拓義</span>
        </div>
        <div class="profile-item flex justify-between items-center px-8 py-5 border-b border-l-4 border-transparent transition duration-300">
          <span class="font-bold text-gray-700">所在地</span>
          <span class="text-gray-600 text-right">〒100-0005 東京都千代田区丸の内1-1-1</span>
        </div>
        <div class="profile-item flex justify-between items-center px-8 py-5 border-l-4 border-transparent transition duration-300">
          <span class="font-bold text-gray-700">事業内容</span>
          <span class="text-gray-600 text-right">最高品質のバナナの輸入、熟成加工、および国内販売</span>
        </div>
      </div>
    </div>

  </div>
</section>

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const profileList = document.getElementById('profile-list');
    if (!profileList) return;

    const items = Array.from(profileList.children);
    // タイトルもアニメーションの対象に含める
    const title = document.querySelector('#company-profile-section .profile-item');
    if (title) {
      items.unshift(title);
    }

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          // isIntersectingになった要素（#profile-list）の子要素を順番に表示
          items.forEach((item, index) => {
            setTimeout(() => {
              item.classList.add('is-visible');
            }, index * 150); // 0.15秒ずつずらして表示
          });
          observer.unobserve(entry.target); // アニメーション後は監視を停止
        }
      });
    }, {
      threshold: 0.1 // 10%見えたら実行
    });

    // #profile-list自体を監視対象に設定
    observer.observe(profileList);
  });
</script>
@endpush