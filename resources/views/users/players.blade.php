@extends('layouts.app')

@php
    $isSeries = true;
    $playlist = [
        ['id' => 1, 'title' => 'The Awakening', 'duration' => '10:00', 'url' => 'https://test-videos.co.uk/vids/bigbuckbunny/mp4/h264/720/Big_Buck_Bunny_720_10s_1MB.mp4', 'thumbnail' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?q=80&w=200'],
        ['id' => 2, 'title' => 'The Reckoning', 'duration' => '08:45', 'url' => 'https://www.w3schools.com/html/mov_bbb.mp4', 'thumbnail' => 'https://images.unsplash.com/photo-1501854140801-50d01698950b?q=80&w=200'],
        ['id' => 3, 'title' => 'Final Stand', 'duration' => '12:20', 'url' => 'https://test-videos.co.uk/vids/bigbuckbunny/mp4/h264/720/Big_Buck_Bunny_720_10s_1MB.mp4', 'thumbnail' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=200'],
    ];
@endphp

@section('content')
    <div class="min-h-screen bg-[var(--color-body-bg)] text-white font-sans selection:bg-[var(--color-action)]" x-data="{ 
            activeId: 1, 
            videoUrl: '{{ $playlist[0]['url'] }}',
            changeVideo(id, url) {
                this.activeId = id;
                this.videoUrl = url;
            }
         }">

        <div class="h-16 md:h-20"></div>

        <div class="w-full max-w-[1700px] mx-auto flex flex-col lg:flex-row gap-2 lg:gap-4 p-0 md:p-4">

            <div class="flex-1">
                <div class="relative aspect-video w-full bg-black group overflow-hidden border border-white/10 shadow-2xl">
                    <iframe :src="videoUrl" class="absolute inset-0 w-full h-full border-0" allowfullscreen></iframe>

                    <div class="absolute top-4 left-4 z-30 flex gap-2">
                        <a href="javascript:history.back()"
                            class="bg-black/80 backdrop-blur-md border border-white/20 px-4 py-1.5 text-[10px] font-black uppercase tracking-widest hover:border-[var(--color-action)] transition-all">
                            ← Exit_Room
                        </a>
                    </div>

                    <div class="absolute bottom-0 left-0 w-full h-1 bg-white/10">
                        <div class="h-full bg-[var(--color-action)] transition-all duration-500"
                            :style="`width: ${(activeId / {{ count($playlist) }}) * 100}%` shadow-[0_0_15px_var(--color-action)]">
                        </div>
                    </div>
                </div>

                <div class="mt-6 px-6 md:px-0">
                    <div class="flex flex-col gap-2">
                        <div class="flex items-center gap-4">
                            <span
                                class="text-[var(--color-action)] text-[10px] font-black tracking-[0.3em] uppercase">Sector
                                // 0{{ $isSeries ? '1' : '0' }}</span>
                            <div class="h-[1px] flex-1 bg-white/5"></div>
                        </div>
                        <h1 class="text-3xl md:text-6xl font-[1000] uppercase tracking-tighter italic leading-none">
                            Big Buck <span class="text-white/20 group-hover:text-white transition-colors">Bunny</span>
                        </h1>
                        <div class="flex gap-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest pt-2">
                            <span>4K_STREAM</span>
                            <span class="text-[var(--color-action)]">TRANSLATED // KEVIN</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-[400px] shrink-0">
                <div class="bg-white/[0.02] border border-white/10 h-full flex flex-col">
                    <div class="p-5 border-b border-white/10 bg-white/[0.02] flex justify-between items-end">
                        <div>
                            <h3 class="text-[10px] font-black uppercase tracking-[0.4em] text-gray-500 mb-1">Queue_Content
                            </h3>
                            <p class="text-xs font-bold uppercase tracking-tighter italic">
                                {{ $isSeries ? 'Season_One' : 'File_Segments' }}
                            </p>
                        </div>
                        <div class="text-[rgb(4,145,23)] font-mono text-xs font-bold tracking-tighter">
                            [<span x-text="activeId"></span>/{{ count($playlist) }}]
                        </div>
                    </div>

                    <div class="overflow-y-auto max-h-[500px] lg:max-h-[70vh] scrollbar-hide">
                        @foreach($playlist as $index => $item)
                            <div @click="changeVideo({{ $item['id'] }}, '{{ $item['url'] }}')"
                                class="relative flex items-center gap-4 p-4 cursor-pointer transition-all border-b border-white/[0.03] group"
                                :class="activeId === {{ $item['id'] }} ? 'bg-[var(--color-action)]/10 border-l-4 border-l-[var(--color-action)]' : 'hover:bg-white/[0.03] border-l-4 border-l-transparent'">

                                <span class="text-[10px] font-black opacity-20 group-hover:opacity-100 transition-opacity"
                                    :class="activeId === {{ $item['id'] }} ? 'text-[var(--color-action)] opacity-100' : ''">
                                    0{{ $index + 1 }}
                                </span>

                                <div
                                    class="relative w-20 aspect-square shrink-0 bg-gray-900 border border-white/10 overflow-hidden">
                                    <img src="{{ $item['thumbnail'] }}"
                                        class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500"
                                        :class="activeId === {{ $item['id'] }} ? 'grayscale-0' : ''">
                                    <div class="absolute inset-0 flex items-center justify-center bg-[var(--color-action)]/20 opacity-0 group-hover:opacity-100 transition-opacity"
                                        x-show="activeId !== {{ $item['id'] }}">
                                        <svg class="w-5 h-5 fill-white" viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z" />
                                        </svg>
                                    </div>
                                </div>

                                <div class="min-w-0">
                                    <h4 class="text-[11px] font-black uppercase tracking-tight truncate leading-tight mb-1"
                                        :class="activeId === {{ $item['id'] }} ? 'text-[var(--color-action)]' : 'text-white'">
                                        {{ $item['title'] }}
                                    </h4>
                                    <p class="text-[9px] font-bold text-gray-600 uppercase tracking-widest">
                                        {{ $item['duration'] }} // SEC_INFO</p>
                                </div>

                                <div x-show="activeId === {{ $item['id'] }}"
                                    class="absolute right-4 flex gap-0.5 h-3 items-end">
                                    <div class="w-0.5 bg-[var(--color-action)] animate-[bounce_1s_infinite_0.1s]"></div>
                                    <div class="w-0.5 bg-[var(--color-action)] animate-[bounce_1s_infinite_0.3s]"></div>
                                    <div class="w-0.5 bg-[var(--color-action)] animate-[bounce_1s_infinite_0.2s]"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed inset-0 pointer-events-none opacity-[0.03] z-[100]"
            style="background: linear-gradient(rgba(18, 16, 16, 0) 50%, rgba(0, 0, 0, 0.25) 50%), linear-gradient(90deg, rgba(255, 0, 0, 0.06), rgba(0, 255, 0, 0.02), rgba(0, 0, 255, 0.06)); background-size: 100% 2px, 3px 100%;">
        </div>
    </div>

    <style>
        /* Sharp/Unique Aesthetics */
        .font-\[1000\] {
            font-weight: 1000;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        /* Custom bounce animation for the "playing" indicator */
        @keyframes bounce {

            0%,
            100% {
                height: 4px;
            }

            50% {
                height: 12px;
            }
        }
    </style>
@endsection