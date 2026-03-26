<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') | CoreStream</title>
    @vite(['resources/css/admin.css', 'resources/js/app.js'])
    <style>
        :root {
            --color-action: #049117;
        }

        [x-cloak] {
            display: none !important;
        }

        .fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="bg-white text-slate-800 font-sans antialiased" x-data="{ sidebarOpen: true }">

    {{-- SIDEBAR --}}
    <aside
        class="fixed inset-y-0 left-0 bg-white border-r border-slate-100 transition-all duration-300 z-50 overflow-hidden"
        :class="sidebarOpen ? 'w-64' : 'w-20'">

        {{-- Sidebar Logo Section --}}
        <div class="h-20 flex items-center px-6 border-b border-slate-50">
            <a href="/" class="flex items-center group">
                <div
                    class="min-w-[32px] w-8 h-8 bg-[var(--color-action)] rounded-lg flex items-center justify-center shadow-lg shadow-green-500/20">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <span x-show="sidebarOpen" x-transition.opacity
                    class="ml-3 text-lg font-bold tracking-tight text-slate-900 whitespace-nowrap">
                    Core<span class="text-[var(--color-action)]">Stream</span>
                </span>
            </a>
        </div>

        {{-- Nav Links --}}
        <nav class="p-4 space-y-2">
            @php
                $nav = [
                    ['label' => 'Dashboard', 'route' => 'admin.dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                    ['label' => 'Movies', 'route' => 'admin.dashboard', 'icon' => 'M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4'],
                    ['label' => 'Series', 'route' => 'admin.dashboard', 'icon' => 'M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z'],
                    ['label' => 'Users', 'route' => 'admin.dashboard', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197'],
                ];
            @endphp

            @foreach($nav as $item)
                <a href="{{ route($item['route']) }}"
                    class="flex items-center p-3 rounded-xl transition-all group {{ request()->routeIs($item['route']) ? 'bg-slate-50 text-[var(--color-action)]' : 'text-slate-400 hover:text-slate-900 hover:bg-slate-50' }}">
                    <svg class="w-6 h-6 min-w-[24px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="{{ $item['icon'] }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span x-show="sidebarOpen" x-transition.opacity
                        class="ml-4 font-semibold text-sm whitespace-nowrap">{{ $item['label'] }}</span>
                </a>
            @endforeach
        </nav>
    </aside>

    {{-- CONTENT AREA --}}
    <div class="transition-all duration-300" :class="sidebarOpen ? 'ml-64' : 'ml-20'">

        {{-- TOP HEADER --}}
        <header
            class="h-20 bg-white/80 backdrop-blur-md sticky top-0 z-40 border-b border-slate-50 px-8 flex items-center justify-between">
            <button @click="sidebarOpen = !sidebarOpen"
                class="p-2 rounded-lg text-slate-400 hover:bg-slate-50 hover:text-slate-900 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M4 6h16M4 12h16m-7 6h7" stroke-width="2" stroke-linecap="round" />
                </svg>
            </button>

            <div class="flex items-center gap-6">
                @yield('header_actions')

                <div class="h-6 w-[1px] bg-slate-100 mx-1"></div>

                <div class="flex items-center gap-3">
                    <div class="text-right leading-tight hidden sm:block">
                        <p class="text-[11px] font-bold text-slate-900 uppercase">
                            {{ auth()->user()->name ?? 'Administrator' }}</p>
                        <p class="text-[9px] font-medium text-[var(--color-action)] uppercase tracking-wider">Super
                            Access</p>
                    </div>
                    <div
                        class="w-10 h-10 bg-slate-50 rounded-full overflow-hidden border border-slate-200 ring-2 ring-transparent hover:ring-green-100 transition-all cursor-pointer">
                        <img src="https://ui-avatars.com/api/?name=Admin&background=f8fafc&color=64748b" alt="avatar">
                    </div>
                </div>
            </div>
        </header>

        {{-- MAIN CONTENT --}}
        <main class="p-10 fade-in max-w-7xl mx-auto">
            <div class="mb-10">
                <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight">@yield('page_title')</h1>
                <p class="text-slate-400 mt-2 font-medium">@yield('page_subtitle')</p>
            </div>

            @yield('content')
        </main>
    </div>

</body>

</html>