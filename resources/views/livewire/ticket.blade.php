<div wire:poll.5s class="grid grid-cols-2 md:inline-grid md:grid-cols-4 xl:grid-cols-6 md:grid-rows-subgrid md:gap-2 md:ml-8 xl:ml-36 mb-8 space-y-2 md:space-x-6 justify-items-center">
    @forelse($myTickets as $pass)
        <div class="card bg-gray-500/25 backdrop-blur-sm w-[10rem] h-[15rem] flex flex-col border-gray-600 border-2 justify-center items-center rounded-lg shadow-lg">
            <div class=" bg-gray-500/25 backdrop-blur-sm  w-[9rem] h-[14.3rem] p-2 rounded-lg card-body">
                <div
                    class="card-image bg-white rounded-lg mb-2 flex justify-center border-2 border-solid border-white w-[8rem] h-[6rem]">
                    <img class="w-26" src="{{ asset($pass->ticketImage) }}" alt="IMAGE">
                </div>
                <div class="card-title flex flex-col text-center text-white text-xs">
                    <p class="font-bold text-sm">
                        @if($pass->midWeek)
                            Hafta içi
                        @elseif($pass->weekEnd)
                            Hafta sonu
                        @endif
                    </p>
                    <div class="flex justify-around mt-4">
                        <div class="">
                            <p> {{ $pass->fromWhere }}</p>
                            <p>{{$pass->depart}}</p>
                        </div>
                        <div class="">
                            <span><i class="fa-solid fa-arrow-right text-white"></i></span>
                        </div>
                        <div class="">
                            <p>{{ $pass->toWhere }}</p>
                            <p>{{ $pass->arrive }}</p>
                        </div>
                    </div>

                    <div class="mt-2">
                        <button wire:click="useTicket({{ $pass->id }})" wire:navigate class="flex justify-center w-full bg-blue-500 p-2 px-4 rounded-lg text-white font-bold transition-all duration-500 ease-in-out
                        hover:rounded-full hover:scale-105">Kullan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="bg-red-500 font-semibold text-white text-base col-span-2 mb-4 p-2 rounded-lg">Biletiniz bulunmamaktadır.</div>
    @endforelse
</div>

