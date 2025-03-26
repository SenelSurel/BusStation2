<x-layout>
    <div id="up" class=" text-black/50 dark:bg-black dark:text-white/50" >
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <livewire:location/>
                <main class="my-12">
                    <livewire:results/>
                </main>
                <div class="rounded-3xl !z-50 backdrop-blur-[4px] md:py-4 mb-12 shadow-lg shadow-black/60 bg-gray-500/20 p-4" data-aos="fade-up"
                     data-aos-duration="1000">
                    <div class="flex md:justify-start justify-center md:ml-20">
                        <p class="text-2xl text-white mb-4 font-bold">En Büyük Sponsorlarımız</p>
                    </div>
                    <livewire:contents/>
                </div>

                <livewire:services/>
                <livewire:popular/>

                <livewire:f-a-q/>
                <div class="fixed right-12 bottom-12">
                    <a class="bg-gray-600/40 backdrop-blur-sm p-4 rounded-full text-base text-white align-middle flex justify-center" href="#up"><i class="fa-solid fa-arrow-up"></i></a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
