@extends('layouts.admin')

@section('title', 'CoreStream | Studio Intelligence')

@php
    // Movie Platform Specific Mock Data
    $stats = [
        ['label' => 'Total Library', 'value' => '4,829', 'trend' => '+42', 'color' => 'blue'],
        ['label' => 'Active Streamers', 'value' => '12.4k', 'trend' => '+24%', 'color' => 'indigo'],
        ['label' => 'Bandwidth Usage', 'value' => '4.2 TB', 'trend' => '-5%', 'color' => 'slate'],
        ['label' => 'Monthly Revenue', 'value' => '$18,240', 'trend' => '+12%', 'color' => 'emerald'],
    ];

    $recentMedia = [
        ['name' => 'The Midnight Sun', 'genre' => 'Sci-Fi', 'views' => '24.2k', 'rating' => '4.8', 'status' => 'Published'],
        ['name' => 'Echoes of Space', 'genre' => 'Documentary', 'views' => '12.1k', 'rating' => '4.5', 'status' => 'Processing'],
        ['name' => 'Neon Nights', 'genre' => 'Action', 'views' => '0', 'rating' => 'N/A', 'status' => 'Draft'],
    ];

    $alerts = [
        ['node' => 'US-East CDN', 'issue' => 'High Latency Spike', 'time' => '4 mins ago', 'type' => 'warning'],
        ['node' => 'Encoding Engine', 'issue' => 'Task #842 Failed', 'time' => '2 hours ago', 'type' => 'danger'],
    ];
@endphp

