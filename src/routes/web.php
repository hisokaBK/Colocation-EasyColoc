<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\User\ColocationController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ExpenseController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\BalanceController;


Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth','admin','not_banned'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::patch(
            '/users/{user}/toggle-ban',
            [AdminDashboardController::class,'toggleBan']
        )->name('users.toggleBan');
});


Route::middleware(['auth','not_banned'])->group(function () {

    Route::get('/user/profile', [UserProfileController::class,'show'])
        ->name('profile.user');

    Route::patch('/user/profile', [UserProfileController::class,'update'])
        ->name('profile.updateUser');

    Route::put('/profile/password',
           [UserProfileController::class, 'updatePassword']
       )->name('profile.password.update');

    Route::get('/user/dashboard', [DashboardController::class, 'index'])
            ->name('user.dashboard');

});

Route::middleware(['auth','not_banned'])->prefix('user')->group(function () {

    Route::get('/colocation', [ColocationController::class, 'index'])
        ->name('user.colocation');

    Route::get(
    '/colocation/{id}',
    [ColocationController::class,'show']
    )
    ->name('colocation.show')->middleware('colocation.active');

    Route::post('/colocation', [ColocationController::class, 'store'])
        ->name('colocation.store')->middleware('already.in.colocation');
});


Route::middleware(['auth','owner','colocation.active','not_banned'])
    ->prefix('user')
    ->group(function () {

        Route::post('/category/{id}', [CategoryController::class, 'store'])
            ->name('category.store');

        Route::delete('categories/{category}', [CategoryController::class,'destroy'])
            ->name('categories.destroy');

        Route::put('/colocation/{id}/cancel', [ColocationController::class, 'cancel'])
            ->name('colocation.cancel');

        Route::post('/colocation/{id}/invite', [ColocationController::class, 'inviteMember'])
            ->name('colocation.invite');

        Route::delete('/colocation/{colocation}/member/{user}',
            [ColocationController::class, 'removeMember']
        )->name('colocation.member.remove');
});



Route::delete(
    '/colocation/{colocation}/exit',
    [ColocationController::class, 'exit']
)->name('colocation.exit')->middleware(['auth','not_banned']);

Route::middleware(['auth','not_banned'])
    ->group(function () {
       Route::post(
           '/colocation/{id}/expense',
           [ExpenseController::class, 'store']
           )->name('expenses.store');

        Route::put('/expenses/{expense}',
        [ExpenseController::class,'update']
           )->name('expenses.update');

    Route::delete('/expenses/{expense}',
        [ExpenseController::class,'destroy']
         )->name('expenses.destroy');
});

Route::post('balances/{colocation}/{debtor}/settle', [BalanceController::class, 'settle'])
    ->name('balances.settle');

Route::get('/join-colocation/{token}', [ColocationController::class, 'acceptInvitation'])
    ->name('colocation.accept')
    ->middleware(['invitation','already.in.colocation','not_banned']);

require __DIR__.'/auth.php';
