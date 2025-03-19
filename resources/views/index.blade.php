<x-layout>
    <div class=" text-black/50 dark:bg-black dark:text-white/50">
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <livewire:location/>
                <main class="mt-6">
                    <livewire:results/>
                </main>
                <div class="rounded-3xl !z-50 backdrop-blur-[4px] md:py-4 mb-12 bg-gray-500/20 p-4" data-aos="fade-up"
                     data-aos-duration="1000">
                    <div class="flex md:justify-start justify-center md:ml-32">
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
{{--                    <div class="flex w-full bg-gray-500/20 backdrop-blur-[4px] justify-center md:my-12 my-8 p-4 rounded-xl space-x-4 text-white">--}}
{{--                        <div class="">--}}
{{--                            <img class="w-[25rem] h-[8rem] md:w-[20rem] md:h-[13rem] rounded-lg"--}}
{{--                                 src="{{asset('/frontend/images/terminal.jpg')}}" alt="Image">--}}
{{--                        </div>--}}
{{--                        <div class="flex flex-col">--}}
{{--                            <p class="md:text-xl text-lg font-bold">Yenilikler</p>--}}
{{--                            <p class="font-semibold md:text-lg text-xs">Lorem ipsum dolor sit amet, consectetur--}}
{{--                                adipisicing elit.--}}
{{--                                Ad alias asperiores, eius fugiat labore, natus neque odio,--}}
{{--                                perferendis sapiente sunt voluptas?</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</x-layout>
