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

<a href="/user/dashboard" class="flex items-center gap-3 px-4 py-3 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-white/5 rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">monetization_on</span>
<span class="text-sm font-medium">ColocBoard</span>
</a>
<a href="/user/colocation" class="flex items-center gap-3 px-4 py-3 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-white/5 rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">home_work</span>
<span class="text-sm font-medium">Colocations</span>
</a>

<a href="/user/profile" class="sidebar-item-active flex items-center gap-3 px-4 py-3 text-primary transition-colors" href="#">
<span class="material-symbols-outlined">person</span>
<span class="text-sm font-semibold">Profile</span>
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
<div class="max-w-4xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">

<aside class="lg:col-span-1">
<div class="bg-panel-dark border border-border-dark rounded-xl p-8 sticky top-28">
<div class="flex flex-col items-center text-center">
<div class="relative mb-6">
<div class="">
</div>

</div>
<h3 class="text-2xl font-bold text-slate-100 mb-1">{{auth()->user()->name}}</h3>
<p class="text-slate-400 text-sm mb-4">{{auth()->user()->email}}</p>
<div class="inline-flex items-center gap-1.5 bg-primary/10 text-primary border border-primary/20 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-6">
<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1">stars</span>
                                {{auth()->user()->role}}
                            </div>
</div>
</div>
</aside>
<div class="lg:col-span-2 space-y-8">

<form method="POST" action="{{ route('profile.updateUser') }}" class="space-y-6">
    @csrf
    @method('PATCH')

    <div>
        <label class="text-sm text-gray-300">Name</label>

        <input
            type="text"
            name="name"
            value="{{ auth()->user()->name }}"
            class="w-full p-3 bg-black border border-gray-700 rounded-lg text-white"
            required
        >

        @error('name')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="text-sm text-gray-300">Email</label>

        <input
            type="email"
            name="email"
            value="{{ auth()->user()->email }}"
            class="w-full p-3 bg-black border border-gray-700 rounded-lg text-white"
            required
        >

        @error('email')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <button
        type="submit"
        class="bg-primary text-black px-6 py-3 rounded-lg font-bold"
    >
        Update Profile
    </button>

    @if(session('success'))
        <p class="text-green-500 text-sm">
            {{ session('success') }}
        </p>
    @endif
</form>
<form method="POST" action="{{ route('profile.password.update') }}">
    @csrf
    @method('PUT')

<section class="bg-panel-dark border border-border-dark rounded-xl overflow-hidden">
<div class="px-8 py-6 border-b border-border-dark bg-border-dark/30">
<h2 class="text-xl font-bold text-slate-100 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">lock</span>
Change Password
</h2>
</div>

<div class="p-8 space-y-6">

<div class="space-y-2">
<label class="text-sm font-semibold text-slate-300">Current Password</label>
<input
name="current_password"
type="password"
class="w-full bg-background-dark border-border-dark rounded-lg text-slate-100 px-4 py-3"
placeholder="••••••••"
/>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

<div class="space-y-2">
<label class="text-sm font-semibold text-slate-300">New Password</label>
<input
name="password"
type="password"
class="w-full bg-background-dark border-border-dark rounded-lg text-slate-100 px-4 py-3"
placeholder="••••••••"
/>
</div>

<div class="space-y-2">
<label class="text-sm font-semibold text-slate-300">Confirm New Password</label>
<input
name="password_confirmation"
type="password"
class="w-full bg-background-dark border-border-dark rounded-lg text-slate-100 px-4 py-3"
placeholder="••••••••"
/>
</div>

</div>
</div>

 @if(session('successp'))
        <p class="text-green-500 text-sm p-5">
            {{ session('successp') }}
        </p>
    @endif

@error('current_password')
<p class="text-red-400 text-sm mt-2 p-5">
    {{ $message }}
</p>
@enderror
</section>

<div class="flex justify-start">
<button class="bg-primary text-background-dark font-extrabold text-base px-10 py-3 rounded-xl mt-4 mb-4">
CHANGE PASSWORD
</button>


</div>

</form>

</div>
</div>
</div>
</main>
</div>
</body></html>
