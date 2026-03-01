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

<a href="/user/dashboard" class="sidebar-item-active flex items-center gap-3 px-4 py-3 text-primary transition-colors" href="#">
<span class="material-symbols-outlined">monetization_on</span>
<span class="text-sm font-semibold">ColocBoard</span>
</a>

<a href="/user/colocation" class="flex items-center gap-3 px-4 py-3 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-white/5 rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">home_work</span>
<span class="text-sm font-medium">Colocations</span>
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
<main class="flex-1 overflow-y-auto">
<div class="p-8 space-y-8">

<div class="space-y-8">

    <div>
        <h1 class="text-3xl font-extrabold text-slate-100">
            Dashboard
        </h1>
        <p class="text-slate-400 mt-1">
            Welcome back, {{ Auth::user()->name }}
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <div class="bg-panel-dark border border-border-dark rounded-xl p-6">
            <p class="text-slate-400 text-sm">Your Total Expenses</p>
            <h2 class="text-3xl font-bold text-primary mt-2">
                {{ number_format($totalExpenses,2) }} DH
            </h2>
        </div>

        <div class="bg-panel-dark border border-border-dark rounded-xl p-6">
            <p class="text-slate-400 text-sm">Your Score</p>
            <h2 class="text-3xl font-bold {{$score<0 ? 'text-red-500':'text-green-400'}}  mt-2">
                {{ $score }}
            </h2>
        </div>

        <div class="bg-panel-dark border border-border-dark rounded-xl p-6">
            <p class="text-slate-400 text-sm">Current Colocation</p>

            @if($colocation)
                <h2 class="text-xl font-bold text-slate-100 mt-2">
                    {{ $colocation->name }}
                </h2>
            @else
                <span class="text-red-400 font-semibold">
                    No colocation
                </span>
            @endif
        </div>

        <div class="bg-panel-dark border border-border-dark rounded-xl p-6">
            <p class="text-slate-400 text-sm">Owner</p>

            @if($owner)
                <h2 class="text-xl font-bold text-slate-100 mt-2">
                    {{ $owner->name }}
                </h2>
            @else
                <span class="text-slate-500">
                    —
                </span>
            @endif
        </div>

    </div>

    <div class="bg-panel-dark border border-border-dark rounded-xl overflow-hidden">

        <div class="px-8 py-6 border-b border-border-dark bg-border-dark/30">
            <h2 class="text-xl font-bold text-slate-100 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">
                    receipt_long
                </span>
                Your Expenses
            </h2>
        </div>

        <div class="p-6">

            @forelse($expenses as $expense)

                <div class="flex items-center justify-between p-4 rounded-lg bg-background-dark mb-3">

                    <div>
                        <p class="text-slate-100 font-semibold">
                            {{ $expense->title }}
                        </p>

                        <p class="text-slate-400 text-sm">
                            {{ $expense->created_at->diffForHumans() }}
                        </p>
                    </div>

                    <div class="text-right">
                        <p class="text-primary font-bold text-lg">
                            {{ number_format($expense->amount,2) }} DH
                        </p>
                    </div>

                </div>

            @empty

                <div class="text-center py-12">
                    <span class="material-symbols-outlined text-6xl text-slate-600">
                        receipt
                    </span>

                    <p class="text-slate-400 mt-4">
                        You haven't added any expenses yet.
                    </p>
                </div>

            @endforelse

        </div>

    </div>

</div>
</div>
</main>
</div>
</body></html>

