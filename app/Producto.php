<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'productos';

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
    protected $fillable = ['producto', 'cod_barra', 'pre_compra', 'pre_venta', 'cantidad', 'fecha_ingreso', 'compras', 'ventas', 'saldo', 'imagen', 'name_img', 'nuevo', 'promocion', 'catalogo', 'activo', 'propaganda', 'categoria_id', 'subcategoria_id', 'marca_id'];

    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }
    
}
