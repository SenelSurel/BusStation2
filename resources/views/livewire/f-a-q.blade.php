<div data-aos="fade-up"
     data-aos-duration="1000" class="p-4 bg-gray-400/20 backdrop-blur-sm rounded-xl space-y-4 mb-12 shadow-lg shadow-black/60">
    <div class="text-white font-bold text-2xl mb-4 flex justify-center md:justify-start">
        <p>Sık Sorulan Sorular</p>
    </div>
    @foreach($faqs as $faq)
    <div class="bg-gray-200/40 p-2 rounded-lg">
    <div class="text-white font-bold text-base mb-2">
        <p>{!! $faq->question !!}</p>
    </div>
        <div class="text-white/85 font-medium text-sm">
            <p>{!! $faq->answer !!}</p>
        </div>
    </div>
    @endforeach
</div>
