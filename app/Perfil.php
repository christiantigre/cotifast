<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'perfils';

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
    protected $fillable = ['nombre', 'apellido', 'cedula', 'ruc', 'email', 'telefono', 'cel_movi', 'cel_claro', 'wts', 'direccion', 'fecha_nacimiento', 'tipo_usuario', 'imagen', 'name_img', 'estado_civil', 'genero', 'activo', 'pais_id', 'provincia_id', 'canton_id'];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
    
}
