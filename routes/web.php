<?php

use App\Http\Controllers\Admin\AnaliseAdminController;
use App\Http\Controllers\Admin\InscricaoController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnaliseViabilidadeController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CursoInscricaoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


//Rotas publicas
Route::get('/', [HomeController::class, 'index']);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cursos/show/{id}', [CursoController::class, 'show'])->name('cursos.show');

Route::get('/quem-somos', [HomeController::class, 'quemSomos'])->name('quem_somos');
Route::get('/contacto', [HomeController::class, 'mostrarFormulario'])->name('contacto');
Route::post('/contacto', [HomeController::class, 'enviarFormulario'])->name('contacto.enviar');
Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');



//termo de uso 

Route::get('/termos', function () {
    return view('termos');
})->name('termos');


// Pdf
Route::get('/analises/{id}/pdf', [AnaliseViabilidadeController::class, 'gerarPdf'])->name('analises.pdf');



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
    Route::get('/user/dashboard/cursos', [UserDashboardController::class, 'cursos'])->middleware('auth')->name('user.cursos');

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



    //para analise de viabilidade do Admim

    Route::get('/admin/analises', function () {
        if (Auth::user()->role !== 'super-admin') {
            abort(403, 'Acesso negado.');
        }
        return app(AnaliseAdminController::class)->index();
    })->name('admin.analises.index');

    Route::get('/admin/analises/create', function () {
        if (Auth::user()->role !== 'super-admin') {
            abort(403, 'Acesso negado.');
        }
        return app(AnaliseAdminController::class)->create();
    })->name('admin.analises.create');

    Route::post('/admin/analises', function () {
        if (Auth::user()->role !== 'super-admin') {
            abort(403, 'Acesso negado.');
        }
        return app(AnaliseAdminController::class)->store(request());
    })->name('admin.analises.store');

    Route::get('/admin/analises/{id}', function ($id) {
        if (Auth::user()->role !== 'super-admin') {
            abort(403, 'Acesso negado.');
        }
        return app(AnaliseAdminController::class)->show($id);
    })->name('admin.analises.show');

    Route::get('/admin/analises/{id}/edit', function ($id) {
        if (Auth::user()->role !== 'super-admin') {
            abort(403, 'Acesso negado.');
        }
        return app(AnaliseAdminController::class)->edit($id);
    })->name('admin.analises.edit');

    Route::put('/admin/analises/{id}', function ($id) {
        if (Auth::user()->role !== 'super-admin') {
            abort(403, 'Acesso negado.');
        }
        return app(AnaliseAdminController::class)->update(request(), $id);
    })->name('admin.analises.update');

    Route::delete('/admin/analises/{id}', function ($id) {
        if (Auth::user()->role !== 'super-admin') {
            abort(403, 'Acesso negado.');
        }

        return app(AnaliseAdminController::class)->destroy($id);
    })->name('admin.analises.destroy');


    // Rotas para usuários normais realizarem análises de viabilidade

Route::middleware(['auth'])->group(function () {

    Route::get('/user/analises', function () {
        if (Auth::user()->role !== 'user') {
            abort(403, 'Acesso negado.');
        }
        return app(AnaliseViabilidadeController::class)->index();
    })->name('analises.index');

    Route::get('/user/analises/create', function () {
        if (Auth::user()->role !== 'user') {
            abort(403, 'Acesso negado.');
        }
        return app(AnaliseViabilidadeController::class)->create();
    })->name('analises.create');

    Route::post('/user/analises', function () {
        if (Auth::user()->role !== 'user') {
            abort(403, 'Acesso negado.');
        }
        return app(AnaliseViabilidadeController::class)->store(request());
    })->name('analises.store');

    Route::get('/user/analises/{id}', function ($id) {
        if (Auth::user()->role !== 'user') {
            abort(403, 'Acesso negado.');
        }
        return app(AnaliseViabilidadeController::class)->show($id);
    })->name('analises.show');

    Route::get('/user/analises/{id}/edit', function ($id) {
        if (Auth::user()->role !== 'user') {
            abort(403, 'Acesso negado.');
        }
        return app(AnaliseViabilidadeController::class)->edit($id);
    })->name('analises.edit');

    Route::put('/user/analises/{id}', function ($id) {
        if (Auth::user()->role !== 'user') {
            abort(403, 'Acesso negado.');
        }
        return app(AnaliseViabilidadeController::class)->update(request(), $id);
    })->name('analises.update');

    Route::delete('/user/analises/{id}', function ($id) {
        if (Auth::user()->role !== 'user') {
            abort(403, 'Acesso negado.');
        }
        return app(AnaliseViabilidadeController::class)->destroy($id);
    })->name('analises.destroy');
});



    // Listar todos os usuários
Route::get('/admin/usuarios', function () {
    if (Auth::user()->role !== 'super-admin') {
        abort(403, 'Acesso negado.');
    }

    return app(UserAdminController::class)->index();
})->name('admin.usuarios.index');

// Formulário de criação
Route::get('/admin/usuarios/create', function () {
    if (Auth::user()->role !== 'super-admin') {
        abort(403, 'Acesso negado.');
    }

    return app(UserAdminController::class)->create();
})->name('admin.usuarios.create');

// Salvar novo usuário
Route::post('/admin/usuarios', function (\Illuminate\Http\Request $request) {
    if (Auth::user()->role !== 'super-admin') {
        abort(403, 'Acesso negado.');
    }

    return app(UserAdminController::class)->store($request);
})->name('admin.usuarios.store');

// Ver um único usuário
Route::get('/admin/usuarios/{id}', function ($id) {
    if (Auth::user()->role !== 'super-admin') {
        abort(403, 'Acesso negado.');
    }

    return app(UserAdminController::class)->show($id);
})->name('admin.usuarios.show');

// Editar formulário
Route::get('/admin/usuarios/{usuario}/edit', function (User $usuario) {
    if (Auth::user()->role !== 'super-admin') {
        abort(403, 'Acesso negado.');
    }

    return app(UserAdminController::class)->edit($usuario);
})->name('admin.usuarios.edit');

// Atualizar usuário
Route::put('/admin/usuarios/{id}', function (\Illuminate\Http\Request $request, $id) {
    if (Auth::user()->role !== 'super-admin') {
        abort(403, 'Acesso negado.');
    }

    return app(UserAdminController::class)->update($request, $id);
})->name('admin.usuarios.update');

// Apagar usuário
Route::delete('/admin/usuarios/{usuario}', function (User $usuario) {
    if (Auth::user()->role !== 'super-admin') {
        abort(403, 'Acesso negado.');
    }

    return app(UserAdminController::class)->destroy($usuario);
})->name('admin.usuarios.destroy');



});







require __DIR__ . '/auth.php';
