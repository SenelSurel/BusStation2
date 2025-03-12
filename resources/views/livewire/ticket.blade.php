<div class="grid grid-cols-2 justify-center mb-8 space-y-2 justify-items-center">
    @forelse($myTickets as $pass)
        <div class="card bg-gray-600 w-[10rem] h-[15rem] flex flex-col justify-center items-center rounded-lg shadow-lg">
            <div class="bg-gray-600 w-[9rem] h-[14.3rem] border-solid border-white border-2 p-2 rounded-lg card-body">
                <div class="card-image bg-white rounded-lg mb-2 flex justify-center border-2 border-solid border-white w-[8rem] h-[6rem]">
                    <img class="w-24" src="{{ asset($pass->ticketImage) }}" alt="IMAGE">
                </div>
                <div class="card-title flex flex-col text-center text-white text-xs">
                    <p class="font-semibold underline underline-offset-2 text-sm">
                        @if($pass->midWeek) Hafta içi
                        @elseif($pass->weekEnd) Hafta sonu
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
                        <button wire:click="useTicket({{ $pass->id }})" wire:navigate class="flex justify-center w-full bg-yellow-400 p-2 rounded-lg text-white font-bold">Kullan</button>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="text-red-500 font-semibold text-base col-span-2 mb-4">Biletiniz bulunmamaktadır.</div>
    @endforelse
</div>
