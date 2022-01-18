<div class="min-h-screen pt-2">
    <div class="pb-4 flex flex-col justify-center gap-4">
        <a class="text-2xl text-center text-white border border-white rounded-md p-2 m-4" href="{{ $lottery->link }}" target="_blank">{{ $lottery->title }}</a>
        <img class="object-cover" src="{{ $lottery->image }}">
        <p class="text-xl text-center text-white pb-2 border border-white rounded-md p-2 m-2">{{ $lottery->content }}</p>
    </div>

</div>
