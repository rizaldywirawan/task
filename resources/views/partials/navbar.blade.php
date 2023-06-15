<div id="navbar" class="fixed bottom-0 left-0 right-0 h-24 container max-w-xl mx-auto flex items-center justify-around border-">
    <a href="{{ url('/') }}" class="navbar-item flex items-center justify-center flex-col gap-2 text-slate-300">
        <i class="fa-solid fa-house text-xl"></i>
        <span class="text-sm">Home</span>
    </a>
    <a href="{{ url('projects') }}" class="navbar-item flex items-center justify-center flex-col gap-2 text-slate-300">
        <i class="fa-solid fa-cubes text-xl"></i>
        <span class="text-sm">Project</span>
    </a>
    <a href="{{ url('users') }}" class="navbar-item flex items-center justify-center flex-col gap-2 text-slate-300">
        <i class="fa-solid fa-users text-xl"></i>
        <span class="text-sm">Users</span>
    </a>
    <a href="{{ url('logout') }}" class="navbar-item flex items-center justify-center flex-col gap-2 text-slate-300">
        <i class="fa-solid fa-arrow-right text-xl"></i>
        <span class="text-sm">Sign Out</span>
    </a>
</div>

@vite('resources/js/modules/navbar.js')
