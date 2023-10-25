<?php 

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('panel.index');
});

Route::resource('/productos', ProductoController::class)->names('producto');
Route::get('/exportar-productos-pdf', [ProductoController::class, 'exportarProductosPDF'])->name('exportar-productos-pdf');