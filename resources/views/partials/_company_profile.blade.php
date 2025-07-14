@push('styles')
<style>
  #company-profile-section {
    transition: opacity 0.8s ease-in-out;
  }
</style>
@endpush

<section id="company-profile-section" class="w-full bg-white py-20 relative z-10">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
        会社概要
      </h2>
    </div>
    <div class="max-w-4xl mx-auto bg-gray-50 rounded-lg shadow-lg p-8">
      <table class="w-full text-left">
        <tbody>
          <tr class="border-b">
            <th class="py-4 pr-4 font-semibold text-gray-700">会社名</th>
            <td class="py-4 text-gray-600">株式会社Fresh Banana Japan</td>
          </tr>
          <tr class="border-b">
            <th class="py-4 pr-4 font-semibold text-gray-700">設立</th>
            <td class="py-4 text-gray-600">2023年5月</td>
          </tr>
          <tr class="border-b">
            <th class="py-4 pr-4 font-semibold text-gray-700">代表者</th>
            <td class="py-4 text-gray-600">代表取締役 鈴木 一郎</td>
          </tr>
          <tr class="border-b">
            <th class="py-4 pr-4 font-semibold text-gray-700">所在地</th>
            <td class="py-4 text-gray-600">〒100-0005 東京都千代田区丸の内1-1-1</td>
          </tr>
          <tr>
            <th class="py-4 pr-4 font-semibold text-gray-700">事業内容</th>
            <td class="py-4 text-gray-600">最高品質のバナナの輸入、熟成加工、および国内販売</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const companyProfileSection = document.getElementById('company-profile-section');
    if (!companyProfileSection) return;

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.remove('opacity-0');
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.1
    });

    observer.observe(companyProfileSection);
  });
</script>
@endpush
