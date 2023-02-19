<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class clientes extends Model
{
    protected $table = "clientes";
    protected $fillable = [
        "id",
        "dni",
        "nombre",
        "telefono",
        "correo",
        "cuenta_corriente",
        "pais",
        "moneda",
        "importe_mensual",
        "created_at",
        "updated_at",
        "deleted_at",
    ];
    
    use SoftDeletes,HasFactory;

    public function tareas(){

        return $this->hasMany(tareas::class);
    }
}
