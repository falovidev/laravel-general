<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyStuff extends Model
{
    // Especifica la tabla asociada
    protected $table = 'mystuff';

    // Especifica los campos que se pueden llenar en masa
    protected $fillable = ['userid', 'videoid'];

    // Desactiva timestamps si no están presentes en la tabla
    public $timestamps = false;
}
