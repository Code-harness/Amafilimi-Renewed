@php
    $users = [
        ['name' => 'Alex Rivera', 'email' => 'alex@studio.com', 'role' => 'Super Admin', 'status' => 'Active', 'last_login' => '2 mins ago', 'avatar' => 'https://i.pravatar.cc/150?u=alex'],
        ['name' => 'Sarah Chen', 'email' => 'sarah.c@content.com', 'role' => 'Editor', 'status' => 'Active', 'last_login' => '1 hour ago', 'avatar' => 'https://i.pravatar.cc/150?u=sarah'],
        ['name' => 'Marcus Thorne', 'email' => 'm.thorne@ops.com', 'role' => 'Moderator', 'status' => 'Suspended', 'last_login' => '2 days ago', 'avatar' => 'https://i.pravatar.cc/150?u=marcus'],
        ['name' => 'Elena Vance', 'email' => 'elena@vance.io', 'role' => 'Editor', 'status' => 'Active', 'last_login' => '5 hours ago', 'avatar' => 'https://i.pravatar.cc/150?u=elena'],
    ];
@endphp

@extends('layouts.admin')

@section('content')
    <div class="space-y-6" x-data="{ 
        editModal: false, 
        deleteModal: false,
        activeUser: {},
        searchQuery: '' 
    }">

        {{-- Stats Overview --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm flex items-center gap-5">
                <div class="w-14 h-14 bg-emerald-50 text-emerald-500 rounded-2xl flex items-center justify-center">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-black text-slate-900">1,284</p>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Total Personnel</p>
                </div>
            </div>
        </div>

        {{-- User Control Bar --}}
        <div
            class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-sm">
            <div class="relative flex-1 max-w-md">
                <input type="text" x-model="searchQuery" placeholder="Search by name or email..."
                    class="w-full bg-slate-50 border-none rounded-2xl px-12 py-3.5 text-sm font-bold focus:ring-2 focus:ring-emerald-500/20 transition-all">
                <svg class="w-5 h-5 absolute left-4 top-1/2 -translate-y-1/2 text-slate-300" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <button
                class="px-8 py-3.5 bg-slate-900 text-white rounded-2xl font-black text-xs uppercase tracking-[0.2em] hover:bg-emerald-600 transition-all flex items-center gap-3 shadow-xl">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                    <path d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                Invite Member
            </button>
        </div>

        {{-- Users Table --}}
        <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="p-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">User Identity</th>
                        <th class="p-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Role</th>
                        <th class="p-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Status</th>
                        <th class="p-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Activity</th>
                        <th class="p-6"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($users as $user)
                        <tr class="group hover:bg-slate-50/30 transition-colors">
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <img src="{{ $user['avatar'] }}" class="w-10 h-10 rounded-xl bg-slate-100 object-cover">
                                    <div>
                                        <p class="font-black text-slate-900 leading-none">{{ $user['name'] }}</p>
                                        <p class="text-xs font-medium text-slate-400 mt-1">{{ $user['email'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-6">
                                <span
                                    class="px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-wider
                                    {{ $user['role'] == 'Super Admin' ? 'bg-indigo-50 text-indigo-600' : 'bg-slate-100 text-slate-600' }}">
                                    {{ $user['role'] }}
                                </span>
                            </td>
                            <td class="p-6">
                                <div class="flex items-center gap-2">
                                    <span
                                        class="w-2 h-2 rounded-full {{ $user['status'] == 'Active' ? 'bg-emerald-500' : 'bg-rose-500' }}"></span>
                                    <span
                                        class="text-[10px] font-black uppercase text-slate-700 tracking-widest">{{ $user['status'] }}</span>
                                </div>
                            </td>
                            <td class="p-6">
                                <span class="text-xs font-bold text-slate-400">{{ $user['last_login'] }}</span>
                            </td>
                            <td class="p-6 text-right">
                                <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button
                                        class="p-2.5 bg-white border border-slate-100 rounded-xl text-slate-400 hover:text-emerald-500 hover:shadow-md transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-width="2.5"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>
                                    <button @click="deleteModal = true; activeUser = {name: '{{ $user['name'] }}'}"
                                        class="p-2.5 bg-white border border-slate-100 rounded-xl text-slate-400 hover:text-rose-500 hover:shadow-md transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-width="2.5"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Revoke Access Modal --}}
        <div x-show="deleteModal"
            class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm" x-cloak>
            <div @click.away="deleteModal = false"
                class="bg-white w-full max-w-sm rounded-[3rem] p-10 shadow-2xl text-center">
                <div class="w-20 h-20 bg-rose-50 text-rose-500 rounded-3xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2.5"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-black text-slate-900 mb-2">Freeze Account</h3>
                <p class="text-sm font-medium text-slate-500 mb-8">Restrict access for <span
                        class="text-slate-900 font-bold" x-text="activeUser.name"></span> immediately?</p>

                <div class="space-y-3">
                    <button @click="deleteModal = false"
                        class="w-full py-4 bg-rose-600 text-white rounded-2xl font-black text-xs uppercase tracking-widest shadow-lg shadow-rose-200 hover:bg-rose-700 transition-all">Revoke
                        Access</button>
                    <button @click="deleteModal = false"
                        class="w-full py-4 bg-slate-100 text-slate-400 rounded-2xl font-black text-xs uppercase tracking-widest">Keep
                        Active</button>
                </div>
            </div>
        </div>
    </div>
@endsection