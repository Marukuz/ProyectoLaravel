<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class cuotas extends Model
{
    protected $table = "cuotas";
    protected $fillable =  [
        "id",
        "concepto",
        "fecha_emision",
        "importe",
        "pagada",
        "fecha_pago",
        "notas",
        "clientes_id",
        "deleted_at",
    ];
    
    use SoftDeletes,HasFactory;

}
