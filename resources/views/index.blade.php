<x-layout>
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                   <livewire:location/>

                <main class="mt-6">
                    <livewire:results />
                </main>

{{--                <div class="shadow-lg my-8 grid grid-cols-1 items-center text-center gap-2 py-4 lg:flex lg:flex-col bg-gray-600 lg:max-w-[750px] rounded-lg lg:mb-8 lg:p-12">--}}
{{--                    <div class="text-gray-300 font-semibold text-md border-solid border-b-2 mb-4 w-full lg:flex lg:justify-start">--}}
{{--                        <p>Ödeme Noktası</p>--}}
{{--                    </div>--}}
{{--                    <form class="min-w-full border-solid border-2 lg:flex lg:flex-col p-4 rounded-lg border-gray-300 min-h-full space-y-4  items-center" action="" method="post">--}}
{{--                        <div class="flex justify-evenly lg:space-x-4">--}}
{{--                            <input class="bg-white rounded-lg p-[0.3rem] w-[150px]" type="text" name="Name" placeholder="İsim" id="">--}}
{{--                            <input class="bg-white rounded-lg p-[0.3rem] w-[150px]" type="text" name="Surname" placeholder="Soyisim" id="">--}}
{{--                        </div>--}}
{{--                        <div class="flex justify-evenly lg:space-x-4">--}}
{{--                            <input class="bg-white rounded-lg p-[0.3rem] w-[150px]" type="email" name="email" placeholder="Email">--}}
{{--                            <input class="bg-white rounded-lg p-[0.3rem] w-[150px]" type="number" name="cardNo" placeholder="Kart Numarası" id="">--}}
{{--                        </div>--}}
{{--                        <div class="flex justify-normal ml-2">--}}
{{--                            <input class="bg-white rounded-lg p-[0.3rem] w-[100px]" type="text" name="cvv" placeholder="CVV" id="">--}}
{{--                        </div>--}}
{{--                        <div class="flex justify-end mr-2">--}}
{{--                            <button class="bg-yellow-500 hover:bg-yellow-600 py-2 px-4 rounded-full text-gray-100" type="submit">İşlemi Tamamla</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>

</x-layout>
