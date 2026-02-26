<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>EasyColoc | Create Account</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#e3bc3b",
                        "background-light": "#f8f7f6",
                        "background-dark": "#050505",
                        "neutral-dark": "#0a0a0a",
                        "border-dark": "#1a1a1a"
                    },
                    fontFamily: {
                        "display": ["Manrope", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
""
                    },
                },
            },
        }
    </script>
<style>
    @keyframes float {
        0% { transform: translateY(0px) rotate(0deg); opacity: 0; }
        20% { opacity: 0.6; }
        80% { opacity: 0.6; }
        100% { transform: translateY(-100vh) rotate(360deg); opacity: 0; }
    }
    .floating-dollar {
        position: fixed;
        color: #e3bc3b;
        font-family: 'Material Symbols Outlined';
        pointer-events: none;
        z-index: 0;
        filter: drop-shadow(0 0 10px rgba(227, 188, 59, 0.3));
    }
    .central-logo-bg {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 40rem;
        color: #e3bc3b;
        opacity: 0.03;
        pointer-events: none;
        z-index: 0;
    }
</style></head>
<body class="dark:bg-background-dark font-display text-slate-900 dark:text-slate-100 min-h-screen selection:bg-primary selection:text-background-dark bg-[#050505]"><div class="central-logo-bg material-symbols-outlined">payments</div>
<div class="fixed inset-0 pointer-events-none overflow-hidden">
<span class="floating-dollar material-symbols-outlined" style="left: 10%; bottom: -10%; font-size: 24px; animation: float 15s linear infinite;">payments</span>
<span class="floating-dollar material-symbols-outlined" style="left: 25%; bottom: -15%; font-size: 48px; animation: float 20s linear infinite 2s;">payments</span>
<span class="floating-dollar material-symbols-outlined" style="left: 40%; bottom: -10%; font-size: 32px; animation: float 18s linear infinite 5s;">payments</span>
<span class="floating-dollar material-symbols-outlined" style="left: 60%; bottom: -12%; font-size: 56px; animation: float 22s linear infinite 1s;">payments</span>
<span class="floating-dollar material-symbols-outlined" style="left: 80%; bottom: -10%; font-size: 38px; animation: float 17s linear infinite 8s;">payments</span>
<span class="floating-dollar material-symbols-outlined" style="left: 90%; bottom: -20%; font-size: 28px; animation: float 25s linear infinite 4s;">payments</span>
<span class="floating-dollar material-symbols-outlined" style="left: 15%; bottom: -5%; font-size: 42px; animation: float 19s linear infinite 10s;">payments</span>
<span class="floating-dollar material-symbols-outlined" style="left: 75%; bottom: -15%; font-size: 30px; animation: float 21s linear infinite 12s;">payments</span>
</div>
<div class="flex min-h-screen w-full flex-col">

<header class="flex items-center justify-between border-b border-border-dark px-6 py-4 lg:px-20 bg-background-dark/80 backdrop-blur-md sticky top-0 z-50">
<div class="flex items-center gap-2 text-primary">
<div class="size-8 flex items-center justify-center">
<span class="material-symbols-outlined text-3xl">payments</span>
</div>
<h2 class="text-xl font-extrabold tracking-tight uppercase">EasyColoc</h2>
</div>
<div class="flex items-center gap-4">
<span class="hidden md:inline text-slate-400 text-sm">Already have an account?</span>
    <a href="{{ route('login') }}" class="flex min-w-[100px] items-center justify-center rounded-lg h-10 px-6 border border-primary/30 text-primary hover:bg-primary/10 transition-colors text-sm font-bold">
            Login
    </a>
</div>
</header>
<main class="flex-1 flex items-center justify-center p-6">
<div class="w-full max-w-[480px] space-y-8 py-12">

<div class="text-center md:text-left space-y-2">
    <h1 class="text-3xl md:text-5xl font-black tracking-tight text-slate-100 uppercase">
        Accédez à <span class="text-[#FFBD00FF]">l'Excellence</span>
    </h1>
    <p class="text-slate-400 text-lg font-light leading-relaxed">
        L'art de la colocation <span class="text-slate-200 font-semibold">haut de gamme</span>, réinventé pour vous.
    </p>
</div>

<form method="POST" action="{{ route('register') }}" class="space-y-5 bg-black/60 backdrop-blur-xl p-8 rounded-xl border border-primary/20 shadow-[0_0_50px_rgba(0,0,0,1)] relative z-10">
                    @csrf

                    <div class="space-y-4">
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-slate-300 ml-1">Full Name</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 text-xl">person</span>
                                <input name="name" value="{{ old('name') }}" required autofocus
                                       class="w-full pl-12 pr-4 py-4 rounded-lg bg-neutral-dark border border-border-dark focus:border-primary focus:ring-1 focus:ring-primary text-black placeholder:text-slate-600 transition-all outline-none" placeholder="Dominic Toretto" type="text"/>
                            </div>
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-semibold text-slate-300 ml-1">Email Address</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 text-xl">mail</span>
                                <input name="email" value="{{ old('email') }}" required
                                       class="w-full pl-12 pr-4 py-4 rounded-lg bg-neutral-dark border border-border-dark focus:border-primary focus:ring-1 focus:ring-primary text-black placeholder:text-slate-600 transition-all outline-none" placeholder="name@company.com" type="email"/>
                            </div>
                            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex flex-col gap-2">
                                <label class="text-sm font-semibold text-slate-300 ml-1">Password</label>
                                <div class="relative">
                                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 text-xl">lock</span>
                                    <input name="password" required
                                           class="w-full pl-12 pr-10 py-4 rounded-lg bg-neutral-dark border border-border-dark focus:border-primary focus:ring-1 focus:ring-primary text-black placeholder:text-slate-600 transition-all outline-none" placeholder="••••••••" type="password"/>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-sm font-semibold text-slate-300 ml-1">Confirm</label>
                                <div class="relative">
                                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 text-xl">shield</span>
                                    <input name="password_confirmation" required
                                           class="w-full pl-12 pr-4 py-4 rounded-lg bg-neutral-dark border border-border-dark focus:border-primary focus:ring-1 focus:ring-primary text-black placeholder:text-slate-600 transition-all outline-none" placeholder="••••••••" type="password"/>
                                </div>
                            </div>
                        </div>
                        @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="w-full bg-primary hover:bg-primary/90 text-background-dark font-extrabold py-4 rounded-lg shadow-[0_0_20px_rgba(227,188,59,0.2)] hover:shadow-[0_0_25px_rgba(227,188,59,0.3)] transition-all transform active:scale-[0.98]">
                        CREATE ACCOUNT
                    </button>

                </form>

                <p class="text-center text-slate-500 text-sm">
                    Already an EasyColoc member? <a class="text-primary font-bold hover:underline" href="{{ route('login') }}">Sign In</a>
                </p>

</div>
</main>
<!-- Subtle Footer Elements -->
<footer class="p-8 flex flex-col items-center gap-4 text-slate-600 text-xs border-t border-border-dark bg-neutral-dark/20">
<p> © 2024 EasyColoc YouCode . bakessou bilal</p>
</footer>
</div>
<!-- Decorative Gradients -->
<div class="fixed top-0 left-0 w-full h-full pointer-events-none -z-10 overflow-hidden">
<div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(circle_at_50%_50%,_rgba(227,188,59,0.05)_0%,_transparent_70%)]"></div>
</div>
</body></html>
