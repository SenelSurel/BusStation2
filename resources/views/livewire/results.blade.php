
<div>
    {{--
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
                    <p>{{$stat->direction->city}}</p>
                    <p>{{ $stat->departureTime }}</p>
                </div>
                <div>
                    <i class="fa-solid fa-arrow-right"></i>
                </div>
                <div class="card-text flex items-center">
                    <div class="text-center max-w-[50px]">
                        <p>{{$stat->destination->city}}</p>
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
    --}}
</div>

