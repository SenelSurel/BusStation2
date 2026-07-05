<x-layout>
    <div id="up">
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <livewire:location />
                <main class="my-12">
                    <livewire:results />
                </main>
                <div class="rounded-3xl !z-50 backdrop-blur-[4px] md:py-4 mb-12 shadow-lg shadow-black/60 bg-gray-500/20 p-4"
                    data-aos="fade-up" data-aos-duration="1000">
                    <div class="flex md:justify-start justify-center md:ml-20">
                        <p class="text-2xl text-white mb-4 font-bold">Main Sponsors</p>
                    </div>
                    <livewire:contents />
                </div>

                <livewire:services />
                <livewire:popular />

                <livewire:f-a-q />

            </div>
        </div>
    </div>
</x-layout>