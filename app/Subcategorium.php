<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategorium extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subcategorias';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Subcategoria', 'detalle', 'activo','categoria_id'];

    
}
