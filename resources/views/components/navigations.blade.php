<nav x-data="{ open: false }" class="sticky top-0 z-50 border-b border-white/5 backdrop-blur-md"
    style="background: linear-gradient(to right, var(--color-nav-start), var(--color-nav-middle), var(--color-nav-end));">

    <div class="container mx-auto px-6 py-4 flex items-center justify-between">

        <div class="flex items-center gap-10">
            <a href="/" class="group flex items-center gap-2">
                <div
                    class="w-8 h-8 bg-[rgb(4,145,23)] rounded-lg flex items-center justify-center shadow-lg shadow-[rgb(4,145,23)]/20 group-hover:rotate-6 transition-all duration-300">
                    <svg class="w-5 h-5 text-white fill-current" viewBox="0 0 24 24">
                        <path
                            d="M7 3H17C19.2091 3 21 4.79086 21 7V17C21 19.2091 19.2091 21 17 21H7C4.79086 21 3 19.2091 3 17V7C3 4.79086 4.79086 3 7 3ZM10 9V15L15 12L10 9Z" />
                    </svg>
                </div>
                <span class="text-2xl font-black tracking-tighter text-white uppercase italic">
                    AM<span class="text-[rgb(4,145,23)]">FILIMI</span>
                </span>
            </a>

            <div class="hidden md:flex gap-8 text-[11px] font-black uppercase tracking-[0.2em] text-gray-300">
                <a href="#"
                    class="hover:text-[rgb(4,145,23)] transition-colors border-b-2 border-transparent hover:border-[rgb(4,145,23)] pb-1">Movies</a>
                <a href="#"
                    class="hover:text-[rgb(4,145,23)] transition-colors border-b-2 border-transparent hover:border-[rgb(4,145,23)] pb-1">TV
                    Series</a>
                <a href="#"
                    class="hover:text-[rgb(4,145,23)] transition-colors border-b-2 border-transparent hover:border-[rgb(4,145,23)] pb-1">Anime</a>
            </div>
        </div>

        <div class="flex items-center gap-6">
            <div class="relative hidden sm:block">
                <input type="text" placeholder="Search titles..."
                    class="bg-white/5 border border-white/10 rounded-xl px-5 py-2 text-xs w-64 focus:ring-2 focus:ring-[rgb(4,145,23)] transition-all outline-none text-gray-200 placeholder-gray-500"
                    style="background-color: rgba(255, 255, 255, 0.03);"
                    onfocus="this.style.backgroundColor='var(--color-nav-middle)'"
                    onblur="this.style.backgroundColor='rgba(255, 255, 255, 0.03)'">
                <div class="absolute right-4 top-2.5 text-gray-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="2.5"
                            stroke-linecap="round" />
                    </svg>
                </div>
            </div>

            <div class="flex items-center gap-3 pl-4 border-l border-white/10">
                <div class="hidden lg:block text-right">
                    <p class="text-[10px] font-bold text-white leading-none">Manzi Kevin</p>
                    <p class="text-[9px] text-[rgb(4,145,23)] font-medium">Premium Member</p>
                </div>
                <button
                    class="w-10 h-10 rounded-2xl bg-gradient-to-br from-[rgb(4,145,23)] to-[rgb(3,110,18)] flex items-center justify-center font-black text-sm text-white shadow-lg shadow-[rgb(4,145,23)]/20 hover:scale-105 transition-transform border border-white/10">
                    MK
                </button>
            </div>

            <button @click="open = !open" class="md:hidden text-gray-400 hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M4 6h16M4 12h16m-7 6h7" stroke-width="2" stroke-linecap="round" />
                </svg>
            </button>
        </div>
    </div>

    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        class="md:hidden border-t border-white/5 p-4 space-y-4 font-bold text-sm text-gray-300"
        style="background-color: var(--color-nav-middle);">
        <a href="#" class="block hover:text-[rgb(4,145,23)]">Movies</a>
        <a href="#" class="block hover:text-[rgb(4,145,23)]">TV Series</a>
        <a href="#" class="block hover:text-[rgb(4,145,23)]">Anime</a>
    </div>
</nav>