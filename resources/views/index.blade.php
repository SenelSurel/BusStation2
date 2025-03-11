<x-layout>
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                   <livewire:location/>
                <main class="mt-6">
                    <livewire:results />
                </main>
            </div>
        </div>
    </div>
</x-layout>
