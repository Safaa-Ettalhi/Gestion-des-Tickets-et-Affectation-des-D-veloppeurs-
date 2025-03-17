<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SoftwareController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Routes pour les tickets
    Route::resource('tickets', TicketController::class);
    Route::post('/tickets/{ticket}/comments', [TicketController::class, 'storeComment'])->name('tickets.comments.store');
    Route::delete('/comments/{comment}', [TicketController::class, 'destroyComment'])->name('comments.destroy');
    Route::get('/tickets/attachment/{attachment}', [TicketController::class, 'downloadAttachment'])->name('tickets.attachment.download');
    Route::get('/tickets/{ticket}/assign', [TicketController::class, 'showAssignForm'])->name('tickets.assign');
    Route::post('/tickets/{ticket}/assign', [TicketController::class, 'assign'])->name('tickets.assign');
    Route::get('/tickets/{ticket}/update-status', [TicketController::class, 'showUpdateStatusForm'])->name('tickets.update-status');
    Route::patch('/tickets/{ticket}/update-status', [TicketController::class, 'updateStatus'])->name('tickets.updateStatus');

    // Routes Admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/admin/tickets', [AdminController::class, 'tickets'])->name('admin.tickets');
        Route::patch('/admin/tickets/{ticket}/assign', [AdminController::class, 'assignTicket'])->name('admin.tickets.assign');

        // Routes pour les utilisateurs
        Route::get('admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('admin/users', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
        Route::get('admin/users', [UserController::class, 'index'])->name('admin.users.index');
        
        // Routes pour les logiciels
        Route::get('admin/software', [SoftwareController::class, 'index'])->name('admin.software.index');
        Route::get('admin/software/create', [SoftwareController::class, 'create'])->name('admin.software.create');
        Route::post('admin/software', [SoftwareController::class, 'store'])->name('admin.software.store');
        Route::get('admin/software/{software}/edit', [SoftwareController::class, 'edit'])->name('admin.software.edit');
        Route::put('admin/software/{software}', [SoftwareController::class, 'update'])->name('admin.software.update');
        Route::delete('admin/software/{software}', [SoftwareController::class, 'destroy'])->name('admin.software.destroy');
    });

    // Routes Developer
    Route::middleware(['role:developer'])->group(function () {
        Route::get('/developer/dashboard', [DeveloperController::class, 'dashboard'])->name('developer.dashboard');
        Route::get('/developer/tickets', [DeveloperController::class, 'assignedTickets'])->name('developer.tickets');
        Route::patch('/developer/tickets/{ticket}/status', [DeveloperController::class, 'updateStatus'])->name('developer.tickets.status');
    });


    // Routes User
    Route::middleware(['role:user'])->group(function () {
        Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
        Route::get('/user/tickets', [UserController::class, 'tickets'])->name('user.tickets');
    });

    // Routes Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
