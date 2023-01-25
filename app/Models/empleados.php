<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleados extends Model
{
    protected $table = "empleados";
    use HasFactory;

    public function tareas(){

        return $this->hasMany(tareas::class);
    }
}
