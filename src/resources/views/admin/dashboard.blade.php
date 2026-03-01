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
<a href="/admin/dashboard" class="sidebar-item-active flex items-center gap-3 px-4 py-3 text-primary transition-colors" href="#">
<span class="material-symbols-outlined">dashboard</span>
<span class="text-sm font-semibold">AdminBoard</span>
</a>
<a href="/user/dashboard" class="flex items-center gap-3 px-4 py-3 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-white/5 rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">monetization_on</span>
<span class="text-sm font-medium">ColocBoard</span>
</a>
<a href="/user/colocation/" class="flex items-center gap-3 px-4 py-3 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-white/5 rounded-lg transition-colors" href="#">
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
<div>
<h2 class="text-3xl font-extrabold tracking-tight">System Overview</h2>
<p class="text-slate-500 dark:text-slate-400">Monitoring real-time activity across all co-living spaces.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
<div class="bg-white dark:bg-neutral-dark p-6 rounded-xl border border-slate-200 dark:border-border-dark flex flex-col justify-between">
<div class="flex items-center justify-between mb-4">
<div class="size-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
<span class="material-symbols-outlined">home_work</span>
</div>
</div>
<div>

<p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Total Colocations</p>
<p class="text-3xl font-black mt-1">{{ $totalColocations }}</p>
</div>
<div class="mt-4 h-1 w-full bg-slate-100 dark:bg-border-dark rounded-full overflow-hidden">
<div class="h-full bg-primary" style="width: 100%;"></div>
</div>
</div>
<div class="bg-white dark:bg-neutral-dark p-6 rounded-xl border border-slate-200 dark:border-border-dark flex flex-col justify-between">
<div class="flex items-center justify-between mb-4">
<div class="size-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
<span class="material-symbols-outlined">group</span>
</div>
</div>
<div>
<p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Active Users</p>
<p class="text-3xl font-black mt-1">{{ $activeUsers }}</p>
</div>
<div class="mt-4 h-1 w-full bg-slate-100 dark:bg-border-dark rounded-full overflow-hidden">
<div class="h-full bg-primary" style="width: 100%;"></div>
</div>
</div>
<div class="bg-white dark:bg-neutral-dark p-6 rounded-xl border border-slate-200 dark:border-border-dark flex flex-col justify-between">
<div class="flex items-center justify-between mb-4">
<div class="size-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
<span class="material-symbols-outlined">analytics</span>
</div>
</div>
<div>
<p class="text-slate-500 dark:text-slate-400 text-sm font-medium">System-wide Expenses</p>
<p class="text-3xl font-black mt-1">{{ $totalExpenses }}</p>
</div>
<div class="mt-4 h-1 w-full bg-slate-100 dark:bg-border-dark rounded-full overflow-hidden">
<div class="h-full bg-primary" style="width: 100%;"></div>
</div>
</div>
<div class="bg-white dark:bg-neutral-dark p-6 rounded-xl border border-slate-200 dark:border-border-dark flex flex-col justify-between">
<div class="flex items-center justify-between mb-4">
<div class="size-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
<span class="material-symbols-outlined">person_off</span>
</div>
</div>
<div>
<p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Total Bannis</p>
<p class="text-3xl font-black mt-1">{{ $bannedUsers }}
</p>
</div>
<div class="mt-4 h-1 w-full bg-slate-100 dark:bg-border-dark rounded-full overflow-hidden">
<div class="h-full bg-primary" style="width: 100%;"></div>
</div>
</div>
</div>
<div class="bg-white dark:bg-neutral-dark rounded-xl border border-slate-200 dark:border-border-dark overflow-hidden">
<div class="p-6 border-b border-slate-200 dark:border-border-dark flex flex-wrap items-center justify-between gap-4">
<h3 class="text-xl font-bold">User Management</h3>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-slate-50 dark:bg-white/5 text-slate-500 dark:text-slate-400 uppercase text-[11px] font-bold tracking-wider">
<th class="px-6 py-4">Username</th>
<th class="px-6 py-4">Email</th>
<th class="px-6 py-4">Reputation</th>
<th class="px-6 py-4">Role</th>
<th class="px-6 py-4 text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-100 dark:divide-border-dark">
@foreach($users as $user)
    <p></p>

<tr class="hover:bg-slate-50 dark:hover:bg-white/[0.02] transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="size-8 rounded-full bg-purple-500/20 flex items-center justify-center text-purple-500 text-xs font-bold">{{ strtoupper(substr($user->name, 0, 2)) }}</div>
<span class="font-semibold">{{ $user->name }}</span>
</div>
</td>
<td class="px-6 py-4 text-slate-500 dark:text-slate-400 text-sm">{{ $user->email }}</td>
<td class="px-6 py-4">
<div class="flex items-center gap-1 @if($user->reputation_score < 0) text-rose-500 @else text-primary @endif">
<span class="material-symbols-outlined text-sm fill-current">star</span>
<span class="text-sm font-bold">{{ $user->reputation_score }}</span>
</div>
</td>
<td class="px-6 py-4">
@if($user->is_banned)
    <span class="px-2 py-1 rounded bg-rose-500/10 text-rose-500 text-[10px] font-bold uppercase tracking-tight">Banned</span>
@elseif($user->colocations()->exists())
    <span class="px-2 py-1 rounded bg-slate-500/10 text-slate-500 text-[10px] font-bold uppercase tracking-tight">In Colocation</span>
@else
    <span class="px-2 py-1 rounded bg-slate-500/10 text-slate-500 text-[10px] font-bold uppercase tracking-tight">No Colocation</span>
@endif</td>
<td class="px-6 py-4 text-right">
<div class="flex items-center justify-end gap-2">
@if(!$user->is_banned)
    <button class="bg-primary text-background-dark px-3 py-1 rounded-md text-xs font-bold hover:bg-primary/90 transition-colors">Ban</button>
@else
    <button class="bg-slate-200 dark:bg-slate-700 text-slate-800 dark:text-slate-100 px-3 py-1 rounded-md text-xs font-bold hover:bg-primary transition-colors">Unban</button>
@endif
</div>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
<div class="p-4 border-t border-slate-200 dark:border-border-dark flex items-center justify-between">
<p class="text-sm text-slate-500"> {{ $totalUsers }} users</p>
<div class="flex gap-2">
<div class="mt-6">
    {{ $users->links() }}
</div>
</div>
</div>
</div>

</div>
</main>
</div>
</body></html>
