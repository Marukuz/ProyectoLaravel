<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class tareas extends Model
{
    use SoftDeletes,HasFactory;

    protected $table = "tareas";
    protected $fillable =  [
        "id",
        "dni",
        "nombre",
        "apellido",
        "telefono",
        "correo",
        "direccion",
        "poblacion",
        "codigo_postal",
        "provincia",
        "estado_tarea",
        "fecha_creacion",
        "operario_encargado",
        "fecha_realizacion",
        "descripcion",
        "anotacion_inicio",
        "anotacion_final",
        "clientes_id",
        "users_id",
    ];

    public function clientes(){
        return $this->belongsTo(clientes::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }

    public $timestamps = false;
}
