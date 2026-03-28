@extends('layouts.admin')

@section('title', 'Series Library')

@section('content')
    <div class="space-y-6">
        {{-- Header --}}
        <div class="flex items-center justify-between bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-sm">
            <div>
                <h1 class="text-2xl font-black text-slate-900 tracking-tight">Series Library</h1>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">
                    Manage all episodic content
                </p>
            </div>

            <a href="{{ route('series.create') }}"
                class="px-6 py-3 bg-emerald-500 text-white rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-emerald-600 transition-all shadow-lg shadow-emerald-100">
                Create New Series
            </a>
        </div>

        {{-- Desktop Table --}}
        <div class="hidden lg:block bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="p-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Series Detail</th>
                        <th class="p-6 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">
                            Structure</th>
                        <th class="p-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Status</th>
                        <th class="p-6 text-right text-[10px] font-black text-slate-400 uppercase tracking-widest">Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($seriesList as $series)
                        <tr class="group hover:bg-slate-50/50 transition-colors">
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <img src="{{ $series->content->thumbnail_url ?? asset('images/placeholder.jpg') }}"
                                        class="w-12 h-16 rounded-xl object-cover shadow-sm">

                                    <div>
                                        <p class="font-black text-slate-900 group-hover:text-emerald-600 transition-colors">
                                            {{ $series->content->title }}
                                        </p>
                                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                            {{ $series->content->genre ?? 'Unknown Genre' }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="p-6 text-center">
                                <span class="px-3 py-1 bg-slate-100 rounded-lg text-[10px] font-black text-slate-600 uppercase">
                                    {{ $series->seasons->count() }} Seasons • {{ $series->episodes_count ?? 0 }} Eps
                                </span>
                            </td>

                            <td class="p-6">
                                <div class="flex items-center gap-2">
                                    <span
                                        class="w-2 h-2 rounded-full {{ $series->content->status == 'published' ? 'bg-emerald-500' : 'bg-amber-400 animate-pulse' }}"></span>
                                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-700">
                                        {{ $series->content->status }}
                                    </span>
                                </div>
                            </td>

                            <td class="p-6 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.series.manage', $series->id) }}"
                                        class="px-5 py-2.5 bg-slate-900 text-white rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-emerald-600 transition-all shadow-sm">
                                        Manage Series
                                    </a>

                                    <a href="#"
                                        class="px-5 py-2.5 bg-white border border-slate-200 rounded-xl font-black text-[10px] uppercase tracking-widest text-slate-600 hover:bg-slate-100 transition-all shadow-sm">
                                        Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-10 text-center">
                                <p class="text-sm font-bold text-slate-500">No series found.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Mobile Cards --}}
        <div class="grid lg:hidden gap-4">
            @forelse($seriesList as $series)
                <div class="bg-white p-5 rounded-[2rem] border border-slate-100 shadow-sm space-y-4">
                    <div class="flex gap-4">
                        <img src="{{ $series->content->thumbnail_url ?? asset('images/placeholder.jpg') }}"
                            class="w-16 h-20 rounded-xl object-cover shadow-sm">

                        <div class="flex-1">
                            <h3 class="font-black text-slate-900">{{ $series->content->title }}</h3>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">
                                {{ $series->content->genre ?? 'Unknown Genre' }}
                            </p>

                            <div class="mt-3 flex items-center gap-2">
                                <span
                                    class="w-2 h-2 rounded-full {{ $series->content->status == 'published' ? 'bg-emerald-500' : 'bg-amber-400 animate-pulse' }}"></span>
                                <span class="text-[10px] font-black uppercase tracking-widest text-slate-700">
                                    {{ $series->content->status }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="text-[10px] font-black uppercase tracking-widest text-slate-500">
                        {{ $series->seasons->count() }} Seasons • {{ $series->episodes_count ?? 0 }} Episodes
                    </div>

                    <div class="flex gap-3">
                        <a href="{{ route('admin.series.manage', $series->id) }}"
                            class="flex-1 text-center px-4 py-3 bg-slate-900 text-white rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-emerald-600 transition-all">
                            Manage Series
                        </a>

                        <a href="#"
                            class="flex-1 text-center px-4 py-3 border border-slate-200 rounded-2xl font-black text-[10px] uppercase tracking-widest text-slate-600 hover:bg-slate-100 transition-all">
                            Edit
                        </a>
                    </div>
                </div>
            @empty
                <div class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm text-center">
                    <p class="text-sm font-bold text-slate-500">No series found.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection