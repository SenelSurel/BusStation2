<div class="my-8" data-aos="fade-up"
     data-aos-duration="1000">
    <div class="text-white font-bold mb-4">
    <p class="text-2xl">Popüler Seferler</p>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4 p-4 bg-gray-400/20 backdrop-blur-sm rounded-xl">
        @foreach($stations as $pass)
            <div class="border border-gray-300 bg-white rounded-lg py-2 px-4 flex items-center justify-between shadow-md space-x-4 w-full max-w-3xl mx-auto">
                <div class="flex-shrink-0">
                    <img class="w-12 lg:w-16" src="{{ asset($pass->brandLogo) }}" alt="brandLogo">
                </div>
                <div class="text-center text-[10px] md:text-[13px]">
                    <p class="text-red-400 font-semibold">{{ optional($pass->direction)->city ?? '-' }}</p>
                    <p>{{ $pass->departureTime }}</p>
                </div>
                <div class="flex flex-col items-center text-[10px] md:text-sm">
                    <p class="font-semibold">
                        @if($pass->schedule == 'haftaIci')
                            Hafta içi
                        @elseif($pass->schedule == 'haftaSonu')
                            Hafta sonu
                        @else
                            -
                        @endif
                    </p>
                    <i class="fa-solid fa-arrow-right text-gray-500 text-lg"></i>
                </div>
                <div class="text-center text-[10px] md:text-[13px]">
                    <p class="text-green-400 font-semibold">{{ optional($pass->destination)->city ?? '-' }}</p>
                    <p>{{ $pass->arrivalTime }}</p>
                </div>
                <div class="font-semibold text-xs md:text-base text-gray-700">
                    <p>{{ $pass->price }} TL</p>
                </div>
            </div>
        @endforeach
    </div>

</div>
