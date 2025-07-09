<section id="slider-section" class="w-full min-h-screen bg-white flex flex-col justify-start pt-24">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <div class="relative">
            <div id="slider-container" class="flex overflow-x-auto snap-x snap-mandatory scroll-smooth no-scrollbar">
                @php
                // 【修正点】スライドのデータをより詳細な内容に更新
                $slides = [
                [
                'image' => 'images/slider/熟成加工室.png',
                'title' => '最新鋭の熟成加工室',
                'description' => 'バナナのポテンシャルを最大限に引き出すため、私たちはエチレンガスと温度・湿度をコンマ単位で制御する、業界最高水準の熟成加工室を導入しています。これにより、糖度とアミノ酸の生成を最適化し、他にはない濃厚な甘みと、ねっとりとした食感の両立を実現しました。'
                ],
                [
                'image' => 'images/slider/土壌活性化メソッド.png',
                'title' => '独自の土壌活性化メソッド',
                'description' => '美味しいバナナは、豊かな土壌から。私たちは現地の契約農家と協力し、有機物を豊富に含んだ独自の活性剤を散布する農法を確立。土中の微生物を活性化させ、バナナの根が栄養を吸収しやすい環境を維持することで、力強く、風味豊かな果実を育てています。'
                ],
                [
                'image' => 'images/slider/品質チェック.png',
                'title' => '人の目と機械による二重品質チェック',
                'description' => '私たちの品質基準は、市場のそれよりも遥かに厳格です。まず光学センサーが色や形、サイズを瞬時に選別。その後、長年の経験を持つ熟練のスタッフが、人の目でしか分からない微細な傷や熟度のばらつきを一つ一つ丁寧に見極め、最高品質のバナナだけを出荷します。'
                ],
                [
                'image' => 'images/slider/鮮度管理輸送.png',
                'title' => '産地から食卓まで、途切れない鮮度管理',
                'description' => '収穫されたバナナは、最適な温度に保たれた専用コンテナですぐに輸送されます。産地から国内の加工室、そして皆様の元へ届くまで、一度も鮮度管理の連鎖（コールドチェーン）を途切れさせません。この徹底した管理が、産地でしか味わえない新鮮さを実現します。'
                ],
                ];
                @endphp

                @foreach($slides as $slide)
                <div class="flex-shrink-0 w-full snap-center flex justify-center items-center py-4">
                    <div class="bg-white rounded-lg shadow-xl overflow-hidden w-full max-w-6xl mx-auto flex flex-col md:flex-row md:min-h-[520px]">
                        <div class="w-full md:w-1/2 h-64 md:h-auto">
                            <img src="{{ asset($slide['image']) }}" onerror="this.src='https://placehold.co/800x600/f0f0f0/333?text=IMAGE';" alt="{{ $slide['title'] }}" class="w-full h-full object-cover">
                        </div>
                        <div class="w-full md:w-1/2 p-8 lg:p-12 flex flex-col justify-center">
                            <h3 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-4">{{ $slide['title'] }}</h3>
                            <p class="text-gray-600 leading-relaxed text-base lg:text-lg">{{ $slide['description'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- 左右の矢印ボタン --}}
            <button id="slide-left" class="absolute top-1/2 left-0 sm:left-4 transform -translate-y-1/2 bg-white/70 hover:bg-white rounded-full p-3 focus:outline-none transition z-10">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button id="slide-right" class="absolute top-1/2 right-0 sm:right-4 transform -translate-y-1/2 bg-white/70 hover:bg-white rounded-full p-3 focus:outline-none transition z-10">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </div>
</section>

{{-- スライダーのJavaScript --}}
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slider = document.getElementById('slider-container');
        const slideLeft = document.getElementById('slide-left');
        const slideRight = document.getElementById('slide-right');

        if (slider && slideLeft && slideRight) {
            let autoSlideInterval;

            const nextSlide = () => {
                const slideWidth = slider.offsetWidth;
                if (slider.scrollLeft + slideWidth >= slider.scrollWidth) {
                    slider.scrollTo({
                        left: 0,
                        behavior: 'smooth'
                    });
                } else {
                    slider.scrollBy({
                        left: slideWidth,
                        behavior: 'smooth'
                    });
                }
            };

            const prevSlide = () => {
                const slideWidth = slider.offsetWidth;
                slider.scrollBy({
                    left: -slideWidth,
                    behavior: 'smooth'
                });
            };

            const startAutoSlide = () => {
                stopAutoSlide();
                autoSlideInterval = setInterval(nextSlide, 4000);
            };

            const stopAutoSlide = () => {
                clearInterval(autoSlideInterval);
            };

            slideRight.addEventListener('click', () => {
                nextSlide();
                stopAutoSlide();
            });

            slideLeft.addEventListener('click', () => {
                prevSlide();
                stopAutoSlide();
            });

            slider.addEventListener('mouseenter', stopAutoSlide);
            slider.addEventListener('mouseleave', startAutoSlide);

            startAutoSlide();
        }
    });
</script>
@endpush