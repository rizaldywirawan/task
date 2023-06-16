@extends('layouts.app')

@section('page-title', 'Home')


@section('content')

    <div class="flex justify-between items-center">
        <div class="welcoming">
            <h1 class="text-lg lg:text-xl font-bold">Your Tasks</h1>
            <span class="text-slate-400 text-sm lg:text-md font-medium">Let's tackle the tasks!</span>
        </div>
        <a href="{{ url('tasks') }}" class="bg-blue-100 py-2 px-4 rounded-lg text-sm text-blue-700">
            <i class="fa-solid fa-plus"></i> New Task
        </a>
    </div>


    <div id="task-container" class="flex flex-col gap-4 mt-10">
        @forelse($tasks as $task)

            @include('partials.task', [$task])

        @empty

            <div
                class="w-full flex flex-col items-center justify-center absolute top-1/2 left-1/2 translate-x-[-50%] translate-y-[-50%]">
                <i class="fa-solid fa-check-double text-6xl text-blue-500"></i>
                <span class="mt-4 font-medium text-blue-500">The task is empty, let's create a new one</span>
            </div>

        @endforelse

    </div>

    @include('partials.navbar')

@endsection


@push('scripts')
    @vite('resources/js/pages/index.js')
@endpush
