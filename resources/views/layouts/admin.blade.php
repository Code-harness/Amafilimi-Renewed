<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50/50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') | CoreStream</title>
    @vite(['resources/css/admin.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }

        :root {
            --color-primary: #049117;
        }
    </style>
</head>

<body class="h-full antialiased" x-data="{ sidebarOpen: true }">

    <aside
        class="fixed inset-y-0 left-0 z-50 transition-all duration-300 bg-slate-900 border-r border-slate-800 flex flex-col"
        :class="sidebarOpen ? 'w-64' : 'w-20'">

        <div class="h-16 flex items-center px-6 gap-3 overflow-hidden whitespace-nowrap">
            <div class="w-8 h-8 bg-emerald-500 rounded-lg shrink-0 flex items-center justify-center">
                <div class="w-4 h-4 bg-white rounded-sm rotate-45"></div>
            </div>
            <span class="font-black text-white tracking-tighter text-xl transition-opacity duration-300"
                :class="sidebarOpen ? 'opacity-100' : 'opacity-0'">CORESTREAM</span>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2">
            <a href="#"
                class="flex items-center gap-4 px-3 py-3 rounded-xl bg-emerald-500/10 text-emerald-500 font-bold group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span x-show="sidebarOpen">Studio Control</span>
            </a>
            <a href="#"
                class="flex items-center gap-4 px-3 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2"
                        d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                </svg>
                <span x-show="sidebarOpen">Movies & Series</span>
            </a>
            <a href="#"
                class="flex items-center gap-4 px-3 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                <span x-show="sidebarOpen">Analytics</span>
            </a>
        </nav>

        <div class="p-4 border-t border-slate-800">
            <button @click="sidebarOpen = !sidebarOpen"
                class="w-full flex items-center justify-center p-3 rounded-xl bg-slate-800 text-slate-400 hover:text-white">
                <svg class="w-5 h-5" :class="!sidebarOpen && 'rotate-180'" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-width="2.5" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                </svg>
            </button>
        </div>
    </aside>

    <div class="transition-all duration-300" :class="sidebarOpen ? 'pl-64' : 'pl-20'">

        <header
            class="sticky top-0 z-40 h-16 bg-white/80 backdrop-blur-md border-b border-slate-100 px-8 flex items-center justify-between">
            <div class="relative w-96">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </span>
                <input type="text" placeholder="Search library..."
                    class="w-full bg-slate-100 border-none rounded-xl py-2 pl-10 text-sm focus:ring-2 focus:ring-emerald-500/20">
            </div>

            <div class="flex items-center gap-4">
                <div class="text-right hidden sm:block">
                    <p class="text-xs font-black text-slate-900 leading-none uppercase">Studio Admin</p>
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Level 4 Node</p>
                </div>
                <div class="w-10 h-10 rounded-full bg-slate-200 border-2 border-white ring-1 ring-slate-100"></div>
            </div>
        </header>

        <main class="p-8 max-w-7xl mx-auto">
            @yield('content')
        </main>
    </div>

</body>

</html>