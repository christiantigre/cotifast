<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'almacens';

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
    protected $fillable = ['almacen', 'propietario', 'gerente', 'pag_web', 'razon_social', 'ruc', 'email', 'fecha_inicio', 'logo', 'slogan', 'name_logo', 'activo', 'telefono', 'fax', 'cel_movi', 'cel_claro', 'watsapp', 'fb', 'tw', 'ins', 'gg', 'funcion_empresa', 'dirMatriz', 'dirSucursal', 'latitud', 'longitud', 'pais_id', 'provincia_id','canton_id', 'obligado_contabilidad', 'path_certificado', 'clave_certificado', 'modo_ambiente', 'tipo_emision', 'habilitar_facelectronica', 'auth_sri', 'codestablecimiento', 'codpntemision'];

    public function almacen()
    {
        return $this->belongsTo('App\Almacen');
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
