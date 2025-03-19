<div class="md:flex md:justify-center grid grid-cols-1 md:space-x-4 w-full gap-3">
    @foreach($contents as $content)
        <div class="card border-2 bg-white border-solid rounded-xl md:w-1/4 md:h-2/4 w-full shadow-lg">
            <div class="flex justify-center">
                <img class="items-center rounded-t-xl p-2" src="{{$content->contentImage}}" alt="İmage">
            </div>
            <div class="card-text p-2 font-bold">
                <p class="text-lg text-black p-2">{{$content->contentTitle}}</p>
                {!!$content->contentText!!}
            </div>
        </div>
    @endforeach
</div>

