<div class="min-h-screen pt-2">

        <div class="flex flex-col justify-center gap-2">
            <p class="text-3xl font-bold text-white text-center py-4 mx-4">樂透清單</p>
            @foreach($events as $index => $event)
            <a class="text-xl text-center text-white bg-red-400 border border-white py-4 mx-4" href="{{ route('home', ['event' => $event->id]) }}">{{ $event->name }}</a>
{{--            <img class="object-cover" src="">--}}
{{--            <p class="text-xl text-center text-white pb-2 border border-white rounded-md p-2 m-2"></p>--}}
            @endforeach
        </div>

</div>
