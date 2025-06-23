<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $fillable = [
        'tarea_id',
        'usuario_id',
        'accion',
        'fecha'
    ];
}

?>

