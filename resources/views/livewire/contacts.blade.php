<div class="w-full flex justify-center md:mt-12 md:mb-12 md:p-12">
    @foreach($contacts as $con)
    <div class="p-4 md:p-2 mt-2 mb-2 backdrop-blur-sm rounded-2xl xl:w-3/5 bg-gray-400/20 w-[95%]">
        <div class="flex justify-center border-b-2 border-solid border-white">
            <p class="text-xl text-white font-bold">Who Are We?</p>
        </div>
        <div class="text-start p-2 mb-4 text-white">
            <p>{!! $con->introduce !!}</p>
        </div>
        <div class="flex justify-center border-b-2 border-solid border-white">
            <p class="text-xl text-white font-bold">Our Vision</p>
        </div>
        <div class="text-start p-2 mb-4 text-white">
            <p>{!! $con->vision !!}</p>
        </div>
        <div class="flex justify-center border-b-2 border-solid border-white">
            <p class="text-xl text-white font-bold">Contact</p>
        </div>
        <div class="flex flex-col justify-center p-2 mb-4 text-white space-y-2 mt-8">
            <P>{{$con->address}}</P>
            <p>Email: <a class="hover:text-blue-500" href="#">{{$con->email}}</a></p>
            <P>Phone: {{$con->phone}}</P>
        </div>
    </div>
    @endforeach
</div>