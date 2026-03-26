<nav class="sticky md:fixed top-0 left-0 w-full z-50 border-b border-white/5 backdrop-blur-md transition-all duration-300"
    style="background: linear-gradient(to bottom, rgba(0,0,0,0.9), rgba(0,0,0,0.4));">

    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
        <div class="flex items-center gap-10">
            <a href="/" class="group flex items-center gap-2 py-1 shrink-0">
                <img src="{{ asset('images/logo.png') }}" alt="Logo"
                    class="h-8 md:h-9 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
            </a>

            <div class="hidden md:flex gap-8 text-[11px] font-black uppercase tracking-[0.2em] text-gray-300">
                <a href="#" class="hover:text-[rgb(4,145,23)] transition-all">Movies</a>
                <a href="#" class="hover:text-[rgb(4,145,23)] transition-all">TV Series</a>
                <a href="#" class="hover:text-[rgb(4,145,23)] transition-all">Anime</a>
            </div>
        </div>

        <div class="flex items-center gap-4 md:gap-6">
            <div class="relative hidden sm:block">
                <input type="text" placeholder="Search titles..."
                    class="bg-white/5 border border-white/10 rounded-full px-5 py-2 text-[11px] w-48 lg:w-64 focus:ring-1 focus:ring-[rgb(4,145,23)] transition-all outline-none text-gray-200 placeholder-gray-500 hover:bg-white/10">
                <div class="absolute right-4 top-2.5 text-gray-500">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="3" stroke-linecap="round" />
                    </svg>
                </div>
            </div>

            <div class="flex items-center gap-3 pl-4 border-l border-white/10">
                <div class="hidden lg:block text-right">
                    <p class="text-[10px] font-bold text-white leading-none">Manzi Kevin</p>
                    <p class="text-[9px] text-[rgb(4,145,23)] font-medium">Premium</p>
                </div>
                <button
                    class="w-9 h-9 rounded-xl bg-gradient-to-br from-[rgb(4,145,23)] to-[rgb(3,110,18)] flex items-center justify-center font-black text-xs text-white shadow-lg shadow-[rgb(4,145,23)]/20 border border-white/10 transition-transform active:scale-90">
                    MK
                </button>
            </div>
        </div>
    </div>
</nav>

<div class="md:hidden fixed bottom-0 left-0 w-full z-[100] px-4 pb-4">
    <div
        class="bg-black/90 backdrop-blur-xl border border-white/10 rounded-2xl flex items-center justify-around py-3 px-2 shadow-[0_-10px_40px_rgba(0,0,0,0.5)]">

        <a href="/" class="flex flex-col items-center gap-1 group">
            <svg class="w-6 h-6 text-[rgb(4,145,23)]" fill="currentColor" viewBox="0 0 24 24">
                <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z" />
            </svg>
            <span class="text-[9px] font-bold uppercase tracking-tighter text-white">Home</span>
        </a>

        <a href="#"
            class="flex flex-col items-center gap-1 group text-gray-500 hover:text-[rgb(4,145,23)] transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4" stroke-width="2" stroke-linecap="round" />
            </svg>
            <span class="text-[9px] font-bold uppercase tracking-tighter">Movies</span>
        </a>

        <button
            class="relative -mt-10 bg-[rgb(4,145,23)] w-14 h-14 rounded-full border-4 border-[var(--color-body-bg)] flex items-center justify-center shadow-xl shadow-[rgb(4,145,23)]/40 text-white active:scale-95 transition-transform">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="3" stroke-linecap="round" />
            </svg>
        </button>

        <a href="#"
            class="flex flex-col items-center gap-1 group text-gray-500 hover:text-[rgb(4,145,23)] transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M4.5 2h15a2 2 0 012 2v12a2 2 0 01-2 2h-15a2 2 0 01-2-2V4a2 2 0 012-2zM8 20h8M12 18v2"
                    stroke-width="2" stroke-linecap="round" />
            </svg>
            <span class="text-[9px] font-bold uppercase tracking-tighter">Series</span>
        </a>

        <a href="#"
            class="flex flex-col items-center gap-1 group text-gray-500 hover:text-[rgb(4,145,23)] transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" stroke-width="2"
                    stroke-linecap="round" />
            </svg>
            <span class="text-[9px] font-bold uppercase tracking-tighter">Profile</span>
        </a>
    </div>
</div>
</nav>