@extends('layouts.admin')

@section('title', 'Amafilimi | Create User')

@section('content')
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
        <div>
            <div class="flex items-center gap-3">
                <h1 class="text-4xl font-black text-slate-900 tracking-tight">Create User</h1>
                <span
                    class="px-3 py-1 bg-indigo-50 text-indigo-600 text-[10px] font-black uppercase tracking-widest rounded-full border border-indigo-100 flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 bg-indigo-500 rounded-full animate-pulse"></span>
                    New Account
                </span>
            </div>
            <p class="text-slate-500 mt-2 font-medium text-lg">
                Add a new user and configure their access & subscription.
            </p>
        </div>

        <div class="flex gap-3">
            <a href="#"
                class="px-6 py-3.5 bg-white border border-slate-200 rounded-2xl font-bold text-slate-600 hover:bg-slate-50 transition-all flex items-center gap-2 text-sm shadow-sm">
                Back to Users
            </a>
        </div>
    </div>

    <form action="#" method="POST" class="space-y-8">
        @csrf

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
            {{-- Left Main Form --}}
            <div class="xl:col-span-2 space-y-8">

                {{-- Personal Information --}}
                <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
                    <div class="p-8 border-b border-slate-50">
                        <h3 class="font-black text-slate-900 text-xl tracking-tight">Personal Information</h3>
                        <p class="text-sm text-slate-500 mt-1">Basic user details.</p>
                    </div>

                    <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">Full Name *</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="w-full rounded-2xl border border-slate-200 px-5 py-4 text-sm font-semibold text-slate-700 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none"
                                placeholder="Enter full name">
                            @error('name') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">Username</label>
                            <input type="text" name="username" value="{{ old('username') }}"
                                class="w-full rounded-2xl border border-slate-200 px-5 py-4 text-sm font-semibold text-slate-700 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none"
                                placeholder="e.g. goodman01">
                            @error('username') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">Phone Number *</label>
                            <input type="text" name="phone" value="{{ old('phone') }}"
                                class="w-full rounded-2xl border border-slate-200 px-5 py-4 text-sm font-semibold text-slate-700 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none"
                                placeholder="e.g. 078XXXXXXX">
                            @error('phone') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">Email Address *</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="w-full rounded-2xl border border-slate-200 px-5 py-4 text-sm font-semibold text-slate-700 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none"
                                placeholder="Enter email address">
                            @error('email') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                {{-- Security --}}
                <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
                    <div class="p-8 border-b border-slate-50">
                        <h3 class="font-black text-slate-900 text-xl tracking-tight">Security</h3>
                        <p class="text-sm text-slate-500 mt-1">Set login credentials.</p>
                    </div>

                    <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">Password *</label>
                            <input type="password" name="password"
                                class="w-full rounded-2xl border border-slate-200 px-5 py-4 text-sm font-semibold text-slate-700 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none"
                                placeholder="Enter password">
                            @error('password') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">Confirm Password *</label>
                            <input type="password" name="password_confirmation"
                                class="w-full rounded-2xl border border-slate-200 px-5 py-4 text-sm font-semibold text-slate-700 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none"
                                placeholder="Confirm password">
                        </div>
                    </div>
                </div>

                {{-- Subscription Setup --}}
                <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
                    <div class="p-8 border-b border-slate-50">
                        <h3 class="font-black text-slate-900 text-xl tracking-tight">Subscription Setup</h3>
                        <p class="text-sm text-slate-500 mt-1">Assign a plan and access duration.</p>
                    </div>

                    <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">Subscription Plan *</label>
                            <select name="subscription_plan"
                                class="w-full rounded-2xl border border-slate-200 px-5 py-4 text-sm font-semibold text-slate-700 bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                                <option value="">Select plan</option>
                                <option value="free" {{ old('subscription_plan') == 'free' ? 'selected' : '' }}>Free</option>
                                <option value="weekly" {{ old('subscription_plan') == 'weekly' ? 'selected' : '' }}>Weekly</option>
                                <option value="monthly" {{ old('subscription_plan') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                <option value="yearly" {{ old('subscription_plan') == 'yearly' ? 'selected' : '' }}>Yearly</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">Subscription Status *</label>
                            <select name="subscription_status"
                                class="w-full rounded-2xl border border-slate-200 px-5 py-4 text-sm font-semibold text-slate-700 bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                                <option value="active" {{ old('subscription_status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="pending" {{ old('subscription_status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="expired" {{ old('subscription_status') == 'expired' ? 'selected' : '' }}>Expired</option>
                                <option value="cancelled" {{ old('subscription_status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">Start Date</label>
                            <input type="date" name="subscription_start" value="{{ old('subscription_start') }}"
                                class="w-full rounded-2xl border border-slate-200 px-5 py-4 text-sm font-semibold text-slate-700 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">End Date</label>
                            <input type="date" name="subscription_end" value="{{ old('subscription_end') }}"
                                class="w-full rounded-2xl border border-slate-200 px-5 py-4 text-sm font-semibold text-slate-700 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Sidebar --}}
            <div class="space-y-8">
                {{-- Account Settings --}}
                <div class="bg-slate-900 rounded-[2.5rem] p-8 text-white shadow-2xl">
                    <h3 class="text-lg font-black tracking-tight mb-6">Account Settings</h3>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-3">Role *</label>
                            <select name="role"
                                class="w-full rounded-2xl border border-slate-700 bg-slate-800 px-5 py-4 text-sm font-bold text-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="moderator" {{ old('role') == 'moderator' ? 'selected' : '' }}>Moderator</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-3">Account Status *</label>
                            <select name="status"
                                class="w-full rounded-2xl border border-slate-700 bg-slate-800 px-5 py-4 text-sm font-bold text-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="suspended" {{ old('status') == 'suspended' ? 'selected' : '' }}>Suspended</option>
                                <option value="banned" {{ old('status') == 'banned' ? 'selected' : '' }}>Banned</option>
                            </select>
                        </div>

                        <div class="space-y-4 pt-2">
                            <label class="flex items-center justify-between bg-slate-800 border border-slate-700 rounded-2xl px-5 py-4 cursor-pointer">
                                <span class="text-sm font-bold text-slate-200">Email Verified</span>
                                <input type="checkbox" name="email_verified" value="1" class="w-5 h-5 rounded border-slate-600 text-emerald-500 focus:ring-emerald-500"
                                    {{ old('email_verified') ? 'checked' : '' }}>
                            </label>

                            <label class="flex items-center justify-between bg-slate-800 border border-slate-700 rounded-2xl px-5 py-4 cursor-pointer">
                                <span class="text-sm font-bold text-slate-200">Phone Verified</span>
                                <input type="checkbox" name="phone_verified" value="1" class="w-5 h-5 rounded border-slate-600 text-emerald-500 focus:ring-emerald-500"
                                    {{ old('phone_verified') ? 'checked' : '' }}>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Submit Card --}}
                <div class="bg-emerald-500 rounded-[2.5rem] p-8 text-white">
                    <p class="text-xs font-black uppercase tracking-widest opacity-80 mb-2">Ready to Create</p>
                    <p class="text-3xl font-black mb-4">New User</p>
                    <p class="text-sm text-emerald-50/90 mb-6 leading-relaxed">
                        Save this user and activate their streaming access instantly.
                    </p>

                    <button type="submit"
                        class="w-full py-4 bg-white text-emerald-600 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-emerald-50 transition-colors shadow-lg">
                        Create User
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection