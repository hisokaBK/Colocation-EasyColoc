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
<a href="/user/colocation" class="flex items-center gap-3 px-4 py-3 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-white/5 rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">home_work</span>
<span class="text-sm font-medium">Return</span>
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

<div class="p-10 space-y-8">

<div class="flex flex-wrap justify-between items-center gap-4">
    <div>
        <h1 class="text-3xl font-black text-primary">
            {{ $colocation->name }}
        </h1>

        <p class="text-sm text-slate-400 mt-1">
            Owner :
            <span class="text-slate-200 font-semibold">
                {{ $colocation->ownerMembership->user->name }}
            </span>
        </p>
    </div>
  @if($colocation->ownerMembership->user->email== Auth::user()->email)

    <div class="flex flex-wrap gap-3">

        <button onclick="document.getElementById('inviteModal').classList.remove('hidden')"
            class="bg-primary text-background-dark font-bold px-5 py-2 rounded-lg flex items-center gap-2 hover:opacity-90 transition">
            <span class="material-symbols-outlined">person_add</span>
            Add Member
        </button>

        <button onclick="openCategoryModal()"
            class="border border-primary text-primary font-bold px-5 py-2 rounded-lg flex items-center gap-2 hover:bg-primary hover:text-background-dark transition">
            <span class="material-symbols-outlined">category</span>
            Add Category
        </button>

        <button onclick="openCancelModal({{ $colocation->id }})"
            class="bg-red-500/80 hover:bg-red-600 px-5 py-2 rounded-lg font-bold transition">
            Cancel
        </button>

    </div>
  @else
       <button onclick="openExitModal()"
           class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">
           Exit Colocation
       </button>
  @endif

</div>

<section class="bg-primary/5 border border-primary/10 rounded-xl p-6">

    <h2 class="text-xl font-bold mb-5 flex items-center gap-2">
        <span class="material-symbols-outlined text-primary">group</span>
        Members
    </h2>

    <div class="flex flex-wrap gap-3">

        @foreach($colocation->members as $member)

            <div class="flex items-center gap-3 bg-neutral-dark px-4 py-2 rounded-lg border border-border-dark">

                <div
                    class="size-9 rounded-full bg-primary text-background-dark flex items-center justify-center text-xs font-black">
                    {{ strtoupper(substr($member->name,0,2)) }}
                </div>

                <span class="font-semibold">
                    {{ $member->name }}
                </span>

                @if($member->pivot->role === 'owner')
                    <span class="text-xs bg-primary/20 text-primary px-2 py-1 rounded-full">
                        Owner
                    </span>
                @endif

                @if($member->pivot->role !== 'owner' && $colocation->ownerMembership->user->email== Auth::user()->email)
                    <button
                      onclick="openDeleteModalM({{ $member->id }})"
                      class="text-red-500 font-bold hover:text-red-700">
                      x
                    </button>
                @endif


            </div>

        @endforeach

    </div>

</section>


<section class="bg-primary/5 border border-primary/10 rounded-xl p-6">

    <h2 class="text-xl font-bold mb-5 flex items-center gap-2">
        <span class="material-symbols-outlined text-primary">sell</span>
        Categories
    </h2>

    <div class="flex flex-wrap gap-3">

@forelse($colocation->categories as $category)

    <div
        class="flex items-center gap-2 px-4 py-2 bg-primary/10 border border-primary/20 rounded-full text-primary text-sm font-semibold">

        {{ $category->name }}

      @if($colocation->ownerMembership->user->email== Auth::user()->email)
       <button
            onclick="openDeleteModal({{ $category->id }}, '{{ $category->name }}')"
            class="ml-2 text-red-400 hover:text-red-500 font-bold transition">
            ✕
        </button>
      @endif
    </div>

@empty

    <p class="text-slate-400">No categories yet.</p>

@endforelse

</div>

</section>

