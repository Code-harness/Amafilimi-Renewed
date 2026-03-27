@php
    $alerts = [
        'success' => ['bg' => 'bg-emerald-50', 'border' => 'border-emerald-500', 'text' => 'text-emerald-900', 'icon' => 'M5 13l4 4L19 7', 'accent' => 'bg-emerald-600', 'label' => 'Success'],
        'error' => ['bg' => 'bg-rose-50', 'border' => 'border-rose-500', 'text' => 'text-rose-900', 'icon' => 'M6 18L18 6M6 6l12 12', 'accent' => 'bg-rose-600', 'label' => 'Error'],
        'warning' => ['bg' => 'bg-amber-50', 'border' => 'border-amber-500', 'text' => 'text-amber-900', 'icon' => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z', 'accent' => 'bg-amber-600', 'label' => 'Warning'],
    ];
@endphp

<div
    class="fixed top-4 right-0 left-0 md:left-auto md:right-6 z-[9999] flex flex-col items-center md:items-end space-y-3 pointer-events-none px-4 md:px-0 w-full max-w-sm ml-auto">

    @foreach($alerts as $key => $style)
        @if(session()->has($key))
            <div x-data="{ 
                            show: true, 
                            offsetX: 0, 
                            startX: 0,
                            dismiss() { this.show = false }
                         }" x-show="show" x-init="setTimeout(() => dismiss(), 5000)" {{-- Touch Events for Swiping --}}
                @touchstart="startX = $event.touches[0].clientX" @touchmove="offsetX = $event.touches[0].clientX - startX"
                @touchend="if (Math.abs(offsetX) > 100) { dismiss() } else { offsetX = 0 }" {{-- Transitions --}}
                x-transition:enter="transition ease-out duration-400" x-transition:enter-start="translate-y-[-20px] opacity-0"
                x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" {{-- Dynamic
                Styling for Swipe --}}
                :style="`transform: translateX(${offsetX}px); transition: ${offsetX === 0 ? '0.3s' : '0s'}`"
                class="pointer-events-auto relative w-full {{ $style['bg'] }} border-l-[6px] {{ $style['border'] }} shadow-2xl shadow-black/5 rounded-r-xl p-4 overflow-hidden select-none touch-none">

                <div class="flex items-start gap-3">
                    {{-- Icon Container --}}
                    <div
                        class="flex-shrink-0 w-9 h-9 rounded-lg {{ $style['accent'] }} text-white flex items-center justify-center shadow-lg shadow-{{ explode('-', $style['accent'])[1] }}-200/50">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="{{ $style['icon'] }}" />
                        </svg>
                    </div>

                    <div class="flex-grow min-w-0">
                        <p
                            class="text-[10px] font-black uppercase tracking-[0.1em] {{ $style['text'] }} opacity-50 leading-none mb-1">
                            {{ session($key . '_label') ?? $style['label'] }}
                        </p>
                        <p class="text-[13px] font-bold {{ $style['text'] }} leading-snug">
                            {{ session($key) }}
                        </p>
                    </div>

                    {{-- Close Button --}}
                    <button @click="dismiss()" class="{{ $style['text'] }} opacity-30 hover:opacity-100 transition-opacity p-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M6 18L18 6M6 6l12 12" stroke-width="3" />
                        </svg>
                    </button>
                </div>

                {{-- Visual Hint for Swipe on Mobile (Optional line) --}}
                <div class="absolute bottom-1 left-1/2 -translate-x-1/2 w-8 h-1 bg-black/5 rounded-full md:hidden"></div>
            </div>
        @endif
    @endforeach

    {{-- Validation Errors (Grouped) --}}
    @if($errors->any())
        <div x-data="{ show: true, offsetX: 0, startX: 0 }" x-show="show" @touchstart="startX = $event.touches[0].clientX"
            @touchmove="offsetX = $event.touches[0].clientX - startX"
            @touchend="if (Math.abs(offsetX) > 100) { show = false } else { offsetX = 0 }"
            :style="`transform: translateX(${offsetX}px); transition: ${offsetX === 0 ? '0.3s' : '0s'}`"
            x-transition:enter="transition ease-out duration-400" x-transition:enter-start="translate-y-[-20px] opacity-0"
            class="pointer-events-auto w-full bg-rose-50 border-l-[6px] border-rose-500 shadow-2xl rounded-r-xl p-4 touch-none">

            <div class="flex items-start gap-3">
                <div class="flex-shrink-0 w-9 h-9 rounded-lg bg-rose-600 text-white flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div class="flex-grow">
                    <p class="text-[10px] font-black uppercase tracking-widest text-rose-900 opacity-50 mb-2">Ibibazo
                        byabonetse</p>
                    <ul class="space-y-1.5">
                        @foreach($errors->all() as $error)
                            <li class="text-[12px] font-bold text-rose-900 flex items-start gap-2">
                                <span class="mt-1.5 w-1 h-1 rounded-full bg-rose-400 shrink-0"></span>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
</div>