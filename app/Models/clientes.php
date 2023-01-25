<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    protected $table = "clientes";
    use HasFactory;

    public function tareas(){

        return $this->hasMany(tareas::class);
    }
}
