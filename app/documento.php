<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class documento extends Model
{
    
    public $table="documentos";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_documentos','id_pro_doc','ine', 'comprobante_pago', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
   
}
