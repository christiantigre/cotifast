<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proforma extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'proformas';

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
    protected $fillable = ['fecha_proforma', 'total', 'destinatario_mail', 'secuencial_proforma', 'detalles_proforma', 'cliente_id','cliente','contactos','documento_ruc','documento_ced','direccion_cliente','enviado','subtotal','iva_cero','descuento','iva_calculado','porcentaje_iva'];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
    
}
