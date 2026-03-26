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
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
        <div>
            <div class="flex items-center gap-3">
                <h1 class="text-4xl font-black text-slate-900 tracking-tight">Studio Control</h1>
                <span class="px-3 py-1 bg-emerald-50 text-emerald-600 text-[10px] font-black uppercase tracking-widest rounded-full border border-emerald-100 flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></span>
                    System Live
                </span>
            </div>
            <p class="text-slate-500 mt-2 font-medium text-lg">Global delivery metrics & library performance.</p>
        </div>

        <div class="flex gap-3">
            <button class="px-6 py-3.5 bg-white border border-slate-200 rounded-2xl font-bold text-slate-600 hover:bg-slate-50 transition-all flex items-center gap-2 text-sm shadow-sm">
                Bulk Import
            </button>
            <button class="px-6 py-3.5 bg-slate-900 text-white rounded-2xl font-bold hover:bg-emerald-600 transition-all shadow-xl shadow-slate-200 flex items-center gap-2 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path d="M12 4v16m8-8H4"/></svg>
                Upload Movie
            </button>
        </div>
    </div>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        @foreach($stats as $stat)
            <div class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm relative overflow-hidden group hover:scale-[1.02] transition-all">
                <div class="relative z-10 flex justify-between items-start mb-6">
                    <div class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-400 group-hover:bg-emerald-50 group-hover:text-emerald-500 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    </div>
                    <span class="text-[10px] font-black px-2.5 py-1 rounded-lg {{ str_contains($stat['trend'], '+') ? 'bg-emerald-100 text-emerald-600' : 'bg-rose-100 text-rose-600' }}">
                        {{ $stat['trend'] }}
                    </span>
                </div>
                <p class="text-4xl font-black text-slate-900 tracking-tighter">{{ $stat['value'] }}</p>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">{{ $stat['label'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Table Card --}}
        <div class="lg:col-span-2">
            <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
                <div class="p-8 border-b border-slate-50 flex justify-between items-center">
                    <h3 class="font-black text-slate-900 text-xl tracking-tight">Library Performance</h3>
                    <select class="text-xs font-black text-slate-500 bg-slate-50 border-none rounded-xl focus:ring-0 px-4 py-2 uppercase tracking-widest">
                        <option>Most Viewed</option>
                    </select>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-slate-50/50 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">
                            <tr>
                                <th class="px-8 py-5">Movie/Series</th>
                                <th class="px-8 py-5">Performance</th>
                                <th class="px-8 py-5">Status</th>
                                <th class="px-8 py-5"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @foreach($recentMedia as $media)
                                <tr class="group hover:bg-slate-50/40 transition-colors">
                                    <td class="px-8 py-6">
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-14 bg-slate-200 rounded-xl overflow-hidden shadow-sm">
                                                <img src="https://via.placeholder.com/100x120" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="text-sm font-black text-slate-900 group-hover:text-emerald-600 transition-colors">{{ $media['name'] }}</p>
                                                <p class="text-xs text-slate-400 font-bold uppercase tracking-wide">{{ $media['genre'] }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="flex flex-col gap-2">
                                            <span class="text-sm font-black text-slate-700">{{ $media['views'] }} views</span>
                                            <div class="w-24 h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                                <div class="h-full bg-emerald-500 rounded-full" style="width: {{ rand(30, 95) }}%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest {{ $media['status'] == 'Published' ? 'bg-emerald-100 text-emerald-600' : 'bg-amber-100 text-amber-600' }}">
                                            {{ $media['status'] }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-6 text-right">
                                        <button class="p-2.5 bg-slate-50 rounded-xl text-slate-400 hover:text-emerald-600 hover:bg-white transition-all shadow-sm">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Node Sidebar --}}
        <div class="space-y-6">
            <div class="bg-slate-900 rounded-[2.5rem] p-8 text-white shadow-2xl">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-xs font-black uppercase tracking-[0.2em] text-slate-500">Node Status</h3>
                    <div class="flex gap-1">
                        <span class="w-1 h-4 bg-emerald-500 rounded-full"></span>
                        <span class="w-1 h-4 bg-emerald-500 rounded-full animate-pulse"></span>
                        <span class="w-1 h-4 bg-slate-700 rounded-full"></span>
                    </div>
                </div>
                <div class="space-y-8">
                    @foreach($alerts as $alert)
                        <div class="relative pl-6 border-l-2 {{ $alert['type'] == 'warning' ? 'border-amber-500' : 'border-rose-500' }}">
                            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 mb-1">{{ $alert['node'] }}</p>
                            <p class="text-sm font-bold text-slate-100 leading-tight">{{ $alert['issue'] }}</p>
                            <p class="text-[10px] text-slate-600 mt-2 font-bold uppercase tracking-widest">{{ $alert['time'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            
            {{-- Quick Actions --}}
            <div class="bg-emerald-500 rounded-[2.5rem] p-8 text-white">
                <p class="text-xs font-black uppercase tracking-widest opacity-80 mb-2">Storage Usage</p>
                <p class="text-3xl font-black mb-4">84.2%</p>
                <div class="w-full h-3 bg-white/20 rounded-full overflow-hidden mb-6">
                    <div class="h-full bg-white w-[84%]"></div>
                </div>
                <button class="w-full py-4 bg-white text-emerald-600 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-emerald-50 transition-colors">
                    Upgrade Storage
                </button>
            </div>
        </div>
    </div>
@endsection