<section class="space-y-4">

    <div class="flex items-center gap-2">
        <span class="material-symbols-outlined text-primary">receipt_long</span>
        <h2 class="text-2xl font-black">Expenses</h2>
    </div>

    <div
        class="overflow-x-auto bg-white dark:bg-primary/5 rounded-xl border border-slate-200 dark:border-primary/10">

        <table class="w-full text-left border-collapse">

            <thead>
            <tr class="border-b border-primary/10 text-sm opacity-70 uppercase">
                <th class="px-6 py-4">Title</th>
                <th class="px-6 py-4">Category</th>
                <th class="px-6 py-4">Payer</th>
                <th class="px-6 py-4 text-right">Amount</th>
            </tr>
            </thead>

            <tbody class="divide-y divide-primary/10">

            @forelse($colocation->expenses as $expense)

                <tr class="hover:bg-primary/10 transition">

                    <td class="px-6 py-4 font-semibold">
                        {{ $expense->title }}
                    </td>

                    <td class="px-6 py-4">
                        <span
                            class="px-3 py-1 bg-primary/20 text-primary text-xs font-bold rounded-full">
                            {{ $expense->category->name ?? '-' }}
                        </span>
                    </td>

                    <td class="px-6 py-4 flex items-center gap-2">

                        <div
                            class="size-7 rounded-full bg-primary/30 flex items-center justify-center text-[11px] font-bold">
                            {{ strtoupper(substr($expense->user->name,0,2)) }}
                        </div>

                        {{ $expense->user->name }}

                    </td>

                    <td class="px-6 py-4 text-right font-bold text-primary">
                        ${{ number_format($expense->amount,2) }}
                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="4" class="text-center py-12 text-slate-500">
                        No expenses added yet.
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</section>

</div>

</main>
</div>

<!-- catygory -->
<div id="categoryModal"
class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50">

    <div class="bg-panel-dark border border-border-dark rounded-xl w-full max-w-md p-6 relative">

        <button onclick="closeCategoryModal()"
            class="absolute top-3 right-3 text-slate-400 hover:text-white">
            ✕
        </button>

        <h2 class="text-xl font-bold text-white mb-4">
            Create New Category
        </h2>

        <form method="POST"
              action="{{ route('category.store',$colocation->id) }}"
              class="space-y-4">

            @csrf

            <div>
                <label class="text-sm text-black-500">Category Name</label>
                <input type="text"
                       name="name"
                       required
                       class=" w-full mt-1 bg-panel-dark border border-border-dark
                              rounded-lg px-3 py-2 text-black
                               ">
            </div>

            <button type="submit"
            class="w-full bg-primary hover:bg-primary-hover
                   text-white py-2 rounded-lg transition">
                Create Category
            </button>

        </form>

    </div>
</div>

<!-- delet category -->
<div id="deleteModal"
     class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50">

    <div class="bg-panel-dark border border-border-dark rounded-xl w-[400px] p-6 space-y-6">

        <h2 class="text-lg font-bold text-white">
            Delete Category
        </h2>

        <p class="text-slate-400">
            Are you sure you want to delete
            <span id="categoryName" class="text-primary font-semibold"></span> ?
        </p>

        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')

            <div class="flex justify-end gap-3">

                <button type="button"
                    onclick="closeDeleteModal()"
                    class="px-4 py-2 border border-border-dark rounded-lg text-slate-300 hover:bg-border-dark">
                    Cancel
                </button>

                <button type="submit"
                    class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg font-semibold">
                    Delete
                </button>

            </div>
        </form>

    </div>
</div>

<div id="cancelModal"
class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50">

    <div class="bg-panel-dark border border-border-dark rounded-xl w-[420px] p-6 space-y-6">

        <h2 class="text-xl font-bold text-white">
            Cancel Colocation
        </h2>

        <p class="text-slate-400">
            Are you sure you want to cancel this colocation ?
            This action can be reversed later.
        </p>

        <form id="cancelForm" method="POST">
            @csrf
            @method('PUT')

            <div class="flex justify-end gap-3">
                <button type="button"
                    onclick="closeCancelModal()"
                    class="px-4 py-2 border border-border-dark rounded-lg text-slate-300">
                    No
                </button>

                <button type="submit"
                    class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg font-semibold">
                    Yes, Cancel
                </button>
            </div>

        </form>

    </div>