@section('content')
    <div class="max-w-6xl mx-auto pb-20">

        {{-- Admin Header --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                <div class="flex items-center gap-3">
                    <h1 class="text-3xl font-black text-slate-900 tracking-tight">Studio Control</h1>
                    <span class="px-3 py-1 bg-green-50 text-[var(--color-action)] text-[10px] font-black uppercase tracking-widest rounded-full border border-green-100">System Live</span>
                </div>
                <p class="text-slate-500 mt-1 font-medium">Real-time content performance and global delivery metrics.</p>
            </div>

            <div class="flex gap-3">
                <button class="px-5 py-3 bg-white border border-slate-200 rounded-2xl font-bold text-slate-600 hover:bg-slate-50 transition-all flex items-center gap-2 text-sm shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M9 17v-2a4 4 0 014-4h4m0 0l-4-4m4 4l-4 4"/></svg>
                    Bulk Import
                </button>
                <button class="px-5 py-3 bg-slate-900 text-white rounded-2xl font-bold hover:bg-[var(--color-action)] transition-all shadow-xl shadow-slate-200 flex items-center gap-2 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M12 4v16m8-8H4"/></svg>
                    Upload Movie
                </button>
            </div>
        </div>

        {{-- Key Metrics Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            @foreach($stats as $stat)
                <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-md transition-all">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 bg-slate-50 rounded-xl flex items-center justify-center text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </div>
                        <span class="text-[10px] font-black px-2 py-1 rounded-lg {{ $stat['trend'] == 'Stable' ? 'bg-slate-100 text-slate-500' : (str_contains($stat['trend'], '+') ? 'bg-emerald-100 text-emerald-600' : 'bg-rose-100 text-rose-600') }}">
                            {{ $stat['trend'] }}
                        </span>
                    </div>
                    <p class="text-3xl font-black text-slate-900 tracking-tight">{{ $stat['value'] }}</p>
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mt-1">{{ $stat['label'] }}</p>
                </div>
            @endforeach
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            {{-- Content Performance Table --}}
            <div class="lg:col-span-2">
                <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
                    <div class="p-8 border-b border-slate-50 flex justify-between items-center bg-white">
                        <h3 class="font-bold text-slate-900">Library Performance</h3>
                        <div class="flex gap-2">
                             <button class="p-2 bg-slate-50 rounded-lg text-slate-400 hover:text-slate-600 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="2.5"/></svg>
                             </button>
                             <select class="text-xs font-bold text-slate-500 bg-slate-50 border-none rounded-xl focus:ring-0 cursor-pointer">
                                <option>Most Viewed</option>
                                <option>Highest Rated</option>
                            </select>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-slate-50/50 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">
                                <tr>
                                    <th class="px-8 py-4">Movie/Series</th>
                                    <th class="px-8 py-4">Total Views</th>
                                    <th class="px-8 py-4">Status</th>
                                    <th class="px-8 py-4"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @foreach($recentMedia as $media)
                                    <tr class="group hover:bg-slate-50/40 transition-colors">
                                        <td class="px-8 py-6">
                                            <div class="flex items-center gap-4">
                                                <div class="w-10 h-12 bg-slate-100 rounded-lg overflow-hidden border border-slate-200 shrink-0">
                                                    <img src="https://via.placeholder.com/40x48" class="w-full h-full object-cover">
                                                </div>
                                                <div>
                                                    <p class="text-sm font-bold text-slate-900">{{ $media['name'] }}</p>
                                                    <p class="text-[11px] text-slate-400 font-medium">{{ $media['genre'] }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-8 py-6">
                                            <div class="flex flex-col gap-1">
                                                <span class="text-sm font-bold text-slate-700">{{ $media['views'] }}</span>
                                                <div class="w-20 h-1 bg-slate-100 rounded-full overflow-hidden">
                                                    <div class="h-full bg-blue-500" style="width: {{ rand(20, 90) }}%"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-8 py-6">
                                            <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase {{ $media['status'] == 'Published' ? 'bg-emerald-100 text-emerald-600' : ($media['status'] == 'Processing' ? 'bg-amber-100 text-amber-600 animate-pulse' : 'bg-slate-100 text-slate-500') }}">
                                                {{ $media['status'] }}
                                            </span>
                                        </td>
                                        <td class="px-8 py-6 text-right">
                                            <button class="opacity-0 group-hover:opacity-100 transition-opacity p-2 hover:bg-white rounded-xl shadow-sm border border-slate-100 text-slate-400 hover:text-blue-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="p-6 bg-slate-50/30 text-center border-t border-slate-50">
                        <button class="text-xs font-bold text-blue-600 hover:underline tracking-widest uppercase">Manage Content Library</button>
                    </div>
                </div>
            </div>

            {{-- Sidebar: Node Status & Settings --}}
            <div class="space-y-8">
                {{-- Infrastructure Alerts --}}
                <div class="bg-slate-900 rounded-[2.5rem] p-8 text-white shadow-2xl shadow-slate-200">
                    <div class="flex items-center justify-between mb-10">
                        <h3 class="text-xs font-black uppercase tracking-[0.2em] text-slate-400">Node Status</h3>
                        <span class="flex h-2 w-2 rounded-full bg-rose-500 animate-pulse ring-4 ring-rose-500/20"></span>
                    </div>

                    <div class="space-y-10">
                        @foreach($alerts as $alert)
                            <div class="relative pl-6 border-l-2 {{ $alert['type'] == 'warning' ? 'border-amber-500' : 'border-rose-500' }}">
                                <p class="text-[10px] font-black uppercase tracking-widest text-slate-500 mb-1">{{ $alert['node'] }}</p>
                                <p class="text-sm font-bold text-slate-100 leading-tight">{{ $alert['issue'] }}</p>
                                <p class="text-[10px] text-slate-500 mt-2 font-bold">{{ $alert['time'] }}</p>
                            </div>
                        @endforeach
                    </div>

                    <button class="w-full mt-10 py-4 bg-white/5 hover:bg-white/10 rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all border border-white/5">
                        Network Map
                    </button>
                </div>

                {{-- Platform Settings --}}
                <div class="bg-white rounded-[2.5rem] p-8 border border-slate-100 shadow-sm">
                    <h3 class="text-xs font-black uppercase tracking-[0.2em] text-slate-400 mb-6">Engine Settings</h3>
                    <div class="space-y-3">
                        <button class="w-full p-4 bg-slate-50 hover:bg-blue-50 rounded-2xl flex items-center gap-4 transition-all group">
                            <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm group-hover:text-blue-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/></svg>
                            </div>
                            <span class="text-sm font-bold text-slate-700">CDN Settings</span>
                        </button>
                        <button class="w-full p-4 bg-slate-50 hover:bg-blue-50 rounded-2xl flex items-center gap-4 transition-all group">
                            <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm group-hover:text-blue-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </div>
                            <span class="text-sm font-bold text-slate-700">Access Keys</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection