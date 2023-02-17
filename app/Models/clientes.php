<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class clientes extends Model
{
    protected $table = "clientes";
    use SoftDeletes,HasFactory;

    public function tareas(){

        return $this->hasMany(tareas::class);
    }
}
