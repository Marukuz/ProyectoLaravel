<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tareas extends Model
{
    protected $table = "tareas";
    use HasFactory;

    public function clientes(){
        return $this->belongsTo(clientes::class);
    }
    public function empleados(){
        return $this->belongsTo(empleados::class);
    }
}
