<div>
    <header class="grid grid-cols-1 items-center text-center gap-2 py-4 lg:flex lg:flex-col">
        <div><p class="text-lg font-semibold mb-4">K.K.T.C'nin EN BÜYÜK ULAŞIM AĞI</p></div>
        <div class="bg-gray-600 rounded-lg flex w-full py-12 justify-center shadow-lg lg:w-[60%] 2xl:w-[95%]">
            <form class="w-full space-x-4" action="" method="GET">
                @csrf
                <select id="from" wire:model="from" required class="bg-white rounded-lg p-2 w-[7rem] text-center items-center">
                    <option selected hidden class="text-center items-center text-xs">Nereden</option>
                    @foreach($locations as $loc)
                        <option class="text-start items-center text-xs" value="{{ $loc->id }}">{{ $loc->city }}</option>
                    @endforeach
                </select>
                <i class="fa-solid fa-arrow-right text-white"></i>
                <select id="to" wire:model="to" required class="bg-white rounded-lg p-2 w-[7rem] text-center items-center">
                    <option selected hidden class="text-center items-center text-xs">Nereye</option>
                    @foreach($locations as $loc)
                        <option class="text-start items-center text-xs" value="{{ $loc->id }}">{{ $loc->city }}</option>
                    @endforeach
                </select>
                <div class="mt-4 flex justify-evenly items-center">
                    <div class="flex space-x-2">
                        <input type="checkbox" name="Hafta içi" value="haftaIci" id="">
                        <p class="text-white">Hafta içi</p>
                        <input type="checkbox" name="Hafta sonu" value="haftaSonu" id="">
                        <p class="text-white">Hafta sonu</p>
                    </div>
                    <button wire:click.prevent="findLocation" class="bg-yellow-500 py-2 px-8 rounded-full text-black" type="button">Ara</button>
                </div>
            </form>
        </div>
    </header>


    @if($resultsVisible)
        <div>
            <div class="lg:max-w-[650px] lg:flex lg:justify-center">
                <p class="underline underline-offset-4 font-semibold text-lg lg:text-xl">Sonuçlar</p>
            </div>
            <div class="@container w-full mt-4 lg:flex lg:justify-center lg:flex-col">
                @foreach($stations as $stat)
                    <div class="card border-gray-400 border-solid border rounded-lg py-4 flex justify-evenly lg:justify-around lg:min-w-[750px] lg:self-center text-sm mb-4 shadow-md">
                        <div class="card-image flex">
                            <img class="w-18 lg:w-24 h-16 lg:h-20 items-center" src="{{ asset($stat->brandLogo) }}" alt="brandLogo">
                        </div>
                        <div class="card-title flex space-x-2 lg:space-x-8 items-center text-xs lg:text-sm">
                            <div class="text-center">
                                <p>{{ $stat->direction->city }}</p>
                                <p>{{ $stat->departureTime }}</p>
                            </div>
                            <div>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                            <div class="card-text flex items-center">
                                <div class="text-center max-w-[50px]">
                                    <p>{{$stat->destination->city }}</p>
                                    <p>{{ $stat->arrivalTime }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="font-semibold self-center">
                            <p class="items-center">{{ $stat->price }} TL</p>
                        </div>
                        <div class="card-button content-center">
                            <button wire:click="buyTicket({{ $stat->id }})" class="bg-yellow-500 hover:bg-yellow-600 text-gray-100 py-2 px-4 rounded-lg">
                                Al
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if(session()->has('message'))
        <div class="text-green-500 text-center mt-4">
            {{ session('message') }}
        </div>
    @endif

    @if(session()->has('error'))
        <div class="text-red-500 text-center mt-4">
            {{ session('error') }}
        </div>
    @endif
</div>
