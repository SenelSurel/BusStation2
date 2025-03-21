<div>
{{--    @if($resultsVisible)--}}
{{--        <div class="@container shadow-black/60 w-full mt-4 lg:flex lg:justify-center lg:flex-col">--}}
{{--            <div class="lg:max-w-[650px] lg:flex lg:justify-center mb-2">--}}
{{--                <p class="underline underline-offset-4 font-semibold text-lg lg:text-xl text-white">Sonuçlar</p>--}}
{{--            </div>--}}
{{--            @foreach($stations as $pass)--}}
{{--                <div class="card border-gray-400 bg-white border-solid border rounded-lg py-4 flex justify-evenly lg:justify-around lg:min-w-[750px] lg:self-center text-sm mb-4 shadow-md space-x-2">--}}
{{--                    <div class="card-image flex items-center">--}}
{{--                        <img class="w-14 lg:w-24 h-12 lg:h-20 items-center" src="{{ asset($pass->brandLogo) }}"--}}
{{--                             alt="brandLogo">--}}
{{--                    </div>--}}
{{--                    <div class="card-title flex space-x-2 lg:space-x-8 items-center text-xs md:text-[14px]">--}}
{{--                        <div class="text-center">--}}
{{--                            <p class="text-red-400 font-semibold">{{ $pass->direction->city }}</p>--}}
{{--                            <p>{{ $pass->departureTime }}</p>--}}
{{--                        </div>--}}

{{--                        <div class="flex flex-col w-full !justify-center border-gray-400">--}}
{{--                            <div class="flex justify-center font-semibold text-xs md:text-[14px]">--}}
{{--                                @if($pass->schedule == 'haftaIci')--}}
{{--                                    Hafta içi--}}
{{--                                @elseif($pass->schedule == 'haftaSonu')--}}
{{--                                    Hafta sonu--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                            <i class="fa-solid fa-arrow-right !flex !justify-center"></i>--}}
{{--                        </div>--}}

{{--                        <div class="card-text flex items-center">--}}
{{--                            <div class="text-center max-w-[50px] text-xs md:text-[14px]">--}}
{{--                                <p class="text-green-400 font-semibold">{{$pass->destination->city }}</p>--}}
{{--                                <p>{{ $pass->arrivalTime }}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="font-semibold self-center text-xs md:text-[14px]">--}}
{{--                        <p class="items-center">{{ $pass->price }} TL</p>--}}
{{--                    </div>--}}
{{--                    <div class="card-button content-center flex flex-col w-14">--}}
{{--                        <button wire:click.prevent="buyTicket({{ $pass->id }})" wire:loading.attr="disabled" class="flex justify-center w-full--}}
{{--                         bg-blue-400 p-2 px-4 rounded-lg text-white font-bold transition-all duration-500 ease-in-out hover:rounded-full hover:scale-105">--}}
{{--                            Al--}}
{{--                        </button>--}}
{{--                        <p class="font-bold text-xs" wire:model.live="stations">Koltuk Sayısı: {{$pass->amount}}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    @endif--}}
</div>
