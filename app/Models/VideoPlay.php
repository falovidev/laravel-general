<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoPlay extends Model
{
    use HasFactory;

    // Definir la tabla asociada
    protected $table = 'video_play';

    // Definir la clave primaria
    protected $primaryKey = 'videoplayid';

    // Indicar que la clave primaria es un bigint
    protected $keyType = 'bigint';

    // Indicar si la clave primaria es autoincrementable
    public $incrementing = true;

    // Campos que se pueden asignar de forma masiva
    protected $fillable = [
        'userid',
        'videoid',
        'time',
    ];

    // Si deseas trabajar con timestamps, desactiva la propiedad `timestamps` si no estás usando campos de timestamp
    public $timestamps = false;
}
