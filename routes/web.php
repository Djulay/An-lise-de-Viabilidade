<?php

use App\Http\Controllers\Admin\InscricaoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CursoInscricaoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


//Rotas publicas
Route::get('/', [HomeController::class, 'index']);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cursos/show/{id}', [CursoController::class, 'show'])->name('cursos.show');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});


Route::get('/inscricao/curso/{id}', [CursoInscricaoController::class, 'mostrarFormulario'])
    ->name('inscricao.curso');
    //->middleware('auth');

Route::post('/inscricao/curso/{id}', [CursoInscricaoController::class, 'inscrever'])
    ->name('inscricao.curso.enviar')
    ->middleware('auth');


Route::middleware(['auth'])->group(function () {

    // Redireciona para o dashboard correto
    Route::get('/dashboard', function () {
        return Auth::user()->role === 'super-admin' ? redirect()->route('admin.dashboard') : redirect()->route('user.dashboard');
    })->name('dashboard');

    // Dashboard do Usuário
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/user/dashboard/cursos', [UserDashboardController::class, 'cursos'])->middleware('auth') ->name('user.cursos');

    // Dashboard do Super Admin
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Rotas do Super Admin para Gerir Cursos
    //     Route::middleware(['auth', 'isSuperAdmin'])->prefix('admin')->group(function () {
    //     Route::resource('cursos', CursoController::class)->names('admin.cursos');
    // });
});



// Rotas de Cursos (apenas para Super-Admin)
Route::middleware('auth')->group(function () {

    Route::get('/admin/curso/create', function () {
        if (Auth::user()->role !== 'super-admin') {
            abort(403, 'Acesso negado.');
        }
        return app(CursoController::class)->create();
    })->name('admin.cursos.create');

    Route::post('/admin/curso/store', function () {
        if (Auth::user()->role !== 'super-admin') {
            abort(403, 'Acesso negado.');
        }
        return app(CursoController::class)->store(request());
    })->name('admin.cursos.store');

    Route::get('/admin/cursos', function () {
        if (Auth::user()->role !== 'super-admin') {
            abort(403, 'Acesso negado.');
        }
        return app(CursoController::class)->index();
    })->name('admin.cursos.index');

    Route::get('/admin/curso/{id}/edit', function ($id) {
        if (Auth::user()->role !== 'super-admin') {
            abort(403, 'Acesso negado.');
        }
        return app(CursoController::class)->edit($id);
    })->name('admin.cursos.edit');

    Route::delete('/admin/curso/{id}/destroy', function ($id) {
        if (Auth::user()->role !== 'super-admin') {
            abort(403, 'Acesso negado.');
        }
        return app(CursoController::class)->destroy($id);
    })->name('admin.cursos.destroy');

    Route::put('/admin/curso/{id}/update', function ($id) {
        if (Auth::user()->role !== 'super-admin') {
            abort(403, 'Acesso negado.');
        }
        return app(CursoController::class)->update(request(), $id);
    })->name('admin.cursos.update');


     Route::get('/admin/cursos/inscricoes', function () {
        if (Auth::user()->role !== 'super-admin') {
            abort(403, 'Acesso negado.');
        }
        return app(InscricaoController::class)->listarInscricoes(request());
    })->name('admin.inscricoes');

    Route::post('/admin/cursos/inscricoes/{id}/aprovar', function ($id) {
        if (Auth::user()->role !== 'super-admin') {
            abort(403, 'Acesso negado.');
        }
        return app(InscricaoController::class)->aprovar($id);
    })->name('admin.cursos.inscricoes.aprovar');

});



require __DIR__ . '/auth.php';
