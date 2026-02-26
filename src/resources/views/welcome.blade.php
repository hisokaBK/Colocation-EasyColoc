<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#e3bc3b",
                        "background-light": "#f8f7f6",
                        "background-dark": "#12110d",
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
<title>EasyColoc | Premium Login</title>
</head>
<body class="font-display text-slate-900 dark:text-slate-100 antialiased bg-black"><div class="fixed inset-0 overflow-hidden pointer-events-none -z-10">
<!-- Central Gold Logo -->
<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 opacity-10">
<span class="material-symbols-outlined text-[400px] text-primary select-none">monetization_on</span>
</div>
<!-- Floating 3D Elements -->
<div class="absolute top-[10%] left-[5%] animate-bounce duration-[3000ms] opacity-40">
<span class="material-symbols-outlined text-5xl text-primary drop-shadow-[0_10px_10px_rgba(227,188,59,0.3)]">payments</span>
</div>
<div class="absolute top-[15%] right-[10%] animate-pulse opacity-30">
<span class="material-symbols-outlined text-7xl text-primary">currency_exchange</span>
</div>
<div class="absolute bottom-[20%] left-[15%] animate-bounce duration-[4000ms] opacity-50">
<span class="material-symbols-outlined text-6xl text-primary drop-shadow-xl">paid</span>
</div>
<div class="absolute bottom-[10%] right-[15%] animate-pulse duration-[5000ms] opacity-40">
<span class="material-symbols-outlined text-8xl text-primary">savings</span>
</div>
<div class="absolute top-[40%] right-[5%] opacity-20">
<span class="material-symbols-outlined text-4xl text-primary">account_balance</span>
</div>
<div class="absolute bottom-[40%] left-[5%] opacity-20">
<span class="material-symbols-outlined text-4xl text-primary">diamond</span>
</div>
</div>
<div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
<div class="layout-container flex h-full grow flex-col">
<!-- Navigation Header -->
<header class="flex items-center justify-between border-b border-slate-200 dark:border-white/10 px-6 py-4 lg:px-20 bg-black/40 backdrop-blur-md">
<div class="flex items-center gap-3">
<div class="flex h-10 w-10 items-center justify-center rounded-lg bg-primary text-background-dark">
<span class="material-symbols-outlined text-2xl font-bold">account_balance_wallet</span>
</div>
<h2 class="text-xl font-extrabold tracking-tight text-slate-900 dark:text-white uppercase">EasyColoc</h2>
</div>
<div>
<span class="hidden md:inline-block text-sm font-medium text-slate-500 dark:text-slate-400">Fintech Solutions for Shared Living</span>
</div>
</header>
<main class="flex flex-1 items-center justify-center px-4 py-12">
<div class="w-full max-w-[480px] space-y-8 bg-white/5 backdrop-blur-xl p-8 rounded-3xl border border-white/10 shadow-2xl">
<!-- Title Section -->
<div class="space-y-3 text-center md:text-left">
<h1 class="text-4xl font-black tracking-tight text-slate-900 dark:text-white lg:text-5xl">
                            Welcome <span class="text-primary underline decoration-primary/30 underline-offset-8">back.</span>
</h1>
<p class="text-base text-slate-600 dark:text-slate-400">
                            Securely access your premium property management dashboard.
                        </p>
</div>
<!-- Login Form -->
<form action="#" class="space-y-6" method="POST">
<div class="space-y-4">
<!-- Email Input -->
<div class="flex flex-col gap-2">
<label class="text-sm font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Email Address</label>
<div class="relative">
<div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
<span class="material-symbols-outlined text-slate-400 text-xl">mail</span>
</div>
<input class="block w-full rounded-xl border-slate-200 bg-white px-12 py-4 text-base focus:border-primary focus:ring-primary dark:border-white/10 dark:bg-white/5 dark:text-white dark:placeholder-slate-500" placeholder="name@company.com" required="" type="email"/>
</div>
</div>
<!-- Password Input -->
<div class="flex flex-col gap-2">
<div class="flex items-center justify-between">
<label class="text-sm font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Password</label>
<a class="text-sm font-medium text-primary hover:text-primary/80 transition-colors" href="#">Forgot?</a>
</div>
<div class="relative">
<div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
<span class="material-symbols-outlined text-slate-400 text-xl">lock</span>
</div>
<input class="block w-full rounded-xl border-slate-200 bg-white px-12 py-4 text-base focus:border-primary focus:ring-primary dark:border-white/10 dark:bg-white/5 dark:text-white dark:placeholder-slate-500" placeholder="••••••••" required="" type="password"/>
<button class="absolute inset-y-0 right-0 flex items-center pr-4 text-slate-400 hover:text-primary transition-colors" type="button">
<span class="material-symbols-outlined text-xl">visibility</span>
</button>
</div>
</div>
</div>
<!-- Login Button -->
<button class="flex w-full items-center justify-center gap-2 rounded-xl bg-primary px-8 py-4 text-base font-bold text-background-dark shadow-xl shadow-primary/10 transition-all hover:scale-[1.02] active:scale-[0.98] hover:bg-primary/90" type="submit">
                            Sign in to Dashboard
                            <span class="material-symbols-outlined font-bold">arrow_forward</span>
</button>
</form>
<!-- Registration Link -->
<div class="text-center">
<p class="text-sm text-slate-600 dark:text-slate-400">
                            Don't have a premium account?
                            <a class="font-bold text-slate-900 dark:text-white hover:text-primary dark:hover:text-primary transition-colors ml-1" href="#">
                                Create an account
                            </a>
</p>
</div>
<!-- Footer Details -->
<div class="pt-8 border-t border-slate-200 dark:border-white/5 flex flex-wrap justify-center gap-6 md:justify-start">
<div class="flex items-center gap-2 text-xs text-slate-400">
<span class="material-symbols-outlined text-sm">verified_user</span>
                            Bank-grade security
                        </div>
<div class="flex items-center gap-2 text-xs text-slate-400">
<span class="material-symbols-outlined text-sm">support_agent</span>
                            24/7 Premium Support
                        </div>
</div>
</div>
</main>
<!-- Bottom Background Elements -->


</div>
</div>
</body>
</html>
