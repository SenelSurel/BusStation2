<div>
    <header class="grid grid-cols-1 items-center text-center gap-2 py-4 lg:flex lg:flex-col ">
        <div><p class="text-lg font-semibold mb-4">K.K.T.C'nin EN BÜYÜK ULAŞIM AĞI</p></div>
        <div class="bg-gray-600 rounded-lg flex w-full py-12 justify-center shadow-lg lg:w-[60%] 2xl:w-[95%]">
            <form class="w-full space-x-4" action="" method="GET">
                @csrf
                <select id="from" wire:model.live="from" required
                        class="bg-white rounded-lg p-2 w-[7rem] text-center items-center">
                    <option selected hidden class="text-center items-center text-xs">Nereden</option>
                    @foreach($locations as $loc)
                        <option class="text-start items-center text-xs" value="{{ $loc->id }}">{{ $loc->city }}</option>
                    @endforeach
                </select>
                <i class="fa-solid fa-arrow-right text-white"></i>
                <select id="to" wire:model.live="to" required
                        class="bg-white rounded-lg p-2 w-[7rem] text-center items-center">
                    <option selected hidden class="text-center items-center text-xs">Nereye</option>
                    @foreach($locations as $loc)
                        <option class="text-start items-center text-xs" value="{{ $loc->id }}">{{ $loc->city }}</option>
                    @endforeach
                </select>
                <div class="mt-4 flex justify-evenly items-center">
                    <div class="flex space-x-3 items-center align-middle">
                        <input wire:model.live="schedule" type="radio" value="haftaIci" id="haftaIci">
                        <label for="haftaIci" class="text-white">Hafta içi</label>

                        <input wire:model.live="schedule" type="radio" value="haftaSonu" id="haftaSonu">
                        <label for="haftaSonu" class="text-white">Hafta sonu</label>
                    </div>
                    <button wire:click.prevent="findLocation" wire:loading.attr="disabled"
                            class="bg-yellow-400 py-2 px-8 rounded-lg text-white font-bold transition-all duration-500 ease-in-out hover:rounded-full hover:scale-105">
                        Ara
                    </button>
                </div>
            </form>
        </div>
    </header>


    <div wire:loading.delay wire:target="findLocation"
         class="flex justify-center min-h-screen w-full text-center">
        <img src="{{ asset('frontend/images/output-onlinegiftools.gif') }}" alt="Yükleniyor..." class="ml-26 w-32 h-32">
    </div>

    @if(session()->has('error'))
        <div class="text-red-500 text-center mt-4 font-semibold text-base">
            {{ session('error') }}
        </div>
    @endif

    @if(session()->has('message'))
        <div class="text-green-500 text-center mt-4 font-semibold text-base">
            {{ session('message') }}
        </div>
    @endif


    @if($resultsVisible)

        <div class="@container w-full mt-4 lg:flex lg:justify-center lg:flex-col">
            <div class="lg:max-w-[650px] lg:flex lg:justify-center mb-2">
                <p class="underline underline-offset-4 font-semibold text-lg lg:text-xl">Sonuçlar</p>
            </div>
            @foreach($stations as $stat)
                <div
                    class="card border-gray-400 border-solid border rounded-lg py-4 flex justify-evenly lg:justify-around lg:min-w-[750px] lg:self-center text-sm mb-4 shadow-md space-x-2">
                    <div class="card-image flex items-center">
                        <img class="w-14 lg:w-24 h-12 lg:h-20 items-center" src="{{ asset($stat->brandLogo) }}"
                             alt="brandLogo">
                    </div>
                    <div class="card-title flex space-x-2 lg:space-x-8 items-center text-xs md:text-[14px]">
                        <div class="text-center">
                            <p class="text-red-400 font-semibold">{{ $stat->direction->city }}</p>
                            <p>{{ $stat->departureTime }}</p>
                        </div>

                        <div class="flex flex-col w-full !justify-center border-gray-400">
                            <div class="flex justify-center font-semibold text-xs md:text-[14px]">
                                @if($stat->schedule == 'haftaIci')
                                    Hafta içi
                                @elseif($stat->schedule == 'haftaSonu')
                                    Hafta sonu
                                @endif
                            </div>
                            <i class="fa-solid fa-arrow-right !flex !justify-center"></i>
                        </div>

                        <div class="card-text flex items-center">
                            <div class="text-center max-w-[50px] text-xs md:text-[14px]">
                                <p class="text-green-400 font-semibold">{{$stat->destination->city }}</p>
                                <p>{{ $stat->arrivalTime }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="font-semibold self-center text-xs md:text-[14px]">
                        <p class="items-center">{{ $stat->price }} TL</p>
                    </div>
                    <div class="card-button content-center flex flex-col w-14">
                        <button wire:click="buyTicket({{ $stat->id }})" class="flex justify-center w-full
                         bg-yellow-400 p-2 px-4 rounded-lg text-white font-bold transition-all duration-500 ease-in-out hover:rounded-full hover:scale-105">
                            Al
                        </button>
                        <p class="font-bold text-xs" wire:model.live="stations">Koltuk Sayısı: {{$stat->amount}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
