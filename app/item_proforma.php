<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item_proforma extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'item_proformas';

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
    protected $fillable = ["producto", "codbarra", "precio", "cant", "total", "descuento", "id_producto"];

    public function proforma()
    {
        return $this->belongsTo('App\Proforma');
    }
}
