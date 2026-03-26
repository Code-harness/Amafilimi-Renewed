@props(['movie'])

<div x-data="{ 
        loaded: false, 
        init() {
            {{-- Check if image is already complete (cached) on init --}}
            if (this.$refs.poster.complete) this.loaded = true;
        } 
     }" class="group cursor-pointer relative flex-none w-[140px] md:w-[180px] snap-start">

    {{-- 1. THE SKELETON (Shows while loaded is false) --}}
    <div x-show="!loaded"
        class="absolute inset-0 z-20 aspect-[2/3] rounded-sm bg-white/[0.03] animate-pulse flex flex-col items-center justify-center border border-white/5">
        {{-- Modern Spinner --}}
        <div class="relative w-8 h-8">
            <div class="absolute inset-0 border-2 border-[var(--color-action)]/10 rounded-full"></div>
            <div
                class="absolute inset-0 border-2 border-t-[var(--color-action)] rounded-full animate-spin shadow-[0_0_15px_var(--color-action)]">
            </div>
        </div>
        <span class="mt-4 text-[7px] font-black uppercase tracking-[0.2em] text-gray-600">Syncing_Data...</span>
    </div>

    {{-- 2. THE MAIN CARD --}}
    <div
        class="relative aspect-[2/3] rounded-sm overflow-hidden bg-gray-950 border border-white/5 mb-3 transition-all duration-500 
                group-hover:-translate-y-2 group-hover:shadow-[0_20px_40px_-15px_rgba(0,0,0,0.9)] group-hover:border-[var(--color-action)]/40">

        {{-- Translator Tag --}}
        @if(isset($movie['translator']))
            <div
                class="absolute top-2 right-2 z-30 flex items-center gap-1 bg-black/80 backdrop-blur-md px-2 py-0.5 border border-white/10 shadow-lg">
                <span
                    class="text-[7px] font-black text-white/90 uppercase tracking-tighter">{{ $movie['translator'] }}</span>
            </div>
        @endif

        {{-- Poster Image --}}
        <img x-ref="poster" src="{{ $movie['img'] }}" @load="loaded = true"
            class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110"
            :class="loaded ? 'opacity-100' : 'opacity-0'">

        {{-- Hover Overlays --}}
        <div
            class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-80 group-hover:opacity-40 transition-opacity">
        </div>

        <div
            class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-500">
            <div
                class="w-10 h-10 bg-[var(--color-action)] text-white flex items-center justify-center shadow-[0_0_20px_var(--color-action)] transform scale-75 group-hover:scale-100">
                <svg class="w-5 h-5 fill-current ml-0.5" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z" />
                </svg>
            </div>
        </div>

        {{-- Rating --}}
        <div
            class="absolute top-2 left-2 bg-black/90 px-1.5 py-0.5 border border-white/10 text-[8px] font-black text-white shadow-lg">
            {{ $movie['rating'] ?? '8.5' }}
        </div>
    </div>

    {{-- Title Info (Only show when loaded to prevent layout shift) --}}
    <div class="px-1 space-y-0.5 transition-opacity duration-300" :class="loaded ? 'opacity-100' : 'opacity-0'">
        <h3
            class="text-[11px] md:text-xs font-bold truncate text-white/90 group-hover:text-[var(--color-action)] uppercase tracking-tight">
            {{ $movie['title'] }}
        </h3>
        <p class="text-[8px] text-gray-500 font-bold uppercase tracking-[0.1em] truncate italic">
            {{ $movie['sub'] }}
        </p>
    </div>
</div>