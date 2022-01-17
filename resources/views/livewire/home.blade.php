<div class="min-h-screen pt-4">
    <div class="pb-4">
        <p class="text-4xl text-center text-white">Drink and Win!</p>
    </div>
    <div class="grid grid-cols-6 mx-4 border-2 border-pink-900">
        @foreach($lotteries as $lottery)
            <div class="flex justify-center items-center border-4 border-pink-900 bg-pink-800 aspect-square">
                @if($lottery->status)
                <button class="flex justify-center items-center w-full h-full bg-yellow-400" wire:click="toDetail('{{ $lottery->code }}')">
                    @if($lottery->is_used) V @else {{$loop->index + 1}} @endif
                </button>
                @else
                    <p class="flex justify-center items-center text-white" wire:click="">
                        {{$loop->index + 1}}
                    </p>
                @endif
            </div>
        @endforeach
    </div>
    <div class="p-8 gap-4">
        <div class="flex flex-col p-4 justify-center items-center border-8 border-yellow-700 bg-pink-600 gap-4">
            <label for="code" class="text-white text-2xl w-full text-center font-bold">輸入兌換碼</label>
            <input type="text" class="w-full h-16 mx-2" id="code" wire:model="code">
            <button class="bg-yellow-500 h-16 w-full border-8 border-yellow-300" wire:click="redeem" wire:loading.attr="disabled">兌換</button>
        </div>

    </div>
{{--    modal--}}

    <div
        x-data="{ show: false }"
        @lottery-redeemed.window="show = true"
        x-on:close.stop="show = false"
        x-on:keydown.escape.window="show = false"
        x-show="show"
        class="jetstream-modal fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
        style="display: none;"
    >
        <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <div x-show="show" class="mb-6 bg-yellow-700 rounded-lg text-white overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            <div class="px-6 py-4">
                <div class="text-lg text-center">
                    恭喜你
                </div>

                <div class="mt-4">
                    {{ $redeemedLottery->title??'' }}
                </div>
            </div>

            <div class="flex flex-row justify-end px-6 py-4 text-right">
                <a class="border-2 border-yellow-500 p-2" href="{{ $redeemedLottery->href??'' }}">查看獎品</a>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        window.addEventListener('cool-down', function (e) {
            alert('喝太快了啦');
        })
        window.addEventListener('lottery-not-found', function (e) {
            alert('好像打錯了喲');
        })
    </script>
@endpush
