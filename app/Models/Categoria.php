<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    // Nombre de la tabla que se conecta a este Modelo
    protected $table = 'categorias';

    // Nombres de las columnas que son modificables
    protected $fillable = [
        'nombre'
    ];
    
    // INNER JOIN con la tabla Productos
    // por medio de la FK categoria_id
    public function productos() {
        return $this->hasMany(Producto::class, 'categoria_id');
    } 
}
