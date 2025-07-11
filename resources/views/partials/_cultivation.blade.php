@push('styles')
<style>
  /* cultivation section animation */
  #cultivation-section {
    transition: opacity 0.8s ease-in-out;
  }

  .cultivation-card {
    transition: opacity 0.8s ease-in-out, transform 0.8s ease-in-out;
  }
</style>
@endpush

<section id="cultivation-section" class="w-full min-h-screen bg-gray-50 flex flex-col opacity-0">
  {{-- 画面上部1割: タイトル --}}
  <div class="h-[10vh] flex items-center justify-center text-center">
    <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
      バナナの育成工程について
    </h2>
  </div>

  {{-- 画面下部9割: カード --}}
  <div class="h-[90vh] w-full flex items-center justify-center px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-7xl grid grid-cols-1 md:grid-cols-3 gap-8">

      {{-- カード1 --}}
      <div class="cultivation-card opacity-0 transform translate-y-8 bg-white rounded-lg shadow-lg overflow-hidden relative flex flex-col">
        <div class="absolute top-[-0.5rem] left-[-0.5rem] bg-gradient-to-br from-yellow-400 to-amber-500 text-white rounded-full w-12 h-12 flex items-center justify-center font-bold text-xl z-10 shadow-lg" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">1</div>
        <div class="h-1/2">
          <img src="{{ asset('images/cultivation/1.png') }}" onerror="this.src='https://placehold.co/400x300/e2e8f0/333?text=PROCESS';" alt="種植え" class="w-full h-full object-cover">
        </div>
        <div class="h-1/2 p-6 flex flex-col justify-center text-center">
          <h3 class="text-2xl font-bold text-gray-800 mb-3">育苗と植え付け：未来のバナナの第一歩</h3>
          <p class="text-gray-600 leading-relaxed">商業的に栽培されるバナナは、病気に強く品質の揃った優良な株から「組織培養」によって作られた苗や、親株の根元から生えてくる「吸芽（きゅうが）」と呼ばれる子株を畑に植え付けることから始まります。植え付けに適した時期は、十分に暖かくなった4月から9月頃です。</p>
        </div>
      </div>

      {{-- カード2 --}}
      <div class="cultivation-card opacity-0 transform translate-y-8 bg-white rounded-lg shadow-lg overflow-hidden relative flex flex-col">
        <div class="absolute top-[-0.5rem] left-[-0.5rem] bg-gradient-to-br from-yellow-400 to-amber-500 text-white rounded-full w-12 h-12 flex items-center justify-center font-bold text-xl z-10 shadow-lg" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">2</div>
        <div class="h-1/2 p-6 flex flex-col justify-center text-center order-first">
          <h3 class="text-2xl font-bold text-gray-800 mb-3">生育管理：健やかな成長のために</h3>
          <p class="text-gray-600 leading-relaxed">植え付けられた苗は、温暖な気候とたっぷりの水を好み、ぐんぐん成長します。この期間、農園では、水やりや雑草の除去、栄養状態を保つための施肥など、きめ細やかな管理が行われます。バナナの木のように見える部分は、実際には葉が何層にも重なった「偽茎（ぎけい）」で、本当の茎は地中にあります。</p>
        </div>
        <div class="h-1/2">
          <img src="{{ asset('images/cultivation/2.png') }}" onerror="this.src='https://placehold.co/400x300/e2e8f0/333?text=PROCESS';" alt="育成" class="w-full h-full object-cover">
        </div>
      </div>

      {{-- カード3 --}}
      <div class="cultivation-card opacity-0 transform translate-y-8 bg-white rounded-lg shadow-lg overflow-hidden relative flex flex-col">
        <div class="absolute top-[-0.5rem] left-[-0.5rem] bg-gradient-to-br from-yellow-400 to-amber-500 text-white rounded-full w-12 h-12 flex items-center justify-center font-bold text-xl z-10 shadow-lg" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">3</div>
                <div class="h-1/2">
                    <img src="{{ asset('images/cultivation/3.png') }}" onerror="this.src='https://placehold.co/400x300/e2e8f0/333?text=PROCESS';" alt="収穫" class="w-full h-full object-cover">
                </div>
        <div class="h-1/2 p-6 flex flex-col justify-center text-center">
          <h3 class="text-2xl font-bold text-gray-800 mb-3">開花と結実、そして袋がけ</h3>
          <p class="text-gray-600 leading-relaxed">植え付けから約7〜10ヶ月経つと、偽茎の中心から大きな赤紫色のつぼみが現れ、垂れ下がって開花します。受粉の必要はなく、花が咲いた後には小さなバナナの実がなり、上向きに成長していきます。大切な果実を害虫や傷、直射日光から守るため、この段階で一房ずつ丁寧に袋をかけていきます。</p>
        </div>
      </div>

    </div>
  </div>
</section>

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const cultivationSection = document.getElementById('cultivation-section');
    if (!cultivationSection) return;

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.remove('opacity-0');
          const cards = entry.target.querySelectorAll('.cultivation-card');
          cards.forEach((card, index) => {
            setTimeout(() => {
              card.classList.remove('opacity-0', 'translate-y-8');
            }, index * 200);
          });
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.1
    });

    observer.observe(cultivationSection);
  });
</script>
@endpush