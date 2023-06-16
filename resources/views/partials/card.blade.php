@php

    $statusBackgroundColor = 'bg-emerald-100';
    $statusColor = 'text-emerald-600';
    $borderColor = 'border-slate-300';

    switch ($task['status']) {
        case 'To-do':
            $statusBackgroundColor = 'bg-blue-100';
            $statusColor = 'text-blue-600';
            $borderColor = 'border-blue-400';
            break;

        case 'On Progress':
            $statusBackgroundColor = 'bg-orange-100';
            $statusColor = 'text-orange-600';
            $borderColor = 'border-orange-400';
            break;

        case 'In Review':
            $statusBackgroundColor = 'bg-purple-100';
            $statusColor = 'text-purple-600';
            $borderColor = 'border-purple-400';
            break;

        case 'Done':
            $statusBackgroundColor = 'bg-emerald-100';
            $statusColor = 'text-emerald-600';
            $borderColor = 'border-emerald-400';
            break;

        case 'Canceled':
            $statusBackgroundColor = 'bg-red-100';
            $statusColor = 'text-red-600';
            $borderColor = 'border-red-400';
            break;

    }

@endphp

<div class="rounded-xl bg-white drop-shadow-sm border p-2">
    <div class="flex items-start">
        <label
            class="rounded-full border {{ $borderColor }} h-5 w-5 bg-stale-400 inline-flex items-center justify-center cursor-pointer align-middle mr-4">
            <i class="fa-solid fa-check text-lg text-white hidden"></i>
            <input type="checkbox" name="is-complete" style="display: none">
        </label>
        <div class="inline-flex justify-between items-center">
            <span class="text-sm">{{ $task['title'] }}</span>
        </div>
    </div>

    <div class="mt-2 flex justify-between items-center">

        <div class="flex items-center gap-4">
            <span
                class="h-full {{ $statusBackgroundColor }} {{ $statusColor }} p-1 rounded-md text-xs flex items-center justify-center">{{ $task['status'] }}</span>

            <div class="border border-red-200 p-1 rounded-lg text-red-400 flex items-center">
                <span class="text-xs"><i class="fa-solid fa-calendar"></i> Wed, 20 Jun 23</span>
            </div>

            <div class="project border border-slate-300 p-1 rounded-lg flex justify-center flex items-center">
                <span class="text-xs"><i class="fa-solid fa-cubes"></i> {{ $task['project']['name'] }}</span>
            </div>
        </div>


        {!! Avatar::create($user->name)->setDimension(24)->setFontSize(12)->toSvg() !!}

    </div>

</div>
