<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tareas extends Model
{
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
        "empleados_id",
    ];

    use HasFactory;

    public function clientes(){
        return $this->belongsTo(clientes::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }

    public $timestamps = false;
}
