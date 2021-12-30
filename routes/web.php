<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/task', function () {
    return view('tasks.index');
})->middleware(['auth'])->name('tasks.index');

require __DIR__.'/auth.php';

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');

Route::post('/tasks/complete', [TaskController::class, 'markTaskAsCompleted'])->name('mark');





