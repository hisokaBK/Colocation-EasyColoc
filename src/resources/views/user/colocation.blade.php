<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>EasyColoc | Global Admin Dashboard</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>

<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#ffd900",
                        "background-light": "#f8f8f5",
                        "background-dark": "#0a0a05",
                        "neutral-dark": "#1a1a10",
                        "border-dark": "#2a2a1a",
                    },
                    fontFamily: {
                        "display": ["Manrope", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
<style>
        body {
            font-family: 'Manrope', sans-serif;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .sidebar-item-active {
            background-color: rgba(255, 217, 0, 0.1);
            border-right: 4px solid #ffd900;
        }
         @keyframes modalIn {
             from {
                 opacity:0;
                 transform: translateY(20px) scale(.95);
             }
             to {
                 opacity:1;
                 transform: translateY(0) scale(1);
             }
         }

         .animate-modal {
             animation: modalIn .25s ease;
         }
</style>
</head>
<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 antialiased font-display">
<div class="flex min-h-screen">
<aside class="w-64 flex-shrink-0 border-r border-slate-200 dark:border-border-dark bg-white dark:bg-neutral-dark flex flex-col">
<div class="p-6 flex items-center gap-3">
<div class="size-10 bg-primary rounded-lg flex items-center justify-center text-background-dark">
<span class="material-symbols-outlined font-bold">corporate_fare</span>
</div>
<div>
<h1 class="text-lg font-extrabold tracking-tight">EasyColoc</h1>
</div>
</div>
<nav class="flex-1 mt-4 px-3 space-y-1">
<a href="/admin/dashboard" class="{{Auth::user()->role !== 'admin' ? 'hidden' : 'flex' }}  items-center gap-3 px-4 py-3 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-white/5 rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">dashboard</span>
<span class="text-sm font-medium">AdminBoard</span>
</a>

<a href="/user/dashboard" class="flex items-center gap-3 px-4 py-3 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-white/5 rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">monetization_on</span>
<span class="text-sm font-medium">ColocBoard</span>
</a>

<a href="/colocations" class="sidebar-item-active flex items-center gap-3 px-4 py-3 text-primary transition-colors" href="#">
<span class="material-symbols-outlined">home_work</span>
<span class="text-sm font-semibold">Colocations</span>
</a>
<a href="/user/profile" class="flex items-center gap-3 px-4 py-3 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-white/5 rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">person</span>
<span class="text-sm font-medium">Profile</span>
</a>
</nav>
<div class="p-4 border-t border-slate-200 dark:border-border-dark">
<div class="flex items-center gap-3 p-2">
<div class="size-10 rounded-full bg-slate-200 dark:bg-slate-800 bg-cover bg-center" data-alt="Admin profile avatar" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuC3YtkH0agvdfj-QSRGAvcOVapL4qOHXpbvAK8N25JplY_DSjBHu_YKQ0MIst2RnFkD_VDLupw3tB17UVB5sAV9Xq3eVp-itHQ5yciFaEYSMayfLPHll-rmK9__0HpKWm3H6Y1lMzeeA2fPZ3I1gf_-4hOF4sTpMoBHFM_28erln20rKgruCf8q1tJgjNjHKyhYf9_04xw6vUBThUXZvtTWhRPysTZHoDcQDDYcUkAY_GSCY13lZTju9Ienb6IFnkej7KMHGph5hZs')"></div>
<div class="flex-1 overflow-hidden">
<p class="text-sm font-bold truncate">{{ Auth::user()->name }}</p>
<p class="text-xs text-slate-500 truncate">{{ Auth::user()->role }}</p>
</div>
<form action="/logout" method="POST">
    @csrf
<button  class="material-symbols-outlined text-slate-400 cursor-pointer hover:text-primary">logout</button>
</div>
</form>
</div>
</aside>
<main class="flex-1 ov/user/colocation/boarderflow-y-auto p-10">
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 m-4 p-2">
<div class="p-6 bg-primary/10 border border-primary/20 rounded-xl flex flex-col gap-1">
<button
        onclick="openColocationModal()"
        class="bg-primary hover:bg-yellow-400 text-background-dark font-bold px-6 py-3 rounded-xl transition-all shadow-lg hover:-translate-y-0.5 flex items-center gap-2">
        <span class="material-symbols-outlined">add</span>
        New Colocation
    </button>
</div>

@if(session('error'))
<div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400 font-semibold">
    {{ session('error') }}
</div>
@endif
</section>
<section class="flex flex-col gap-4">

@if($colocations->isEmpty())
<div class="p-10 text-center bg-slate-50 dark:bg-border-dark border border-slate-200 dark:border-border-dark rounded-xl flex flex-col items-center justify-center gap-4">
    <span class="material-symbols-outlined text-6xl text-primary">home_work</span>
    <h2 class="text-xl font-bold text-slate-900 dark:text-slate-100">No Colocations Found</h2>
    <p class="text-sm text-slate-600 dark:text-slate-400">You haven’t joined or created any colocation yet.</p>
    <p  class="mt-4 bg-primary text-background-dark font-bold px-6 py-3 rounded-lg hover:opacity-90 transition-all flex items-center gap-2">

    </p>
</div>
@endif

@foreach($colocations as $colocation)
<div class="p-6 bg-white dark:bg-neutral-dark border border-slate-200 dark:border-border-dark rounded-xl shadow-md flex flex-col gap-4 hover:shadow-lg transition-all">
    <div class="flex items-center justify-between">
        <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100">{{ $colocation->name }}</h3>
        <span class="px-3 py-1 rounded-full text-xs font-semibold
            @if($colocation->status == 'active') bg-green-100 text-green-800
            @elseif($colocation->status == 'pending') bg-yellow-100 text-yellow-800
            @else bg-red-100 text-red-800 @endif">
            {{ ucfirst($colocation->status) }}
        </span>
    </div>

    <div class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-400">
        <span class="material-symbols-outlined text-primary">person</span>
        <p>Owner: {{ $colocation->owner->first()?->name ?? 'Unknown' }}</p>
    </div>

    <div class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-400">
        <span class="material-symbols-outlined text-primary">group</span>
        <p>Members: {{ $colocation->members_count }}</p>
    </div>

    <div class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-400">
        <span class="material-symbols-outlined text-primary">monetization_on</span>
        <p>Total Expenses: ${{ number_format($colocation->expenses->sum('amount'), 2) }}</p>
    </div>

    <div class="mt-4">
        <h4 class="text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Recent Expenses</h4>
        <ul class="space-y-2">
            @foreach($colocation->expenses->take(3) as $expense)
            <li class="flex justify-between items-center p-2 bg-slate-50 dark:bg-border-dark rounded-lg">
                <div class="flex flex-col">
                    <span class="font-semibold">{{ $expense->title }}</span>
                    <span class="text-xs text-slate-500 dark:text-slate-400">{{ $expense->user->name ?? 'Unknown' }}</span>
                </div>
                <span class="font-bold text-primary">${{ number_format($expense->amount, 2) }}</span>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="flex justify-end mt-4">
        <a href="{{ route('colocation.show', $colocation->id) }}"
          class="bg-primary text-background-dark px-4 py-2 rounded-lg font-bold">
            Open
        </a>
    </div>
</div>
@endforeach

</section>

</main>
</div>

<div id="colocationModal"
     class="fixed inset-0 bg-black/70 backdrop-blur-sm hidden items-center justify-center z-50">

    <div class="bg-panel-dark border border-border-dark rounded-2xl w-full max-w-lg shadow-2xl animate-modal">

        <div class="flex justify-between items-center px-8 py-5 border-b border-border-dark">
            <h2 class="text-xl font-bold text-slate-100 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">group_add</span>
                Create Colocation
            </h2>

            <button onclick="closeColocationModal()"
                class="text-slate-400 hover:text-white transition">
                ✕
            </button>
        </div>

        <form method="POST" action="{{ route('colocation.store') }}">
            @csrf

            <div class="p-8 space-y-6">

                <div class="space-y-2">
                    <label class="text-sm font-semibold text-slate-300">
                        Colocation Name
                    </label>

                    <input
                        name="name"
                        required
                        class="w-full bg-background-dark border border-border-dark rounded-lg text-slate-100 px-4 py-3 focus:ring-primary focus:border-primary"
                        placeholder="Ex: Casa Friends"
                    >
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-semibold text-slate-300">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="4"
                        class="w-full bg-background-dark border border-border-dark rounded-lg text-slate-100 px-4 py-3 focus:ring-primary focus:border-primary"
                        placeholder="Optional description..."
                    ></textarea>
                </div>

            </div>

            <div class="flex justify-end gap-4 px-8 pb-8">

                <button
                    type="button"
                    onclick="closeColocationModal()"
                    class="px-6 py-3 rounded-xl border border-border-dark text-slate-300 hover:bg-border-dark transition">
                    Cancel
                </button>

                <button
                    type="submit"
                    class="bg-primary hover:bg-yellow-400 text-background-dark font-extrabold px-8 py-3 rounded-xl shadow-[0_4px_20px_-4px_rgba(255,217,0,0.5)] transition-all">
                    Create
                </button>

            </div>
        </form>
    </div>
</div>

<script>
function openColocationModal() {
    const modal = document.getElementById('colocationModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeColocationModal() {
    const modal = document.getElementById('colocationModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

document.addEventListener('click', function(e) {
    const modal = document.getElementById('colocationModal');
    if (e.target === modal) {
        closeColocationModal();
    }
});
</script>
</body></html>


