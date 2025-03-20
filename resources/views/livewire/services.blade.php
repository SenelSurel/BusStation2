<div data-aos="fade-up"
     data-aos-duration="1000">
@foreach($services as $service)
<div class="flex flex-col w-full bg-gray-300/20 backdrop-blur-[4px] justify-start space-y-4 md:space-x-4 md:flex-row md:space-x-6 md:my-12 my-8 p-4 rounded-xl text-white">
    <div>
        <img class="w-[25rem] h-[13rem] md:w-[25rem] md:h-[13rem] rounded-lg items-center"
             src="{{$service->serviceImage}}" alt="Image">
    </div>
    <div class="flex flex-col md:max-w-[50rem]">
        <p class="md:text-xl text-lg font-bold">{!! $service->serviceTitle !!}</p>
        <p class="font-semibold md:text-lg text-xs ">{!! $service->serviceText !!}</p>
    </div>
</div>
@endforeach
</div>

