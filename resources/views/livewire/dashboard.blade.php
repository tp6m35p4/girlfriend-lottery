<div class="min-h-screen pt-2">
    @foreach($events as $index => $event)
        <div class="pb-4 flex flex-col justify-center gap-4">
            <a class="text-2xl text-center text-white border border-white rounded-md p-2 m-4" href="{{ route('home', ['event' => $event->id]) }}" target="_blank">{{ $event->name }}</a>
{{--            <img class="object-cover" src="">--}}
{{--            <p class="text-xl text-center text-white pb-2 border border-white rounded-md p-2 m-2"></p>--}}
        </div>
    @endforeach
</div>
