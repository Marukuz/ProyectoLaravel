<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class cuotas extends Model
{
    protected $table = "cuotas";
    use SoftDeletes,HasFactory;

}
