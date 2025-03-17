<x-layout>
    <div class=" text-black/50 dark:bg-black dark:text-white/50">
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                   <livewire:location/>
                <main class="mt-6">
                    <livewire:results/>
                </main>
                <div class="rounded-3xl !z-50 backdrop-blur-[4px] md:py-4 mb-12 bg-gray-400/25 p-4" data-aos="fade-up"
                     data-aos-duration="1000">
                <div class="flex md:justify-start justify-center md:ml-32">
                    <p class="text-2xl text-white mb-4 font-bold">Haberler</p>
                </div>
                <div class="md:flex md:justify-center grid grid-cols-1 md:space-x-4 w-full gap-3">
                    <div class="bg-white card border-2 border-solid rounded-xl md:w-1/4 md:h-2/4 w-full shadow-lg">
                        <div class="flex justify-center">
                            <img class="items-center rounded-t-xl md:h-1/4" src="{{asset('frontend/images/cardOtogar.png')}}" alt="İmage">
                        </div>
                        <div class="card-text p-2">
                            <p class="text-lg text-black p-2">Revize Çalışmaları Sürüyor</p>
                            <p class="text-sm text-gray-600 p-2">Lorem ipsum dolor sit amet,
                                consectetur adipisicing elit. Laudantium, neque, saepe! Exercitationem magni nesciunt pariatur, quasi quis sunt temporibus! Temporibus?</p>
                        </div>
                    </div>
                    <div class="bg-white card border-2 border-solid rounded-xl md:w-1/4 md:h-2/4 w-full shadow-lg">
                        <div class="flex justify-center">
                            <img class="items-center rounded-t-xl md:h-[12.8rem]" src="{{asset('frontend/images/trabTerminal.jpg')}}" alt="İmage">
                        </div>
                        <div class="card-text p-2">
                            <p class="text-lg text-black p-2">Yeni Terminal Gündemde</p>
                            <p class="text-sm text-gray-600 p-2">Lorem ipsum dolor sit amet,
                                consectetur adipisicing elit. Laudantium, neque, saepe! Exercitationem magni nesciunt pariatur, quasi quis sunt temporibus! Temporibus?</p>
                        </div>
                    </div>
                    <div class="bg-white card border-2 border-solid rounded-xl md:w-1/4 md:h-2/4 w-full shadow-lg">
                        <div class="flex justify-center">
                            <img class="items-center rounded-t-xl md:h-1/4" src="{{asset('frontend/images/digerTerminal.jpg')}}" alt="İmage">
                        </div>
                        <div class="card-text p-2">
                            <p class="text-lg text-black p-2">Hizmette 1 Numara!</p>
                            <p class="text-sm text-gray-600 p-2">Lorem ipsum dolor sit amet,
                                consectetur adipisicing elit. Laudantium, neque, saepe! Exercitationem magni nesciunt pariatur, quasi quis sunt temporibus! Temporibus?</p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
