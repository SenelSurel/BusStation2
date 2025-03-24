<div class="my-8" data-aos="fade-up"
     data-aos-duration="1000">
    <div class="text-white font-bold mb-4 w-full flex justify-center md:justify-start">
    <p class="text-2xl">Popüler Seferler</p>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4 p-4 bg-gray-400/20 backdrop-blur-sm rounded-xl shadow-lg shadow-black/60">
        @foreach($stations as $pass)
            <div class="border border-gray-300 bg-white rounded-lg py-2 px-4 flex items-center justify-between shadow-md space-x-4 w-full max-w-3xl mx-auto">
                <div class="flex-shrink-0">
                    <img class="w-10 lg:w-16" src="{{ asset($pass->brandLogo) }}" alt="brandLogo">
                </div>
                <div class="text-center text-[9px] md:text-[13px]">
                    <p class="text-red-400 font-semibold">{{ optional($pass->direction)->city ?? '-' }}</p>
                    <p class="font-semibold">{{ $pass->departureTime }}</p>
                </div>
                <div class="flex flex-col items-center text-[9px] md:text-xs">
                    <p class="font-semibold">
                        @if($pass->schedule == 'haftaIci')
                            Hafta içi
                        @elseif($pass->schedule == 'haftaSonu')
                            Hafta sonu
                        @else
                            -
                        @endif
                    </p>
                    <i class="fa-solid fa-arrow-right text-gray-500 text-xs md:text-lg"></i>
                </div>
                <div class="text-center text-[9px] md:text-[13px]">
                    <p class="text-green-400 font-semibold">{{ optional($pass->destination)->city ?? '-' }}</p>
                    <p class="font-semibold">{{ $pass->arrivalTime }}</p>
                </div>
                <div class="font-semibold self-center text-xs md:text-[13px]">
                    <p class="items-center">
                        <span id="currency-symbol-{{ $pass->id }}">{{ $currencySymbol }}</span>
                        <span id="ticket-price-{{ $pass->id }}" data-price="{{ $pass->price }}">{{ $pass->price }}</span>
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>
