<div>
    <div class="grid grid-cols-6 gap-4">
        @foreach($lotteries as $lottery)
            <div class="flex justify-center items-center">
                <button class="border-4 rounded-md h-16 w-16 p-4 flex justify-center items-center" wire:click="">
                    {{$loop->index}}
                </button>
            </div>
        @endforeach
    </div>
    {{ $code }}
    <div class="flex justify-center items-center pt-4 gap-4">
        <div class="mb-3 mt-3">
            <label for="code" class="form-label">輸入兌換碼</label>
            <input type="text" class="form-control" id="code" wire:model="code">
        </div>
        <button class="bg-yellow-500 h-16 w-16 border-8 border-yellow-300">兌換</button>
    </div>

</div>

