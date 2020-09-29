<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prospecto extends Model
{
    protected $primaryKey="id_prospecto";
    protected $fillable = ['id_prospecto',
        'nombre_prospecto', 'primer_apellido', 'segundo_apellido','calle','numero',
        'colonia','cp','telefono','rfc','estado','observaciones',
    ];
    protected $hidden=['created_at','updated_at'
    ];
}