</div>


<!-- invitation -->
<div id="inviteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-panel-dark p-6 rounded-xl w-96 relative">
        <button onclick="document.getElementById('inviteModal').classList.add('hidden')"
            class="absolute top-3 right-3 text-primary font-bold text-lg">×</button>
        <h2 class="text-xl font-bold text-slate-100 mb-4">Invite Member</h2>

        <form action="{{ route('colocation.invite', $colocation->id) }}" method="POST">
            @csrf
            <input type="email" name="email"
                class="w-full px-4 py-2 rounded-lg bg-background-dark border border-border-dark text-slate-100 mb-4"
                placeholder="Member Email" required>
            <button type="submit"
                class="w-full bg-primary text-background-dark font-bold py-2 rounded-lg">Send Invitation</button>
        </form>
    </div>
</div>

<div id="deleteModalManber" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden">
    <div class="bg-panel-dark p-6 rounded-xl w-96">
        <h2 class="text-lg font-semibold mb-4">Confirm Delete</h2>
        <p class="mb-4">Are you sure you want to remove this member from the colocation?</p>
        <div class="flex justify-end gap-4">
            <button onclick="closeDeleteModalM()" class="px-4 py-2 rounded ">Cancel</button>
            <form id="deleteFormManber" method="POST" action="">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded">Delete</button>
            </form>
        </div>
    </div>
</div>

<!-- exit clocation  -->

<div id="exitModal"
     class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50">

    <div class="bg-panel-dark border border-border-dark rounded-xl w-[400px] p-6 space-y-6">

        <h2 class="text-lg font-bold text-white">
            Exit Colocation
        </h2>

        <p class="text-slate-400">
            Are you sure you want to leave this colocation ?
        </p>

        <form method="POST"
              action="{{ route('colocation.exit', $colocation->id) }}">
            @csrf
            @method('DELETE')

            <div class="flex justify-end gap-3">

                <button type="button"
                        onclick="closeExitModal()"
                        class="px-4 py-2 border border-border-dark rounded-lg text-slate-300">
                    Cancel
                </button>

                <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded-lg font-semibold">
                    Exit
                </button>

            </div>
        </form>

    </div>
</div>

<script>
function openCategoryModal() {
    document.getElementById('categoryModal')
        .classList.remove('hidden');
    document.getElementById('categoryModal')
        .classList.add('flex');
}

function closeCategoryModal() {
    document.getElementById('categoryModal')
        .classList.add('hidden');
    document.getElementById('categoryModal')
        .classList.remove('flex');
}
//delete category
function openDeleteModal(categoryId, categoryName) {

    const modal = document.getElementById('deleteModal');
    const form = document.getElementById('deleteForm');
    const name = document.getElementById('categoryName');

    name.textContent = categoryName;

    form.action = `/user/categories/${categoryId}`;

    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeDeleteModal() {
    const modal = document.getElementById('deleteModal');

    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function openCancelModal(id) {

    const modal = document.getElementById('cancelModal');
    const form = document.getElementById('cancelForm');

    form.action = `/user/colocation/${id}/cancel`;

    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeCancelModal() {
    const modal = document.getElementById('cancelModal');

    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function openDeleteModalM(userId) {

        const form = document.getElementById('deleteFormManber');
        form.action = `/user/colocation/{{ $colocation->id }}/member/${userId}`;

        document.getElementById('deleteModalManber')
            .classList.remove('hidden');
    }

    function closeDeleteModalM() {
        document.getElementById('deleteModalManber')
            .classList.add('hidden');
    }

function openExitModal() {
    const modal = document.getElementById('exitModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeExitModal() {
    const modal = document.getElementById('exitModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
</script>
</body></html>
