<x-layout>
    <div class=" text-black/50 dark:bg-black dark:text-white/50">
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <livewire:location/>
                <main class="mt-6">
                    <livewire:results/>
                </main>
                <div class="rounded-3xl !z-50 backdrop-blur-[4px] md:py-4 mb-12 bg-gray-500/20 p-4" data-aos="fade-up"
                     data-aos-duration="1000">
                    <div class="flex md:justify-start justify-center md:ml-20">
                        <p class="text-2xl text-white mb-4 font-bold">En Büyük Sponsorlarımız</p>
                    </div>
                    <livewire:contents/>
                </div>
                <div class="flex w-full justify-center md:justify-start md:ml-8 mb-4" data-aos="fade-zoom-in"
                     data-aos-easing="ease-in-back"
                     data-aos-delay="200"
                     data-aos-offset="0">
                    <p class="text-2xl text-white font-bold">Hizmetlerimiz</p>
                </div>
                <livewire:services/>
                <livewire:popular/>
            </div>
        </div>
    </div>
</x-layout>
