@extends('layouts.app')

@section('page-title', 'Home')


@section('content')

    <div class="flex justify-between items-center">
        <div class="welcoming">
            <h1 class="text-xl font-bold">Your Tasks</h1>
            <span class="text-slate-400 text-md">Let's having fun!</span>
        </div>
        <a href="{{ url('tasks') }}" class="bg-blue-100 py-2 px-4 rounded-lg text-sm text-blue-700">
            <i class="fa-solid fa-plus"></i> New Task
        </a>
    </div>


    <div id="task-container" class="flex flex-col gap-4 mt-4">

        @foreach($user['tasks'] as $task)
            @include('partials.card', [$task, $user])
        @endforeach

    </div>

    @include('partials.navbar')

@endsection


@push('scripts')
    @vite('resources/js/pages/index.js')
@endpush
