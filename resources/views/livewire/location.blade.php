<div>
    <header class="grid grid-cols-1 items-center text-center gap-2 py-8 lg:flex lg:flex-col !z-50 mt-12 ">
        <div><p class="text-xl font-bold mb-4 text-white">K.K.T.C'nin EN BÜYÜK ULAŞIM AĞI</p></div>
        <div class="backdrop-blur-[4px] bg-gray-500/20 rounded-xl flex w-full py-12 justify-center shadow-lg lg:w-[50%] 2xl:w-[45%]">
            <form class="w-full space-x-4" action="" method="GET">
                @csrf
                <select id="from" wire:model.live="from" required
                        class="bg-white rounded-lg p-2 md:w-[8rem]  text-center items-center">
                    <option selected hidden class="text-center items-center text-xs">Nereden</option>
                    @foreach($locations as $loc)
                        <option class="text-start items-center text-xs" value="{{ $loc->id }}">{{ $loc->city }}</option>
                    @endforeach
                </select>
                <i class="fa-solid fa-arrow-right text-white"></i>
                <select id="to" wire:model.live="to" required
                        class="bg-white rounded-lg p-2 md:w-[8rem] text-center items-center">
                    <option selected hidden class="text-center items-center text-xs">Nereye</option>
                    @foreach($locations as $loc)
                        <option class="text-start items-center text-xs" value="{{ $loc->id }}">{{ $loc->city }}</option>
                    @endforeach
                </select>
                <div class="mt-2 flex flex-col justify-center items-center gap-5">
                    <div class="flex space-x-3 items-center align-middle">
                        <input wire:model.live="schedule" type="radio" value="haftaIci" id="haftaIci">
                        <label for="haftaIci" class="text-white">Hafta içi</label>

                        <input wire:model.live="schedule" type="radio" value="haftaSonu" id="haftaSonu">
                        <label for="haftaSonu" class="text-white">Hafta sonu</label>
                    </div>
                    <div class="">
                    <button wire:click.prevent="findLocation" wire:loading.attr="disabled"
                            class="bg-blue-500 py-2 px-8 rounded-lg text-white font-bold transition-all duration-500 ease-in-out hover:rounded-full hover:scale-105">
                        Ara
                    </button>
                    </div>
                </div>
            </form>
        </div>
    </header>

    <div wire:loading.delay wire:target="findLocation" class="flex justify-center items-center min-h-screen w-2/4 md:ml-[32rem]">
        <button wire:transition type="button" class="backdrop-blur-[4px] bg-gray-500/20 flex justify-center items-center rounded-xl p-2 px-4" disabled>
            <svg class="mr-3 size-10 animate-spin" width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.2" fill-rule="evenodd" clip-rule="evenodd" d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill="#000000"/>
                <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="#80dfff"/>
            </svg>
            <p class="text-white font-semibold text-xl align-middle">Yükleniyor...</p>
        </button>
    </div>

    @if(session()->has('error'))
        <div class="w-full flex justify-center">
        <div class="text-white text-center mt-4 font-semibold text-base p-2 rounded-lg w-[50%] md:w-[30%] flex justify-center backdrop-blur-[4px] bg-red-500 ">
            {{ session('error') }}
        </div>
        </div>
    @endif

    @if(session()->has('message'))
        <div class="w-full flex justify-center">
        <div class=" text-white text-center mt-4 font-semibold text-base p-2 rounded-lg w-[50%] md:w-[30%] flex justify-center backdrop-blur-[4px] bg-green-500">
            {{ session('message') }}
        </div>
        </div>
    @endif

    @if($resultsVisible)
        <div class="@container w-full mt-4 lg:flex lg:justify-center lg:flex-col">
            <div class="lg:max-w-[650px] lg:flex lg:justify-center mb-2">
                <p class="underline underline-offset-4 font-semibold text-lg lg:text-xl text-white">Sonuçlar</p>
            </div>
            @foreach($stations as $pass)
                <div
                    class="card border-gray-400 bg-white border-solid border rounded-lg py-4 flex justify-evenly lg:justify-around lg:min-w-[750px] lg:self-center text-sm mb-4 shadow-md space-x-2">
                    <div class="card-image flex items-center">
                        <img class="w-14 lg:w-24 h-12 lg:h-20 items-center" src="{{ asset($pass->brandLogo) }}"
                             alt="brandLogo">
                    </div>
                    <div class="card-title flex space-x-2 lg:space-x-8 items-center text-xs md:text-[14px]">
                        <div class="text-center">
                            <p class="text-red-400 font-semibold">{{ $pass->direction->city }}</p>
                            <p>{{ $pass->departureTime }}</p>
                        </div>

                        <div class="flex flex-col w-full !justify-center border-gray-400">
                            <div class="flex justify-center font-semibold text-xs md:text-[14px]">
                                @if($pass->schedule == 'haftaIci')
                                    Hafta içi
                                @elseif($pass->schedule == 'haftaSonu')
                                    Hafta sonu
                                @endif
                            </div>
                            <i class="fa-solid fa-arrow-right !flex !justify-center"></i>
                        </div>

                        <div class="card-text flex items-center">
                            <div class="text-center max-w-[50px] text-xs md:text-[14px]">
                                <p class="text-green-400 font-semibold">{{$pass->destination->city }}</p>
                                <p>{{ $pass->arrivalTime }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="font-semibold self-center text-xs md:text-[14px]">
                        <p class="items-center">{{ $pass->price }} TL</p>
                    </div>
                    <div class="card-button content-center flex flex-col w-14">
                        <button wire:click.prevent="buyTicket({{ $pass->id }})" wire:loading.attr="disabled" class="flex justify-center w-full
                         bg-blue-400 p-2 px-4 rounded-lg text-white font-bold transition-all duration-500 ease-in-out hover:rounded-full hover:scale-105">
                            Al
                        </button>
                        <p class="font-bold text-xs" wire:model.live="stations">Koltuk Sayısı: {{$pass->amount}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
