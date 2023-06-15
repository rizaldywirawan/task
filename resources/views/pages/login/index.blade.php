@extends('layouts.app')


@section('page-title', 'Login')

@section('content')
    <div class="flex justify-center items-center flex-col h-full">

        <div class="welcoming mb-10 self-baseline">
            <span class="block text-2xl font-bold mb-2">Hallo, Welcome!</span>
            <span class="block text-md text-slate-400 font-medium">Ready to tackle your task today?</span>
        </div>


        <form id="login-form" method="POST" class="w-full mx-auto mb-10">
            <div class="form-group block rounded-lg bg-slate-200 w-full h-10 flex justify-center items-center p-6">
                <label class="w-full flex items-center">
                    <i class="fa-solid fa-envelope mr-4 text-slate-400"></i>
                    <input type="email" name="email" class="bg-transparent outline-none w-full" placeholder="e.g., rizaldy.wirawan@gmail.com">
                </label>
            </div>
            <div class="form-group block rounded-lg bg-slate-200 w-full h-10 flex justify-center items-center p-6 mt-4">
                <label class="w-full flex items-center">
                    <i class="fa-solid fa-key mr-4 text-slate-400"></i>
                    <input type="password" name="password" class="bg-transparent outline-none w-full" placeholder="Password">
                </label>
            </div>
            <button class="w-full p-4 bg-blue-500 rounded-lg text-white outline-none text-md font-bold mt-8"><i class="fa-solid fa-arrow-right mr-2"></i> Sign In</button>
        </form>

        <div class="footer">
            <span class="text-slate-400">Don't you have an account? <a href="/register" class="font-bold text-blue-500 font-bold">Sign Up</a></span>
        </div>
    </div>
@endsection

@push('scripts')
    @vite('resources/js/pages/login/index.js')
@endpush
