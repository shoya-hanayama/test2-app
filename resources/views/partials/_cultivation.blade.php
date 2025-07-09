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

<section id="cultivation-section" class="w-full min-h-screen bg-gray-50 flex flex-col items-center justify-center py-16 sm:py-24 opacity-0">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="w-full h-[10vh] flex items-center justify-center text-center mb-8">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                バナナの育成工程について
            </h2>
        </div>

        <div class="w-full h-[90vh] grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- カード1 --}}
            <div class="cultivation-card opacity-0 transform translate-y-8 bg-white rounded-lg shadow-lg p-6 flex flex-col space-y-4">
                <div class="relative">
                    <div class="absolute -top-10 -left-10 bg-yellow-400 w-16 h-16 rounded-full flex items-center justify-center text-white font-bold text-2xl">1</div>
                    <img src="{{ asset('images/cultivation/1.png') }}" onerror="this.src='https://placehold.co/400x300/e2e8f0/333?text=PROCESS';" alt="種植え" class="w-full h-48 object-cover rounded-md">
                </div>
                <div class="text-center">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">種植え</h3>
                    <p class="text-gray-600 leading-relaxed">肥沃な土壌を選び、丁寧にバナナの種を植え付けます。太陽の光と適切な水やりが、力強い成長の第一歩です。</p>
                </div>
            </div>

            {{-- カード2 --}}
            <div class="cultivation-card opacity-0 transform translate-y-8 bg-white rounded-lg shadow-lg p-6 flex flex-col-reverse space-y-4 space-y-reverse">
                <div class="relative">
                    <div class="absolute -top-10 -left-10 bg-yellow-400 w-16 h-16 rounded-full flex items-center justify-center text-white font-bold text-2xl">2</div>
                    <img src="{{ asset('images/cultivation/2.png') }}" onerror="this.src='https://placehold.co/400x300/e2e8f0/333?text=PROCESS';" alt="育成" class="w-full h-48 object-cover rounded-md">
                </div>
                <div class="text-center">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">育成</h3>
                    <p class="text-gray-600 leading-relaxed">有機肥料を使い、自然の力を最大限に活かして育成。病害虫から守るため、日々の観察を欠かしません。</p>
                </div>
            </div>

            {{-- カード3 --}}
            <div class="cultivation-card opacity-0 transform translate-y-8 bg-white rounded-lg shadow-lg p-6 flex flex-col space-y-4">
                <div class="relative">
                    <div class="absolute -top-10 -left-10 bg-yellow-400 w-16 h-16 rounded-full flex items-center justify-center text-white font-bold text-2xl">3</div>
                    <img src="{{ asset('images/cultivation/3.png') }}" onerror="this.src='https://placehold.co/400x300/e2e8f0/333?text=PROCESS';" alt="収穫" class="w-full h-48 object-cover rounded-md">
                </div>
                <div class="text-center">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">収穫</h3>
                    <p class="text-gray-600 leading-relaxed">最高のタイミングを見極め、一房ずつ丁寧に収穫。傷つけないよう、細心の注意を払います。</p>
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