<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clientes';

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
    protected $fillable = ['nombre', 'apellido', 'cedula', 'ruc', 'email', 'telefono', 'cel_movi', 'cel_claro', 'wts', 'direccion', 'fecha_nacimiento', 'estado_civil', 'genero', 'activo', 'pais_id', 'provincia_id', 'canton_id'];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

     public function pais()
    {
      return $this->belongsTo('App\Pais');
    }
    public function provincia()
    {
      return $this->belongsTo('App\Provincias');
    }
    public function canton()
    {
      return $this->belongsTo('App\Canton');
    }
    
}
